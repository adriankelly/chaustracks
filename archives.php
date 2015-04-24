
<?php

    /*
        Template Name: Archives
    */

?>

<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="wrap-bg">

                <select class="archives-month form-control">
                    <option>
                        <?php echo esc_attr( __( 'Select Month' ) ); ?>
                    </option> 
               
                    <?php wp_get_archives( array(
                        'type' => 'monthly',
                        'format' => 'option',
                        'show_post_count' => 1 )
                    ); ?>
                </select>
            
            </div><!-- .wrap-bg -->
            
            <div class="col-md-12">
                <div class="ajax-target archives-content"></div>
            </div><!-- col-md-12 -->
            
        </div> <!-- .row -->
    </div> <!-- .container -->

<?php get_footer(); ?>
