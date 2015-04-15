(function ($) {

// AJAX Infinite Scroll
    
/*
    function pagination() {    
        
        var postoffset = $('article').length;
        
        $.post(
            WPaAjax.ajaxurl,
            {
                action : 'load_more',
                postoffset : postoffset
            },
            function( response ) {
                $('.infinite-load').css('display', 'initial').hide('900');
                $('#container').append( response );
                // $('.infinite-load').append('<a class="infinite-load-text">Loading... <img class="infinite-load-img" src="http://localhost/chaustracks/wp-content/themes/chaustracks/images/ajax-loader.gif" /></a>');
            }
        ).always(function(){
                ready = true; //Reset the flag here
            });
        return false;
    }

    $(window).scroll(function(){
      //  var scroll = $(window).scrollTop();
        // var bottom = $(document).height() - $(window).height();
        console.log(ready);
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            
            pagination();  // run our call for pagination
            ready = false;
        }
    }); 

*/


var isActive = false; 

$(window).scroll(function() {
    //Check the flag here. Check it first, it's better performance wise.
    if  (!isActive && $(window).scrollTop() == $(document).height() - $(window).height()){ 
            isActive = true; //Set the flag here
        
        $('.infinite-load').css('display', 'initial').hide('900');

        var postoffset = $('article').length;
        
        $.post(
            scrollAjax.ajaxurl,
            {
                action : 'load_more',
                postoffset : postoffset
            },
            function( response ) {
                
                $('#container').append( response );
                isActive = true; //Reset the flag here
                // $('.infinite-load').append('<a class="infinite-load-text">Loading... <img class="infinite-load-img" src="http://localhost/chaustracks/wp-content/themes/chaustracks/images/ajax-loader.gif" /></a>');
            }
        )
    }
    
});





}(jQuery));