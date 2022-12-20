import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Unocss from 'unocss/vite';

export default defineConfig({
    build:{
        sourcemap: true
    },
    plugins: [
        laravel({
            input: [
                'resources/css/main.scss',
                'resources/js/main.js'
            ],
        }),

        Unocss()
    ],
});
