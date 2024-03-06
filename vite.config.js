import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/admin/admin.scss',
                'resources/scss/front/front.scss',
                'resources/js/admin/admin.js',
                'resources/js/front/front.js'
            ],  // assets files,
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
    build: {
        chunkSizeWarningLimit: 100000000
    },
});
