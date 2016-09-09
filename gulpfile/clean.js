/**
 * getstarted clean task
 */

const gulp = require('gulp');
const del = require('del');

gulp.task('clean', del.bind(null, [global.paths.tmp, global.paths.dist]));