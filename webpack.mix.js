const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.react('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('node_modules/popper.js/dist/popper.js', 'public/js')
    .js('resources/js/openCart.js', 'public/js') // import only in homepage <script src="{{ asset('js/app.js') }}" defer></script>
    .sourceMaps();
