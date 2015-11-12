var fs = require('fs-extra')

bowercc_config = JSON.stringify({
    "scripts": {
        "postinstall": "grunt wiredep"
    }
});

bower_config = JSON.stringify({
    "name": "jims-wordpress-setup",
    "version": "1.0.0",
    "authors": [
        "Jim Sheen"
    ],
    "license": "MIT",
    "ignore": [
        "**/.*",
        "node_modules",
        "bower_components",
        "test",
        "tests"
    ],
     "overrides": {
      "foundation": {
        "main": [
        "css/foundation.css",
        "js/foundation.js"
        ]
      }
    }
});


fs.outputFile("bower.json", bower_config, function(err) {
    if (err) {
        return console.log(err);
    }
})


fs.outputFile(".bowerrc", bowercc_config, function(err) {
    if (err) {
        return console.log(err);
    }
})



fs.ensureDir('templates/', function(err) {
    if (err) {
        return console.log(err);
    }
})


fs.ensureDir('css/', function(err) {
    if (err) {
        return console.log(err);
    }
})