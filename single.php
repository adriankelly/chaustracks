    
    <?php get_header(); ?> 
        
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 single-post">  

                    <?php get_template_part( 'post-template' ); ?>
                    <?php comments_template(); ?>
                    

                </div> <!-- .col-md-12 -->

            </div> <!-- .row -->
        </div> <!-- .container -->

    <?php get_footer(); ?>

