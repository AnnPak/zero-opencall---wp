(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {

        var myModalEl = document.getElementById('menuModal')
        myModalEl.addEventListener('hidden.bs.modal', function (event) {
            $('.site-header__mobile-menu img').css('animation', 'animback 0.5s')
            setTimeout(function () { $('.site-header__mobile-menu img').css('animation', '') }, 500)
        })


        var thumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 2,
            breakpoints: {
                1440: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 2,
                },

            },
        });

        var slider = new Swiper('.gallery-slider', {
            slidesPerView: 1,
            centeredSlides: true,
            loop: true,
            loopedSlides: 6,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: thumbs,
            },
        });


    }); // end 


    jQuery(window).load(function () {



    }); // end


}(jQuery));	