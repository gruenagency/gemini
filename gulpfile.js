var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sassGlob = require('gulp-sass-glob'),
    cleanCss = require('gulp-clean-css'),
    gulpif = require('gulp-if'),
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer');

// source files
var input_sass_style = './src/stylesheets/style.scss',
    input_sass_editor_style = './src/stylesheets/editor-style.scss',
    input_sass_components = './src/stylesheets/**/*.scss',
    input_js = './src/javascript/**/*.js';
// destination files
var dist_sass = './dist/css',
    dist_js = './dist/js';

// ***** TASKS ***** //

// compilers


gulp.task('sass', function() {
  return gulp
    .src([input_sass_style, input_sass_editor_style])
    .pipe(sassGlob())
    .pipe(sass({
      sourceComments: 'map',
      sourceMap: 'sass',
      outputStyle: 'nested'
    })
    .on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest(dist_sass));
});

gulp.task('production', function() {
  return gulp
    .src([input_sass_style, input_sass_editor_style])
    .pipe(sass({
      style: 'compressed'
      })
      .on('error', sass.logError))
    .pipe(gulp.dest(dist_sass));
});



gulp.task('scripts', function() {
  return gulp
    .src(input_js)
    .pipe(concat('compiled.js'))
    .pipe(gulp.dest(dist_js));
});

// watchers

gulp.task('watch-sass-components', function() {
  return gulp
    .watch(input_sass_components, gulp.series('sass'))
    .on('change', function(e) {
      console.log('File ' + e.path + ' was ' + e.type + ', running tasks...');
    });
});

gulp.task('watch-sass-stylesheet', function() {
  return gulp
    .watch(input_sass_style, gulp.series('sass'))
    .on('change', function(e) {
      console.log('File ' + e.path + ' was ' + e.type + ', running tasks...');
    });
});

gulp.task('watch-js', function() {
  return gulp
    .watch(input_js, gulp.series('scripts'))
    .on('change', function(e) {
      console.log('File ' + e.path + ' was ' + e.type + ', running tasks...');
    });
});

gulp.task('watch-files', function() {
  gulp.watch(input_sass_components, gulp.series('sass'))
  gulp.watch(input_sass_style, gulp.series('sass'))
  gulp.watch(input_js, gulp.series('scripts'))
  gulp.on('change', function(e) {
    console.log('File ' + e.path + ' was ' + e.type + ', running tasks...')
  })
})

// default

gulp.task('default',gulp.series('sass','scripts','watch-files'));


// build for deployment
gulp.task('build', gulp.series('sass', 'scripts'));
