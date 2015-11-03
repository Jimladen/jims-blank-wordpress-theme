module.exports = function(grunt) {
  grunt.registerTask('dev', ['sass', 'batch_git_clone:dev', 'copy:plugins', 'watch', 'replace:dev']);
};