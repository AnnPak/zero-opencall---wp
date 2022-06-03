<?php

/**
 * Template Name: С боковым меню (template-page/left-sidebar.php)
 */

get_header();
?>


<?php while (have_posts()) : the_post(); ?>

    <?php if (has_post_thumbnail()) : ?> <?php the_post_thumbnail_url('large') ?><?php endif; ?>

        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        }
        ?>

        <?php
        wpbstarter_posted_on();
        ?>



        <?php
        get_sidebar();
        ?>


        <?php

        get_template_part('template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif; // End of the loop.
        ?>

        </main><!-- #main -->


    <?php endwhile; // End of the loop. 
    ?>

    <?php
    get_footer();
