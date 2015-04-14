module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


            // 2. Configuration for concatinating files goes here.



// AUTOPREFIXER
        autoprefixer: {

          options: {
            // Task-specific options go here.
            browsers: ['last 2 versions', 'ie 8', 'ie 9']
          },
          multiple_files: {
            expand: true,
            flatten: true,
            src: 'preprod/css/*.css', // -> src/css/file1.css, src/css/file2.css
            dest: 'preprod/grunt/css/ap/' // -> dest/css/file1.css, dest/css/file2.css
          }
        },

// IMAGE COMPRESSION

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'preprod/img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'build/img/'
                }]
            }
        },


// CONCATENATE JS AND CSS

    concat: {
        css: {
           src: [
                 'preprod/grunt/css/ap/*'
                ],
            dest: 'preprod/grunt/css/combined.css'
        },
        js : {
            src : [
                'preprod/js/*.js'
            ],
            dest : 'preprod/grunt/js/combined.js'
        }
    },


// MINIFY CSS

    cssmin : {
            css:{
                src: 'preprod/grunt/css/combined.css',
                dest: 'build/css/style.min.css'
            }
        },


// MINIFY JS

    uglify: {
        js: {
            src: 'preprod/grunt/js/combined.js',
            dest: 'build/js/script.min.js'
            }
    }




});

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['autoprefixer', 'imagemin', 'concat:css', 'cssmin:css', 'concat:js', 'uglify']);

};