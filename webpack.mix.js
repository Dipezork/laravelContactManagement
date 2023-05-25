const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js')
     .copyDirectory('resources/js/', 'public/js')
     .js('resources/js/datatables/datatables-simple-demo.js', 'public/js')
     .postCss('resources/css/app.css', 'public/css', [
         //
     ])
     .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css')
     .copyDirectory('resources/css/', 'public/css')
     .copyDirectory('resources/scss/', 'public/scss')
     .copyDirectory('resources/assets', 'public/assets');
