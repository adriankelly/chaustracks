    
    <?php get_header(); ?> 
        
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">  


                    <?php get_template_part( 'post-template' ); ?>


                <!-- Infinite Scroll Target Div -->
                    <div id="container"></div>
                    
                    
                </div> <!-- .col-md-12 -->

            </div> <!-- .row -->
        </div> <!-- .container -->

    <?php get_footer(); ?>

