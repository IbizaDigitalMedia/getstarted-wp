/**
 * getstarted lint task
 */

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const browserSync = require('browser-sync');
const notify = require('gulp-notify');
const $ = gulpLoadPlugins();
const reload = browserSync.reload;

function lint(files, options) {
  return gulp.src(files)
    .pipe(reload({stream: true, once: true}))
    .pipe($.eslint(options))
    .pipe($.eslint.format())
    .pipe($.if(!browserSync.active, $.eslint.failAfterError()))
    .on('error', notify.onError('Javascript error! See console.'));
}

gulp.task('lint', () => {
  return lint(global.paths.app + '/dev/scripts/**/*.js', {
    fix: true
  })
    .pipe(gulp.dest(global.paths.app + '/dev/scripts'));
});
