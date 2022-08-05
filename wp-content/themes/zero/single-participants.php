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
                        <div class="item-page__vote-block voting-over">
                            <div class="vote-block__vote-button">
                                <a href="#" class="sl-button sl-button-43 voting-over__btn">VOTING IS OVER </a>
                                <?php
                                // echo get_simple_likes_button(get_the_ID());
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
                                    <div id="copyBtn" data-copy="<?= $actual_link ?>" class="vote-block__share__link copy-link">
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

                                if (mb_strlen($descr) > 140) :
                                    $text = substr($descr, 0, 140) . "..."; ?>

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

                            <a href="/" class="all-works__btn">
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

                            <div class="item-page__img-wrap d-flex">
                                <img class="product__image" src="<?= get_the_post_thumbnail_url(); ?>" />

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

                        <div class="swiper item-page__gallery-block">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="product__image" src="<?= get_the_post_thumbnail_url(); ?>" />
                                    </div>
                                    <?php while (the_repeater_field('works_video-group')) : ?>
                                        <div class="swiper-slide video-slide">
                                            <video autoplay="" muted="" loop="" playsinline="" id="videoback">
                                                <source src="<?= get_sub_field('works_video') ?>" type="video/mp4">
                                            </video>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="swiper-pagination"></div>
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
                                    <div id="copyBtn" data-copy="<?= $actual_link ?>" class="vote-block__share__link copy-link">
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