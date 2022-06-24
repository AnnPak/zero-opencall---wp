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



    document.addEventListener('wpcf7mailsent', function (event) {

        if ('35' == event.detail.contactFormId) {
            $(".modal__form-submit").addClass('show');

            setTimeout(function () {
                $(".modal__form-submit").removeClass('show');
            }, 4000);
        }

    }, false);


    //  уменьшение хедереа при прокрутке
    $(window).scroll(function() {
        let scroll = $(window).scrollTop();
        if (scroll >= 10) {
                    $("#mastheadx").addClass('smaller');
        } else {
                    $("#mastheadx").removeClass("smaller");
                }
    });

    $(".work-item__wrapper").hover(function() {
        $(this).closest(".works-item").toggleClass("hovered")
    });



    

    // function offsetAnchor(e) {
    //     if (location.hash.length !== 0) {
    //         window.scrollTo(0, $(e.target.hash).position().top - 50);
    //     }
    // }

    // $(document).on('click', 'a[href^="/#"]', function (e) {
    //     window.setTimeout(function () {
    //         offsetAnchor(e);
    //     }, 10);
    // });



}(jQuery));	