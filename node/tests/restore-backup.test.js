const assert = require('node:assert/strict');
const fs = require('node:fs');
const os = require('node:os');
const path = require('node:path');
const { spawnSync } = require('node:child_process');
const { test } = require('node:test');

function fixture(t, exitCode = 0) {
  const dir = fs.mkdtempSync(path.join(os.tmpdir(), 'restore-backup-'));
  t.after(() => fs.rmSync(dir, { recursive: true, force: true }));
  fs.mkdirSync(path.join(dir, 'node'));
  fs.mkdirSync(path.join(dir, 'bin'));
  fs.mkdirSync(path.join(dir, 'backups'));
  const script = path.join(dir, 'node', 'restore-backup.js');
  fs.copyFileSync(path.join(__dirname, '..', 'restore-backup.js'), script);
  fs.writeFileSync(path.join(dir, 'bin', 'docker'), `#!${process.execPath}
const fs = require('node:fs');
fs.writeFileSync('invocation.json', JSON.stringify({
  args: process.argv.slice(2), cwd: process.cwd(), input: fs.readFileSync(0, 'utf8')
}));
process.stdout.write('mock SQL dump');
process.exit(${exitCode});
`, { mode: 0o755 });
  return {
    dir,
    run: (cwd = dir, dockerAvailable = true) => spawnSync(process.execPath, [script], {
      cwd,
      env: { ...process.env, PATH: dockerAvailable ? path.join(dir, 'bin') : '' },
      encoding: 'utf8',
    }),
  };
}

test('restores the latest SQL backup through Compose from any working directory', (t) => {
  const { dir, run } = fixture(t);
  fs.writeFileSync(path.join(dir, 'backups', 'database-2026-10-01.sql'), 'old');
  fs.writeFileSync(path.join(dir, 'backups', 'database-2026-10-12.sql'), 'latest');
  fs.writeFileSync(path.join(dir, 'backups', 'z.txt'), 'ignore');
  const result = run(os.tmpdir());
  assert.equal(result.status, 0, result.stderr);
  assert.match(result.stdout, /Restore finished/);
  const invocation = JSON.parse(fs.readFileSync(path.join(dir, 'invocation.json'), 'utf8'));
  assert.deepEqual(invocation, {
    args: [
      'compose', 'exec', '-T', 'mysql', 'sh', '-c',
      'exec mysql -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"',
    ],
    cwd: dir,
    input: 'latest',
  });
});

test('reports missing backups without invoking Docker', (t) => {
  const { dir, run } = fixture(t);
  const result = run();
  assert.equal(result.status, 1);
  assert.match(result.stderr, /No database backups found/);
  assert.equal(fs.existsSync(path.join(dir, 'invocation.json')), false);
});

test('propagates Docker failures without reporting success', (t) => {
  const { dir, run } = fixture(t, 7);
  fs.writeFileSync(path.join(dir, 'backups', 'database.sql'), 'backup');
  const result = run();
  assert.equal(result.status, 7);
  assert.match(result.stderr, /Restore failed \(exit code 7\)/);
  assert.doesNotMatch(result.stdout, /Restore finished/);
});

test('reports a missing Docker executable', (t) => {
  const { dir, run } = fixture(t);
  fs.writeFileSync(path.join(dir, 'backups', 'database.sql'), 'backup');
  const result = run(dir, false);
  assert.equal(result.status, 1);
  assert.match(result.stderr, /Unable to start Docker Compose/);
  assert.doesNotMatch(result.stdout, /Restore finished/);
});

test('backup npm command targets Compose and leaves credentials to the container', (t) => {
  const { dir } = fixture(t);
  const { scripts } = require('../../package.json');
  const result = spawnSync('/bin/sh', ['-c', scripts['backup:db']], {
    cwd: dir,
    env: {
      ...process.env,
      PATH: `${path.join(dir, 'bin')}:${process.env.PATH}`,
      MYSQL_USER: 'must-not-expand-on-host',
      MYSQL_PASSWORD: 'must-not-expand-on-host',
      MYSQL_DATABASE: 'must-not-expand-on-host',
    },
    encoding: 'utf8',
  });
  assert.equal(result.status, 0, result.stderr);
  const invocation = JSON.parse(fs.readFileSync(path.join(dir, 'invocation.json'), 'utf8'));
  assert.deepEqual(invocation.args, [
    'compose', 'exec', '-T', 'mysql', 'sh', '-c',
    'exec mysqldump -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"',
  ]);
  const backups = fs.readdirSync(path.join(dir, 'backups'));
  assert.equal(backups.length, 1);
  assert.match(backups[0], /^database-\d{4}-\d{2}-\d{2}-\d{6}\.sql$/);
  assert.equal(fs.readFileSync(path.join(dir, 'backups', backups[0]), 'utf8'), 'mock SQL dump');
});
