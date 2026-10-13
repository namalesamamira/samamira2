var fs = require('fs');
const open = require('open');
const { exec } = require("child_process");
// const prompt = require('prompt');

// prompt.start();

// prompt.get(['username', 'email'], function (err, result) {
//   if (err) {
//     return onErr(err);
//   }
//   console.log('Command-line input received:');
//   console.log('  Username: ' + result.username);
//   console.log('  Email: ' + result.email);
// });

function onErr(err) {
  console.log(err);
  return 1;
}

//what to clean...
var cleanup_list = [
    '.git',
    'app',
    'bootstrap',
    'database',
    'resources/views',
    'resources/lang',
    'resources/css',
    'resources/js',
    'routes',
    'storage',
    'tests',
    'upload',
    'vendor',
    'node_modules',
    'apache.access.log',
    'apache.error.log',
    'artisan',
    'composer.json',
    'composer.lock',
    'locustfile.py',
    'php.error.log',
    'phpunit.dusk.xml',
    'phpunit.xml',
    'server.php',
    'webpack.mix.js',
    'workbox-config.js',
    '.env',
    '.env.example',
];

function deleteFolderRecursive(path) {
    console.log("deleteFolderRecursive(path)", path);
    if (fs.existsSync(path) && fs.lstatSync(path).isDirectory()) {
        console.log("deleteFolderRecursive(path) is directory");
        fs.readdirSync(path).forEach(function(file, index){
            var curPath = path + "/" + file;
            if (fs.lstatSync(curPath).isDirectory()) { // recurse
                deleteFolderRecursive(curPath);
            } else { // delete file
                fs.unlinkSync(curPath);
            }
        });
        console.log(`Deleting directory "${path}"...`);
        fs.rmdirSync(path);
    } else if (fs.existsSync(path) && fs.lstatSync(path).isFile()) {
        console.log("deleteFolderRecursive(path) is file");
        fs.unlinkSync(path);
        console.log(`Deleting file "${path}"...`);
    }else{
        console.log(`deleteFolderRecursive(path) "${path}" was not found`);
    }
};

function clean_start(){
    for (let i = 0; i < cleanup_list.length; i++) {
        deleteFolderRecursive(cleanup_list[i]);
    }

    var path = require('path');
    var parentDir = path.dirname(require.main.filename);
    console.log(parentDir);
    console.log(path.basename(path.dirname(require.main.filename)));

    //TODO: replace config and docker compose with projects main folders name

    // var result = fileAsString.replace(/samamira2/g, 'replacement');

    // exec("code ./gulp/config.js --user-data-dir /home/sam/.vscode", (error, stdout, stderr) => {
    //     if (error) {
    //         console.log(`error: ${error.message}`);
    //         return;
    //     }
    //     if (stderr) {
    //         console.log(`stderr: ${stderr}`);
    //         return;
    //     }
    //     console.log(`stdout: ${stdout}`);
    // });
    // open('gulp/config.js', {app: {name: 'chrome'}});
    // open('docker-compose.yml', {app: {name: 'chrome'}});
    console.log(`edit gulp/config.js`);
    console.log(`edit docker-compose.yml`);
}

clean_start();
