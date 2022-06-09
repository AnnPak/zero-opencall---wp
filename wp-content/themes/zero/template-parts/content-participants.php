<div class="works-item" data-postid="<?= get_the_ID()?>">
    <div class="works-auth_block">
        <div class="works-auth_wrapper">
            <div class="works-auth_close">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/close.svg">
            </div>
            <div class="works-auth_text">Just a quick move to leave a vote</div>
            <div class="works-auth_buttons-auth">
                <a rel="nofollow" href="/wp-json/wslu-social-login/type/google" class="g-button"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/google.svg"> Sign in with GOOGLE </a>
                <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/facebook.png"> Sign in with FACEBOOK </a>
               
            </div>
        </div>
    </div>
    <div class="work-item__wrapper">
        <div class="works-item__img">
            <img src="<?= get_the_post_thumbnail_url(); ?>">
        </div>
        <div class="works-item__info-wrapper">
            <div class="works-item__title-block">
                <div class="works-item__name"><?= get_field('works_author');?></div>
                <div class="works-item__about"><?= get_field('works_name');?></div>
            </div>
            <div class="works-item__like"><? echo get_simple_likes_button(get_the_ID()); ?></div>
        </div>
    </div>
</div>