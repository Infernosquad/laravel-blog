var gulp = require("gulp");
var elixir = require('laravel-elixir');
var symlink = require('gulp-symlink');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var web_dir = 'public';
var bower_dir = 'vendor/bower_components';
var asset_dir = 'resources/assets';

gulp.task('symlink', function() {
    return gulp.src(bower_dir + '/bootstrap/fonts')
        .pipe(symlink(web_dir+'/build/fonts'));
});

elixir(function(mix) {
    mix.less('app.less');

    mix.scripts(
        [
            bower_dir + '/jquery/dist/jquery.js',
            asset_dir + '/js/app.js'
        ],
        'public/js/app.js',
        './'
    );

    mix.version(
        [
            web_dir + '/css/app.css',
            web_dir + '/js/app.js'
        ]
    );

    mix.task('symlink');
});
