import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { exec } from 'child_process';

function compileLessPlugin() {
    return {
        name: 'compile-less-plugin',
        buildStart() {
            exec('node node/compile-less.js', (err, stdout, stderr) => {
                if (err) console.error(err);
                if (stdout) console.log(stdout.trim());
            });
        },
        handleHotUpdate({ file }) {
            if (file.endsWith('.less')) {
                exec('node node/compile-less.js', (err, stdout, stderr) => {
                    if (err) console.error(err);
                    if (stdout) console.log(stdout.trim());
                });
            }
        },
    };
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/assets/style.less', 'resources/js/app.js'],
            refresh: true,
            publicDirectory: 'public_html', // using public-html
        }),
        compileLessPlugin(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
