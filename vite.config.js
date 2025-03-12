import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/style.css",
                "resources/js/app.js",
                "resources/js/app.js",
                "resources/css/all.min.css",
                "resources/js/all.min.js",
                "resources/js/bootstrap.js",
                "resources/js/vendor.js",
                "resources/js/manifest.js",
            ],
            refresh: true,
        }),
    ],
});
