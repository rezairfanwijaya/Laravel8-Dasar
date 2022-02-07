const mix = require('laravel-mix');

// mixing script js
mix.scripts([
    'resources/js/my-script.js',
    'resources/js/my-script-console.js',
], 'public/js/hasil-mix.js').version();

// mixing style
mix.styles([
    'resources/css/my-style-h1.css',
    'resources/css/my-style.css',
], 'public/css/hasil-mix.css').version()

// mixing sass
mix.sass('resources/sass/my-sass.scss', 'public/sass/sass.css').version()

// penambahan .version() diatas untuk berujuan membuat version dari file hasil-mix.js, hasil-mix.scc dan sass.css untuk menyimpan cache pada browser supaya tidak mengunduh lagi dari server
// agar version ini bisa berjalan maka pada view saat pemanggilan asset css/js jangan menggunakan asser() tapi ganti menggunakan mix()