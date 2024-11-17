import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";




export default defineConfig({
    plugins: [
        laravel({
            input: [
                "themes\boostrap01\sass/app.scss",
                "themes\boostrap01\js/app.js"
            ],
            buildDirectory: "boostrap01",
        }),
        
        
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '@': '/themes\boostrap01\js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },
    
});
