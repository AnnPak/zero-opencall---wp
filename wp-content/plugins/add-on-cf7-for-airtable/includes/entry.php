<?php
/**
 * Save WPCF7 contact form entries to Airtable table.
 *
 * @package wpc-wpcf7-at
 */

namespace WPC_WPCF7_AT\Entry;

use WPC_WPCF7_AT\WPCF7_Field_Mapper;
use WPC_WPCF7_AT\WPCF7_Airtable_Service;
use WPC_WPCF7_AT\Helpers;

defined( 'ABSPATH' ) || exit;

/**
 * Saves contact form submission to Airtable table
 *
 * @param WPCF7_ContactForm $contact_form A WPCF7_ContactForm instance.
 * @param bool              $abort Set to true if the form submission should be aborted.
 * @param WPCF7_Submission  $submission A WPCF7_Submission instance.
 * @return void
 */
function save_wpcf7_entry_in_airtable_table( $contact_form, &$abort, $submission ) {
	$service = WPCF7_Airtable_Service::get_instance();
	if ( ! $service->is_active() ) {
		return;
	}
	if ( $contact_form->in_demo_mode() ) {
		return;
	}

	$consented            = true;
	$optional_consent_tag = false;
	foreach ( $contact_form->scan_form_tags( 'feature=name-attr' ) as $tag ) {
		if ( $tag->has_option( 'consent_for:airtable' ) ) {
			if ( $tag->has_option( 'optional' ) ) {
				$optional_consent_tag = $tag;
			}
			if ( null === $submission->get_posted_data( $tag->name ) ) {
				$consented = false;
			}
			break;
		}
	}

	if ( ! $consented ) {
		return;
	}

	$prop = wp_parse_args(
		$contact_form->prop( 'wpc_airtable' ),
		array(
			'app_id_selected' => '',
			'table_selected'  => '',
			'mapping'         => array(),
		)
	);

	if ( empty( $prop['app_id_selected'] ) || empty( $prop['table_selected'] ) ) {
		return;
	}

	$table_id = $prop['table_selected'];
	$columns  = Helpers\get_airtable_table_columns( $prop['app_id_selected'], $table_id );

	$data            = (array) $submission->get_posted_data();
	$files           = $submission->uploaded_files();
	$airtable_fields = array();
	$field_mapper    = WPCF7_Field_Mapper::get_instance();
	$mapped_tags     = Helpers\get_mapped_tags_from_contact_form( $contact_form, $columns );

	foreach ( $mapped_tags as $wpcf7_field_name => $field ) {
		$column_name          = $field['airtable_field_name'];
		$original_field_value = $data[ $wpcf7_field_name ];
		// Change value for special fields.
		if ( 'acceptance' === $field['type'] ) {
			$original_field_value = $original_field_value ? $field['content'] : __( 'No', 'wpc-wpcf7-at' );
		} elseif ( 'file' === $field['type'] ) {
			if ( ! isset( $files[ $wpcf7_field_name ] ) ) {
				$original_field_value = array();
			} else {
				$original_field_value = $files[ $wpcf7_field_name ];
			}
		}
		$field_value = $field_mapper->get_formatted_field_value( $field['type'], $field['airtable_field_type'], $original_field_value );
		if ( null !== $field_value ) {
			$airtable_fields[ $column_name ] = $field_value;
		}
	}

	$api = wpconnect_wpcf7_airtable_get_api( $prop['app_id_selected'] );
	// Send form data to Airtable.
	$response = $api->add_table_row( $table_id, $airtable_fields );
	if ( is_wp_error( $response ) ) {
		$submission->set_status( 'aborted' );

		$submission_response = __( "Sorry, your form data can't be saved, please try again later.", 'wpc-wpcf7-at' );
		// If there is an optional consent tag, let the user know he can uncheck it.
		if ( $optional_consent_tag ) {
			/* translators: %s: consent checkbox text */
			$submission_response = sprintf( __( "Sorry, your form data can't be saved, please try again later or uncheck \"%s\".", 'wpc-wpcf7-at' ), $optional_consent_tag->content );
		}
		$submission->set_response( $submission_response );
		$abort = true;
	}

	do_action( 'wpc-wpcf7-at/after-airtable-save' );
}

/**
 * Delete files uploaded ($filepaths) in `wpc_wpcf7_airtable_uploads` folder.
 *
 * @param string[] $filepaths File paths to be deleted.
 * @return void
 */
function delete_uploads( $filepaths ) {
	$upload_dir           = wp_upload_dir();
	$wpc_airtable_dirname = $upload_dir['basedir'] . '/wpc_wpcf7_airtable_uploads';
	foreach ( $filepaths as $filepath ) {
		$filepath = realpath( $filepath );
		if ( $filepath && strpos( $filepath, $wpc_airtable_dirname ) === 0 && is_file( $filepath ) ) {
			unlink( $filepath );
		}
	}
}
