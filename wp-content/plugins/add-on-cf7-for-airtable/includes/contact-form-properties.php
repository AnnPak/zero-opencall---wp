<?php
/**
 * Plugin's WPCF7 contact form properties.
 *
 * @package wpc-wpcf7-at
 */

namespace WPC_WPCF7_AT\CFP;

use WPC_WPCF7_AT\WPCF7_Airtable_Service;
use WPC_WPCF7_AT\Helpers;
use WPC_WPCF7_AT\WPCF7_Field_Mapper;

defined( 'ABSPATH' ) || exit;

/**
 * Registers the wpc_airtable contact form property.
 *
 * @param array $properties A list of WPCF7 properties.
 * @see 'wpcf7_pre_construct_contact_form_properties' filter hook
 */
function register_property( $properties ): array {
	$service = WPCF7_Airtable_Service::get_instance();

	if ( $service->is_active() ) {
		$properties += array(
			'wpc_airtable' => array(),
		);
	}

	return $properties;
}


/**
 * Saves the wpc_airtable property value.
 *
 * @param WPCF7_ContactForm $contact_form A WPCF7_ContactForm instance.
 * @see 'wpcf7_save_contact_form' action hook
 */
function save_contact_form( $contact_form ) {
	$service = WPCF7_Airtable_Service::get_instance();

	if ( ! $service->is_active() ) {
		return;
	}

	// Nonce checked by WPCF7 {@see wpcf7_load_contact_form_admin}.
	$prop = array();
	// phpcs:ignore WordPress.Security.NonceVerification.Missing
	$prop['app_id_selected'] = isset( $_POST['wpc-wpcf7-airtable']['app_id_selected'] ) ? sanitize_text_field( wp_unslash( $_POST['wpc-wpcf7-airtable']['app_id_selected'] ) ) : '';
	// phpcs:ignore WordPress.Security.NonceVerification.Missing
	$prop['table_selected'] = isset( $_POST['wpc-wpcf7-airtable']['table_selected'] ) ? sanitize_text_field( wp_unslash( $_POST['wpc-wpcf7-airtable']['table_selected'] ) ) : '';
	// phpcs:ignore WordPress.Security.NonceVerification.Missing
	$prop['mapping'] = isset( $_POST['wpc-wpcf7-airtable']['mapping'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['wpc-wpcf7-airtable']['mapping'] ) ) : array();

	$contact_form->set_properties(
		array(
			'wpc_airtable' => $prop,
		)
	);
}

/**
 * Displays a button that will toggle a tooltip.
 *
 * @param string $tooltip_text The tooltip text.
 * @return void
 */
function tooltip( $tooltip_text ) {
	static $tooltip_id;
	if ( ! isset( $tooltip_id ) ) {
		$tooltip_id = 0;
	}
	++$tooltip_id;
	?>
	<button aria-expanded="false" aria-controls="wpc-wpcf7-airtable-tooltip-<?php echo esc_attr( $tooltip_id ); ?>" class="wpc-wpcf7-airtable-tooltip__btn js-wpc-wpcf7-airtable-tooltip-btn">
		<span class="screen-reader-text"><?php echo esc_html( __( 'help', 'wpc-wpcf7-at' ) ); ?></span>
		<span class="wpc-wpcf7-airtable-tooltip__icon">?</span>
		<div id="wpc-wpcf7-airtable-tooltip-<?php echo esc_attr( $tooltip_id ); ?>" class="wpc-wpcf7-airtable-tooltip__text" aria-hidden="true"><?php echo wp_kses_post( $tooltip_text ); ?></div>
	</button>
	<?php
}


/**
 * Builds the editor panel for the wpc_airtable property.
 *
 * @param array $panels Contact Form 7 panels.
 * @see 'wpcf7_editor_panels' filter hook.
 */
