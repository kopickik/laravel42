'use strict';

// Style tasks

var gulp = require('gulp');
var sass = require('gulp-sass');
var compass = require('gulp-compass');
var postcss      = require('gulp-postcss');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer-core');

// JS Tasks
var header = require('gulp-header');
var footer = require('gulp-footer');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var cached = require('gulp-cached');
var remember = require('gulp-remember');
var scriptsGlob = 'app/assets/js/**/*.js';

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

gulp.task('scripts', function() {
	return gulp.src(scriptsGlob)
		.pipe(cached('scripts'))
		.pipe(jshint())
		.pipe(header('(function () {'))
		.pipe(footer('})();'))
		.pipe(remember('scripts'))
		.pipe(concat('main.js'))
		.pipe(gulp.dest('public/js'))
});

gulp.task('watch', function() {
	gulp.watch('app/assets/scss/**/*.scss', ['css']);
	var watcher = gulp.watch(scriptsGlob, ['scripts']);
	watcher.on('change', function(e) {
		if (e.type === 'deleted') {
			delete cached.caches.scripts[e.path];
			remember.forget('scripts', e.path);
		}
	});
});

gulp.task('default', ['watch']);
