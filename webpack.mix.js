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

mix.styles([
    'resources/assets/admin/vendor/bootstrap/css/bootstrap.min.css',
    'resources/assets/admin/vendor/bootstrap-icons/bootstrap-icons.css',
    'resources/assets/admin/vendor/boxicons/css/boxicons.min.css',
    'resources/assets/admin/vendor/quill/quill.snow.css',
    'resources/assets/admin/vendor/quill/quill.bubble.css',
    'resources/assets/admin/vendor/remixicon/remixicon.css',
    'resources/assets/admin/vendor/simple-datatables/style.css',
    'resources/assets/admin/css/style.css'
], 'public/assets/admin/css/admin.css').sourceMaps();

mix.scripts([
    'resources/assets/admin/vendor/apexcharts/apexcharts.min.js',
    'resources/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/vendor/chart.js/chart.umd.js',
    'resources/assets/admin/vendor/echarts/echarts.min.js',
    'resources/assets/admin/vendor/quill/quill.min.js',
    'resources/assets/admin/vendor/simple-datatables/simple-datatables.js',
    'resources/assets/admin/vendor/tinymce/tinymce.min.js',
    'resources/assets/admin/vendor/php-email-form/validate.js',
    'resources/assets/admin/js/main.js'
], 'public/assets/admin/js/admin.js').sourceMaps();

mix.copyDirectory('resources/assets/admin/vendor/bootstrap-icons/fonts', 'public/assets/admin/css/fonts');
mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');


mix.styles([
    'resources/assets/front/vendor/bootstrap/css/bootstrap.min.css',
    'resources/assets/front/css/style.css'
], 'public/assets/front/css/style.css').sourceMaps();

mix.scripts([
    'resources/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/front/js/main.js'
], 'public/assets/front/js/main.js').sourceMaps();

mix.copyDirectory('resources/assets/front/img', 'public/assets/front/img');
mix.copyDirectory('resources/assets/front/fonts', 'public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/certificates', 'public/assets/front/certificates');
