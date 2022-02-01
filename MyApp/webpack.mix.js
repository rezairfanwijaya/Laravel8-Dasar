const mix = require('laravel-mix');

// mixing script js
mix.scripts([
    'resources/js/my-script.js',
    'resources/js/my-script-console.js',
], 'public/js/hasil-mix.js')

mix.styles([
    'resources/css/my-style-h1.css',
    'resources/css/my-style.css',
], 'public/css/hasil-mix.css')
