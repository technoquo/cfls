import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        cors: {
            origin: process.env.VITE_APP_URL || 'http://cfls.test',
            methods: 'GET,HEAD,PUT,PATCH,POST,DELETE',
            credentials: true,
          },
    },
});
