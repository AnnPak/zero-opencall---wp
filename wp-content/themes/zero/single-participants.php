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

<?php
$actual_link = "https" . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<?php while (have_posts()) : the_post(); ?>

    <main id="main" class="site-main">
        <section class="item-page">
            <div class="container-fluid">
                <div class="row border_row">
                    <div class="col-lg-6 item-page__right-block d-none d-lg-block">

                        <div class="item-page__title-block">
                            <div class="item-page__title"><?= get_field('works_author'); ?></div>

                            <div class="item-page__title-sub-wrap">
                                <div class="item-page__title-sub">
                                    <span class="title-sub__name"><?= get_field('works_name'); ?></span>
                                </div>
                                <!-- <?php if (get_field('works_is-winner')) : ?>
                                    <span class="title-sub__winner">The Winner of Week 1 </span>
                                <?php endif ?> -->
                            </div>


                        </div>
                        <div class="item-page__vote-block">
                            <div class="vote-block__vote-button">
                                <!-- <?php if (get_field('works_is-winner')) : ?>
                                    <span class="sl-wrapper stage-3 item-page-winner__btn">
                                        <a href="#" class="sl-button sl-button-43 stage-3__app-btn">TRY ON IN THE APP </a>
                                    </span>
                                <?php else : ?>
                                    <span class="sl-wrapper stage-3">
                                        <a href="#" class="sl-button sl-button-43 stage-3__app-btn">VOTING IS OVER </a>
                                    </span>
                                <?php endif ?> -->
                                <?php
                                echo get_simple_likes_button(get_the_ID());
                                ?>
                            </div>

                            <div class="vote-block__share">
                                <span class="vote-block__share__title">Share</span>

                                <div class="vote-block__share__links">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>" class="vote-block__share__link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="4" />
                                            <path d="M20 3C10.6117 3 3 10.6117 3 20C3 29.3882 10.6117 37 20 37C29.3882 37 37 29.3882 37 20C37 10.6117 29.3882 3 20 3ZM24.25 14.3333H22.3375C21.5753 14.3333 21.4167 14.6464 21.4167 15.4355V17.1667H24.25L23.9539 20H21.4167V29.9167H17.1667V20H14.3333V17.1667H17.1667V13.897C17.1667 11.3909 18.4856 10.0833 21.4577 10.0833H24.25V14.3333Z" fill="black" />
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?= $actual_link ?>" class="vote-block__share__link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="4" />
                                            <path d="M20 3C10.6117 3 3 10.6117 3 20C3 29.3882 10.6117 37 20 37C29.3882 37 37 29.3882 37 20C37 10.6117 29.3882 3 20 3ZM28.5935 16.6638C28.8527 22.3871 24.5843 28.7677 17.0278 28.7677C14.73 28.7677 12.5922 28.0934 10.7917 26.9388C12.9507 27.1938 15.1054 26.5932 16.8153 25.2544C15.036 25.2218 13.5329 24.0446 13.013 22.4282C13.6519 22.55 14.2809 22.5146 14.8518 22.3587C12.8954 21.9649 11.5439 20.2026 11.5878 18.317C12.1375 18.6216 12.7637 18.8043 13.4309 18.8256C11.619 17.6143 11.1062 15.2216 12.1715 13.3927C14.1775 15.8548 17.1766 17.4741 20.5582 17.6441C19.9646 15.0997 21.8955 12.6475 24.5234 12.6475C25.6922 12.6475 26.7504 13.1419 27.4927 13.9324C28.4192 13.7511 29.2919 13.4111 30.0768 12.945C29.7722 13.8956 29.1276 14.6917 28.2875 15.1961C29.1106 15.0969 29.8954 14.8787 30.6236 14.5543C30.0796 15.3732 29.3911 16.09 28.5935 16.6638V16.6638Z" fill="black" />
                                        </svg>

                                    </a>
                                    <div id="copyBtn" data-copy="<?=$actual_link ?>" class="vote-block__share__link copy-link" >
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="20" cy="20" r="18" fill="black" stroke="black" stroke-width="4" />
                                            <path d="M15.6408 17.5387C15.97 17.2094 16.3353 16.9379 16.7238 16.7234C18.8892 15.5302 21.6659 16.1647 23.058 18.2751L21.3734 19.9588C20.8904 18.8571 19.691 18.2301 18.4977 18.4971C18.0484 18.5976 17.6216 18.8219 17.2729 19.1706L14.0446 22.4C13.0643 23.3802 13.0643 24.9747 14.0446 25.9549C15.025 26.9351 16.6196 26.9351 17.5999 25.9549L18.5952 24.9597C19.5005 25.3189 20.4711 25.4622 21.4296 25.3909L19.2327 27.5876C17.3494 29.4708 14.2959 29.4708 12.4125 27.5876C10.5292 25.7044 10.5292 22.6513 12.4125 20.7681L15.6408 17.5387ZM20.7681 12.4118L18.5712 14.6085C19.529 14.5365 20.5003 14.6805 21.4056 15.039L22.4002 14.0445C23.3805 13.0643 24.9751 13.0643 25.9555 14.0445C26.9358 15.0247 26.9358 16.6192 25.9555 17.5994L22.7265 20.8281C21.7432 21.8113 20.1463 21.803 19.1712 20.8281C18.944 20.6008 18.7482 20.3181 18.626 20.0398L16.9413 21.7235C17.1184 21.992 17.3021 22.2238 17.5384 22.46C18.1474 23.069 18.923 23.5227 19.8155 23.738C20.9721 24.0162 22.2112 23.8625 23.2755 23.2752C23.664 23.0607 24.0293 22.7893 24.3586 22.46L27.5868 19.2314C29.4709 17.3482 29.4709 14.295 27.5876 12.4118C25.7042 10.5294 22.6515 10.5294 20.7681 12.4118Z" fill="white" />
                                        </svg>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="item-page__descr-block">
                            <div class="vote-block__description">
                                <?php
                                $descr = get_field('works_descriptions');
                                if (mb_strlen($descr) > 280) :
                                    $text = substr($descr, 0, 280) . "..."; ?>

                                    <div class="vote-block__description_short"><?= $text ?></div>

                                    <div class="vote-block__description_full hidden"><?= $descr ?></div>


                                    <div class="descr-block__read-more">+ Read more</div>
                                    <div class="descr-block__read-less hidden">- Read less</div>

                                <?php else : ?>
                                    <?= get_field('works_descriptions'); ?>
                                <?php endif; ?>


                            </div>
                        </div>



                    </div>
                    <div class="offset-6 col-lg-6 gallery-wrapper d-none d-lg-block">
                        <div class="msc-content2">

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
                                        
                                        <img class="product__image" src="<?= get_the_post_thumbnail_url(); ?>"/>

                                    </div>
                                    <?php while (the_repeater_field('works_photo-group')) : ?>
                                        <div class="swiper-slide">
                                            <img class="product__image" src="<?= get_sub_field('works_photo');?>"/>
                                        </div>
                                    <?php endwhile; ?>
                                </div>

                            </div>
                            <div>

                                <?php while (the_repeater_field('works_photo-group')) : ?>
                                    <img class="product__image-thumb" src="<?= get_sub_field('works_photo') ?>"></img>
                                <?php endwhile; ?>
                            </div>

                            <div class="item-page__video-wrap">

                                <?php while (the_repeater_field('works_video-group')) : ?>
                                    <video autoplay="" muted="" loop="" playsinline="" id="videoback">
                                        <source src="<?= get_sub_field('works_video') ?>" type="video/mp4">
                                    </video>

                                <?php endwhile; ?>
                            </div>

                        </div>


                    </div>



                    <div class="col-lg-6 d-block d-lg-none item-page__mobile-block">

                        <div class="item-page__title-block">
                            <div class="item-page__title"><?= get_field('works_author'); ?></div>

                            <div class="item-page__title-sub-wrap">
                                <div class="item-page__title-sub">
                                    <span class="title-sub__name"><?= get_field('works_name'); ?></span>
                                </div>
                                <!-- <?php if (get_field('works_is-winner')) : ?>
                                    <span class="title-sub__winner">The Winner of Week 1 </span>
                                <?php endif ?> -->
                            </div>


                        </div>

                        <div class="item-page__gallery-block">
                            <div class="swiper-slide">
                                <img src="<?= get_the_post_thumbnail_url(); ?>" class=""></img>

                            </div>
                        </div>

                        <div class="item-page__vote-block">
                            <div class="vote-block__vote-button">
                                <!-- <?php if (get_field('works_is-winner')) : ?>
                                    <span class="sl-wrapper stage-3 item-page-winner__btn">
                                        <a href="#" class="sl-button sl-button-43 stage-3__app-btn">TRY ON IN THE APP </a>
                                    </span>
                                <?php else : ?>
                                    <span class="sl-wrapper stage-3">
                                        <a href="#" class="sl-button sl-button-43 stage-3__app-btn">VOTING IS OVER </a>
                                    </span>
                                <?php endif ?> -->
                                <?php
                                echo get_simple_likes_button(get_the_ID());
                                ?>
                            </div>

                            <div class="vote-block__share">
                                <span class="vote-block__share__title">Share</span>

                                <div class="vote-block__share__links">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="4" />
                                            <path d="M24.0078 11.9278C22.9623 11.8797 22.6477 11.8712 20 11.8712C17.3522 11.8712 17.0392 11.8811 15.9937 11.9278C13.3034 12.0511 12.0511 13.3247 11.9278 15.9937C11.8811 17.0392 11.8697 17.3522 11.8697 20C11.8697 22.6477 11.8811 22.9608 11.9278 24.0078C12.0511 26.6697 13.2977 27.9503 15.9937 28.0736C17.0377 28.1203 17.3522 28.1317 20 28.1317C22.6492 28.1317 22.9623 28.1217 24.0078 28.0736C26.698 27.9517 27.9489 26.6739 28.0736 24.0078C28.1203 22.9623 28.1302 22.6477 28.1302 20C28.1302 17.3522 28.1203 17.0392 28.0736 15.9937C27.9489 13.3261 26.6952 12.0511 24.0078 11.9278V11.9278ZM20 25.0929C17.1879 25.0929 14.9071 22.8135 14.9071 20C14.9071 17.1879 17.1879 14.9085 20 14.9085C22.8121 14.9085 25.0929 17.1879 25.0929 20C25.0929 22.8121 22.8121 25.0929 20 25.0929ZM25.2941 15.8973C24.6368 15.8973 24.1041 15.3647 24.1041 14.7073C24.1041 14.05 24.6368 13.5173 25.2941 13.5173C25.9514 13.5173 26.4841 14.05 26.4841 14.7073C26.4841 15.3632 25.9514 15.8973 25.2941 15.8973V15.8973ZM23.3051 20C23.3051 21.8261 21.8247 23.3051 20 23.3051C18.1753 23.3051 16.6949 21.8261 16.6949 20C16.6949 18.1739 18.1753 16.6949 20 16.6949C21.8247 16.6949 23.3051 18.1739 23.3051 20ZM20 3C10.6117 3 3 10.6117 3 20C3 29.3882 10.6117 37 20 37C29.3882 37 37 29.3882 37 20C37 10.6117 29.3882 3 20 3ZM29.8572 24.0885C29.6942 27.6939 27.6868 29.6914 24.0899 29.8572C23.0317 29.9053 22.6931 29.9167 20 29.9167C17.3069 29.9167 16.9698 29.9053 15.9115 29.8572C12.3075 29.6914 10.3086 27.6911 10.1428 24.0885C10.0947 23.0317 10.0833 22.6931 10.0833 20C10.0833 17.3069 10.0947 16.9698 10.1428 15.9115C10.3086 12.3075 12.3089 10.3086 15.9115 10.1443C16.9698 10.0947 17.3069 10.0833 20 10.0833C22.6931 10.0833 23.0317 10.0947 24.0899 10.1443C27.6953 10.31 29.6957 12.3146 29.8572 15.9115C29.9053 16.9698 29.9167 17.3069 29.9167 20C29.9167 22.6931 29.9053 23.0317 29.8572 24.0885Z" fill="black" />
                                        </svg>
                                    </a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="4" />
                                            <path d="M20 3C10.6117 3 3 10.6117 3 20C3 29.3882 10.6117 37 20 37C29.3882 37 37 29.3882 37 20C37 10.6117 29.3882 3 20 3ZM24.25 14.3333H22.3375C21.5753 14.3333 21.4167 14.6464 21.4167 15.4355V17.1667H24.25L23.9539 20H21.4167V29.9167H17.1667V20H14.3333V17.1667H17.1667V13.897C17.1667 11.3909 18.4856 10.0833 21.4577 10.0833H24.25V14.3333Z" fill="black" />
                                        </svg>
                                    </a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="4" />
                                            <path d="M20 3C10.6117 3 3 10.6117 3 20C3 29.3882 10.6117 37 20 37C29.3882 37 37 29.3882 37 20C37 10.6117 29.3882 3 20 3ZM28.5935 16.6638C28.8527 22.3871 24.5843 28.7677 17.0278 28.7677C14.73 28.7677 12.5922 28.0934 10.7917 26.9388C12.9507 27.1938 15.1054 26.5932 16.8153 25.2544C15.036 25.2218 13.5329 24.0446 13.013 22.4282C13.6519 22.55 14.2809 22.5146 14.8518 22.3587C12.8954 21.9649 11.5439 20.2026 11.5878 18.317C12.1375 18.6216 12.7637 18.8043 13.4309 18.8256C11.619 17.6143 11.1062 15.2216 12.1715 13.3927C14.1775 15.8548 17.1766 17.4741 20.5582 17.6441C19.9646 15.0997 21.8955 12.6475 24.5234 12.6475C25.6922 12.6475 26.7504 13.1419 27.4927 13.9324C28.4192 13.7511 29.2919 13.4111 30.0768 12.945C29.7722 13.8956 29.1276 14.6917 28.2875 15.1961C29.1106 15.0969 29.8954 14.8787 30.6236 14.5543C30.0796 15.3732 29.3911 16.09 28.5935 16.6638V16.6638Z" fill="black" />
                                        </svg>

                                    </a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="4" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 3C10.6132 3 3 10.6103 3 20C3 29.3882 10.6132 37 20 37C29.3882 37 37 29.3882 37 20C37 10.6103 29.3882 3 20 3ZM24.6013 28.993L24.0757 27.1584L25.3451 28.3385L26.545 29.4492L28.6771 31.3333V13.5428C28.6771 12.4123 27.7648 11.5 26.6442 11.5H13.3558C12.2352 11.5 11.3229 12.4123 11.3229 13.5428V26.9502C11.3229 28.0807 12.2352 28.993 13.3558 28.993H24.6013V28.993ZM22.8163 24.4512L22.1618 23.6479C23.4609 23.281 23.9567 22.4678 23.9567 22.4678C23.5502 22.7356 23.1634 22.924 22.8163 23.0529C22.3205 23.2612 21.8445 23.4 21.3784 23.4793C20.4264 23.6578 19.5537 23.6082 18.81 23.4694C18.2447 23.3603 17.7588 23.2017 17.3522 23.043C17.1242 22.9537 16.8762 22.8447 16.6283 22.7058L16.5887 22.6832L16.5787 22.6789L16.5391 22.6562L16.4994 22.6265L16.2217 22.4579C16.2217 22.4579 16.6977 23.2512 17.9572 23.6281L17.2927 24.4512C15.1012 24.3817 14.2682 22.9438 14.2682 22.9438C14.2682 19.7507 15.6962 17.1624 15.6962 17.1624C17.1242 16.0914 18.4827 16.1212 18.4827 16.1212L18.5819 16.2402C16.7969 16.7558 15.9738 17.5392 15.9738 17.5392L16.5589 17.2517C17.62 16.7856 18.4629 16.6567 18.81 16.6269L18.9786 16.6071C19.5835 16.5277 20.2677 16.5079 20.9817 16.5872C21.9238 16.6963 22.9353 16.974 23.9667 17.5392C23.9667 17.5392 23.1832 16.7955 21.4974 16.2798L21.6362 16.1212C21.6362 16.1212 22.9948 16.0914 24.4228 17.1624C24.4228 17.1624 25.8508 19.7507 25.8508 22.9438C25.8508 22.9438 25.0391 24.3279 22.8163 24.4512V24.4512ZM21.8247 19.8201C21.2594 19.8201 20.8132 20.3159 20.8132 20.9208C20.8132 21.5257 21.2693 22.0216 21.8247 22.0216C22.3899 22.0216 22.8362 21.5257 22.8362 20.9208C22.8362 20.3159 22.3899 19.8201 21.8247 19.8201ZM18.2051 19.8201C17.6398 19.8201 17.1936 20.3159 17.1936 20.9208C17.1936 21.5257 17.6497 22.0216 18.2051 22.0216C18.7703 22.0216 19.2166 21.5257 19.2166 20.9208C19.2265 20.3159 18.7703 19.8201 18.2051 19.8201Z" fill="black" />
                                        </svg>
                                    </a>
                                </div>

                            </div>

                        </div>

                        <div class="item-page__descr-block">
                            <div class="vote-block__description">

                                <?php
                                $descr = get_field('works_descriptions');

                                if (mb_strlen($descr) > 280) :
                                    $text = substr($descr, 0, 180) . "..."; ?>

                                    <div class="vote-block__description_short"><?= $text ?></div>

                                    <div class="vote-block__description_full hidden"><?= $descr ?></div>


                                    <div class="descr-block__read-more">+ read more</div>
                                    <div class="descr-block__read-less hidden">- read less</div>

                                <?php else : ?>
                                    <?= get_field('works_descriptions'); ?>
                                <?php endif; ?>



                            </div>
                        </div>

                        <div class=" bottom-img-block">

                            <?php while (the_repeater_field('works_photo-group')) : ?>
                                <div class="product__image-wrap">
                                    <img src="<?= get_sub_field('works_photo') ?>" alt="">

                                </div>
                            <?php endwhile; ?>
                        </div>


                        <div class="footer-block">

                            <a href="/" class="button_ui all-works-btn">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="6" height="6" fill="white" />
                                    <rect y="8" width="6" height="6" fill="white" />
                                    <rect y="16" width="6" height="6" fill="white" />
                                    <rect x="8" width="6" height="6" fill="white" />
                                    <rect x="8" y="8" width="6" height="6" fill="white" />
                                    <rect x="8" y="16" width="6" height="6" fill="white" />
                                    <rect x="16" width="6" height="6" fill="white" />
                                    <rect x="16" y="8" width="6" height="6" fill="white" />
                                    <rect x="16" y="16" width="6" height="6" fill="white" />
                                </svg>

                                All works
                            </a>
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



                    </div>

                </div>
            </div>
        </section>


        <div class="modal">
            <div class="works-auth_block">
                <div class="works-auth_wrapper">
                    <div class="works-auth_close">
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

        <div class="modal fade auth-modal" id="authWrapper" aria-hidden="true" aria-labelledby="authWrapper" tabindex="-1">
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

                                Sign in with FACEBOOK </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal__form-submit copy-notification">
            Link copied
        </div>





    </main><!-- #main -->


<?php endwhile; // End of the loop. 
?>

<?php wp_footer(); ?>