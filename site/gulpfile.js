var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.less('bootstrap_backend.less', 'public/css/bootstrap_backend.css');
    mix.less('cms.less', 'public/css/cms.css');
    mix.less('bootstrap/bootstrap.less', 'public/css/bootstrap.css');

    mix.version(['public/css/bootstrap.css']);
});