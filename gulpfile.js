var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    plumber = require('gulp-plumber'),
    del = require('del'),
    autoprefixer = require('gulp-autoprefixer');

    // Config
    var config = {
        theme: 'default',
        public: 'htdocs'
    }

    // Style Tasks
    gulp.task('styles', function() {
        return sass('src/css/style.scss', { style: 'expanded' })
        .pipe(plumber())
        .pipe(gulp.dest(''+ config.public +'/theme/'+ config.theme +'/assets/css'))
        .pipe(autoprefixer({cascade: false}))
        .pipe(minifycss())
        .pipe(gulp.dest(''+ config.public +'/theme/'+ config.theme +'/assets/css'))
        .pipe(notify({ message: 'Styles task complete' }));
    });

    // Javascript Tasks
    gulp.task('scripts', function() {
        return gulp.src(['src/js/*.js', 'src/js/vendor/*.js'], { base: '/src' })
        .pipe(plumber())
        .pipe(concat('main.js'))
        .pipe(gulp.dest(''+ config.public +'/theme/'+ config.theme +'/assets/js'))
        .pipe(uglify())
        .pipe(gulp.dest(''+ config.public +'/theme/'+ config.theme +'/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));
    });

    // Housekeeping
    gulp.task('clean', function(cb) {
        del([''+ config.public +'/theme/'+ config.theme +'/assets/css'], cb)
    });

    // Default task
    gulp.task('default', ['clean'], function() {
        gulp.start('styles', 'scripts');
    });

    // Watch
    gulp.task('watch', function() {

        // Watch .scss files
        gulp.watch(['src/css/*.scss', 'src/css/**/*.scss'], ['styles']);

        // Watch .js files
        gulp.watch('src/js/*.js', ['scripts']);

        // Create LiveReload server
        livereload.listen();

        // Watch any files in dist/, reload on change
        gulp.watch(['theme/'+ config.theme +'/assets/css/**']).on('change', livereload.changed);

    });
