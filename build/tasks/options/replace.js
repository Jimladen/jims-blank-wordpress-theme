module.exports = {
    build: {
        options: {
            patterns: [{
                match: /\.css/g,
                replacement: '.min.css',
            }]
        },
        files: [{
            expand: true,
            flatten: true,
            src: ['header.php'],
            dest: ''
        }]
    },
    dev: {
        options: {
            patterns: [{
                match: /\.min\.css/g,
                replacement: '.css',
            }]
        },
        files: [{
            expand: true,
            flatten: true,
            src: ['header.php'],
            dest: ''
        }]
    },
    reset: {
        options: {
            patterns: [{
                match: /(<!-- bower:js -->)[^]+?(<!-- endbower -->)/g,
                replacement: '<!-- bower:js --><!-- endbower -->',
            },
            {
                match : /(<!-- bower:css -->)[^]+?(<!-- endbower -->)/g,
                replacement: '<!-- bower:css --><!-- endbower -->',
            }]
        },
        files: [{
            expand: true,
            flatten: true,
            src: ['header.php'],
            dest: ''
        }]
    }
}
