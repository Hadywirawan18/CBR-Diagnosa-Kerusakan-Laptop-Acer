$(window).scroll(function() {

    if ($(document).scrollTop() > 50) {
        $('.navbar').addClass('shrink');
        $('.text-white').addClass('shrink');
        $('.navbar-brand').addClass('shrink');

    } else {
        $('.navbar').removeClass('shrink');
        $('.text-white').removeClass('shrink');
    }

});