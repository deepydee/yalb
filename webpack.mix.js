const mix = require('laravel-mix');
let productionSourceMaps = false;

/**  ckeditor 5 webpack config ****/
const CKEditorStyles = require('@ckeditor/ckeditor5-dev-utils').styles;
const {CKEditorTranslationsPlugin} = require( '@ckeditor/ckeditor5-dev-translations' );

//Includes SVGs and CSS files from "node_modules/ckeditor5-*" and any other custom directories
const CKEditorRegex = {
    svg: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/, //If you have any custom plugins in your project with SVG icons, include their path in this regex as well.
    css: /ckeditor5-[^/\\]+[/\\].+\.css$/,
};

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

mix.js('resources/assets/admin/js/ckeditor.js', 'public/assets/admin/js/ckeditor.js');

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

mix.sass('resources/assets/front/css/app.scss', 'public/assets/front/css/')
   .combine(
        [
            'resources/assets/front/vendor/bootstrap/css/bootstrap.min.css',
            'public/assets/front/css/app.css'
        ],
        'public/assets/front/css/style.css'
   )
   .sourceMaps(productionSourceMaps, "source-map");;

// mix.styles([
//     'resources/assets/front/vendor/bootstrap/css/bootstrap.min.css',
//     'resources/assets/front/css/style.css'
// ], 'public/assets/front/css/style.css').sourceMaps();

mix.scripts([
    'resources/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/front/js/main.js'
], 'public/assets/front/js/main.js').sourceMaps();

mix.copyDirectory('resources/assets/front/img', 'public/assets/front/img');
mix.copyDirectory('resources/assets/front/fonts', 'public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/certificates', 'public/assets/front/certificates');

mix.webpackConfig({
    plugins: [
        // More plugins.
        // ...

        new CKEditorTranslationsPlugin( {
            // See https://ckeditor.com/docs/ckeditor5/latest/features/ui-language.html
            language: 'ru'
        } )
    ],
    module: {
      rules: [
        {
          test: CKEditorRegex.svg,
          use: ['raw-loader']
        },
        {
          test: CKEditorRegex.css,
          use: [
            {
              loader: 'style-loader',
              options: {
                injectType: 'singletonStyleTag',
                attributes: {
                  'data-cke': true
                }
              }
            },
            'css-loader',
            {
              loader: 'postcss-loader',
              options: {
                postcssOptions: CKEditorStyles.getPostCssConfig({
                  themeImporter: {
                    themePath: require.resolve('@ckeditor/ckeditor5-theme-lark')
                  },
                  minify: true
                })
              }
            }
          ]
        }
      ]
    }
  });

//Exclude CKEditor regex from mix's default rules
mix.override(config => {
    const rules = config.module.rules;
    const targetSVG = (/(\.(png|jpe?g|gif|webp|avif)$|^((?!font).)*\.svg$)/).toString();
    const targetFont = (/(\.(woff2?|ttf|eot|otf)$|font.*\.svg$)/).toString();
    const targetCSS = (/\.p?css$/).toString();

    rules.forEach(rule => {
        let test = rule.test.toString();
        if ([targetSVG, targetFont].includes(rule.test.toString())) {
            rule.exclude = CKEditorRegex.svg;
        } else if (test === targetCSS) {
            rule.exclude = CKEditorRegex.css;
        }
    });
});
