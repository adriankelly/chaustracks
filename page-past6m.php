<?php

    /*
      Template Name: Past Six Months
    */

?>

<?php get_header(); ?> 

    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
 
                <div class="page-header">
                    <h1><?php the_title(); ?></h1>
                </div>

            <div> <!-- .col-md-12 -->

            
            <?php
                $args = array(
                    'post_type' => 'post', 
                    'tax_query' => array(
                        array( 
                            'taxonomy' => 'post_format',
                            'field'    => 'slug',
                            'terms'    => array( 'post-format-image' )
                        )
                    ),
                    
                    'cat'           => '-173',
                    'post_status'   => 'publish',
                    'date_query'    => array(
                        'column'    => 'post_date',
                        'after'     => '-30 days'
                    )
                );
            ?>
            <?php $query = new WP_Query( $args ); ?>

            <?php
                $today = getDate();
                $args = array(
                    'date_query' => array(
                        array(
                            'column'  => 'post_date_gmt',
                            'after'     => '6 month ago',
                        ),
                        array(
                            'before'    => array(
                                'year'  => $today['year'],
                                'month' => $today['mon'],
                                'day'   => $today['mday'],
                            ),

                            'inclusive' => true,

                        ),
                    ),
                    'posts_per_page' => -1,
                );
            ?>
            <?php $query = new WP_Query( $args ); ?>

<!-- Post Loop -->
            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

            <article class="post">

                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                
                <span>
                    Posted by <?php the_author(); ?> 
                    on <?php echo the_time('l, F jS, Y'); ?>
                    
                    <a class="article-comment" href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                </span>

<!-- REPEATING POST TEMPLATE, SHOULD SET UP SEPARATE PHP FILE TO CALL. -->
                
                <?php
                    // global $more;

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

            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
<!-- End of Post Loop -->

        </div> <!-- .row -->
    </div> <!-- .container --> 

<?php get_footer(); ?>

