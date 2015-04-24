<?php

    /*
    Template Name: Post-Template
    */

?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="post">
                        
        <h2>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
                        
        <p class="post-byline">
            Posted by <?php the_author(); ?> 
            on <?php echo the_time('l, F jS, Y'); ?>
            <a class="post-byline-comments" href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
        </p>
        
        <?php
            global $more;

            $more = 0;
                echo '<div class="row">';
                echo '<div class="col-md-6 notActive">';
                echo '<div class="videoWrapper ">';
                    the_content('');
                echo '</div>';
                echo '</div>';

            $more = 1;
                echo '<div class="col-md-6 post-text">';
                    the_content('',true);
                echo '</div>';
                echo '</div>';
        ?>

    </article>

        <?php endwhile; ?>
        <?php else: 
            wp_reset_query();
        endif; ?>




