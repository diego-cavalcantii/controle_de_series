const mix = require('laravel-mix');

mix.sass('resources/css/app.scss', 'public/css')

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync({
       proxy: 'http://localhost:8000', // Altere isso para a URL do seu projeto Laravel
       files: [
           'app/**/*.php',
           'resources/views/**/*.blade.php',
           'public/js/**/*.js',
           'public/css/**/*.css'
       ]
   });

