module.exports = function(grunt) {
    grunt.initConfig({
      pkg: grunt.file.readJSON('package.json'),
      sass: {
        dist: {
          options: {
            style: 'expanded',
          },
          files: {
            'style.css' : 'resources/sass/style.scss'
          }
        },
      },
      cssmin: {
        options: {
            mergeIntoShorthands: false,
            roundingPrecision: -1,
            report: 'gzip'
          },
        target : {
            src : ["style.css",],
            dest : "style.min.css"
        }
      },
      watch: {
        css: {
          files: '**/*.scss',
          tasks: ['sass','cssmin']
        }
      },
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    // Watch Task
    grunt.registerTask('default',['watch']);
};