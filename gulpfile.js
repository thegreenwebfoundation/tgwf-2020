// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var postcss = require('gulp-postcss');
var touch = require('gulp-touch-fd');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var replace = require('gulp-replace');
var autoprefixer = require('autoprefixer');

// Configuration file to keep your code DRY
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function () {
	var stream = gulp
		.src(paths.sass + '/*.scss')
		.pipe(
			plumber({
				errorHandler: function (err) {
					console.log(err);
					this.emit('end');
				}
			})
		)
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(sass({ errLogToConsole: true }))
		.pipe(postcss([autoprefixer()]))
		.pipe(sourcemaps.write(undefined, { sourceRoot: null }))
		.pipe(gulp.dest(paths.css))
		.pipe(touch());
	return stream;
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task('watch', function () {
	gulp.watch(
		[
			`${paths.sass}/**/*.scss`, 
			`${paths.sass}/*.scss`
		], 
		gulp.series('styles', 'reload' )
	);

	gulp.watch(
		[
			`${paths.js}/**/*.js`,
			'!{paths.js}/theme.js',
			'!{paths.js}/theme.min.js'
		],
		gulp.series('scripts', 'reload')
	);

	gulp.watch( './**/*.php', gulp.series( 'reload' ) );
});


// Reloads browser sync
gulp.task('reload', function (done) {
	browserSync.reload();
	done();
});
  

gulp.task('minifycss', function () {

	return gulp
		.src([
			// `${paths.css}/custom-editor-style.css`,
			`${paths.css}/main.css`,
			`${paths.css}/fog-of-enactment.css`,
		])
		.pipe(sourcemaps.init({
			loadMaps: true
		}))
		.pipe(cleanCSS({
			compatibility: '*'
		}))
		.pipe(
			plumber({
				errorHandler: function (err) {
					console.log(err);
					this.emit('end');
				}
			})
		)
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(paths.css))
		.pipe(touch());
});

/**
 * Delete minified CSS files and their maps
 */
gulp.task('cleancss', function () {
	return del(paths.css + '/*.min.css*');
});

gulp.task('styles', function (callback) {
	gulp.series('sass', 'minifycss')(callback);
});

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function () {
	browserSync.init(
		cfg.browserSyncWatchFiles, 
		cfg.browserSyncOptions
	);
});

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task('scripts', function () {
	var scripts = [
		// Start - All BS4 stuff
		// `${paths.dev}/js/bootstrap4/bootstrap.bundle.js`,

		// End - All BS4 stuff

		// `${paths.dev}/js/skip-link-focus-fix.js`,

		// Theme JS files
		`${paths.js}/modules/*.js`
	];
	// return gulp.src('js/*.js')

	gulp
		.src(scripts, { allowEmpty: true })
		.pipe(babel({ presets: ['@babel/preset-env'] }))
		.pipe(concat('theme.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest(paths.js));

	return gulp
		.src(scripts, { allowEmpty: true })
		.pipe(babel())
		.pipe(concat('theme.js'))
		.pipe(gulp.dest(paths.js));
});

// Deleting any file inside the /src folder
gulp.task('clean-source', function () {
	return del(['src/**/*']);
});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task('watch-bs', gulp.parallel('browser-sync', 'watch'));

// Run:
// gulp
// Starts watcher (default task)
gulp.task('default', gulp.series('watch'));
