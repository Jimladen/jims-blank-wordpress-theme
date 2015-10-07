module.exports = function(grunt) {
  grunt.registerTask('dev', ['sass', 'watch', 'replace:dev']);
};