const 	gulp			= require('gulp'),
		autoprefixer 	= require('gulp-autoprefixer'),
		babel 			= require('gulp-babel'),
		imagemin 		= require('gulp-imagemin'),
		sass            = require("gulp-sass");
		sourcemaps		= require('gulp-sourcemaps'),
		uglify 			= require('gulp-uglify'),
		gulpif 			= require('gulp-if'),
		uncss 			= require('gulp-uncss'),
		useref 			= require('gulp-useref'),
		webpack 		= require('webpack'),
		browserSync 	= require('browser-sync').create();
		var $ = require("jquery");
		


		gulp.task('css', function(){
			return gulp.src('src/sass/**/*.scss')
					.pipe(sourcemaps.init())
					.pipe(sass({outputStyle:'compressed'}).on('error', sass.logError))
					.pipe(autoprefixer({
						browsers: ['last 2 versions']

					}))
					.pipe(sourcemaps.write('./maps'))
					.pipe(gulp.dest('dist/css'))
					.pipe(browserSync.stream())
		});

		gulp.task('uncss', function(){
			return gulp.src('src/sass/**/*.scss')
					.pipe(sourcemaps.init())
					.pipe(sass({outputStyle:'compressed'}).on('error', sass.logError))
					.pipe(uncss({
						html: ['dist/index.html', 'dist/**.*html']
					}))
					.pipe(autoprefixer({
						browsers: ['last 2 versions']

					}))
					.pipe(sourcemaps.write('./maps'))
					.pipe(gulp.dest('dist/css'))
					.pipe(browserSync.stream())
		});


		gulp.task('copy', function(){
			return gulp.src('src/**/*.html')
					.pipe(useref())
					.pipe(gulpif('*.js', sourcemaps.init()))
					.pipe(gulpif('*.js', babel({presets: ["env"]})))
					.pipe(gulpif('*.js', uglify()))
					.pipe(gulpif('*.js', sourcemaps.write('.')))
					.pipe(gulp.dest('dist'))
					.pipe(browserSync.stream())
		});

		gulp.task('images', function(){
			return gulp.src('src/images/*')
					.pipe(imagemin())
					.pipe(gulp.dest('dist/images'))
		});

		gulp.task('browserSync', function(){
			browserSync.init({
				server: {
					baseDir: 'dist'
				}
			})
		});

		gulp.task('watch', ['browserSync', 'css'], function(){
			gulp.watch('src/sass/**/*.scss', ['css']);
			gulp.watch('src/**/*.+(html|js)', ['copy']);
					
		});


		