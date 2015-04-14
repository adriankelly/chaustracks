
<?php

/*

Template Name: Archives

*/

?>



<?php get_header(); ?>




<div id="container">
  <div id="content" role="main">

    
    <h1 class="entry-title"><?php the_title(); ?></h1>
    
    <h2>Archives by Month:</h2>
    <ul class="archive-month-list">
      <?php wp_get_archives('type=monthly'); ?>
    </ul>

    <div class="archive-target">
      
    </div>




  </div><!-- #content -->
</div><!-- #container -->




<?php get_footer(); ?>
