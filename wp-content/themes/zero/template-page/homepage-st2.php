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

                            if ($count % 4 != 0):
                                $t = 1; #остаток от деления
                                $n = 0;

                                while($t > 0):
                                    $n++;
                                    $t = (($count + $n) % 4); 
                                ?>
                                    
                                    <div class="works-item empty-item <?= ( $count % 2 != 0 && $n == 1) ? "first-odd-item" : "" ?>"></div>

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


<?php
get_footer();?>

<section class="subscribe-section col-lg-6">
    <div class="subscribe-section__title">SUBSCRIBE</div>  
    
    <div class="subscribe-section__form-container">
        <div class="subscribe-section__subtitle">?Stay tune about the future of AR fashion. Subscribe?</div>  
        <?php echo do_shortcode('[contact-form-7 id="63" title="Subscribe html_class="subscribe-form"]'); ?>            
    </div>

    <div class="footer__bottom-contact">
        <div class="footer__bottom-social">
            <a href="https://www.instagram.com/zero10.app/">INSTAGRAM</a>
            <a href="https://www.tiktok.com/@zero10.app">TIKTOK</a>
            <a href="https://discord.com/invite/zero10?utm_source=stories&utm_medium=link&utm_campaign=discord">DISCORD</a>
            <a href="https://twitter.com/zero10_app">TWITTER</a>
        </div>
        <div class="footer__bottom-contact_mobile">
            <a href="mailto:opencall@zero10.app">opencall@zero10.app</a>
            <a href="/privacy-legal">Privacy & Legal</a>
            <a href="/cookie-policy">Cookie policy</a>
            <a href="/terms-conditions">Terms & Conditions</a>
        </div>
    </div>


</section>
