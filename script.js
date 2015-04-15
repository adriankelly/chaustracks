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

// AJAX Infinite Scroll
/*    function pagination() {
        var postoffset = $('article').length;
        
        $.post(
            WPaAjax.ajaxurl,
            {
                action : 'load_more',
                postoffset : postoffset
            },
            function( response ) {
                $('.infinite-load').hide('900');
                $('#container').append( response );
                // $('.infinite-load').append('<a class="infinite-load-text">Loading... <img class="infinite-load-img" src="http://localhost/chaustracks/wp-content/themes/chaustracks/images/ajax-loader.gif" /></a>');
            }
        )
        return false;
    }

    $(window).scroll(function(){
        if  ($(window).scrollTop() == $(document).height() - $(window).height()){
            pagination();  // run our call for pagination
        }
    }); 

*/

// Archive Getter

/*

$("#archive-wrapper").height($("#archive-pot").height());
$("#archive-browser select").change(function() {
$("#archive-pot")
    .empty()
    .html("<div style='text-align: center; padding: 30px;'>loading...</div>");

var dateArray = $("#month-choice").val().split("/");
var y = dateArray[3];
var m = dateArray[4];
var c = $("#cat").val();

$.ajax({
    url: "/archive-getter/",
    dataType: "html",
    type: "POST",
    data: ({
        "digwp_y": y,
        "digwp_m" : m,
        "digwp_c" : c
    }),
    success: function(data) {
        $("#archive-pot").html(data);
        $("#archive-wrapper").animate({
            height: $("#archives-table tr").length * 50
        });
    }
});
});

*/



}(jQuery));