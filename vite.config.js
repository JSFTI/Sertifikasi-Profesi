import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Unocss from 'unocss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/main.scss',
                'resources/js/main.js'
            ],
        }),

        Unocss()
    ],
});
