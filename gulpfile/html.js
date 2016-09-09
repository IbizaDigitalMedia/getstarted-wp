/**
 * getstarted html task
 */

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const $ = gulpLoadPlugins();
const mainBowerFiles = require('main-bower-files');

gulp.task('html', () => {
  gulp.src(global.paths.app + '/*.php')
    .pipe(gulp.dest(global.paths.dist));

  gulp.src(global.paths.app + '/dev/includes/**/*')
    .pipe(gulp.dest(global.paths.dist + '/includes'));

  gulp.src(global.paths.app + '/dev/images/**/*')
    .pipe(gulp.dest(global.paths.dist + '/images'));

  gulp.src(mainBowerFiles(), { base: global.paths.app + '/dev/vendor' })
    .pipe(gulp.dest(global.paths.dist + '/vendor'));
});
