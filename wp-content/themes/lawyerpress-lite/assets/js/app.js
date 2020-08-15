(function($) {
    $('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: true,
    });



    $('.client-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('#testimonial-slider.three-testimonial').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('#testimonial-slider.two-testimonial').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('#testimonial-slider.one-testimonial').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
    });

    $('.post-gallery').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: true,
    });

    $('[data-toggle="tooltip"]').tooltip();
    jQuery(window).load(function(){
      $("#sticky_header").sticky({ topSpacing: 0 });
    });

})(jQuery);


jQuery(function() {
    jQuery(function() {
            var e = jQuery("#search-toggle"),
                o = jQuery("#search-box");
            jQuery("#search-toggle").on("click", function() {
                "search-toggle" == jQuery(this).attr("id") && (o.is(":visible") ? e.removeClass("header-search-x").addClass("header-search") : e.removeClass("header-search").addClass("header-search-x"), o.slideToggle(300, function() {}))
            })
        }),
        function() {
            var e, o, r = jQuery(".main-navigation");
            if (r && (e = r.find(".menu-toggle"))) return o = r.find(".menu"), o && o.children().length ? void jQuery(".menu-toggle").on("click", function() {
                jQuery(this).toggleClass("on"), r.toggleClass("toggled-on")
            }) : void e.hide()
        }(), jQuery(document).ready(function() {
            jQuery(".go-to-top").hide(), jQuery(window).scroll(function() {
                var e = jQuery(window).scrollTop();
                e > 900 ? jQuery(".go-to-top").fadeIn() : jQuery(".go-to-top").fadeOut()
            }), jQuery(".go-to-top").click(function() {
                return jQuery("html,header,body").animate({
                    scrollTop: 0
                }, 700), !1
            })
        })

});


extendNav();
function extendNav() {
  jQuery('.nav-wrapper .dropdown').hover(function() {
    jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
    jQuery(this).toggleClass('open');
  }, function() {
    jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
    jQuery(this).toggleClass('open');
  });
}

