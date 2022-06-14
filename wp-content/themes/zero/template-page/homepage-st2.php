<?php

/**
 * Template Name: Главная, Stage 2 (template-page/homepage-st2.php)
 */

get_header(); ?>

<section class="homepage__header homepage__header_st2">
    <div class="container-fluid h-100">
        <div class="row border_row h-100">
            <div class="col-lg-6">
                <div class="homepage__header-banner">
                    <div class="header-banner__title">
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
            <div class="col-lg-6">
                <div class="homepage__header-form">
                    <div class="header-form__head">
                        PARTICIPANTS
                    </div>
                    <div class="header-form_body">
                        <div class="works-items items-col-2">
                            <?php
                            $args = array(
                                'post_type' => 'participants',
                                'orderby' => 'menu_order', 
                                'order' => 'DESC', // по убыванию (сначала - свежие посты)
                            );

                            $query = new WP_Query($args);
                            $count = 1;
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    get_template_part('template-parts/content', get_post_type());
                                    
                                    if($count == 4):
                                    ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </section>

                                        <section class="homepage__items">
                                            <div class="container-fluid h-100">
                                                <div class="row border_row h-100">
                                                    <div class="col-lg-12">
                                                        <div class="homepage__header-form">
                                                            <div class="header-form_body">
                                                                <div class="works-items items-col-4">
                                        <?
                                    endif;

                                    $count++;
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


<?php
get_footer();
