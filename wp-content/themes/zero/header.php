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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
	<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} ?>

<div id="page" class="site sscroll">
	

	<header id="mastheadx" class="site-header navbar-static-top" role="banner">
        <!-- menu works -->
       <?php include_once get_template_directory() . '/inc/menubars/header_nav.php'; ?>
       <!-- .menu work ends -->
	</header><!-- #masthead -->
    
	<div id="content" class="site-content">
            
