var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.less('bootstrap_backend.less', 'public/css/bootstrap_backend.css');
    mix.less('bootstrap/bootstrap.less', 'public/css/bootstrap.css');
});