function editor_panels( $panels ) {
	$service = WPCF7_Airtable_Service::get_instance();

	if ( ! $service->is_active() ) {
		return $panels;
	}

	$contact_form = \WPCF7_ContactForm::get_current();

	$prop = wp_parse_args(
		$contact_form->prop( 'wpc_airtable' ),
		array(
			'app_id_selected' => '',
			'table_selected'  => '',
			'mapping'         => array(),
		)
	);

	$editor_panel = function () use ( $prop, $service, $contact_form ) {
		$description = sprintf(
		/* translators: %s: html link */
			esc_html( __( 'You can set up the Airtable integration here. For details, see %s.', 'wpc-wpcf7-at' ) ),
			wpcf7_link(
				__( 'https://wordpress.org/plugins/wpconnect-contactform7-airtable/', 'wpc-wpcf7-at' ),
				__( 'Airtable integration', 'wpc-wpcf7-at' )
			)
		);
		$app_id_selected = $prop['app_id_selected'];
		$table_selected  = $prop['table_selected'];

		?>
		<style>
			/*
			 * Tabs for integration modules
			 */


			#wpc-airtable-panel .dashicons {
				text-decoration: none;
			}
			#wpc-airtable-panel .form-table th {
				width: 160px;
			}

			#wpc-airtable-panel td p {
				margin-top: 12px;
			}

			#wpc-airtable-panel .is-mapped {
				color: #00A32A;
			}

			#wpc-airtable-panel .is-error {
				color: #D63638;
			}
			#wpc-airtable-panel .is-warning {
				color: #DBA617;
			}

			.wpc-wpcf7-airtable-tooltip__btn {
				position: relative;
				display: inline-block;
				margin-left: 10px;
				border: 0;
				padding: 5px;
				background: none;
			}
			.wpc-wpcf7-airtable-tooltip__icon {
				border-radius: 50%;
				line-height: 1;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 1.5em;
				width: 1.5em;
				padding: 0;
				border: 1px solid;
				font-size: 0.8em;
			}
			.wpc-wpcf7-airtable-tooltip__text {
				position: absolute;
				width: 200px;
				line-height: 1.3;
				background: #FFF;
				border: 1px solid #aaa;
				padding: 8px 11px;
				border-radius: 3px;
				bottom: 100%;
				left: 50%;
				margin-left: -100px;
				box-shadow: 3px 3px 10px rgba(0,0,0,0.2);
			}
			.wpc-wpcf7-airtable-tooltip__text[aria-hidden='true'] {
				display: none;
			}

		</style>
		<script>
			jQuery(function ($) {
				var lookUpField = $('#wpc-wpcf7-airtable-table-lookup');
				var showError = function (message) {
					lookUpField.next('.error,.notice-success').remove();
					lookUpField.after($('<div class="error"></div>').text(message));
				};
				lookUpField.change(function () {
					var url = $(this).val();
					var base = 'https://airtable.com/';
					if (url.indexOf(base) !== 0) {
						showError(wp.i18n.__('Invalid Airtable URL', 'wpc-wpcf7-at'));
					}
					url = url.replace(base, '');
					var urlParts = url.split('/');
					if (urlParts.length === 0 || urlParts[0].length < 2) {
						showError(wp.i18n.__('Invalid Airtable URL', 'wpc-wpcf7-at'));
					}
					lookUpField.next('.error,.notice-success').remove();
					lookUpField.after($('<div class="notice notice-success"></div>').text(
						wp.i18n.__('Table found.', 'wpc-wpcf7-at')
					));
					$('#wpc-wpcf7-airtable-app-id-selected').val(urlParts[0]);
					$('#wpc-wpcf7-airtable-table-selected').val(urlParts[1]);

				});

				$('.js-wpc-wpcf7-airtable-tooltip-btn').each(function () {
					var btn = $(this);
					var tooltip = $('#' + $(this).attr('aria-controls'));
					btn.on('mouseenter click', function () {
						if (btn.attr('aria-expanded') === 'false') {
							tooltip.attr('aria-hidden', 'false');
							btn.attr('aria-expanded', 'true');
						}
					});
					btn.on('mouseleave click', function () {
						if (btn.attr('aria-expanded') === 'true') {
							tooltip.attr('aria-hidden', 'true');
							btn.attr('aria-expanded', 'false');
						}
					});
				});
			});
		</script>

		<h2><?php echo esc_html( __( 'Airtable', 'wpc-wpcf7-at' ) ); ?></h2>

		<fieldset>
			<legend><?php echo wp_kses_post( $description ); ?></legend>

			<table class="form-table" role="presentation">
				<tbody>
				<tr class="">
					<th scope="row"><?php echo esc_html( __( 'Table lookup', 'wpc-wpcf7-at' ) ); ?><?php tooltip( __( 'Paste full Airtable table URL, it will populate the App ID and Table id fields.', 'wpc-wpcf7-at' ) ); ?></th>
					<td>
						<input type="search" name="wpc-wpcf7-airtable[table_lookup]" id="wpc-wpcf7-airtable-table-lookup" value="" placeholder="Paste Airtable table URL here" />
					</td>
				</tr>
				<tr>
					<th scope="row">
					<?php
						echo esc_html( __( 'App ID', 'wpc-wpcf7-at' ) );
						tooltip( __( 'Use the Table lookup field above or visit the link below to find your App ID', 'wpc-wpcf7-at' ) . '<br /><a href="https://airtable.com/api" target="_blank">https://airtable.com/api</a>' );
					?>
					</th>
					<td>
						<input type="text" name="wpc-wpcf7-airtable[app_id_selected]" id="wpc-wpcf7-airtable-app-id-selected" value="<?php echo esc_attr( $app_id_selected ); ?>" />
					</td>
				</tr>
				<tr>
					<th scope="row">
					<?php
						echo esc_html( __( 'Table id or name', 'wpc-wpcf7-at' ) );
						tooltip( __( 'Use the Table lookup field above or visit the link below to find your Table id', 'wpc-wpcf7-at' ) . '<br /><a href="https://airtable.com/api" target="_blank">https://airtable.com/api</a>' );
					?>
					</th>
					<td>
						<input type="text" name="wpc-wpcf7-airtable[table_selected]" id="wpc-wpcf7-airtable-table-selected" value="<?php echo esc_attr( $table_selected ); ?>" />
					</td>
				</tr>
				</tbody>
			</table>
			<?php
			if ( $table_selected ) {
				?>
				<h3><?php echo esc_html( __( 'Table fields', 'wpc-wpcf7-at' ) ); ?></h3>
				<p>
					<?php echo esc_html( __( 'Enter an Airtable field name for each Contact Form 7 field to map them.', 'wpc-wpcf7-at' ) ); ?><br />
					<?php echo esc_html( __( 'Be careful, field names should be exactly the same or the form won\'t be saved.', 'wpc-wpcf7-at' ) ); ?>
				</p>

				<table class="widefat fixed striped" style="max-width: 600px;">
					<thead>
					<tr>
						<th><?php echo esc_html( __( 'Contact Form 7 field', 'wpc-wpcf7-at' ) ); ?></th>
						<th><?php echo esc_html( __( 'Airtable field name', 'wpc-wpcf7-at' ) ); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$field_mapper = WPCF7_Field_Mapper::get_instance();

					$columns = Helpers\get_airtable_table_columns( $app_id_selected, $table_selected );

					$mapped_tags = Helpers\get_mapped_tags_from_contact_form( $contact_form, $columns );

					$mapped_columns         = array();
					$available_columns_name = array_map(
						function ( $column ) {
							return $column['name'];
						},
						$columns
					);

					foreach ( $contact_form->scan_form_tags() as $tag ) {
						if ( empty( $tag->name ) ) {
							continue;
						}
						?>
						<tr>
							<?php
							$tag_name             = $tag->name;
							$selected_column_name = '';
							$mapped_class         = '';
							$mapped_text          = $tag_name;
							$mapped_error_desc    = '';
							if ( isset( $mapped_tags[ $tag_name ] ) ) {
								$selected_column_name = $mapped_tags[ $tag_name ]['airtable_field_name'];
								$selected_column_type = $mapped_tags[ $tag_name ]['airtable_field_type'];

								$mapped_class = 'is-mapped';
								/* translators: %s: tag name */
								$mapped_text = sprintf( __( '%s: mapped', 'wpc-wpcf7-at' ), $tag_name );

								if ( 'multipleAttachments' === $selected_column_type && ! $field_mapper->check_field_compat( $tag->basetype, 'multipleAttachments' ) ) {
									$mapped_class = 'is-error';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be an Attachment field, it should be mapped with a Contact Form 7 file field.', 'wpc-wpcf7-at' ), $selected_column_name );
								} elseif ( 'multipleSelects' === $selected_column_type && ! $field_mapper->check_field_compat( $tag->basetype, 'multipleSelects' ) ) {
									$mapped_class = 'is-error';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be a Multiple Select field, it should be mapped with a Contact Form 7 select, checkbox or radio field.', 'wpc-wpcf7-at' ), $selected_column_name );
								} elseif ( 'multipleSelects' === $selected_column_type ) {
									$mapped_class = 'is-warning';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be a Multiple Select field, the options should match the ones you have on Airtable.', 'wpc-wpcf7-at' ), $selected_column_name );
								} elseif ( 'url' === $selected_column_type && ! $field_mapper->check_field_compat( $tag->basetype, 'url' ) ) {
									$mapped_class = 'is-warning';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be an URL field, it should be mapped with a Contact Form 7 URL field.', 'wpc-wpcf7-at' ), $selected_column_name );
								} elseif ( 'date' === $selected_column_type && ! $field_mapper->check_field_compat( $tag->basetype, 'date' ) ) {
									$mapped_class = 'is-warning';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be a date field, it should be mapped with a Contact Form 7 date field.', 'wpc-wpcf7-at' ), $selected_column_name );
								} elseif ( 'number' === $selected_column_type && ! $field_mapper->check_field_compat( $tag->basetype, 'number' ) ) {
									$mapped_class = 'is-warning';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be a number field, it should be mapped with a Contact Form 7 number or range field.', 'wpc-wpcf7-at' ), $selected_column_name );
								} elseif ( 'email' === $selected_column_type && ! $field_mapper->check_field_compat( $tag->basetype, 'email' ) ) {
									$mapped_class = 'is-warning';
									/* translators: %s: tag name */
									$mapped_error_desc = sprintf( __( 'The column "%s" looks like to be an email field, it should be mapped with a Contact Form 7 email field.', 'wpc-wpcf7-at' ), $selected_column_name );
								}
							}
							if ( ! empty( $selected_column_name ) ) {
								$mapped_columns[] = $selected_column_name;
							}

							?>
							<td class="<?php echo esc_attr( $mapped_class ); ?>">
								<?php
								echo esc_html( $tag_name );
								?>
								<div class="screen-reader-text"><?php echo esc_html( $mapped_text ); ?></div>
								<?php
								if ( ! empty( $mapped_error_desc ) ) {
									?>
								<div class="wpc-wpcf7-notion-error"><?php echo esc_html( $mapped_error_desc ); ?></div>
									<?php
								}
								?>
							</td>
							<td>
								<input name="wpc-wpcf7-airtable[mapping][<?php echo esc_attr( $tag_name ); ?>]" value="<?php echo esc_attr( $selected_column_name ); ?>" />
								<?php
								$columns
								?>
							</td>
						</tr>
						<?php
					}

					?>
					</tbody>
					<tr></tr>
				</table>

				<?php

				$unmapped_columns_name = array_diff( $available_columns_name, $mapped_columns );
				if ( count( $available_columns_name ) > 0 && count( $unmapped_columns_name ) > 0 ) {
					?>
					<p><strong>
							<?php
							echo esc_html( _n( 'The Airtable\'s field name below is not mapped yet:', 'The Airtable\'s fields name below are not mapped yet:', count( $unmapped_columns_name ), 'wpc-wpcf7-at' ) );
							echo '<br />' . esc_html( implode( ', ', $unmapped_columns_name ) );
							?>
						</strong></p>
					<?php
				}
			}
			?>
		</fieldset>
		<?php
	};

	$panels += array(
		'wpc-airtable-panel' => array(
			'title'    => __( 'Airtable', 'wpc-wpcf7-at' ),
			'callback' => $editor_panel,
		),
	);

	return $panels;
}
