<?php if ($args['isWinner']) : ?>

    <div class="works-item" data-postid="<?= get_the_ID() ?>">
        <div class="works-auth_block">
            <div class="works-auth_wrapper">
                <div class="works-auth_close">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.77675 1.76618L48.2336 47.223L47.2235 48.2332L1.7666 2.77633L2.77675 1.76618Z" fill="black" />
                        <path d="M1.7666 47.223L47.2235 1.76617L48.2336 2.77633L2.77675 48.2332L1.7666 47.223Z" fill="black" />
                    </svg>
                </div>
                <div class="works-auth_text">Just a quick move to leave a vote</div>
                <div class="works-auth_buttons-auth">
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/google" class="g-button"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/google.svg"> Sign in with GOOGLE </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/facebook.png"> Sign in with FACEBOOK </a>

                </div>
            </div>
        </div>

        <a href="<?= get_permalink() ?>" class="work-item__wrapper">
            <div class="works-item__img">
                <img src="<?= get_the_post_thumbnail_url(); ?>">
            </div>
            <div class="works-item__info-wrapper">
                <div class="works-item__title-block">
                    <div class="works-item__week">Week #1</div>

                    <div class="works-item__name"><?= get_field('works_author'); ?></div>
                    <div class="works-item__about"><?= get_field('works_name'); ?></div>
                </div>
                <div class="works-item__like">
                    <a href="#" class="winner-item__btn">Try on in the app</a>
                </div>
            </div>
        </a>



    </div>

<?php else : ?>

    <div class="works-item works-item_simple" data-postid="<?= get_the_ID() ?>">
        <div class="works-auth_block">
            <div class="works-auth_wrapper">
                <div class="works-auth_close">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.77675 1.76618L48.2336 47.223L47.2235 48.2332L1.7666 2.77633L2.77675 1.76618Z" fill="black" />
                        <path d="M1.7666 47.223L47.2235 1.76617L48.2336 2.77633L2.77675 48.2332L1.7666 47.223Z" fill="black" />
                    </svg>
                </div>
                <div class="works-auth_text">Just a quick move to leave a vote</div>
                <div class="works-auth_buttons-auth">
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/google" class="g-button"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/google.svg"> Sign in with GOOGLE </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/facebook.png"> Sign in with FACEBOOK </a>

                </div>
            </div>
        </div>

        <a href="<?= get_permalink() ?>" class="work-item__wrapper">
            <div class="works-item__img">
                <img src="<?= get_the_post_thumbnail_url(); ?>">
            </div>
            <div class="works-item__info-wrapper">
                <div class="works-item__title-block">
                    <div class="works-item__name"><?= get_field('works_author'); ?></div>
                    <div class="works-item__about"><?= get_field('works_name'); ?></div>
                </div>
                
                <?php if ($args['stageNum'] != 3) : ?>
                    <div class="works-item__like"><?php echo get_simple_likes_button(get_the_ID()); ?></div>
                <?endif;?>
            </div>
        </a>

    </div>


<?php endif; ?>