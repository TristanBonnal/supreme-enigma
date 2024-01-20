import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";

/* if you're using React */
// import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        symfonyPlugin({
            refresh: true,
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
