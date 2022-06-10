<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpbstarter
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

    <main id="main" class="site-main">
        <section class="item-page">
            <div class="container-fluid">
                <div class="row border_row">
                    <div class="col-lg-6">
                        <div class="item-page__title-block">
                            <div class="item-page__title"><?= get_field('works_author'); ?></div>
                            <div class="item-page__title-sub"><span class="title-sub__category">Item </span><span class="title-sub__name"><?= get_field('works_name'); ?></span></div>
                        </div>
                        <div class="item-page__vote-block">
                            <div class="vote-block__vote-button">
                                <?php echo get_simple_likes_button(get_the_ID()); ?>
                            </div>
                            <div class="vote-block__share">
                                <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/instagram-share.svg"></a>
                                <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/facebook-share.svg"></a>
                                <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/twitter-share.svg"></a>
                                <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/discord-share.svg"></a>
                            </div>
                            <div class="vote-block__description">
                                <p><?= get_field('works_descriptions'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="swiper-container gallery-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                <div class="product__image" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"></div>
                                
                                </div>
                                <? while (the_repeater_field('works_photo-group')) : ?>
                                    <div class="swiper-slide">
                                        <div class="product__image" style="background-image:url(<?= get_sub_field('works_photo') ?>)"></div>
                                    </div>
                                <? endwhile; ?>
                            </div>
                   
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                            <div class="swiper-slide d-none">
                                <div class="product__image" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"></div>
                                </div>
                                <? while (the_repeater_field('works_photo-group')) : ?>
                                    <div class="swiper-slide">
                                        <div class="product__image-thumb" style="background-image:url(<?= get_sub_field('works_photo') ?>)"></div>
                                    </div>
                                <? endwhile; ?>
                            </div>
                        </div>



                        <div class="slider">

                        </div>
                    </div>
                </div>
            </div>
        </section>






    </main><!-- #main -->


<?php endwhile; // End of the loop. 
?>

<?php
get_footer();
