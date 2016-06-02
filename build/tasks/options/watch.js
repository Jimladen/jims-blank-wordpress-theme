module.exports = {
    options: {
        livereload: true,
    },
    scripts: {
        files: ['../js/*.js'],
        tasks: ['jshint', 'uglify', 'wiredep'],
        options: {
            spawn: false,
        }
    },
    css: {
        files: ['../sass/**/*.scss'],
        tasks: ['custom-sass', 'wiredep'],
        options: {
            spawn: false,
        }
    },
    images: {
        files: ['../img/**/*.{png,jpg,gif}', 'img/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
        options: {
            spawn: false,
        }
    },
    html: {
        files: ['../**/*.html'],
        tasks: [],
        options: {
            spawn: false
        }
    },
    html: {
        files: ['../**/*.php'],
        tasks: [],
        options: {
            spawn: false
        }
    },
    wiredep: {
        files: ['../bower_components/**', 'css/**/*'],
        tasks: ['wiredep'],
        options: {
            spawn: false,
        }
    }
}
