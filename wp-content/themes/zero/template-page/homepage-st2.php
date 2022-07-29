<?php

/**
 * Template Name: Главная, Stage 2 (template-page/homepage-st2.php)
 */

get_header(); ?>

<section class="homepage__header homepage__header_st2">
    <div class="container-fluid h-100">
        <div class="row border_row h-100">
            <div class="col-lg-6 right-part">
                <div class="homepage__header-banner">
                    <div class="header-banner__title sticky-top">
                        <h1 class="title_ui">
                            Open call is a competition for digital fashion designers developed by ZERO10 to support emerging talents and a growing community of creators. Upvote your favorites now and choose what to wear in AR next!
                        </h1>

                    </div>
                    <div class="header-banner__bottom">
                        <div class="header-banner__bottom-items">
                            <span>191 items</span>
                            <span>3 winners</span>
                            <span>6 prizes </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 left-part">
                <div class="homepage__header-form">
                    <div class="header-form__head">
                        Voting
                    </div>

                    <div class="works-items items-col-2">
                        <?php
                        $args = array(
                            'posts_per_page'   => -1,
                            'post_type' => 'participants',
                            'orderby' => 'rand',
                            // 'order' => 'rand', // по убыванию (сначала - свежие посты)
                        );

                        $query = new WP_Query($args);
                        $count = 1;
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                get_template_part('template-parts/content', get_post_type());

                                if ($count == 4) :
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="homepage__items homepage__items_st2">
    <div class="container-fluid h-100">
        <div class="row border_row h-100">
            <div class="col-lg-12">
                <div class="homepage__header-form">

                    <div class="works-items items-col-4">
            <?php
                                endif;
                                $count++;

                            endwhile;

                            wp_reset_postdata();
                        else :
                            echo 'Ничего не найдено';
                        endif;
            ?>
            
            <?php $isEvenNum = $count % 2 == 0;?>
            


            <div class="works-item subscribe-item <?=$isEvenNum ? "subscribe-item_even-count" : "" ?>">
                <div class="subscribe-item__top">
                    <div class="subscribe-item__title">
                        SUBSCRIBE
                    </div>
                    <div class="subscribe-item__subtitle">
                        Leave your email here, and you’ll be the first to know about ZERO10’s new competitions.
                    </div>
                </div>

                <div class="subscribe-item__bottom">
                    <?php echo do_shortcode('[contact-form-7 id="63" title="Subscribe html_class="subscribe-form"]'); ?>

                </div>



            </div>

            <?php
            // добавление пустых элементов 

            if ($count % 4 != 0) :
                $t = 1; #остаток от деления
                $n = 0;

                while ($t > 0) :
                    $n++;
                    $t = (($count + $n) % 4);
            ?>

                    <div class="works-item empty-item <?= (!$isEvenNum && $n == 1) ? "first-odd-item" : "" ?> <?= ($isEvenNum && $n == 1) ? "first-even-item" : "" ?>"></div>

            <?php
                endwhile;
            endif;

            ?>

                    <div class="works-item subscribe-item subscribe-item_last <?=$isEvenNum ? "subscribe-item_even-count" : "" ?>">
                        <div class="subscribe-item__top">
                            <div class="subscribe-item__title">
                                SUBSCRIBE
                            </div>
                            <div class="subscribe-item__subtitle">
                                Leave your email here, and you’ll be the first to know about ZERO10’s new competitions.
                            </div>
                        </div>

                        <div class="subscribe-item__bottom">
                            <?php echo do_shortcode('[contact-form-7 id="63" title="Subscribe html_class="subscribe-form"]'); ?>

                        </div>

                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="subscrube-modal" class="subscrube-modal hide">
    <div class="subscrube-modal__close-btn">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.38838 0.882813L24.1168 23.6112L23.6117 24.1163L0.883301 1.38789L1.38838 0.882813Z" fill="black" />
            <path d="M0.883301 23.6112L23.6117 0.882812L24.1168 1.38789L1.38838 24.1163L0.883301 23.6112Z" fill="black" />
            <path d="M1.38838 0.882813L24.1168 23.6112L23.6117 24.1163L0.883301 1.38789L1.38838 0.882813Z" stroke="black" stroke-width="0.5" />
            <path d="M0.883301 23.6112L23.6117 0.882812L24.1168 1.38789L1.38838 24.1163L0.883301 23.6112Z" stroke="black" stroke-width="0.5" />
        </svg>

    </div>
    <div class="subscrube-modal__container">
        <p class=subscrube-modal__title>Leave your email here, and you’ll be the first to know about ZERO10’s new competitions.</p>

        <div class="subscrube-modal__form">
            <?php echo do_shortcode('[contact-form-7 id="63" title="Subscribe html_class="subscribe-form"]'); ?>
        </div>
    </div>
</div>

<div class="modal fade auth-modal" id="authWrapperStage2" aria-hidden="true" aria-labelledby="authWrapperStage2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="works-auth_wrapper">
                <div class="works-auth_close" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.77675 1.76618L48.2336 47.223L47.2235 48.2332L1.7666 2.77633L2.77675 1.76618Z" fill="black"></path>
                        <path d="M1.7666 47.223L47.2235 1.76617L48.2336 2.77633L2.77675 48.2332L1.7666 47.223Z" fill="black"></path>
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
    </div>
</div>


<?php
get_footer(); ?>