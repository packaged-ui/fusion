module.exports = function (grunt) {
  grunt.initConfig(
    {
      sass:   {
        dist: {
          files: [
            {
              expand: true,
              cwd:    'src/_resources/css/base',
              src:    ['*.scss'],
              dest:   'src/_resources/css/base',
              ext:    '.css'
            }
          ]
        }
      },
      cssmin: {
        grouped: {
          options: {
            shorthandCompacting: true,
            keepSpecialComments: 0
          },
          files:   {
            'src/_resources/css/base.min.css': [
              'node_modules/normalize.css/normalize.css',
              'src/_resources/css/base/_base.css',
              'src/_resources/css/base/*.css'
            ]
          }
        },
        base:    {
          files: [
            {
              expand: true,
              cwd:    'src/_resources/css/',
              src:    ['*.css', '!*.min.css'],
              dest:   'src/_resources/css/',
              ext:    '.min.css'
            }
          ]
        }
      },
      uglify: {
        base: {
          files: {
            'src/_resources/js/base.min.js': [
              'src/_resources/js/base/_base.js',
              'src/_resources/js/base/*.js'
            ],
          }
        }
      },
      watch:  {
        styles:  {
          files:   ['src/_resources/css/**/*.css'],
          tasks:   ['cssmin'],
          options: {
            spawn: false,
          }
        },
        scripts: {
          files:   ['src/_resources/js/**/*.js'],
          tasks:   ['uglify'],
          options: {
            spawn: false,
          },
        },
      },
    }
  );

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['sass', 'cssmin', 'uglify', 'watch']);
};
