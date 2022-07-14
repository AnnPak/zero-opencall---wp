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

            $('.button_form').attr('disabled', 'false');

            setTimeout(function () {
                $(".modal__form-submit").removeClass('show');
            }, 4000);
        }

    }, false);


    //  уменьшение хедереа при прокрутке
    $(window).scroll(function() {
        let scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $('#cookie-law-info-bar').addClass('scroll');
            $("#mastheadx").addClass('smaller');
        } else {
            $('#cookie-law-info-bar').removeClass('scroll');
            $("#mastheadx").removeClass("smaller");
        }
    });

    $(".work-item__wrapper").hover(function() {
        $(this).closest(".works-item").toggleClass("hovered")
    });

    $('.nav-link').click(function(){
        console.log('lol')
        $('.mobile-menu__close img').click();


    })  
    
    if ($('.footer__bottom, .footer__bottom-img').length) {



        const videoElement = document.getElementById('videoback');

        videoElement.addEventListener('autostartNotAllowed', (e) => {

            // message: "The request is not allowed by the user agent or the platform in the current context, possibly because the user denied permission."
            // name: "NotAllowedError"
            // reason: "autoplayDisabled"
        });

        videoElement.addEventListener('play', () => {
            // remove play UI
        });


        Object.defineProperty(HTMLMediaElement.prototype, 'playing', {
            get: function() {
                return !!(this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2);
            }
        });

        $('body').on('click touchstart', function() {
            const videoElement = document.getElementById('videoback');
            if (videoElement.playing) {
                // video is already playing so do nothing
            } else {
                // video is not playing
                // so play video now
                videoElement.play();
            }
        });
    }

    $('#wt-cli-accept-all-btn').click(function(){
        $('#cookie-law-info-bar').addClass('hide');
    })

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
    
    $('form.wpcf7-form').on('submit',function() {
        
        let form = $(this);
        let button = form.find('input[type=submit]');
        console.log(button)
        button.attr("disabled", true);
    })

    document.addEventListener( 'wpcf7submit', function( ) {
        console.log('wpcf7submit')

        var button = $('.wpcf7-submit[disabled]');

        button.prop('disabled', false);

      }, false );



}(jQuery));	