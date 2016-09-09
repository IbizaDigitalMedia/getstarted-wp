/**
 * getstarted wiredep task
 */

const gulp = require('gulp');
const wiredep = require('wiredep').stream;
const clip = require('gulp-clip-empty-files');
const mainBowerFiles = require('main-bower-files');

gulp.task('wiredep', () => {
  gulp.src(global.paths.app + '/dev/styles/app.scss')
    .pipe(clip())
    .pipe(wiredep({
      ignorePath: 'dev/'
    }))
    .pipe(gulp.dest(global.paths.app + '/dev/styles'));

  gulp.src(global.paths.app + '/*.php')
    .pipe(clip())
    .pipe(wiredep({
      ignorePath: 'dev/',
      fileTypes: {
        html: {
          block: /(([ \t]*)<!--\s*bower:*(\S*)\s*-->)(\n|\r|.)*?(<!--\s*endbower\s*-->)/gi,
          detect: {
            js: /<script.*src=['"]([^'"]+)/gi,
            css: /<link.*href=['"]([^'"]+)/gi
          },
          replace: {
            js: '<script src="<?php echo get_stylesheet_directory_uri(); ?>/{{filePath}}"></script>',
            css: '<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/{{filePath}}" />'
          }
        }
      }
    }))
    .pipe(gulp.dest(global.paths.app));

    // Copy vendor files
    gulp.src(mainBowerFiles(), { base: global.paths.app + '/dev/vendor' })
      .pipe(gulp.dest(global.paths.app + '/dev/vendor'));
});
