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
const path = require('path');

mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './resources/js')
    }
  }
});

mix.js('resources/js/config/main-home.js', 'public/js')
  .js('resources/js/config/main-login.js','public/js')
  .js('resources/js/config/main-s.js','public/js')
  // .js('resources/js/app.js','public/js')
   .sass('resources/sass/app.scss', 'public/css');
