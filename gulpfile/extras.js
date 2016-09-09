/**
 * getstarted extras task
 */

const gulp = require('gulp');

gulp.task('extras', () => {
  return gulp.src([
    global.paths.app + '/*.*',
    '!' + global.paths.app + '/*.{php, html}'
  ], {
    dot: true
  }).pipe(gulp.dest(global.paths.dist));
});
