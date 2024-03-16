import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/welcome.css',
                'resources/css/pilote.css',
                'resources/css/entreprise.css',
                'resources/css/etudiant.css',
                'resources/css/offers.css',
                'resources/css/dashboardoffers.css',
                'resources/css/profile.css',
                'resources/js/components/RegisterForm.js',
                'resources/css/editoffer.css',
                'resources/css/layouts.css',
                'resources/css/candidates.css',
                
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    
});
