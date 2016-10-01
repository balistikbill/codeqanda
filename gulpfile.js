const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    // mix.sass('app.scss');
       // .webpack('app.js');
    mix.styles(['../../../node_modules/pickout/dev/pickout.css'], 'public/css/pickout.css');
    mix.styles(['../../../node_modules/pickout/dev/themes/pk-cricket.css'], 'public/css/pk-cricket.css');
    mix.scripts(['../../../node_modules/pickout/dev/pickout.js'], 'public/js/pickout.js');
    mix.scripts(['../../../resources/assets/js/bootstrap.js'], 'public/js/bootstrap.js');
});
