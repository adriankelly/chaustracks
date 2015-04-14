<?php
    

    function theme_styles() {
        wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'main_css', get_template_directory_uri() . '/main.css' );
    }

    add_action( 'wp_enqueue_scripts', 'theme_styles' );


    function theme_js() {

        global $wp_scripts;

        wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
        wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
        // wp_register_script( 'main_js', get_template_directory_uri() . '/script.js', array( 'jquery' ), '', true );
       


        $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
        $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
        // wp_enqueue_script( 'main_js' );
        // 
        // 
        // 
        wp_enqueue_script(
        'wpa56343_script',
        get_template_directory_uri() . '/script.js',
        array( 'jquery' ),
        null,
        true
        );
        wp_localize_script(
        'wpa56343_script',
        'WPaAjax',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ))
        
        );
        
    }

    add_action( 'wp_enqueue_scripts', 'theme_js');


    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );


/******************/

// add_action( 'wp_enqueue_scripts', 'wpa56343_scripts', 100 );

function wpa56343_scripts() {
    wp_enqueue_script(
        'wpa56343_script',
        get_template_directory_uri() . '/script.js',
        array( 'jquery' ),
        null,
        false
    );
    wp_localize_script(
        'wpa56343_script',
        'WPaAjax',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        )
    );
}


add_action('wp_ajax_wpa56343_more', 'wpa56343_more');
add_action('wp_ajax_nopriv_wpa56343_more', 'wpa56343_more');

function wpa56343_more(){
    global $wp_query;

    $offset = $_POST['postoffset'];
    $args = array(
        'offset' => $offset,
        'posts_per_page' => 2
    );
    $wp_query = new WP_Query( $args );
    
    get_template_part( 'post-template' );



    exit;
}






/******************/





    function home_page_menu_args( $args ) {
        $args['show_home'] = true;
        return $args;
    }
    
    add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

    function register_theme_menus(){
        register_nav_menus(
            array(
                'header-menu' => __( 'Header Menu' )
            )
        );
    }

    add_action( 'init', 'register_theme_menus' );

    function theme_enqueue_styles() {
        wp_enqueue_style('theme-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700');
    }
    
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

?>
