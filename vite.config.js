import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import collectModuleAssetsPaths from "./vite-module-loader.js";

let moduleAssets = [];

export default defineConfig(async () => {
    moduleAssets = await collectModuleAssetsPaths([], "Modules");

    return {
        plugins: [
            laravel({
                input: [
                    "resources/css/app.css",
                    "resources/js/app.js",
                    ...moduleAssets,
                ],
                refresh: true,
            }),
        ],
        build: {
            rollupOptions: {
                output: {
                    manualChunks(id) {
                        if (id.includes("node_modules")) {
                            if (
                                id.includes("datatables.net") ||
                                id.includes("pdfmake") ||
                                id.includes("jszip")
                            ) {
                                return "vendor-datatables";
                            }
                            return "vendor";
                        }
                    },
                },
            },
        },
    };
});
