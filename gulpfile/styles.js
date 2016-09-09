/**
 * getstarted styles task
 */

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const browserSync = require('browser-sync');
const scsslint = require('gulp-scss-lint');
const $ = gulpLoadPlugins();
const reload = browserSync.reload;

gulp.task('styles', () => {
  return gulp.src(global.paths.app + '/dev/styles/**/*.scss')
    .pipe($.plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
      }}))
    .pipe(scsslint())
    .pipe(scsslint.failReporter())
    .pipe($.sourcemaps.init())
    .pipe($.sass.sync({
      outputStyle: 'expanded',
      precision: 10,
      includePaths: ['.']
    }))
    .pipe($.autoprefixer({browsers: ['> 1%', 'last 2 versions', 'Firefox ESR']}))
    .pipe($.sourcemaps.write())
    .pipe($.rename('style.css'))
    .pipe(gulp.dest(global.paths.tmp + '/styles'))
    .pipe(gulp.dest(global.paths.dist))
    .pipe(reload({stream: true}));;
});
