import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";

/* if you're using React */
// import react from '@vitejs/plugin-react';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        strictPort: true  // Oblige à libérer le port 5173
    },
    plugins: [
        symfonyPlugin({
            refresh: true,
            viteDevServerHostname: 'localhost'
        })
    ],
    build: {
        manifest: true,
        rollupOptions: {
            input: {
                app: "./assets/app.js",
                theme: "./assets/theme.scss"    // ou import dans le app.js
            },

        }
    },
});
