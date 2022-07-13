<?php
/**
 * Plugin Name: Add-on CF7 for Airtable
 * Description: Send the entries of your Contact Form 7 forms to your Airtable databases.
 * Author: WP connect
 * Author URI: https://wpconnect.co/
 * Text Domain: wpc-wpcf7-at
 * Domain Path: /languages/
 * Version: 1.0.0
 * Requires at least: 5.7
 * Requires PHP: 7.0
 *
 * @package wpc-wpcf7-at
 */

namespace WPC_WPCF7_AT;

defined( 'ABSPATH' ) || exit;

/**
 * Define plugin constants
 */
define( 'WPCONNECT_WPCF7_AT_VERSION', '1.0.0' );
define( 'WPCONNECT_WPCF7_AT_URL', plugin_dir_url( __FILE__ ) );
define( 'WPCONNECT_WPCF7_AT_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPCONNECT_WPCF7_AT_PLUGIN_DIRNAME', basename( rtrim( dirname( __FILE__ ), '/' ) ) );
define( 'WPCONNECT_WPCF7_AT_BASENAME', plugin_basename( __FILE__ ) );
define( 'WPCONNECT_WPCF7_AT_OPTIONS_PREFIX', 'wpcwpcf7at_' );


/**
 * Check for requirements and (maybe) load the plugin vital files.
 *
 * @return void
 */
function init() {
	// Bail early if requirements are not met.
	if ( ! meets_requirements() && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
		add_action( 'admin_notices', __NAMESPACE__ . '\\notice_for_missing_requirements' );
		return;
	}

	// Register vital files.
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/functions.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/helpers.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/options.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/classes/class-api-airtable.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/classes/class-wpcf7-airtable-service.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/classes/class-wpcf7-field-mapper.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/contact-form-properties.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/fields.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/entry.php';
	require_once WPCONNECT_WPCF7_AT_DIR . '/includes/hooks.php';
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\init' );

/**
 * Does this WP install meet minimum requirements?
 *
 * @return boolean
 */
function meets_requirements() {
	global $wp_version;

	return (
		version_compare( PHP_VERSION, '7.0', '>=' ) &&
		version_compare( $wp_version, '5.5', '>=' ) &&
		defined( 'WPCF7_VERSION' ) &&
		version_compare( WPCF7_VERSION, '5.5.3', '>=' )
	);
}

/**
 * Display a notice if requirements are not met.
 *
 * @return void
 */
function notice_for_missing_requirements() {
	echo wp_kses(
		sprintf(
			'<div class="notice notice-error"><p>%1$s</p></div>',
			__( 'The "Contact Form 7 to Airtable" plugin is inactive because the minimal requirements are not met.', 'wpc-wpcf7-at' )
		),
		array(
			'div' => array( 'class' => array() ),
			'p'   => array(),
		)
	);
}

/**
 * Trigger a custom action when activating the plugin.
 *
 * @param string  $plugin The plugin's slug.
 * @param boolean $network Network activation.
 * @return void
 */
function on_plugin_activation( $plugin, $network ) {
	if ( WPCONNECT_WPCF7_AT_BASENAME !== $plugin ) {
		return;
	}

	init();
	do_action( 'wpc-wpcf7-at/plugin-activated', (bool) $network );
}
add_action( 'activate_plugin', __NAMESPACE__ . '\\on_plugin_activation', 10, 2 );

/**
 * Translations.
 *
 * @return void
 */
function load_translations() {
	load_plugin_textdomain( 'wpc-wpcf7-at', false, WPCONNECT_WPCF7_AT_PLUGIN_DIRNAME . '/languages/' );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_translations' );
