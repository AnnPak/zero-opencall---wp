
jQuery(document).ready(function ($) {

    $('.header-form_body input[name="nickname"]').click(() => {
        ga('send', 'event', 'signup_form_name_clicked', 'click');
    })

    $('.header-form_body input[name="email"]').click(() => {
        ga('send', 'event', 'signup_form_email_clicked', 'click');
    })

    $('.header-form_body input[name="acceptance-5"]').click(() => {
        ga('send', 'event', 'signup_form_checkbox_checked', 'click');
    })

    document.addEventListener('wpcf7mailsent', function (event) {

        if ('35' == event.detail.contactFormId) {
            ga('send', 'event', 'signup_form_submitted', 'submit');
        }

    }, false);
    document.addEventListener('wpcf7invalid', function (event) {

        if ('35' == event.detail.contactFormId) {
            ga('send', 'event', 'signup_form_failed', 'submit');
        }

    }, false);

    $('.sl-button').click(function(){
        let currentBtn = $(this);
        let parentWrap = currentBtn.closest('.works-item_simple');
        
        setTimeout(
            function(){
                if($(parentWrap).hasClass('nonuath')){
                    ga('send', 'event', 'vote_initiated', 'click');
                }else{
                    if(currentBtn.hasClass('liked')){
                        ga('send', 'event', 'voted_for_item', 'click');
                    }else{
                        ga('send', 'event', 'vote_removed', 'click');
                    }
                }
            }, 1000
        )
        
        
    })



})




