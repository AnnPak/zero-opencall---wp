<?php

/**
 * Template Name: Terms (template-page/terms-page.php)
 */


get_header(); ?>

<section class="homepage__header terms-page">
	<div class="container-fluid h-100">
		<div class="row border_row h-100">
			<div class="col-lg-6">
				<div class="homepage__header-banner">
					<div class="header-banner__title">
						<h1 class="title_ui"> Terms & Conditions</h1>
					</div>
				</div>

			</div>
			<div class="col-lg-6">
                <div class="last-updated">last updated <?=the_modified_date( 'F j, Y' );?></div>

                <div class="terms-page__descripition"><?php the_content(); ?></div>
            
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
