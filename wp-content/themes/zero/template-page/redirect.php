<?php

/**
 * Template Name: Страница редиректа (template-page/redirect.php)
 */

get_header();

?>


<div id="placeholder" class="content-placeholder _disabled">
    <div class="content-placeholder__loader">
    </div>
</div>

<script>
    window.location.replace(localStorage.getItem('url'));
</script>

<?php wp_footer(); ?>