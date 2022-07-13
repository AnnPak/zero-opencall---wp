<?php

/**
 * Template Name: F.A.Q. (template-page/faq-page.php)
 */

get_header(); ?>
<section class="faq__section">
    <div class="container-fluid h-100">
        <div class="row border_row h-100">
            <div class="col-lg-6">
                <h1 class="faq__title sticky-top">
                    Frequently <br> Asked Questions
                </h1>
            </div>
            <div class="col-lg-6 faq__qestions-block">
                <div class="faq__qestions-wrapper" id="qestionsWrapper">
                    <?php
                    $count = 1;
                    if (have_rows('faq_group')) :

                        // перебираем данные
                        while (have_rows('faq_group')) : the_row(); ?>
                            <div class="faq__qestion-wrapper">
                                <h2 class="qestion-wrapper__header accordion-header" id="questionItem<?= $count ?>">
                                    <button class="qestion-wrapper__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQestion<?= $count ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="qestion-wrapper__qestion">
                                            <p class="qestion__count"><?= $count ?>.</p>
                                            <p class="qestion__title"><?= the_sub_field('faq_question') ?></p>
                                        </div>

                                        <!-- <div class="qestion-wrapper__plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <rect x="8.05273" width="2" height="18" fill="black"></rect>
                                                <rect y="9.94922" width="2" height="18" transform="rotate(-90 0 9.94922)" fill="black"></rect>
                                            </svg>
                                        </div>

                                        <div class="qestion-wrapper__minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <g clip-path="url(#clip0_201_4)">
                                                    <path d="M0 7.94922L0 9.94922L18 9.94922V7.94922L0 7.94922Z" fill="black" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_201_4">
                                                        <rect width="18" height="3" fill="white" transform="translate(0 7)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div> -->
                                    </button>
                                </h2>
                                <div id="collapseQestion<?= $count ?>" class="accordion-collapse collapse" aria-labelledby="questionItem<?= $count ?>" data-bs-parent="#qestionsWrapper">
                                    <div class="qestion-wrapper__body accordion-body">
                                        <?= the_sub_field('faq_answer') ?>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                    <?php endwhile;

                    else :

                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
wp_footer();
