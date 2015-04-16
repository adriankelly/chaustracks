
<?php

    /*
    Template Name: Archives
    */

?>

<?php get_header(); ?>

    <div class="container">
        <div class="row">
            
            <select class="archives-month">
                <option>
                    <?php echo esc_attr( __( 'Select Month' ) ); ?>
                </option> 

                <?php wp_get_archives( array(
                    'type' => 'monthly',
                    'format' => 'option',
                    'show_post_count' => 1 )
                ); ?>
            </select>

            <div class="ajax-target"></div>

        </div> <!-- .row -->
    </div> <!-- .container -->

<?php get_footer(); ?>
