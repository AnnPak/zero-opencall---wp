<?php

/**
 * Template Name: Главная, Stage 1 (template-page/homepage-st1.php)
 */

get_header(); ?>

<section class="homepage__header">
	<div class="container-fluid h-100">
		<div class="row border_row h-100">
			<div class="col-lg-6">
				<div class="homepage__header-banner">
					<div class="header-banner__title">
					<h1 class="title_ui"> Join a competition for digital fashion creators. Submit your own 3D garment designs to become one of the three winners selected by the community. Top voted submissions will be presented in AR in the ZERO10 app and their creators will get $1000 prizes. </h1>						<a href="/#info-block" class="button_ui">Info and Prizes</a>
					</div>
					<div class="header-banner__bottom">
						<div class="header-banner__bottom-items">
							<span>3 winners</span>
							<span>6 prizes </span>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-6">
				<div class="homepage__header-form">
					<div class="header-form__head">
						Join Open Call
					</div>
					<div class="header-form_body">
						<div class="header-form_body-title">Submit your application before July 27th and receive an email with technical specifications for entries.</div>

						<?php echo do_shortcode('[contact-form-7 id="35" title="Sign up" html_class="homepage-form"]'); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="homepage__banner-background" >

	<div class="homepage__banner-title">
	submit your digital creations before July 27.
	</div>
	<video autoplay="" muted="" loop="" playsinline="" id="videoback" poster="<?= get_template_directory_uri(); ?>/assets/img/demo_banner.jpg">
								<source src="<?= get_template_directory_uri(); ?>/assets/img/info-banner__video.mp4" type="video/mp4">
								<source src="<?= get_template_directory_uri(); ?>/assets/img/info-banner__video.webm" type="video/webm">
							</video>
	
</section>
<section class="homepage__about desctop-screen" id="info-block">
	<div class="container-fluid">
		<div class="title_ui"> Open call is a competition for digital fashion designers developed by ZERO10 to support emerging talents and a growing community of creators. Entries are open to everyone and not limited to skill level, design preferences, geography, and background*. </div>
		<div class="homepage__about-subtitle">
			<a href="/faq" class="button_ui">Check FAQ</a>
			<div class="subtitle-text">
				We expect participants to be engaged in digital fashion, have gigabytes of ideas waiting to happen, and be familiar with 3D cloth-making programs. 
				To pass moderation, a work submitted for the competition should meet the technical specifications and be uniquely your own.
			</div>
		</div>
	</div>
</section>

<section class="sticky-top homepage__about desctop-screen">
	<div class="container-fluid">
		<div class="about-col homepage__about-col">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="title_ui">Duration</div>
					<div class="about-col__descript">
						Submissions will be open until July 27th. Over the span of two weeks, anyone can sign up for the competition and upload their design. Three winners will be selected by the community vote starting on July 21st and ending on August 4th. Winners will be announced a week after, and their digital clothes will be available in the ZERO10 app.
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
						Three winners will get a signature drop in the Zero10 app. Our team will adapt your design to AR and showcase it alongside the works of Tommy Cash or Barragán. Ultimately, $1000 for each winner tops the prize list!
					</div>
				</div>
			</div>
		</div>

	</div>
</section>


<section class="homepage__form-block">
	<div class="container-fluid" id="sign-up-block">
		<div class="form-block__title d-none d-sm-block">Join Open Call</div>
		<div class="form-block__title d-block d-sm-none">Join <br>Open Call</div>
		<div class="form-block__body">
			<div class="header-form_body-title">Submit your application before July 27th and receive an email with technical specifications for entries.</div>

			<?php echo do_shortcode('[contact-form-7 id="35" title="Sign up" html_class="homepage-form"]'); ?>
		</div>
	</div>
</section>

<div class="modal__form-submit">
Thank you! Check your inbox for the next steps.
</div>

<?php
get_footer();
