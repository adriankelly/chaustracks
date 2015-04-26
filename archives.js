(function ($) {
    
    // Load posts via Ajax request
    $('.archives-month').change(function() {
        
        // On change of select, display loading graphic
        $('.infinite-load').css('display', 'initial').hide('900');

        // Grab selected archive month and split to isolate year and month
        var selectedMonth = $('.archives-month option:selected').val();
        var dateArray = selectedMonth.split("/");
        var year = dateArray[3];
        var month = dateArray[4];

        // Prepare Ajax request with selected month and year
        var requestedPosts = {
                action: 'load_archives',
                month: month,
                year: year
        };

        // Make Ajax request passing in month, year and action
        $.get(archivesAjax.ajaxurl, requestedPosts, function(response) {
                // Append response to .ajax-target
                $('.ajax-target').empty().append( response );
        });
        
        // Auto-scroll to top of first post on archives page
        $('html, body').animate({
            scrollTop: $('.ajax-target').offset().top
        }, 1000);
    
    });

}(jQuery));