let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the less
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .less('resources/assets/less/app.less', 'public/css')
//    .less('resources/assets/less/spinners.less', 'public/css');
mix.styles([
    'resources/assets/css/lib/bootstrap/bootstrap.min.css',
    'resources/assets/css/lib/calendar2/semantic.ui.min.css',
    'resources/assets/css/lib/calendar2/pignose.calendar.min.css',
    'resources/assets/css/lib/owl.carousel.min.css',
    'resources/assets/css/lib/owl.theme.default.min.css',
    'resources/assets/css/lib/toastr/toastr.min.css',
    'resources/assets/css/helper.css',
    'resources/assets/css/style.css',
],  'public/css/all.css');


mix.scripts([
    'resources/assets/js/lib/jquery/jquery.min.js',
    'resources/assets/js/lib/bootstrap/js/popper.min.js',
    'resources/assets/js/lib/bootstrap/js/bootstrap.min.js',
    'resources/assets/js/jquery.slimscroll.js',
    'resources/assets/js/sidebarmenu.js',
    'resources/assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js',
    'resources/assets/js/lib/morris-chart/raphael-min.js',
    'resources/assets/js/lib/morris-chart/morris.js',
    'resources/assets/js/lib/morris-chart/dashboard1-init.js',
    'resources/assets/js/lib/calendar-2/moment.latest.min.js',
    'resources/assets/js/lib/calendar-2/semantic.ui.min.js',
    'resources/assets/js/lib/calendar-2/prism.min.js',
    'resources/assets/js/lib/calendar-2/pignose.calendar.min.js',
    'resources/assets/js/lib/calendar-2/pignose.init.js',
    'resources/assets/js/lib/owl-carousel/owl.carousel.min.js',
    'resources/assets/js/lib/owl-carousel/owl.carousel-init.js',
    'resources/assets/js/lib/toastr/toastr.min.js',
    'resources/assets/js/lib/toastr/toastr.init.js',
    'resources/assets/js/scripts.js',
    'resources/assets/js/custom.min.js',
], 'public/js/all.js');




mix.browserSync('http://localhost:8000');

