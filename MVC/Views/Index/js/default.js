/**
 * Created with JetBrains PhpStorm.
 * User: ray
 * Date: 3/06/13
 * Time: 1:11 AM
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function() {


    $("ul#slides").cycle({
        fx: 'fade',
        pause: 2,
        prev: '#prev',
        next: '#next',
        after:function(){
            $('div#slideshowCaption').html($('#slides li:visible img').data('caption'));
        }
    });

    $("#slideshow").hover(function() {
            $("ul#nav").fadeIn();
            $('div#slideshowCaption').fadeIn();

        },
        function() {
            $("ul#nav").fadeOut();
            $('div#slideshowCaption').fadeOut();
        });

});

