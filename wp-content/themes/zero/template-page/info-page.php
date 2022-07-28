<?php

/**
 * Template Name: Info (template-page/info-page.php)
 */


get_header(); ?>
<section class="homepage__banner-background info-page">

	<div class="homepage__banner-title">
	choose <br>3 winners
	</div>
	<video autoplay="" muted="" loop="" playsinline="" id="videoback" poster="<?= get_template_directory_uri(); ?>/assets/img/demo_banner.jpg">
		<source src="<?= get_template_directory_uri(); ?>/assets/img/info-banner__video.mp4" type="video/mp4">
		<source src="<?= get_template_directory_uri(); ?>/assets/img/info-banner__video.webm" type="video/webm">
	</video>

	<div class="container-fluid">
		<div class="title_ui"> Decide the winners in a competition for digital fashion creators. Vote for your favorite garments. Top-voted entries will be presented in AR in the ZERO10 app and their creators will get $1000 prizes. </div>
		<div class="homepage__about-subtitle">
			<a href="/" class="button_ui">VOTE</a>
			
		</div>


		<div class="about-col homepage__about-col">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="title_ui">Duration</div>
					<div class="about-col__descript">
					Submissions will be open until July 27. Over the span of two weeks, anyone can sign up for the competition and upload their design. Three winners will be selected by the community vote starting on July 28 and ending on August 7. Winners will be announced a week after, and their digital clothes will be available in the ZERO10 app.
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="title_ui">Voting</div>
					<div class="about-col__descript">
						Winners will be voted by the community: ask friends and network to support you and other deserving talents. Participants can vote, too, but please don’t cheat. Rule of thumb: one vote per each work. The three top-voted designs will score a prize pack!
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="title_ui">Prizes</div>
					<div class="about-col__descript">
						Three winners will get a signature drop in the ZERO10 app. Our team will adapt your design to AR and showcase it alongside the works of Tommy Cash or Barragán. Ultimately, $1000 for each winner tops the prize list!
					</div>
				</div>
			</div>
		</div>
	</div>



</section>


<?php wp_footer(); ?>
