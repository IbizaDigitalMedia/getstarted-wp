/**
 * getstarted build task
 */

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const $ = gulpLoadPlugins();

gulp.task('build', ['lint', 'html', 'images', 'extras'], () => {
  return gulp.src(global.paths.dist + '/**/*').pipe($.size({title: 'build', gzip: true}));
});