
var pbmit_staticbox_hover_slide = function () {
    if (typeof Swiper !== 'undefined') {
        var pbmit_hover1 = new Swiper(".pbmit-static-image", {
            grabCursor: true,
            effect: "slide",
            allowTouchMove: false,
            slidesPerView: 1
        });
        var pbmit_hover2 = new Swiper(".pbmit-hover-short-desc", {
            grabCursor: true,
            effect: "creative",
            creativeEffect: {
                prev: {
                    translate: [0, "-170%", 1],
                },
                next: {
                    translate: [0, "100%", 0],
                },
            },
            allowTouchMove: false
        });
        jQuery('.pbmit-main-static-slider li').hover(function (e) {
            e.preventDefault();
            var myindex = jQuery(this).index();
            pbmit_hover1.slideTo(myindex, 500, false);
            pbmit_hover2.slideTo(myindex, 500, false);
        });
    }
}
pbmit_staticbox_hover_slide();

var pbmit_hover_slide = function () {
    if (typeof Swiper !== 'undefined') {
        var pbmit_hover1 = new Swiper(".pbmit-hover-image", {
            grabCursor: true,
            effect: "slide",
            allowTouchMove: false
        });
        var pbmit_hover2 = new Swiper(".pbmit-short-description", {
            grabCursor: true,
            effect: "creative",
            creativeEffect: {
                prev: {
                    translate: [0, "-170%", 1],
                },
                next: {
                    translate: [0, "100%", 0],
                },
            },
            allowTouchMove: false
        });
    }

    jQuery('.pbmit-main-hover-slider li').hover(function (e) {
        e.preventDefault();
        var myindex = jQuery(this).index();
        pbmit_hover1.slideTo(myindex, 500, false);
        pbmit_hover2.slideTo(myindex, 500, false);
    });
}
pbmit_hover_slide();
var pbmit_service_bg_hover = function () {
    var pbmit_hover;
    if (typeof Swiper !== 'undefined') {
        pbmit_hover = new Swiper(".pbmit-hover-image-faded", {
            speed: 6000,
            effect: 'fade',
        });
    }
    jQuery('.pbmit-main-hover-faded li').hover(function (e) {
        e.preventDefault();
        var myindex = jQuery(this).index();
        pbmit_hover.slideTo(myindex, 1000, false);
    });
}
pbmit_service_bg_hover();