/**
 * getstarted scripts task
 */

const gulp = require('gulp');
const browserSync = require('browser-sync');
const reload = browserSync.reload;

gulp.task('serve', ['styles', 'scripts', 'images', 'extras', 'html'], () => {
  var cwd = process.cwd();
  var wpURL = 'localhost:8888/' + cwd.substring(cwd.lastIndexOf('/') + 1) + '/wordpress';

  browserSync({
    notify: false,
    port: 3000,
    proxy: wpURL
  });

  gulp.watch([
    global.paths.app + '/dev/images/**/*'
  ]).on('change', reload);

  gulp.watch(global.paths.app + '/**/*.php', ['html', reload]);
  gulp.watch(global.paths.app + '/dev/styles/**/*.scss', ['styles']);
  gulp.watch(global.paths.app + '/dev/scripts/**/*.js', ['scripts']);
  gulp.watch('bower.json', ['wiredep']);
});
