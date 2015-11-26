var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    del = require('del'),
    autoprefixer = require('gulp-autoprefixer');

    // Config
    var config = {
        theme: 'default',
        public: 'public_html'
    }

    // Style Tasks
    gulp.task('styles', function() {
        return sass('app/theme/'+ config.theme +'/assets/css/style.scss', { style: 'expanded' })
        .pipe(plumber())
        .pipe(gulp.dest(''+ config.public +'/assets/css'))
        .pipe(autoprefixer({cascade: false}))
        .pipe(minifycss())
        .pipe(gulp.dest(''+ config.public +'/assets/css'))
        .pipe(notify({ message: 'Styles task complete' }));
    });

    // Javascript Tasks
    gulp.task('scripts', function() {
        return gulp.src(['app/theme/'+ config.theme +'/assets/js/*.js', 'app/theme/'+ config.theme +'/assets/js/vendor/*.js'], { base: '/app/theme/'+ config.theme +'/assets' })
        .pipe(plumber())
        .pipe(concat('main.js'))
        .pipe(gulp.dest(''+ config.public +'/assets/js'))
        .pipe(uglify())
        .pipe(gulp.dest(''+ config.public +'/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));
    });

    // Housekeeping
    gulp.task('clean', function(cb) {
        del([''+ config.public +'/assets/css'], cb)
    });

    // Default task
    gulp.task('default', ['clean'], function() {
        gulp.start('styles', 'scripts');
    });

    // Watch
    gulp.task('watch', function() {

        // Watch .scss files
        gulp.watch(['app/theme/'+ config.theme +'/assets/css/*.scss', 'app/theme/'+ config.theme +'/assets/css/**/*.scss'], ['styles']);

        // Watch .js files
        gulp.watch('app/theme/'+ config.theme +'/assets/js/*.js', ['scripts']);

    });
