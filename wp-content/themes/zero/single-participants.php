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
                                <span class="vote-block__share__title">Share</span>

                                <div class="vote-block__share__links">
                                    <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/instagram-share.svg"></a>
                                    <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/facebook-share.svg"></a>
                                    <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/twitter-share.svg"></a>
                                    <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon/discord-share.svg"></a>
                                </div>

                            </div>

                        </div>

                        <div class="item-page__descr-block">
                            <div class="vote-block__description">
                                <p><?= get_field('works_descriptions'); ?></p>
                                <div class="descr-block__read-more">+ read more</div>

                                <?
                                // $str = get_field('works_descriptions');;
                                // $str = strip_tags($str);

                                // if (strlen($str) > 180) {

                                //     $textPrev = substr($str, 0, 180);
                                //     $textPrev = rtrim($textPrev, "!,.-");
                                //     $textPrev = substr($textPrev, 0, strrpos($textPrev, ' '));
                                //     $textNext = substr($str, strlen($textPrev));
                                ?>

                                <!-- <div class="review-text">
                                        <p class="text-prev"><? $textPrev ?></p><p class="text-next"><? $textNext ?></p>
                                        <a href="#" class="text-more descr-block__read-more">+ read more</a>
                                    </div> -->

                                <?
                                // } else {
                                // 
                                ?>

                                <!-- <div class="review-text"><?= $str ?></div> -->

                                <?
                                // }
                                // 
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 gallery-wrapper">

                        <a href="#" class="all-works__btn">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="6" height="6" fill="black" />
                                <rect y="8" width="6" height="6" fill="black" />
                                <rect y="16" width="6" height="6" fill="black" />
                                <rect x="8" width="6" height="6" fill="black" />
                                <rect x="8" y="8" width="6" height="6" fill="black" />
                                <rect x="8" y="16" width="6" height="6" fill="black" />
                                <rect x="16" width="6" height="6" fill="black" />
                                <rect x="16" y="8" width="6" height="6" fill="black" />
                                <rect x="16" y="16" width="6" height="6" fill="black" />
                            </svg>

                            All works
                        </a>

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
                        <div class="gallery-thumbs">

                            <? while (the_repeater_field('works_photo-group')) : ?>
                                <div class="product__image-wrap">
                                    <div class="product__image-thumb" style="background-image:url(<?= get_sub_field('works_photo') ?>)"></div>
                                </div>
                            <? endwhile; ?>
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
