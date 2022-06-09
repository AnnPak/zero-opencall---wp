<?php

/**
 * Template Name: Главная, Stage 2 (template-page/homepage-st2.php)
 */

get_header(); ?>

<section class="homepage__header">
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
                            <div class="works-item">  
                                <div class="work-item__wrapper">
                                    <div class="works-item__img">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/demo_product.png">
                                    </div>
                                    <div class="works-item__info-wrapper">
                                        <div class="works-item__title-block">
                                            <div class="works-item__name">MACHO 3000</div>
                                            <div class="works-item__about">Dazed dress</div>
                                        </div>
                                        <div class="works-item__like">25</div>
                                    </div>
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
