'use strict';

var gulp        = require('gulp'),
    less        = require('gulp-less'),
    cleanCSS    = require('gulp-clean-css'),
    uglify      = require('gulp-uglify'),
    gulpif      = require('gulp-if'),
    concat      = require('gulp-concat'),
    argv        = require('yargs').argv,
    helpDoc     = require('gulp-help-doc');

// Paths
var src = {
    assets: './app/assets/src',
    js: './app/assets/src/js',
    less: './app/assets/src/less',
    fonts: './app/assets/src/fonts',
    img: './app/assets/src/img'
};

var dest = {
    assets: './app/assets/dist',
    css: './app/assets/dist/css',
    js: './app/assets/dist/js',
    fonts: './app/assets/dist/fonts',
    img: './app/assets/dist/img'
};

var bower = {
    assets: './vendor/bower',
    bootstrap: './vendor/bower/bootstrap'
};

/**
 * Help task.
 */
gulp.task('default', function() {
    return helpDoc(gulp);
});

/**
 * Build Twitter Bootstrap with overwrites.
 *
 * @task {bootstrap}
 * @arg {prod} if set - cleanCSS & uglify will be applied
 */
gulp.task('bootstrap', function () {
    var lessFiles = [
        bower.bootstrap + '/less/bootstrap.less',
        src.less + '/bootstrap-override.less'
    ];

    gulp.src(lessFiles)
        .pipe(concat('bootstrap.less'))
        .pipe(less({paths: [bower.bootstrap + '/less/']}))
        .pipe(gulpif(argv.prod, cleanCSS()))
        .pipe(gulp.dest(dest.css))
    ;

    gulp.src(bower.bootstrap + '/dist/js/bootstrap.js')
        .pipe(gulpif(argv.prod, uglify()))
        .pipe(gulp.dest(dest.js))
    ;

    gulp.src(bower.bootstrap + '/fonts/*.*')
        .pipe(gulp.dest(dest.fonts))
    ;
});

/**
 * Transform app less to css.
 *
 * @task {less}
 * @arg {prod} if set - cleanCSS will be applied
 */
gulp.task('less', function () {
    return gulp.src(src.less + '/*.less')
        .pipe(less())
        .pipe(gulpif(argv.prod, cleanCSS()))
        .pipe(gulp.dest(dest.css))
    ;
});

/**
 * Copy app JS to dist directory.
 *
 * @task {js}
 * @arg {prod} if set - uglify will be applied
 */
gulp.task('js', function () {
    return gulp.src(src.js + '/*.js')
        .pipe(gulpif(argv.prod, uglify()))
        .pipe(gulp.dest(dest.js))
    ;
});

/**
 * Build project.
 *
 * @task {build}
 * @arg {prod} - see specific task
 */
gulp.task('build', ['less', 'js', 'bootstrap']);

/**
 * Watch app/assets/src & start "build" task on change.
 *
 * @task {watch}
 */
gulp.task('watch', function () {
    gulp.watch(src.assets + '/**/*.*', ['build']);
});
