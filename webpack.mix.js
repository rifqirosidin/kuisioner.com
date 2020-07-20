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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// mix.copyDirectory('public/vendor/assets/js/plugins/datatables/jquery.dataTables.min.js', 'resources/js')
//     .copyDirectory('public/vendor/assets/js/plugins/select2/js/select2.full.min.js', 'resources/js')
//     .copyDirectory('public/vendor/assets/js/plugins/datatables/dataTables.bootstrap4.min.js', 'resources/js')
//     .copyDirectory('public/vendor/assets/js/pages/be_tables_datatables.min.js', 'resources/js')
//     .copyDirectory('public/vendor/assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js', 'resources/js');
mix.js('resources/js/jquery_dataTables.js', 'public/js/app-custom.js')
    .js('resources/js/select2.full.js', 'public/js/app-custom.js')
    .js('resources/js/dataTables_bootstrap4.js', 'public/js/app-custom.js')
    .js('resources/js/be_tables_datatables.js', 'public/js/app-custom.js')
    .js('resources/js/jquery_magnific-popup.js', 'public/js/app-custom.js');
