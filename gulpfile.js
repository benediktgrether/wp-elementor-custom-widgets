const gulp = require('gulp');
const postcss = require('gulp-postcss');
// const sass = require('gulp-sass');
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano');
const autoprefixer = require('gulp-autoprefixer');

const cssExportPath = './assets/css/';

function style() {
    let plugins = [cssnano()];

    return gulp
        .src('./src/scss/*scss')
        .pipe(autoprefixer('last 2 versions'))
        .pipe(sass())
        .pipe(postcss(plugins))
        .pipe(gulp.dest(cssExportPath));
}

function watch() {
    gulp.watch('./src/scss/*scss', style);
}

exports.watch = watch;
exports.style = style;
