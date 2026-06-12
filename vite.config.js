import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/filament/admin/theme.css'],
            refresh: [
                'app/Http/Controllers/**',
                'app/Livewire/**',          // Useful for Livewire projects
                'resources/views/**',       // Required if using array syntax
                'routes/**',
            ],
        }),
    ],
});
