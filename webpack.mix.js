const {mix} = require('laravel-mix');

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

mix.js('resources/assets/js/dashboard/app.js', 'public/js')
	.js('resources/assets/js/screen/screen.js', 'public/js')
	.sass('resources/assets/sass/dashboard/app.scss', 'public/css')
	.sass('resources/assets/sass/screen/screen.scss', 'public/css');
