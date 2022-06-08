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
						<h1 class="title_ui"> We selected 5 most progressive<br> fashion designers from all over<br> the world and digitally recreated<br> their most-wanted pieces. </h1>
						<a href="#" class="button_ui">Info and Prizes</a>
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
						SIGN UP
					</div>
					<div class="header-form_body">
						<div class="header-form_body-title">?Stay tune about the future of AR fashion. Subscribe?</div>

						<form>
							<input type="text" class="input_ui" name="nickname" placeholder="Name or Nickname">
							<input type="text" class="input_ui" name="email" placeholder="E-mail">
							<div class="checkbox_ui">
								<input type="checkbox" class="custom-checkbox" id="checkbox" name="accept">
								<label for="checkbox">An end-user license agreement is a legal contract entered into between a software.</label>
							</div>
							<input type="submit" class="button_form" value="Apply">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="homepage__banner">
	<div class="container-fluid">
		<img src="<?= get_template_directory_uri(); ?>/assets/img/demo_banner.png" width="100%">
	</div>
</section>
<section class="homepage__about">
	<div class="container-fluid">
		<div class="title_ui"> A contemporary fashion brand run by family duo, Ksenia and Anton Schnaider. The masterminds behind the brand are constantly working hand in hand-creating fashion. A fashion brand run by family duo, Ksenia and Anton Schnaider. The masterminds behind the brand are constantly working hand in hand-creating fashion. </div>
		<a href="#" class="button_ui">Check F.A.Q.</a>
		<div class="about-col">
			<div class="row">
				<div class="col-lg-4">
					<div class="title_ui">???????</div>
					<div class="about-col__descript">
						The AR items bundle by Tommy Cash is united by the surreal infusion of post-Soviet aesthetic and consists of 3 digital items.
					</div>
				</div>
				<div class="col-lg-4">
					<div class="title_ui">???????</div>
					<div class="about-col__descript">
						The AR items bundle by Tommy Cash is united by the surreal infusion of post-Soviet aesthetic and consists of 3 digital items. The AR items bundle by Tommy Cash is united virginity leaf as a wearable NFT inspired by Adam’s Fig Leaf.
					</div>
				</div>
				<div class="col-lg-4">
					<div class="title_ui">???????</div>
					<div class="about-col__descript">
						The AR items bundle by Tommy Cash is united by the surreal infusion of post-Soviet aesthetic and consists of 3 digital items and a virginity leaf.
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<section class="homepage__form-block">
	<div class="container-fluid">
		<div class="form-block__title">SIGN UP</div>
		<div class="form-block__body">
			<div class="header-form_body-title">?Stay tune about the future of AR fashion. Subscribe?</div>

			<form>
				<input type="text" class="input_ui" name="nickname" placeholder="Name or Nickname">
				<input type="text" class="input_ui" name="email" placeholder="E-mail">
				<div class="checkbox_ui">
					<input type="checkbox" class="custom-checkbox" id="checkbox" name="accept">
					<label for="checkbox">An end-user license agreement is a legal contract entered into between a software.</label>
				</div>
				<input type="submit" class="button_form" value="Apply">
			</form>
		</div>
	</div>
</section>

<?php
get_footer();
