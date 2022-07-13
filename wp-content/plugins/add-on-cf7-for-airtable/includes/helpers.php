<?php
/**
 * Plugin's helpers.
 *
 * @package wpc-wpcf7-at
 */

namespace WPC_WPCF7_AT\Helpers;

use WPC_WPCF7_AT\Options;
use WPC_WPCF7_AT\WPCF7_Field_Mapper;

defined( 'ABSPATH' ) || exit;

/**
 * Process the Airtable /account response.
 *
 * @param bool|\WP_Error $response A WP_Error if any.
 * @return void
 */
function process_airtable_test_request_response( $response ) {
	if ( is_wp_error( $response ) ) {
		Options\update_plugin_option(
			'airtable_api_error',
			array(
				'code'    => $response->get_error_code(),
				'message' => $response->get_error_message(),
			)
		);
		Options\delete_plugin_option( 'airtable_api_key_is_valid' );
	} else {
		Options\update_plugin_option( 'airtable_api_key_is_valid', time() );
		Options\delete_plugin_option( 'airtable_api_error' );
	}
}

/**
 * Get a cached version of Airtable table.
 *
 * @param string  $app_id The app id.
 * @param string  $table_id The table id.
 * @param boolean $bypass_cache Bypass API cache.
 * @param boolean $return_wp_error Whether to return a WP_Error Object or not if the request failed.
 * @return array
 */
function get_airtable_table( $app_id, $table_id, $bypass_cache = false, $return_wp_error = false ) {
	$transient_name = sprintf( '%1$sairtable_table%2$s', WPCONNECT_WPCF7_AT_OPTIONS_PREFIX, $table_id );
	$result         = get_transient( $transient_name );

	if ( false === $result || $bypass_cache ) {
		$api    = wpconnect_wpcf7_airtable_get_api( $app_id );
		$result = $api->get_table( $table_id );

		if ( ! is_wp_error( $result ) ) {
			set_transient( $transient_name, $result, 1 * MINUTE_IN_SECONDS );
		} elseif ( $return_wp_error ) {
			return $result;
		}
	}

	return $result;
}

/**
 * Get a cached version of Airtable tables columns.
 *
 * @param string  $app_id The Airtable app id.
 * @param string  $table_id The Airtable table id.
 * @param boolean $bypass_cache Bypass API cache.
 * @return array
 */
function get_airtable_table_columns( $app_id, $table_id, $bypass_cache = false ) {
	$table = get_airtable_table( $app_id, $table_id, $bypass_cache );

	$columns = array();
	if ( ! is_wp_error( $table ) ) {
		$columns = array_reduce(
			$table->records,
			function ( $result, $column ) {
				foreach ( $column->fields as $column_name => $value ) {
					$type = WPCF7_Field_Mapper::get_instance()->guess_field_type( $value );
					if ( ! isset( $result[ $column_name ] ) ) {
						$result[ $column_name ] = array(
							'name' => $column_name,
							'type' => $type,
						);
					}

					if ( $result[ $column_name ]['type'] !== $type ) {
						$result[ $column_name ]['type'] = '';
					}
				}

				return $result;
			},
			array()
		);
	}

	return $columns;
}



/**
 * Returns mapped Airtable's fields name for each Contact Form 7 tags with a `airtable` property based on a Airtable table column list.
 *
 * @param WPCF7_ContactForm $contact_form A WPCF7_ContactForm instance.
 * @param array             $columns A Airtable table column list.
 * @return array
 */
function get_mapped_tags_from_contact_form( $contact_form, $columns ) {
	$prop        = wp_parse_args(
		$contact_form->prop( 'wpc_airtable' ),
		array(
			'app_id_selected' => '',
			'table_selected'  => '',
			'mapping'         => array(),
		)
	);
	$mapped_tags = array();
	if ( ! empty( $prop['app_id_selected'] ) && ! empty( $prop['table_selected'] ) ) {
		$mapping = $prop['mapping'];

		foreach ( $contact_form->scan_form_tags() as $tag ) {
			// The field is not mapped.
			if ( ! isset( $mapping[ $tag->name ] ) || empty( $mapping[ $tag->name ] ) ) {
				continue;
			}
			$column_name = $mapping[ $tag->name ];

			$column = isset( $columns[ $column_name ] ) ? $columns[ $column_name ] : array(
				'name' => $column_name,
				'type' => '',
			);

			// if we don't know the type, try best match from CF7 field type.
			if ( empty( $column['type'] ) ) {
				$has_multiple_values = (
					( 'checkbox' === $tag->basetype )
					||
					( 'file' === $tag->basetype )
					||
					( 'select' === $tag->basetype && in_array( 'multiple', $tag->options, true ) )
				);

				$column['type'] = WPCF7_Field_Mapper::get_instance()->find_best_airtable_type( $tag->basetype, $has_multiple_values );
			}

			$mapped_tags[ $tag->name ] = array(
				'type'                => $tag->basetype,
				'content'             => $tag->content,
				'airtable_field_name' => $column_name,
				'airtable_field_type' => $column['type'],
			);
		}
	}
	return $mapped_tags;
}
