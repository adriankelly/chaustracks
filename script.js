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

}(jQuery));