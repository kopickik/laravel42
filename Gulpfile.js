'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var compass = require('gulp-compass');
var postcss      = require('gulp-postcss');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer-core');

gulp.task('css', function() {
	return gulp.src('app/assets/scss/*.scss')
	.pipe(compass({
		css: 'public/css',
		sass: 'app/assets/scss',
		images: 'app/assets/img',
		require: ['compass']
	}))
	.pipe(sourcemaps.init())
	.pipe(postcss([autoprefixer({ browsers: ['last 10 version'] }) ]))
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest('public/css'))
});

gulp.task('watch', function() {
	gulp.watch('app/assets/scss/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);
