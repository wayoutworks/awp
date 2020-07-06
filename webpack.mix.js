let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

mix.js('resources/js/customizer.js', 'public/js')
    .js('resources/js/navigation.js', 'public/js')
    .sass('resources/sass/style.scss','')
    .copy('node_modules/bootstrap/dist/js/bootstrap.min.js','public/bootstrap/js');
