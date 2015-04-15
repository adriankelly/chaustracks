(function ($) {
    $('.archives-month').change(function() {
        
        $('.infinite-load').css('display', 'initial').hide('900');

        var date = $('.archives-month option:selected').val();
        var dateArray = date.split("/");
        var year = dateArray[4];
        var month = dateArray[5];

        $.get(
            archivesAjax.ajaxurl,
            {
                action : 'load_archives',
                month: month,
                year: year
            },
            function( response ) {
                $('.ajax-target').empty().append( response );
            }
        )
    });

}(jQuery));