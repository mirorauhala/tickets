const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/scanner.js', 'public/js')
    .sass('resources/assets/sass/scanner.scss', 'public/css')
    .sass('resources/assets/sass/new.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css');

if (mix.config.inProduction) {
    mix.version();
}

mix.browserSync({
    https: true,
    host: '192.168.0.109',
    proxy: 'https://tikematic.app'
});
