const mix = require('laravel-mix');

require('laravel-mix-auto-extract');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/vendor.scss', 'public/css')
    .sass('resources/sass/font.scss', 'public/css');

mix.autoExtract();
mix.version();

if (! mix.inProduction()) {
    mix.disableNotifications();
}
