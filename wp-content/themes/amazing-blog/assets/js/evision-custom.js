jQuery(document).ready(function ($) {
    jQuery('.evision-main-slider').each(function(){
        $(this).bxSlider({
            adaptiveHeight: true,
            mode: $(this).data('mode'),
            speed: $(this).data('speed'),
            pause: $(this).data('pause'),
            controls: true,
            pager: $(this).data('control'),
            // auto: $(this).data('auto')
            auto: false
        });
    });

    //What happen on window scroll
    function back_to_top(){
        var scrollTop = $(window).scrollTop();
        var offset = 500;
        if (scrollTop < offset) {
            $('.evision-back-to-top').hide();
        } else {
            $('.evision-back-to-top').show();
        }
    }
    jQuery(window).on("scroll", function (e) {
        back_to_top();
    });
    back_to_top();
    $('a[href*="#"]').on('click', function(event){
        if ($(this.hash).length){
            event.preventDefault();
            $("html, body").stop().animate({scrollTop: $(this.hash).offset().top - 70}, 2e3, "easeInOutExpo");
        }
    });

    // mmenu
    jQuery("nav#menu").mmenu({
       "classes": "mm-slide mm-light",
       "counters": true,
       "header": true,
       "offCanvas": {
          "position"  : "right",
          "zposition": "back"
           },
       "extensions" : [ 'effect-slide-menu', 'pageshadow' ],
       "navbar"         : {
        "title"     : 'MENU'
       },
       "navbars"        : [{
            "position"  : 'top',
            "content"       : [
                'prev',
                'title',
                'close'
            ]
        }
       ]
    });
});
