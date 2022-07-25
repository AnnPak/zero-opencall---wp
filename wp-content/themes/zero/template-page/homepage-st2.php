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
                        <h1 class="title_ui"> Open call is a competition for creators and digital fashion designers developed to support emerging talents and help them scale their visibility among the community and showcase their works in AR. </h1>

                    </div>
                    <div class="header-banner__bottom">
                        <div class="header-banner__bottom-items">
                            <span>1 winner per week</span>
                            <span>4 prizes </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 left-part">
                <div class="homepage__header-form">
                    <div class="header-form__head">
                        PARTICIPANTS
                    </div>

                    <div class="works-items items-col-2">
                        <?php
                        $args = array(
                            'posts_per_page'   => -1,
                            'post_type' => 'participants',
                            'orderby' => 'menu_order',
                            'order' => 'DESC', // по убыванию (сначала - свежие посты)
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

            <div class="works-item subscribe-item">
                <div class="subscribe-item__top">
                    <div class="subscribe-item__title">
                        SUBSCRIBE
                    </div>
                    <div class="subscribe-item__subtitle">
                        ?Stay tune about the future of AR fashion. Subscribe?
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

                    <div class="works-item empty-item <?= ($count % 2 != 0 && $n == 1) ? "first-odd-item" : "" ?>"></div>

            <?php
                endwhile;
            endif;

            ?>


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
        <p class=subscrube-modal__title>?Stay tune about the future of AR fashion. Subscribe? ?Stay tune about future.</p>

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
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2745 11.9999V16.7999H22.0866C21.7718 18.8579 19.7253 22.8399 14.2745 22.8399C9.5715 22.8399 5.73431 18.8819 5.73431 13.9999C5.73431 9.11988 9.5715 5.15988 14.2745 5.15988C16.9507 5.15988 18.7414 6.31988 19.7646 7.31988L23.5034 3.65988C21.1027 1.37988 17.9936 -0.00012207 14.2745 -0.00012207C6.65917 -0.00012207 0.5 6.25988 0.5 13.9999C0.5 21.7399 6.65917 27.9999 14.2745 27.9999C22.2244 27.9999 27.5 22.3199 27.5 14.3199C27.5 13.3999 27.3996 12.6999 27.2816 11.9999H14.2745Z" fill="white"/>
                        </svg>
                        
                        Sign in with GOOGLE 
                    </a>
                    <a rel="nofollow" href="/wp-json/wslu-social-login/type/facebook" class="f-button auth-btn">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <title>facebook</title>
                            <g>
                                <path d="M481,258.1c0-124.3-100.8-225-225-225c-124.3,0-225,100.7-225,225c0,112.3,82.3,205.4,189.8,222.2V323.1h-57.1v-65h57.1
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
    </div>
</div>


<?php
get_footer(); ?>