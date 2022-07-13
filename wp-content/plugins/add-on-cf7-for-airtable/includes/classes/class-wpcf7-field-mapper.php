<?php
/**
 * WCF7 Field Mapper class.
 *
 * @package wpc-wpcf7-at
 */

namespace WPC_WPCF7_AT;

defined( 'ABSPATH' ) || exit;

/**
 * WCF7 Field Mapper class.
 * Register supported WCF7 fields and map them to Airtable's ones.
 * Allows reformatting WCF7 fields to Airtable fields format.
 */
class WPCF7_Field_Mapper {

	/**
	 * WPCF7_Field_Mapper instance
	 *
	 * @var WPCF7_Field_Mapper $instance
	 */
	private static $instance;

	/**
	 * Returns WPCF7_Field_Mapper instance
	 *
	 * @return WPCF7_Field_Mapper
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Returns supported WPCF7/Airtable fields.
	 *
	 * @return array
	 */
	public function get_fields() {
		/**
		 * Returns supported WPCF7/Airtable fields.
		 * E.g. How to map a WPCF7 "text" field to a Airtable "number" database column.
		 * [
		 *  'text' => [
		 *      'number' => function ($field_value) {
		 *          return (float) $field_value
		 *      }
		 *  ]
		 * ]
		 *
		 * @param array $fields The supported WPCF7/Airtable fields.
		 */
		return apply_filters( 'wpc-wpcf7-at/wpcf7-field-mapper/fields', array() );
	}

	/**
	 * Check if a WPCF7 field type is compatible with a Airtable field type.
	 *
	 * @param string $wpcf7_field_type A WPCF7 field type.
	 * @param string $airtable_field_type A Airtable field type.
	 * @return bool
	 */
	public function check_field_compat( $wpcf7_field_type, $airtable_field_type ) {
		$fields = $this->get_fields();
		return isset( $fields[ $wpcf7_field_type ][ $airtable_field_type ] );
	}

	/**
	 * Returns all supported Airtable field types.
	 *
	 * @return array
	 */
	public function get_supported_airtable_types() {
		$fields          = $this->get_fields();
		$supported_types = array_reduce(
			$fields,
			function ( $types, $field_types ) {
				return array_merge( $types, array_keys( $field_types ) );
			},
			array()
		);
		return array_unique( $supported_types );
	}


	/**
	 * Returns a formatted value from a field value based on a WPCF7 field type and a Airtable's one.
	 *
	 * @param string $wpcf7_field_type A WPCF7 field type.
	 * @param string $airtable_field_type A Airtable field type.
	 * @param mixed  $wpcf7_field_value The formatted value for the Airtable API or false if the WPCF7 field value can't be properly formatted.
	 * @return null|mixed
	 */
	public function get_formatted_field_value( $wpcf7_field_type, $airtable_field_type, $wpcf7_field_value ) {
		if ( ! $this->check_field_compat( $wpcf7_field_type, $airtable_field_type ) ) {
			return null;
		}
		$fields     = $this->get_fields();
		$formatters = $fields[ $wpcf7_field_type ][ $airtable_field_type ];

		return $this->apply_formatters( $formatters, $wpcf7_field_value );
	}

	/**
	 * Applies a list of formatters (functions) on a value.
	 *
	 * @param callable|callable[] $formatters One or more formatters.
	 * @param mixed               $value The WPCF7 field value.
	 * @return mixed The formatted value.
	 */
	public function apply_formatters( $formatters, $value ) {
		if ( ! is_array( $formatters ) ) {
			$formatters = array( $formatters );
		}
		return array_reduce( $formatters, array( $this, 'apply_formatter' ), $value );
	}

	/**
	 * Applies a formatter (function) on a value.
	 *
	 * @param mixed    $result The formatted value or the initial one.
	 * @param callable $formatter A formatter.
	 * @return mixed The formatted value.
	 */
	public function apply_formatter( $result, $formatter ) {
		return $formatter( $result );
	}

	/**
	 * Try to guess Airtable field type from its value.
	 * Returns empty string if there is nothing obvious.
	 *
	 * @param mixed $field_value The field value.
	 * @return string
	 */
	public function guess_field_type( $field_value ) {
		$guessed_type = '';

		if ( is_array( $field_value ) && count( $field_value ) > 0 && ! is_string( $field_value[0] ) ) {
			$guessed_type = 'multipleAttachments';
		} elseif ( is_array( $field_value ) ) {
			$guessed_type = 'multipleSelects';
		} elseif ( is_string( $field_value ) && wpcf7_is_url( $field_value ) ) {
			$guessed_type = 'url';
		} elseif ( is_string( $field_value ) && wpcf7_is_email( $field_value ) ) {
			$guessed_type = 'email';
		} elseif ( is_string( $field_value ) && preg_match( '`^\d{4}-\d{2}-\d{2}$`', $field_value ) ) {
			$guessed_type = 'date';
		} elseif ( is_numeric( $field_value ) ) {
			$guessed_type = 'number';
		} elseif ( is_bool( $field_value ) ) {
			$guessed_type = 'checkbox';
		}

		return $guessed_type;
	}

	/**
	 * Returns the best Airtable field type based on the Contact Form 7 field type.
	 *
	 * @param string $wpcf7_field_type The Contact Form 7 field type.
	 * @param bool   $has_multiple_values True if the field will send an array.
	 * @return string|null
	 */
	public function find_best_airtable_type( $wpcf7_field_type, $has_multiple_values ) {
		$fields = $this->get_fields();

		if ( ! isset( $fields[ $wpcf7_field_type ] ) ) {
			return null;
		}

		$airtable_field_types = array_keys( $fields[ $wpcf7_field_type ] );
		// If the field doesn't send multiple values, remove Airtable fields that expect multiple values.
		if ( ! $has_multiple_values ) {
			$airtable_field_types = array_diff( $airtable_field_types, array( 'multipleSelects', 'multipleAttachments' ) );
		}

		$airtable_types = $airtable_field_types;

		return array_pop( $airtable_types );
	}
}
