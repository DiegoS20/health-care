import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from "fs";

const getFiles = dir =>
    fs.readdirSync(dir)
        .filter(file => fs.statSync(`${dir}/${file}`).isFile())
        .map(f => `resources/scss/${f}`);

export default defineConfig({
    plugins: [
        laravel({
            input: getFiles('resources/scss'),
            refresh: true,
        }),
    ],
});
