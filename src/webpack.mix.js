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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .autoload({
        "jquery": ['$', 'window.jQuery'],
    })
    .version()
    .js('resources/js/favorite.js', 'public/js')
    .js('resources/js/reserve.js', 'public/js')
    .js('resources/js/humberger.js', 'public/js')
    .js('resources/js/modal.js', 'public/js')
    .js('resources/js/restaurant_edit_modal.js', 'public/js');


