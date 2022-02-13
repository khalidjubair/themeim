'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
sass.compiler = require('node-sass');

gulp.task('sass', function () {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: false,
            grid: true
        }))
        .pipe(gulp.dest('assets/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('assets/scss/**/*.scss', gulp.series('sass'));
});
