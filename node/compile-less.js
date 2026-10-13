#!/usr/bin/env node

const fs = require('fs');
const path = require('path');
const less = require('less');
const csso = require('csso');

const inputFile = path.resolve(__dirname, '../resources/assets/style.less');
const watchDir = path.resolve(__dirname, '../resources/assets');
const outputCssFile = path.resolve(__dirname, '../public_html/css/style.css');
const outputMinCssFile = path.resolve(__dirname, '../public_html/css/style.min.css');

async function compile() {
    const timestamp = new Date().toLocaleTimeString();
    console.log(`[${timestamp}] Compiling LESS...`);

    try {
        const lessCode = fs.readFileSync(inputFile, 'utf8');

        // Compile uncompressed CSS
        const uncompressed = await less.render(lessCode, {
            filename: inputFile,
            sourceMap: false,
        });

        // Ensure target directory exists
        fs.mkdirSync(path.dirname(outputCssFile), { recursive: true });
        fs.writeFileSync(outputCssFile, uncompressed.css, 'utf8');

        // Advanced CSS Minification and structural optimization with CSSO
        const minified = csso.minify(uncompressed.css, {
            restructure: true,
            comments: false,
        });

        fs.writeFileSync(outputMinCssFile, minified.css, 'utf8');

        console.log(`[${timestamp}] ✓ Compiled: ${path.relative(process.cwd(), outputCssFile)}`);
        console.log(`[${timestamp}] ✓ Compiled & Minified: ${path.relative(process.cwd(), outputMinCssFile)}`);
    } catch (err) {
        console.error(`[${timestamp}] ✗ Compilation error:`, err.message || err);
    }
}

// Initial compile
compile().then(() => {
    if (process.argv.includes('--watch') || process.argv.includes('-w')) {
        console.log(`Watching for .less file changes in ${path.relative(process.cwd(), watchDir)}...`);

        let debounceTimer = null;
        fs.watch(watchDir, { recursive: true }, (eventType, filename) => {
            if (filename && filename.endsWith('.less')) {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    console.log(`\nChange detected in ${filename}`);
                    compile();
                }, 100);
            }
        });
    }
});
