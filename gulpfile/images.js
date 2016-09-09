/**
 * getstarted images task
 */

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const $ = gulpLoadPlugins();

gulp.task('images', () => {
  return gulp.src(global.paths.app + '/dev/images/**/*')
    .pipe(gulp.dest(global.paths.dist + '/images'));
});
