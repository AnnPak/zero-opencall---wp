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
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/google" class="g-button auth-btn">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2745 11.9999V16.7999H22.0866C21.7718 18.8579 19.7253 22.8399 14.2745 22.8399C9.5715 22.8399 5.73431 18.8819 5.73431 13.9999C5.73431 9.11988 9.5715 5.15988 14.2745 5.15988C16.9507 5.15988 18.7414 6.31988 19.7646 7.31988L23.5034 3.65988C21.1027 1.37988 17.9936 -0.00012207 14.2745 -0.00012207C6.65917 -0.00012207 0.5 6.25988 0.5 13.9999C0.5 21.7399 6.65917 27.9999 14.2745 27.9999C22.2244 27.9999 27.5 22.3199 27.5 14.3199C27.5 13.3999 27.3996 12.6999 27.2816 11.9999H14.2745Z" fill="white" />
                        </svg>

                        Sign in with GOOGLE
                    </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button auth-btn">

                        <svg width="28" height="28" viewBox="0 0 450 448" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M450 225.1C450 100.8 349.2 0.0999756 225 0.0999756C100.7 0.0999756 0 100.8 0 225.1C0 337.4 82.3 430.5 189.8 447.3V290.1H132.7V225.1H189.8V175.5C189.8 119.1 223.3 88 274.8 88C299.4 88 325.2 92.4 325.2 92.4V147.8H296.8C268.9 147.8 260.2 165.2 260.2 183V225.2H322.6L312.6 290.2H260.2V447.4C367.7 430.4 450 337.3 450 225.1Z" fill="white" />
                        </svg>
                        Sign in with FACEBOOK
                    </a>
                </div>
            </div>
        </div>

        <a href="<?= get_permalink() ?>" class="work-item__wrapper">
            <div class="works-item__img">
                <img src="<?= get_the_post_thumbnail_url($size = 'medium'); ?>">
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
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/google" class="g-button auth-btn">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2745 11.9999V16.7999H22.0866C21.7718 18.8579 19.7253 22.8399 14.2745 22.8399C9.5715 22.8399 5.73431 18.8819 5.73431 13.9999C5.73431 9.11988 9.5715 5.15988 14.2745 5.15988C16.9507 5.15988 18.7414 6.31988 19.7646 7.31988L23.5034 3.65988C21.1027 1.37988 17.9936 -0.00012207 14.2745 -0.00012207C6.65917 -0.00012207 0.5 6.25988 0.5 13.9999C0.5 21.7399 6.65917 27.9999 14.2745 27.9999C22.2244 27.9999 27.5 22.3199 27.5 14.3199C27.5 13.3999 27.3996 12.6999 27.2816 11.9999H14.2745Z" fill="white" />
                        </svg>

                        Sign in with GOOGLE
                    </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button auth-btn">

                        <svg width="28" height="28" viewBox="0 0 450 448" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M450 225.1C450 100.8 349.2 0.0999756 225 0.0999756C100.7 0.0999756 0 100.8 0 225.1C0 337.4 82.3 430.5 189.8 447.3V290.1H132.7V225.1H189.8V175.5C189.8 119.1 223.3 88 274.8 88C299.4 88 325.2 92.4 325.2 92.4V147.8H296.8C268.9 147.8 260.2 165.2 260.2 183V225.2H322.6L312.6 290.2H260.2V447.4C367.7 430.4 450 337.3 450 225.1Z" fill="white" />
                        </svg>

                        Sign in with FACEBOOK
                    </a>
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
                <?php endif; ?>
            </div>
        </a>

    </div>


<?php endif; ?>