const mix = require('laravel-mix');
const http = require("http");


mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
mix.browserSync("http://127.0.0.1:8000")
