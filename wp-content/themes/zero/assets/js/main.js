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

        var slider = new Swiper('.item-page__gallery-block', {
            slidesPerView: 'auto',
            spaceBetween: 0,
            slideToClickedSlide: true,
            centeredSlides: true,
            watchSlidesProgress: true,
            preloadImages: false,
            lazy: true,
            pagination: {
                el: '.swiper-pagination'
            }
    
        });

        slider.on('slideChange', function () {
            let pagiation = $('.item-page__gallery-block .swiper-pagination ');

            if(pagiation.hasClass('swiper-pagination_white')){
                pagiation.removeClass('swiper-pagination_white');
            }
            
            setTimeout(function () {
                if($('.video-slide').hasClass('swiper-slide-active')){
                    pagiation.addClass('swiper-pagination_white');
                }
            }, 0);

            
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
            $('#cookie-law-info-bar, #subscrube-modal, .item-page .item-page__right-block').addClass('scroll');
            $("#mastheadx").addClass('smaller');
        } else {
            $('#cookie-law-info-bar, #subscrube-modal, .item-page .item-page__right-block').removeClass('scroll');
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
    
    $('form.wpcf7-form').on('submit',function() {
        
        let form = $(this);
        let button = form.find('input[type=submit]');

        button.attr("disabled", true);
    })

    document.addEventListener( 'wpcf7submit', function( ) {

        let button = $('.wpcf7-submit[disabled]');

        button.prop('disabled', false);

      }, false );

    $('.subscrube-modal__close-btn').on('click', function(){
        $('#subscrube-modal').addClass('hide');
    })

    setTimeout(function(){
        $('#subscrube-modal').removeClass('hide');
    }, 180000)

    $('.works-item__like .sl-button').click(function(){
        
        $('.works-item_simple.nonuath').removeClass('nonuath');
    })

    $('#authWrapperStage2 .works-auth_close').click(() => {
        $('.works-item_simple.nonuath').removeClass('nonuath');
    })

    $('.descr-block__read-more').click(() => {
        $('.vote-block__description_short, .descr-block__read-more').addClass('hidden');
        $('.vote-block__description_full, .descr-block__read-less').removeClass('hidden');

    })

    $('.descr-block__read-less').click(() => {
        $('.vote-block__description_short, .descr-block__read-more').removeClass('hidden');
        $('.vote-block__description_full, .descr-block__read-less').addClass('hidden');

    })

    $('#copyBtn').click(function(){
        var $tmp = $("<input>");
        $("body").append($tmp);

        $tmp.val($(this).attr('data-copy')).select();

        document.execCommand("copy");

        $('.modal__form-submit').addClass('show');

        setTimeout(function () {
            $(".modal__form-submit").removeClass('show');
        }, 4000);
        
        $tmp.remove();
    })

 
}(jQuery));	