<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpbstarter
 */
?>


</div><!-- #content -->

<footer class="footer__bottom">
	<div class="container-fluid h-100">
		<div class="row border_row h-100">
			<div class="col-lg-6">
				<div class="footer__bottom-wrapper">
					<div class="title_ui">
						ZERO10 platform connects fashion brands and designers to users all over the world and makes it possible to present digital garments in Augmented Reality.
					</div>
					<div>
						<div class="footer__bottom-button">
							<a href="https://zero10.app/" class="button_ui">About ZERO10</a>
						</div>
						<a href="https://apps.apple.com/us/app/zero10-ar-fashion-platform/id1580413828" class="footer__bottom-qr">
							<img src="<?= get_template_directory_uri(); ?>/assets/img/qrcode_black-2.svg">
							<span> Download the iOS app </span>
						</a>
							<div class="footer__bottom-qr-mobile">
								<a href="https://apps.apple.com/us/app/zero10-ar-fashion-platform/id1580413828" class="button_ui button__black">Download on the App Store</a>
							</div>

					</div>

					<div class="footer__bottom-contact">
						<div class="footer__bottom-social">
							<a href="https://www.instagram.com/zero10.app/">INSTAGRAM</a>
							<a href="https://www.tiktok.com/@zero10.app">TIKTOK</a>
							<a href="#">DISCORD</a>
							<a href="https://twitter.com/zero10_app">TWITTER</a>
						</div>
						<div class="footer__bottom-contact_mobile">
							<a href="mailto:support@zero10.app">support@zero10.app</a>
							<a href="/privacy-legal">Privacy & Legal</a>
							<a href="/cookie-policy">Cookie policy</a>
							<a href="/terms-conditions">Terms & Conditions</a>
						</div>
					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="footer__bottom-img">
					<video autoplay="" muted="" loop="" playsinline="" id="videoback" poster="<?= get_template_directory_uri(); ?>/assets/img/phone-photo.png">
						<source src="<?= get_template_directory_uri(); ?>/assets/img/main-1.mp4" type="video/mp4">
						<source src="<?= get_template_directory_uri(); ?>/assets/img/main-2.webm" type="video/webm">
					</video>
					<!-- <img src="<? // get_template_directory_uri(); 
									?>/assets/img/demo_phone.png"> -->
				</div>

			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>

</body>

</html>