    
        <div class="infinite-load-wrap">
            <!-- Append AJAX loading image here -->
            <a class="infinite-load" style="display: none">Loading... <img src="/wp-content/themes/chaustracks/images/ajax-loader.gif" /></a>
        </div>

        <footer>
            <hr>
            <p class="copyright">&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
        </footer>
    
    </div> <!-- /container -->


<script type="text/javascript">
    <?php   if (!is_single() || !is_page()): ?>

        (function ($) {
            var count = 2;
            var total = <?php echo $wp_query->max_num_pages; ?>;
                $(window).scroll(function(){
                    if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                        if (count > total){
                            return false;
                        }else{
                            loadArticle(count);
                            $('.infinite-load').css('display', 'initial').hide(700); //ajax loader image
                        }
                    count++;
                    }
                }); 
 
            function loadArticle(pageNumber){    
                $.ajax({
                    url: "<?php bloginfo('wpurl') ?>/wp-admin/admin-ajax.php",
                    type:'POST',
                    data: "action=load_home_posts&page_no=" + pageNumber + '&loop_file=loop', 
                    success: function(html){
                        $("#container").append(html);
                    }
                });
                return false;
            }
        }(jQuery));

</script>

<?php endif; ?>



<?php wp_footer(); ?>


    </body>
</html>