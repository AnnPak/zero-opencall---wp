<?php

/**
 * Template Name: Главная, Stage 3 (template-page/homepage-st3.php)
 */

get_header(); ?>

<section class="homepage__header homepage__header_st3">
    <div class="container-fluid h-100">
        <div class="row border_row h-100">
            <div class="col-lg-6">
                <div class="homepage__header-banner">
                    <div class="header-banner__title">
                        <h1 class="title_ui"> Open call is a competition for creators and digital fashion designers developed to support emerging talents and help them scale their visibility among the community and showcase their works in AR. </h1>

                    </div>
                    <div class="header-banner__bottom">
                        <div class="header-banner__bottom-items">
                            <span>42 participants</span>
                            <span>1 winner per week</span>
                            <span>4 prizes </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div>
                    <div class="header-form__head">
                        Winners
                    </div>
                    <div class="header-form_body">
                        <div class="works-items items-winner">
                            <?php
                            $args = array(
                                'post_type' => 'participants',
                                'orderby' => 'menu_order',
                                'order' => 'DESC', // по убыванию (сначала - свежие посты)
                            );

                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    if (get_field('works_is-winner')) {

                                        $params = ['isWinner' => true];
                                        get_template_part('template-parts/content', get_post_type(), $params);
                                        // hm_get_template_part( 'template_path', [ 'option' => 'value' ] );
                                    }
                                endwhile;


                                wp_reset_postdata();
                            else :
                                echo 'Ничего не найдено';
                            endif;
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="homepage__header homepage__header_st3 participants-section">
    <div class="container-fluid h-100">
        <div class="row border_row h-100">
            <div class="col-lg-12">
                <div class="participants-block">
                    <div class="header-form__head">
                        PARTICIPANTS
                    </div>
                    <div class="header-form_body">
                        <div class="works-items items-col-4">
                            <?php
                            $args = array(
                                'post_type' => 'participants',
                                'orderby' => 'menu_order',
                                'order' => 'DESC', // по убыванию (сначала - свежие посты)
                            );

                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    $params = ['stageNum' => 3];
                                    get_template_part('template-parts/content', get_post_type(), $params);
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
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
