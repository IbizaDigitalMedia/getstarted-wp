/**
 * getstarted scripts task
 */

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const browserSync = require('browser-sync');
const browserify = require('browserify');
const babelify = require('babelify');
const buffer = require('vinyl-buffer');
const source = require('vinyl-source-stream');
const $ = gulpLoadPlugins();
const reload = browserSync.reload;

gulp.task('scripts', () => {
  const b = browserify({
    entries: global.paths.app + '/dev/scripts/app.js',
    transform: babelify,
    debug: true
  });

  return b.bundle()
    .pipe(source('app.js'))
    .pipe($.plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
      }}))
    .pipe(buffer())
    .pipe($.sourcemaps.init({loadMaps: true}))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(global.paths.tmp + '/scripts'))
    .pipe(gulp.dest(global.paths.dist + '/scripts'))
    .pipe(reload({stream: true}));
});
