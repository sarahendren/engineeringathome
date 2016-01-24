module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        files: {
          'assets/css/default.css' : 'assets/scss/default.scss',
          'assets/css/accessible.css' : 'assets/scss/accessible.scss'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/app.min.js': ['node_modules/jquery/dist/jquery.min.js', 'node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/flickity/dist/flickity.pkgd.min.js', 'node_modules/isotope-layout/dist/isotope.pkgd.min.js', 'assets/js/skrollr.min.js', 'assets/js/jquery.sidenotes.min.js', 'assets/js/jquery.ba-throttle-debounce.min.js', 'node_modules/fluidbox/dist/js/jquery.fluidbox.min.js', 'node_modules/fastclick/lib/fastclick.js']
        }
      }
    },
    sprite:{
      adaptations: {
        src: 'content/home/*.png',
        dest: 'assets/adaptations-sprite.png',
        destCss: 'assets/scss/sprites-adaptations.scss',
        padding: 2,
        cssTemplate: "assets/sprites.css.handlebars"
     },
      actions: {
        src: 'content/1-adaptations/*.png',
        dest: 'assets/handwriting-sprite.png',
        destCss: 'assets/scss/sprites-actions.scss',
        padding: 2,
        cssTemplate: "assets/sprites.css.handlebars"
     }
    },
    image: {
      static: {
        options: {
          pngquant: true,
          optipng: true,
          zopflipng: true,
          advpng: true,
          jpegRecompress: true,
          jpegoptim: true,
          mozjpeg: true,
          gifsicle: true,
          svgo: false
        },
        files: {
          'assets/adaptations-sprite-min.png': 'assets/adaptations-sprite.png',
          'assets/handwriting-sprite-min.png': 'assets/handwriting-sprite.png'
        }
      }
    },
    php: {
        dist: {
            options: {
                port: 8000
            }
        },
        watch: {}
    },
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass'],
        options: {
          livereload: true,
          files: ['assets/scss/**/*'],
        }
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-php');
  grunt.loadNpmTasks('grunt-spritesmith');
  grunt.loadNpmTasks('grunt-image');
  grunt.registerTask('default',['php:watch', 'watch']);
}