module.exports = function(grunt) {
 
  grunt.registerTask('watch', [ 'watch' ]);
 
  grunt.initConfig({
    concat: {
      js: {
        files: {
          'js/built/main.js': ['js/*.js']
        }
      }
    },
    sass: {
      dist: {
        files: {
          "style.css": "css/main.scss"
        }
      }
    },
    watch: {
      js: {
        files: ['javascript/*.js'],
        tasks: ['concat:js']
      },
      css: {
        files: ['css/*.scss'],
        tasks: ['sass:dist'],
        options: {
          livereload: true,
        }
      }
    }
  });
 
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

};
