const mix = require('laravel-mix');

require('laravel-mix-svg-vue');
require('laravel-mix-imagemin');

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

mix.setPublicPath('public/')
	.browserSync('http://cms-comerciales.test/')
	.js('resources/js/app.js', 'public/js')
    .vue()
    .svgVue()
    .copy('resources/img/', 'public/img')
    .sass('resources/sass/app.scss', 'public/css');