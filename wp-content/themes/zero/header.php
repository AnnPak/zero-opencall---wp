<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nazagency
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '1225765341297338');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" src="https://www.facebook.com/tr?id=1225765341297338&ev=PageView
&noscript=1" />
	</noscript>
	<!-- End Facebook Pixel Code -->
</head>

<body>
	<?php if (function_exists('wp_body_open')) {
		wp_body_open();
	} ?>

	<div id="page" class="site sscroll">
		<header id="mastheadx" class="site-header fixed-top" role="banner">
			<div class="container-fluid">
				<div class="site-header__wrapper">
					<div class="site-header__logo">
						<a href="/"> <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg"><span> OPEN CALL </span></a>
					</div>
					<div class="site-header__menu">
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'primary_menu',
							'container'       => 'div',
							'depth'           => 4,
							'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
							'walker'          => new wp_bootstrap_navwalker()
						));
						?>
					</div>
					<div class="site-header__mobile-menu">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/menu.svg" data-bs-toggle="modal" data-bs-target="#menuModal">
					</div>
				</div>
			</div>
		</header><!-- #masthead -->



		<!-- Modal -->
		<div class="modal mobile-menu" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen">
				<div class="modal-content">
					<div class="container-fluid h-100">
						<div class="mobile-menu__close">
							<img src="<?= get_template_directory_uri(); ?>/assets/img/menu.svg" data-bs-dismiss="modal" aria-label="Close">
						</div>
						<div class="mobile-menu__body">
							<div class="mobile-menu__nav">
								<?php
								wp_nav_menu(array(
									'theme_location'  => 'primary_menu',
									'container'       => 'div',
									'depth'           => 4,
									'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
									'walker'          => new wp_bootstrap_navwalker()
								));
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bottom-bar fixed-bottom">
			<div class="container-fluid">
				<div class="bottom-bar__wrapper">
					<a href="mailto:support@zero10.app">support@zero10.app</a>
					<a href="/privacy-legal">Privacy & Legal</a>
					<a href="/cookie-policy">Cookie policy</a>
					<a href="/terms-conditions">Terms & Conditions</a>
				</div>
			</div>
		</div>
		<div id="content" class="site-content">