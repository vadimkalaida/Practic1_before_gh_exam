var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

gulp.task('sass', function () {
	return gulp.src('assets/sass/**/*.scss')
		.pipe(sass())
		.pipe(gulp.dest('layouts'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('img', function () {
	return gulp.src('assets/img/**/*')
		.pipe(gulp.dest('img'))
		.pipe(browserSync.reload({stream: true}))

});

gulp.task("js", function () {
	return gulp.src("assets/js/*.js")
		.pipe(gulp.dest("js"))
		.pipe(browserSync.reload({stream: true}))
});

gulp.task("watch", [ 'sass', 'img', 'js'], function () {
	browserSync.init({
		server: "",
		notify: false,
		ui: {
			port: 3000
		}
    });
    gulp.watch('assets/sass/**/*.scss', ["sass"]);
    gulp.watch('assets/js/*.js', ['js']);
	gulp.watch('assets/img/**/*', ["img"]);
});
