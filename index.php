<?php get_header(); ?> 
    <div class="container">
    <div class="row">
        <div class="col-md-12">  

       <?php 
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    
                    <article class="post">
                        
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
                        <p class="post-byline">
                            Posted by <?php the_author(); ?> 
                            on <?php echo the_time('l, F jS, Y'); ?>
                            <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                        </p>

                        


                        <?php// the_content(); ?>
                        
                        <?php
                        //global $more;

                        $more = 0;
                            echo '<div class="row">';
                            echo '<div class="col-xs-6">';
                                the_content('');
                            echo '</div>';

                        $more = 1;
                            echo '<div class="col-xs-6">';
                                the_content('',true);
                            echo '</div>';
                            echo '</div>';
                        ?>





                    </article>

                        

                <?php endwhile; ?>
                <?php
                    // $count_posts = wp_count_posts();

                    // $published_posts = $count_posts->publish;
                    // echo json_encode($published_posts);
                ?>
                <div id="container"></div>
                
<?php
                else:
            endif;

        ?>




        </div> <!-- .col-md-12 -->

    </div> <!-- .row -->
    </div> <!-- .container -->



<?php get_footer(); ?>