// Подключаем Gulp и все необходимые библиотеки
var gulp           = require('gulp'),
		gutil          = require('gulp-util' ),
		sass           = require('gulp-sass'),
		browserSync    = require('browser-sync'),
		concat         = require('gulp-concat'),
		uglify         = require('gulp-uglify'),
		cleanCSS       = require('gulp-clean-css'),
		rename         = require('gulp-rename'),
		del            = require('del'),
		imagemin       = require('gulp-imagemin'),
		cache          = require('gulp-cache'),
		autoprefixer   = require('gulp-autoprefixer'),
		bourbon        = require('node-bourbon'),
		ftp            = require('vinyl-ftp'),
		notify         = require("gulp-notify");

// Обновление страниц сайта на локальном сервере
gulp.task('browser-sync', function() {
	browserSync({
		proxy: "your_website.ru",
		notify: false
	});
});

// Компиляция main.css
gulp.task('sass', function() {
	return gulp.src('wp-content/themes/your_theme/css/main.sass')
		.pipe(sass({
			includePaths: bourbon.includePaths
		}).on('error', sass.logError))
		.pipe(autoprefixer(['last 15 versions']))
		.pipe(concat('main.css'))
  	.pipe(gulp.dest('wp-content/themes/your_theme/css/'))
		.pipe(rename({suffix: '.min', prefix : ''}))
		.pipe(cleanCSS())
		.pipe(gulp.dest('wp-content/themes/your_theme/css/'))
		.pipe(browserSync.reload({stream: true}))
});

// Скрипты проекта
//gulp.task('scripts', function() {
//	return gulp.src([
//		'wp-content/themes/your_theme/libs/modernizr/modernizr.js',
//		'wp-content/themes/your_theme/libs/typed/typed.min.js',
//		'wp-content/themes/your_theme/libs/likely/likely.js',
//		'wp-content/themes/your_theme/libs/plugins-scroll/plugins-scroll.js',
//		'wp-content/themes/your_theme/libs/respond/respond.min.js',
//		'wp-content/themes/your_theme/libs/zoom/zoom.min.js',
//		'wp-content/themes/your_theme/libs/zoom/transition.js',
//		'wp-content/themes/your_theme/js/common.js'
//		])
//	.pipe(concat('scripts.js'))
//  .pipe(gulp.dest('wp-content/themes/your_theme/js'))
//	.pipe(concat('scripts.min.js'))
//	.pipe(uglify())
//	.pipe(gulp.dest('wp-content/themes/your_theme/js'))
//	.pipe(browserSync.reload({stream: true}));
//});

// Сжатие картинок
gulp.task('imagemin', function() {
	return gulp.src('wp-content/themes/your_theme/img/**/*')
	.pipe(cache(imagemin()))
	.pipe(gulp.dest('wp-content/themes/your_theme/img')); 
});

// Наблюдение за файлами
gulp.task('watch', ['sass', 'browser-sync'], function() {
	gulp.watch('wp-content/themes/your_theme/css/main.sass', ['sass']);
	gulp.watch('wp-content/themes/your_theme/**/*.php', browserSync.reload);
	gulp.watch('wp-content/themes/your_theme/js/**/*.js', browserSync.reload);
	gulp.watch('wp-content/themes/your_theme/libs/**/*', browserSync.reload);
});

// Сборка тасков
gulp.task('build', ['sass', 'imagemin']);

// Выгрузка изменений на хостинг
gulp.task('deploy', function() {
	var conn = ftp.create({
		host:      'host',
		user:      'user',
		password:  'password',
		parallel:  10,
		log: gutil.log
	});
	var globs = [
	'wp-content/themes/your_theme/**'
	];
	return gulp.src(globs, {buffer: false})
	.pipe(conn.dest('your_website.ru/public_html/wp-content/themes/your_theme'));
});
gulp.task('clearcache', function () { return cache.clearAll(); });
gulp.task('default', ['watch']);
