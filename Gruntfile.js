module.exports = function (grunt) {
  grunt.initConfig(
    {
      cssmin: {
        grouped: {
          files: {
            'resources/css/base.min.css': [
              'resources/css/base/*.css'
            ]
          }
        },
        base:    {
          files: [
            {
              expand: true,
              cwd:    'resources/css/',
              src:    ['*.css', '!*.min.css'],
              dest:   'resources/css/',
              ext:    '.min.css'
            }
          ]
        }
      }
    }
  );

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.registerTask('default', ['cssmin']);
};
