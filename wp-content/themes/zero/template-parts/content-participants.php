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
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2745 11.9999V16.7999H22.0866C21.7718 18.8579 19.7253 22.8399 14.2745 22.8399C9.5715 22.8399 5.73431 18.8819 5.73431 13.9999C5.73431 9.11988 9.5715 5.15988 14.2745 5.15988C16.9507 5.15988 18.7414 6.31988 19.7646 7.31988L23.5034 3.65988C21.1027 1.37988 17.9936 -0.00012207 14.2745 -0.00012207C6.65917 -0.00012207 0.5 6.25988 0.5 13.9999C0.5 21.7399 6.65917 27.9999 14.2745 27.9999C22.2244 27.9999 27.5 22.3199 27.5 14.3199C27.5 13.3999 27.3996 12.6999 27.2816 11.9999H14.2745Z" fill="white"/>
                        </svg>
                        
                        Sign in with GOOGLE 
                    </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button auth-btn">
                    <?xml version="1.0" encoding="utf-8"?>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg width="33" height="33" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <title>facebook</title>
                                <g>
                                    <path fill="white" d="M481,258.1c0-124.3-100.8-225-225-225c-124.3,0-225,100.7-225,225c0,112.3,82.3,205.4,189.8,222.2V323.1h-57.1v-65h57.1
                                        v-49.6c0-56.4,33.5-87.5,85-87.5c24.6,0,50.4,4.4,50.4,4.4v55.4h-28.4c-27.9,0-36.6,17.4-36.6,35.2v42.2h62.4l-10,65h-52.4v157.2
                                        C398.7,463.4,481,370.3,481,258.1L481,258.1z"/>
                                </g>
                            </g>
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
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2745 11.9999V16.7999H22.0866C21.7718 18.8579 19.7253 22.8399 14.2745 22.8399C9.5715 22.8399 5.73431 18.8819 5.73431 13.9999C5.73431 9.11988 9.5715 5.15988 14.2745 5.15988C16.9507 5.15988 18.7414 6.31988 19.7646 7.31988L23.5034 3.65988C21.1027 1.37988 17.9936 -0.00012207 14.2745 -0.00012207C6.65917 -0.00012207 0.5 6.25988 0.5 13.9999C0.5 21.7399 6.65917 27.9999 14.2745 27.9999C22.2244 27.9999 27.5 22.3199 27.5 14.3199C27.5 13.3999 27.3996 12.6999 27.2816 11.9999H14.2745Z" fill="white"/>
                        </svg>
                        
                        Sign in with GOOGLE 
                    </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button auth-btn">
                    <?xml version="1.0" encoding="utf-8"?>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg width="33" height="33" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <title>facebook</title>
                                <g>
                                    <path fill="white" d="M481,258.1c0-124.3-100.8-225-225-225c-124.3,0-225,100.7-225,225c0,112.3,82.3,205.4,189.8,222.2V323.1h-57.1v-65h57.1
                                        v-49.6c0-56.4,33.5-87.5,85-87.5c24.6,0,50.4,4.4,50.4,4.4v55.4h-28.4c-27.9,0-36.6,17.4-36.6,35.2v42.2h62.4l-10,65h-52.4v157.2
                                        C398.7,463.4,481,370.3,481,258.1L481,258.1z"/>
                                </g>
                            </g>
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
                <?php endif;?>
            </div>
        </a>

    </div>


<?php endif; ?>