<?php
    

/**
 * Stylesheets
 */

    function theme_styles() {
        
        // Bootstrap
        wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );


        // My CSS
        wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );

    } // End of function theme_styles
    add_action( 'wp_enqueue_scripts', 'theme_styles' );



/**
 * JavaScript
 */

    function theme_js() {

        global $wp_scripts;


        // IE fixes
        wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
        wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
        
        $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
        $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );


        // Bootstrap JS
        wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);


        // My JS
        wp_enqueue_script( 'script_js', get_template_directory_uri() . '/script.js', array( 'jquery' ), null, true );
        
        // Archives AJAX load posts
        if ( is_page( 'archives' ) ) {
            wp_enqueue_script( 'archives_js', get_template_directory_uri() . '/archives.js', array( 'jquery' ), null, true );
            wp_localize_script( 'archives_js', 'archivesAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
        }

    } // End of function theme_js
    add_action( 'wp_enqueue_scripts', 'theme_js');



/**
 * Add menus section to wp-admin
 */

    function home_page_menu_args( $args ) {
        $args['show_home'] = true;
        return $args;
    }
    add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

    function register_theme_menus(){
        register_nav_menus(
            array( 'header-menu' => __( 'Header Menu' ))
        );
    }
    add_action( 'init', 'register_theme_menus' );




/**
 * Fonts
 */

    function theme_enqueue_styles() {
        wp_enqueue_style('theme-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700');
    }
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );




/**
 * Archives Loader
 */

    function load_archives(){
        
        global $wp_query;

        $args = array(
            'posts_per_page' => 100,
            'year' => $_GET['year'],
            'month' => $_GET['month'],
            'orderby' => 'date' );
        $wp_query = new WP_Query( $args );
        
        get_template_part( 'post-template' );

        exit;
        
    } // End of function load_archives
    add_action('wp_ajax_load_archives', 'load_archives');
    add_action('wp_ajax_nopriv_load_archives', 'load_archives');



/**
 * Front Page Loader
 */

    function load_home_posts(){ 
        $loopFile        = $_POST['loop_file'];
        $paged           = $_POST['page_no'];
        $posts_per_page  = get_option('posts_per_page');

        query_posts(array('paged' => $paged )); 
        
        get_template_part( 'post-template' );
        
        exit;
    }
    add_action('wp_ajax_load_home_posts', 'load_home_posts');
    add_action('wp_ajax_nopriv_load_home_posts', 'load_home_posts');


?>
