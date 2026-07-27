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
    .sass('resources/sass/app.scss', 'public/css');
//js
mix.scripts([
    'public/assets/public/js/jquery-1.11.2.min.js',
    'public/assets/public/js/jquery.form.js',
    'public/assets/public/js/bootstrap.min.js',
    'public/assets/public/js/jquery.magnific-popup.min.js',
    'public/assets/public/js/isotope.pkgd.min.js',
    'public/assets/public/js/imagesloaded.pkgd.min.js',
    'public/assets/public/js/masonry.pkgd.min.js',
    'public/assets/public/js/jquery.countTo.js',
    // 'public/assets/public/js/jquery.appear.js',
    'public/assets/public/js/owl.carousel.min.js',
    'public/assets/public/js/main.js',
    'public/assets/public/js/jquery.flexslider-min.js',
    'public/assets/public/js/flex-slider.js',
    'public/assets/public/js/chart.js',
    'public/assets/public/rs-plugin/js/jquery.themepunch.tools.min.js',
    // 'public/assets/public/rs-plugin/js/jquery.themepunch.revolution-parallax.min.js',
],
'public/assets/public/js/result_combine.js').version();
//css
mix.styles([
    'public/assets/public/css/flexslider.css',
    'public/assets/public/css/bootstrap.min.css',
    'public/assets/public/css/swipper/swipper.min.css',
    // 'public/assets/public/css/style.css',
    'public/assets/public/css/animate.min.css',
],
'public/assets/public/css/result_combine.css').version();
