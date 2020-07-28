module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),
    sass: {
      dist: {
        options: {
          style: "expanded",
        },
        files: {
          "style.css": "resources/sass/style.scss",
        },
      },
    },
    cssmin: {
      options: {
        mergeIntoShorthands: false,
        roundingPrecision: -1,
        report: "gzip",
      },
      target: {
        src: ["style.css"],
        dest: "style.min.css",
      },
    },
    copy: {
      build: {
        src: ["**", "!node_modules/**", "!vendor/**", "!Gruntfile.js", "!package.json", "!package-lock.json", "!resources/**", "!composer.json", "!composer.lock", "!phpcs.xml.dist", "!README.md", "!style.css.map", "!woocommerce.css.map"],
        dest: "build/",
      },
    },
    compress: {
      build: {
        options: {
          archive: 'awp.zip',
        },
        files: [{
          expand: true,
          cwd: 'build/',
          src: ['**/*'],
          dist: '/'
        }]
      }
    },
    clean: {
      dist: {
        src: ['build', 'awp.zip']
      }
    },
    watch: {
      css: {
        files: "**/*.scss",
        tasks: ["sass", "cssmin"],
      },
    },
  });
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-contrib-compress");
  grunt.loadNpmTasks("grunt-contrib-clean");

  // Watch Task
  grunt.registerTask("default", ["watch"]);
  // Release Task
  grunt.registerTask("build", ['copy', 'compress']);
};
