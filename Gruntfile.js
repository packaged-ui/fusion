module.exports = function (grunt) {
  grunt.initConfig(
    {
      cssmin: {
        grouped: {
          files: {
            'resources/css/base.min.css': [
              'resources/css/base/_base.css',
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
      },
      watch:  {
        scripts: {
          files:   ['resources/css/**/*.css'],
          tasks:   ['cssmin'],
          options: {
            spawn: false,
          },
        },
      },
    }
  );

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['cssmin', 'watch']);
};
