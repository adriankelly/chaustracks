(function ($) {

    // Remove additional links under mixcloud embeds
    $('.post p a:contains("Mixcloud")').parent().hide();




    // Add parallax event to jumbotron
    var jumbotronHeight = $('.jumbotron').outerHeight();

    function parallax() {
        var scrolled = $(window).scrollTop();
        $('.bg').css('height', (jumbotronHeight - (scrolled * 0.8)) + 'px');
        $('header').css('height', (jumbotronHeight - (scrolled * -0.2 )) + 'px');
    }
    $(window).scroll(function(e){ parallax(); })


    // var postoffset = 0;
//    $('.blog-more').click(function(e){ // <- added
//        e.preventDefault(); // <- added to prevent normal form submission
        
      function pagination() {
        var postoffset = $('article').length;
        // postoffset = postoffset + 1;
        $.post(
            WPaAjax.ajaxurl,
            {
                action : 'wpa56343_more',
                postoffset : postoffset
            },
            function( response ) {
                $('.infinite-loader').hide('900');
                $('#container').append( response );

            }
        )
        return false;
    }


    $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                    pagination();  // run our call for pagination
                }
        }); 





}(jQuery));