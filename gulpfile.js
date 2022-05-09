const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const phpServer = require('gulp-connect-php');
const autoprefixer = require('autoprefixer');
const css = require('cssnano');
const browserSync = require('browser-sync').create();

let paths = {
    styles: {
        src: "./scss/**/style.scss",
        dest: "./dist/css"
    },
    scripts:{
        src: "./js/**/app.js",
        dest: "./dist/js"
    }
}

function styles(){
    gulp.src(paths.styles.src)
    .pipe(sass())
    .on('error',sass.logError)
    .pipe(sourcemaps.init())
    .pipe(postcss([autoprefixer()]))
    .pipe(postcss([css()]))
    .pipe(rename({
        suffix: ".min"
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream())
}

function js(){
    gulp.src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat('app.min.js'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(browserSync.stream())
}

function watch(){
    phpServer.server({
        port: 8080,
        keepalive: true,
        base: './'
    },function(){
        browserSync.init({
            proxy: '127.0.0.1:8080'
        })
    })

    gulp.watch('./**/*.php',gulp.series(browserSync.reload));
    gulp.watch('./scss/**/*.scss').on('change',gulp.series(styles,browserSync.reload));
    gulp.watch('./js/**/*.js').on('change',gulp.series(js,browserSync.reload));
}

exports.styles = styles;
exports.js = js;
exports.watch = watch;

let build = gulp.parallel(watch,styles,js);

exports.default = build;