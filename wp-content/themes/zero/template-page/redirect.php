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

<?php
    header('Location: http://'.$_SERVER["HTTP_HOST"].$cookie);
?>

<?php wp_footer(); ?>