module.exports = {
    target: {
        src: 'header.php', // point to your HTML file.
        fileTypes: {
            html: {
                block: /(([ \t]*)<!--\s*bower:*(\S*)\s*-->)(\n|\r|.)*?(<!--\s*endbower\s*-->)/gi,
                detect: {
                    js: /<script.*src=['"]([^'"]+)/gi,
                    css: /<link.*href=['"]([^'"]+)/gi
                },
                replace: {
                    js: '<script src="<?php echo get_template_directory_uri();?>/{{filePath}}" type="text/javascript"></script>',
                    css: '<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/{{filePath}}" />'
                }
            }
        }
    }
}
