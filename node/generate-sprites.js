#!/usr/bin/env node

const path = require('path');
const fs = require('fs');
const SVGSpriter = require('svg-sprite');

// Configuration paths
const inputDir = path.resolve(__dirname, '../resources/assets/icons');
const outputSpritePath = path.resolve(__dirname, '../public_html/img/sprite.svg');
const outputLessPath = path.resolve(__dirname, '../resources/assets/less/sprites.less');

// Ensure destination directories exist
fs.mkdirSync(path.dirname(outputSpritePath), { recursive: true });
fs.mkdirSync(path.dirname(outputLessPath), { recursive: true });

// Check if input directory exists
if (!fs.existsSync(inputDir)) {
    console.error(`Input directory does not exist: ${inputDir}`);
    fs.mkdirSync(inputDir, { recursive: true });
    console.log(`Created empty folder: ${inputDir}. Add SVG files there and re-run.`);
    process.exit(0);
}

// Find all SVG files recursively in input directory
function getSvgFiles(dir) {
    let results = [];
    const entries = fs.readdirSync(dir, { withFileTypes: true });
    for (const entry of entries) {
        const fullPath = path.join(dir, entry.name);
        if (entry.isDirectory()) {
            results = results.concat(getSvgFiles(fullPath));
        } else if (entry.isFile() && entry.name.toLowerCase().endsWith('.svg')) {
            results.push(fullPath);
        }
    }
    return results;
}

const svgFiles = getSvgFiles(inputDir);

if (svgFiles.length === 0) {
    console.warn(`No SVG files found in ${inputDir}`);
    process.exit(0);
}

// Configure svg-sprite for CSS mode with stylesheet generation
const spriter = new SVGSpriter({
    dest: path.resolve(__dirname, '..'),
    mode: {
        css: {
            dest: '.',
            sprite: path.relative(path.resolve(__dirname, '..'), outputSpritePath),
            render: {
                css: true // Generate CSS rules (coordinates/positions)
            },
            bust: false
        }
    },
    shape: {
        id: {
            generator: (name) => {
                // Generate clean class names from filename (e.g., "arrow-right.svg" -> "arrow-right")
                return path.basename(name, '.svg');
            }
        }
    }
});

// Add all SVG files into the spriter
for (const filePath of svgFiles) {
    spriter.add(
        filePath,
        path.basename(filePath),
        fs.readFileSync(filePath, 'utf-8')
    );
}

// Compile the sprite and write the assets
spriter.compile((error, result) => {
    if (error) {
        console.error('Error compiling SVG sprite:', error);
        process.exit(1);
    }

    for (const mode of Object.values(result)) {
        for (const resource of Object.values(mode)) {
            if (resource.path.endsWith('.svg')) {
                fs.writeFileSync(outputSpritePath, resource.contents);
                console.log(`Generated sprite: ${outputSpritePath}`);
            } else if (resource.path.endsWith('.css')) {
                const optimized = optimizeSpriteLess(resource.contents.toString());
                fs.writeFileSync(outputLessPath, optimized);
                console.log(`Generated Less file: ${outputLessPath}`);
            }
        }
    }
    console.log('SVG sprite generation complete.');
});

// Collapse svg-sprite's generated CSS (per-icon background + -dims blocks) into a
// single shared .svg-sprite base class plus one background-position rule per icon.
function optimizeSpriteLess(css) {
    const blockPattern = /\.([\w-]+)\s*{([^}]*)}/g;
    const positions = [];
    let match;

    while ((match = blockPattern.exec(css)) !== null) {
        const [, className, body] = match;
        if (className.endsWith('-dims')) continue;

        const posMatch = body.match(/url\([^)]*\)\s+([\d.%-]+)\s+([\d.%-]+)\s+no-repeat/);
        if (!posMatch) continue;

        positions.push({ className, x: posMatch[1], y: posMatch[2] });
    }

    const lines = [
        '.svg-sprite {',
        '    width: 24px;',
        '    height: 24px;',
        '    background: url("public_html/img/sprite.svg") no-repeat;',
        '}',
        '',
    ];

    for (const { className, x, y } of positions) {
        lines.push(`.${className} {`);
        lines.push(`    background-position: ${x} ${y};`);
        lines.push('}');
        lines.push('');
    }

    return lines.join('\n').trimEnd() + '\n';
}
