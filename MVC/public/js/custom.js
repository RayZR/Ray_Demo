$(document).scroll(function() {
    $('#header_wrapper').toggle($(this).scrollTop()>150)
});