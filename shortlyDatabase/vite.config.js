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
        proxy: {
          '/api': {
            target: 'http://127.0.0.1:8000',
            changeOrigin: true,
            secure:false,
        
            rewrite: (path) => path.replace(/^\/api/, ''),
          },
        }}
});






//ce fichier tu ne l'avais pas 
