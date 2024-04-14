import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/css/auth.css', 'resources/js/app.js', 'resources/js/sendMessage.js','resources/js/copied.js','resources/js/etc.js','resources/css/etc.css'],
            refresh: true,
        }),
    ],
    server: {
        hmr: true, // Enable HMR
        port: 8080, // Specify the port if needed
       host:'localhost'
    },
 
});
