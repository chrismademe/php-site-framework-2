var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    plumber = require('gulp-plumber'),
    del = require('del'),
    autoprefixer = require('gulp-autoprefixer');

// Config
var config = {

    // Site theme name as declared in config.php
    theme: 'default'

}

    // Style Tasks
    gulp.task('styles', function() {
        return sass('src/css/style.scss', { style: 'expanded' })
        .pipe(plumber())
        .pipe(gulp.dest('htdocs/theme/'+ config.theme +'/assets/css'))
        .pipe(autoprefixer({cascade: false}))
        .pipe(minifycss())
        .pipe(gulp.dest('htdocs/theme/'+ config.theme +'/assets/css'))
        .pipe(notify({ message: 'Styles task complete' }));
    });

    // Javascript Tasks
    gulp.task('scripts', function() {
        return gulp.src(['src/js/*.js', 'src/js/vendor/*.js'], { base: '/src' })
        .pipe(plumber())
        .pipe(concat('main.js'))
        .pipe(gulp.dest('htdocs/theme/'+ config.theme +'/assets/js'))
        .pipe(uglify())
        .pipe(gulp.dest('htdocs/theme/'+ config.theme +'/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));
    });

    // Image Tasks
    gulp.task('images', function() {
        return gulp.src('src/images/*')
        .pipe(plumber())
        .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
        .pipe(gulp.dest('htdocs/theme/'+ config.theme +'/assets/images'))
        .pipe(notify({ message: 'Images task complete' }));
    });

    // Housekeeping
    gulp.task('clean', function(cb) {
        del(['htdocs/theme/'+ config.theme +'/assets/css'], cb)
    });

    // Default task
    gulp.task('default', ['clean'], function() {
        gulp.start('styles', 'scripts', 'images');
    });

    // Watch
    gulp.task('watch', function() {

        // Watch .scss files
        gulp.watch(['src/css/*.scss', 'src/css/**/*.scss'], ['styles']);

        // Watch .js files
        gulp.watch('src/js/*.js', ['scripts']);

        // Watch .js files
        gulp.watch('src/images/*', ['images']);

        // Create LiveReload server
        livereload.listen();

        // Watch any files in dist/, reload on change
        gulp.watch(['theme/'+ config.theme +'/assets/css/**']).on('change', livereload.changed);

    });
