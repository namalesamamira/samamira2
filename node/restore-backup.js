#!/usr/bin/env node
const fs = require('fs');
const path = require('path');
const { spawnSync } = require('child_process');

const projectDir = path.resolve(__dirname, '..');
const backupsDir = path.join(projectDir, 'backups');
const files = fs.existsSync(backupsDir)
  ? fs.readdirSync(backupsDir).filter((file) => file.endsWith('.sql')).sort().reverse()
  : [];

if (!files.length) {
  console.error('No database backups found in backups/.');
  process.exit(1);
}

const selected = files[0];
const restoreFile = path.join(backupsDir, selected);

console.log(`Restoring database from ${selected}`);
const input = fs.openSync(restoreFile, 'r');
let result;
try {
  result = spawnSync('docker', [
    'compose', 'exec', '-T', 'mysql', 'sh', '-c',
    'exec mysql -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"',
  ], {
    cwd: projectDir,
    stdio: [input, 'inherit', 'inherit'],
  });
} finally {
  fs.closeSync(input);
}

if (result.error) {
  console.error(`Unable to start Docker Compose: ${result.error.message}`);
  process.exit(1);
}
if (result.status !== 0) {
  console.error(`Restore failed (${result.signal || `exit code ${result.status}`}).`);
  process.exit(result.status || 1);
}
console.log('Restore finished.');
