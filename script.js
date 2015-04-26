(function ($) {

// Remove additional links under mixcloud embeds
    $('.post p a:contains("Mixcloud")').parent().hide();

// Add parallax event to jumbotron for desktop sized devices
    
	if ($(window).width() > 991) {
    	var jumbotronHeight = $('.jumbotron').outerHeight();

	    function parallax() {
	        var scrolled = $(window).scrollTop();
	        $('.bg').css('height', (jumbotronHeight - (scrolled * 0.8)) + 'px');
	        $('header').css('height', (jumbotronHeight - (scrolled * -0.2 )) + 'px');
	    }
	    $(window).scroll(function(e){ parallax(); })
	};

// Change offset for fixed nav on scroll for desktop sized devices
    if ($(window).width() > 991) {
        $('nav').attr('data-offset-top', '660');
    };

// Auto-scroll to top of archives and about pages

    if ($('.wrap-bg').length) {
    	$('html, body').animate({
    		scrollTop: $('.wrap-bg').offset().top
    	}, 1000);
    };

// Auto-scroll to top of content on single.php
    if ($('#comments').length) {
        $('html, body').animate({
            scrollTop: $('.col-md-6').offset().top
        }, 1000);
    };


// One media at a time please
// 
// 1. Add enablejsapi=1 to end of each youtube video url
// 
/*
$('.col-md-6').on('click', function() {
    if($(this).hasClass('notActive')) {
        $('.active').addClass('notActive');
        $(this).removeClass('notActive').addClass('active');
    } else if($(this).hasClass('active')) {
        $(this).removeClass('active').addClass('notActive');
    };
});
*/

/*
var mediaSource = $('iframe');
if (mediaSource.attr)

 var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player( 'player', {
          events: { 'onStateChange': onPlayerStateChange }
        });
      }
      function onPlayerStateChange(event) {
        switch(event.data) {
          case 0:
            record('video ended');
            break;
          case 1:
            record('video playing from '+player.getCurrentTime());
            break;
          case 2:
            record('video paused at '+player.getCurrentTime());
        }
      }
      function record(str){
        var p = document.createElement("p");
        p.appendChild(document.createTextNode(str));
        document.body.appendChild(p);
      }

*/


}(jQuery));