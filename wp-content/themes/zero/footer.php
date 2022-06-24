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
						A contemporary fashion brand run by family duo, Ksenia and Anton Schnaider. The masterminds behind the brand are constantly working hand in hand-creating fashion.
					</div>
					<div class="footer__bottom-button">
						<a href="#" class="button_ui">Know more at ZERO10.APP</a>
					</div>
					<div class="footer__bottom-qr">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/qrcode_black-2.svg">
						<span> Download on the App Store </span>
					</div>
					<div class="footer__bottom-qr-mobile">
						<a href="#" class="button_ui button__black">Download on the App Store</a>
					</div>
					<div class="footer__bottom-contact">
						<div class="footer__bottom-social">
							<a href="#">INSTAGRAM</a>
							<a href="#">TIKTOK</a>
							<a href="#">FACEBOOK</a>
							<a href="#">TWITTER</a>
						</div>
						<div class="footer__bottom-contact_mobile">
							<a href="mailto:support@zero10.app">support@zero10.app</a>
							<a href="#">Privacy & Legal</a>
							<a href="#">Cookie policy</a>
							<a href="/terms-conditions">Terms & Conditions</a>
						</div>
					</div>

				</div>
			</div>
			<div class="col-lg-6">
				<div class="footer__bottom-img">
					<img src="<?= get_template_directory_uri(); ?>/assets/img/demo_phone.png">
				</div>

			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>

</body>

</html>