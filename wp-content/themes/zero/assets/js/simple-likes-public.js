(function ($) {
    'use strict';
    $(document).on('click', '.works-auth_close', function () {
        $(this).parents('.works-item').removeClass('nonuath');
    });

    $(document).on('click', '.sl-button', function () {
        var button = $(this);
        var post_id = button.attr('data-post-id');
        var security = button.attr('data-nonce');
        var iscomment = button.attr('data-iscomment');
        var allbuttons;
        if (iscomment === '1') { /* Comments can have same id */
            allbuttons = $('.sl-comment-button-' + post_id);
        } else {
            allbuttons = $('.sl-button-' + post_id);
        }
        var loader = allbuttons.next('#sl-loader');
        
        if (post_id !== '') {
            $.ajax({
                type: 'POST',
                url: simpleLikes.ajaxurl,
                data: {
                    action: 'process_simple_like',
                    post_id: post_id,
                    nonce: security,
                    is_comment: iscomment,
                },
                beforeSend: function () {
                    $(`.sl-button-${post_id} span`).addClass('hidden');
                    loader.html('&nbsp;<div class="loader">Loading...</div>');
                },
                success: function (response) {
                    var icon = response.icon;
                    var count = response.count;
                    allbuttons.html(icon + count);
                    if (response.status === 'unauth') {
                        $('.works-item[data-postid="'+post_id+'"]').addClass('nonuath');
                        var unlike_text = simpleLikes.unlike;
                        allbuttons.prop('title', unlike_text);
                        allbuttons.addClass('liked');
                    } else {
                        if (response.status === 'unliked') {
                            var like_text = simpleLikes.like;
                            allbuttons.prop('title', like_text);
                            allbuttons.removeClass('liked');
                        } else {
                            var unlike_text = simpleLikes.unlike;
                            allbuttons.prop('title', unlike_text);
                          
                            allbuttons.addClass('liked');
                        }
                    }
                    loader.empty();
                    // $(`${allbuttons} .sl-icon`).removeClass('hidden');
                }
            });

        }
        return false;
    });
})(jQuery);