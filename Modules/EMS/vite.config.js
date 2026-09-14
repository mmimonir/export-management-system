import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

const __dirname = new URL(".", import.meta.url).pathname;
export const paths = [
    "Modules/EMS/resources/assets/sass/app.scss",
    "Modules/EMS/resources/assets/js/app.js",
];

export default defineConfig({
    build: {
        outDir: "../../public/build-ems",
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: "../../public",
            buildDirectory: "build-ems",
            input: [
                __dirname + "/resources/assets/js/app.js",
                __dirname + "/resources/assets/sass/app.scss",
            ],
            refresh: true,
        }),
    ],
});
