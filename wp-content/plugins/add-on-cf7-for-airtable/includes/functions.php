<?php
/**
 * Global plugin's functions.
 * No namespace, these globally-available-functions are prefixed.
 *
 * @package wpc-wpcf7-at
 */

use WPC_WPCF7_AT\API_Airtable;
use WPC_WPCF7_AT\Options;
use WPC_WPCF7_AT\WPCF7_Airtable_Service;

defined( 'ABSPATH' ) || exit;


/**
 * Get an instance of the Airtable API.
 *
 * @param string $app_id Api key.
 * @param string $key Api key.
 * @return API_Airtable
 */
function wpconnect_wpcf7_airtable_get_api( $app_id, $key = null ) {
	$service = WPCF7_Airtable_Service::get_instance();

	return new API_Airtable(
		is_null( $key ) ? $service->get_api_key() : $key,
		$app_id
	);
}

/**
 * Is the API Key valid?
 *
 * @return boolean
 */
function wpconnect_wpcf7_airtable_api_key_is_valid() {
	return Options\get_plugin_option( 'airtable_api_key_is_valid' ) > 0;
}

/**
 * Register WPCF7 Airtable service
 *
 * @return void
 */
function wpconnect_wpcf7_airtable_register_service() {
	$integration = WPCF7_Integration::get_instance();

	$integration->add_service(
		'wpc_airtable',
		WPCF7_Airtable_Service::get_instance()
	);
}

/**
 * Save plugin version
 *
 * @return void
 */
function wpconnect_wpcf7_airtable_save_plugin_version() {
	Options\update_plugin_option( 'version', WPCONNECT_WPCF7_AT_VERSION );
}
