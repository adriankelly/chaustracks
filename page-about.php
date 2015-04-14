<?php

/*
  Template Name: About
*/

?>

<?php get_header(); ?> 
    <div class="container">
    <div class="row">
        <div class="col-md-12">  

<?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

              // Display content of page
              get_template_part( 'content', get_post_format() ); 
              wp_reset_postdata();
  
            endwhile;
        endif;
?>

<p>HELLO</p>

        </div> <!-- .col-md-12 -->

    </div> <!-- .row -->
    </div> <!-- .container -->



<?php get_footer(); ?>