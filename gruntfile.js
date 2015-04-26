module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


// AUTOPREFIXER
        autoprefixer: {

            options: {
                browsers: ['last 2 versions']
            },
            
            multiple_files: {
                expand: true,
                flatten: true,
                src: ['*.css', '/css/*.css'], // -> src/css/file1.css, src/css/file2.css

                // Modify last folder name
                dest: 'grunting/css/' // -> dest/css/file1.css, dest/css/file2.css
          }
        },

// IMAGE COMPRESSION

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'grunting/images/'
                }]
            }
        },


// CONCATENATE JS AND CSS

    concat: {
        css: {
            src: [
                'css/bootstrap.min.css',
                'grunting/css/*'
            ],
            dest: 'grunting/css/combined.css'
        },
        js1 : {
            src: [
                'archives.js',
            ],
            dest: 'grunting/js/archives.js' 
        },
        js2: {
            src: [
                // 'bootstrap.min.js',
                'script.js'
            ],
            dest: 'grunting/js/combined.js',         
        },
            /* files: {
                'grunting/js/archives.js' : ['archives.js'],
                'grunting/js/combined.js' : ['script.js', 'js/*.js'] //includes bootstrap */
    },


// MINIFY CSS

    cssmin: {
        add_banner: {
            options: {
                banner: '/* Theme Name: chaustracks Author: Adrian Kelly */' //NOTE: This isn't working anymore!!!!!
            },
            files: {
                'grunting/style.min.css': ['grunting/css/combined.css'] //includes bootstrap
            }
        }
    },

// MINIFY JS

    uglify: {
        js: {
            files: {
                'grunting/archives.min.js': ['grunting/js/archives.js'],
                'grunting/script.min.js': ['grunting/js/combined.js']
            }
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
    grunt.registerTask('default', ['autoprefixer', 'imagemin', 'concat', 'cssmin', 'uglify']);

};