<?php
/**
 * WCF7 Airtable service class.
 *
 * @package wpc-wpcf7-at
 */

namespace WPC_WPCF7_AT;

defined( 'ABSPATH' ) || exit;

use WPC_WPCF7_AT\Options;

/**
 * WCF7 Airtable service class.
 * Manages service registration and Airtable api key.
 */
class WPCF7_Airtable_Service extends \WPCF7_Service {

	/**
	 * WPCF7_Airtable_Service instance
	 *
	 * @var WPCF7_Airtable_Service $instance
	 */
	private static $instance;

	/**
	 * Airtable Api Key
	 *
	 * @var string|mixed $api_key
	 */
	private $api_key = '';

	/**
	 * Returns WPCF7_Airtable_Service instance
	 *
	 * @return WPCF7_Airtable_Service
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Fill $api_key & $app_id properties with the one saved in the WPCF7 options
	 */
	private function __construct() {
		$option = \WPCF7::get_option( Options\get_option_key( 'airtable_service' ) );

		if ( isset( $option['api_key'] ) ) {
			$this->api_key = $option['api_key'];
		}
	}

	/**
	 * Returns service title
	 *
	 * @return mixed
	 */
	public function get_title() {
		return __( 'Airtable', 'wpc-wpcf7-at' );
	}

	/**
	 * Returns true if the api key is defined
	 *
	 * @return bool
	 */
	public function is_active() {
		return (bool) $this->get_api_key();
	}

	/**
	 * Returns the api key
	 *
	 * @return mixed|string
	 */
	public function get_api_key() {
		return $this->api_key;
	}

	/**
	 * Returns the service categories
	 *
	 * @return string[]
	 */
	public function get_categories() {
		return array( 'collaboration_platform' );
	}

	/**
	 * Returns the service icon
	 *
	 * @return string
	 */
	public function icon() {
		return ''; }

	/**
	 * Returns the link to the Airtable website
	 *
	 * @return string|void
	 */
	public function link() {
		echo wp_kses_post(
			wpcf7_link(
				'https://airtable.com',
				'airtable.com'
			)
		);
	}

	/**
	 * Sends a debug information for a remote request to the PHP error log.
	 *
	 * @param string         $url URL to retrieve.
	 * @param array          $request Request arguments.
	 * @param array|WP_Error $response The response or WP_Error on failure.
	 * @return void
	 */
	protected function log( $url, $request, $response ) {
		wpcf7_log_remote_request( $url, $request, $response );
	}

	/**
	 * Returns the integration admin page.
	 *
	 * @param string|array|object $args Args.
	 * @return mixed
	 */
	protected function menu_page_url( $args = '' ) {
		$args = wp_parse_args( $args, array() );

		$url = menu_page_url( 'wpcf7-integration', false );
		$url = add_query_arg( array( 'service' => 'wpc_airtable' ), $url );

		if ( ! empty( $args ) ) {
			$url = add_query_arg( $args, $url );
		}

		return $url;
	}

	/**
	 * Saves integration form data.
	 *
	 * @return void
	 */
	protected function save_data() {
		\WPCF7::update_option(
			Options\get_option_key( 'airtable_service' ),
			array(
				'api_key' => $this->api_key,
			)
		);
	}

	/**
	 * Reset service data.
	 *
	 * @return void
	 */
	protected function reset_data() {
		$this->api_key = null;
		$this->save_data();
	}

	/**
	 * Integration form handler.
	 *
	 * @param string $action Action.
	 * @return void
	 */
	public function load( $action = '' ) {
		if ( 'setup' === $action && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
			check_admin_referer( 'wpc-wpcf7-airtable-setup' );

			if ( ! empty( $_POST['reset'] ) ) {
				$this->reset_data();
				$redirect_to = $this->menu_page_url( 'action=setup' );
			} else {
				$this->api_key = isset( $_POST['api_key'] )
					? trim( sanitize_text_field( wp_unslash( $_POST['api_key'] ) ) )
					: '';

				$confirmed = ! empty( $this->api_key );
				Helpers\process_airtable_test_request_response(
					$confirmed ? true : new \WP_Error( __( 'Invalid key values.', 'wpc-wpcf7-at' ) )
				);

				if ( true === $confirmed ) {
					$redirect_to = $this->menu_page_url(
						array(
							'message' => 'success',
						)
					);

					$this->save_data();
				} elseif ( false === $confirmed ) {
					$redirect_to = $this->menu_page_url(
						array(
							'action'  => 'setup',
							'message' => 'unauthorized',
						)
					);
				} else {
					$redirect_to = $this->menu_page_url(
						array(
							'action'  => 'setup',
							'message' => 'invalid',
						)
					);
				}
			}

			wp_safe_redirect( $redirect_to );
			exit();
		}
	}

	/**
	 * Show admin notices.
	 *
	 * @param string $message Admin notice message.
	 * @return void
	 */
	public function admin_notice( $message = '' ) {
		if ( 'unauthorized' === $message ) {
			echo sprintf(
				'<div class="notice notice-error"><p><strong>%1$s</strong>: %2$s</p></div>',
				esc_html( __( 'Error', 'wpc-wpcf7-at' ) ),
				esc_html( __( 'You have not been authenticated. Make sure the provided API key is correct.', 'wpc-wpcf7-at' ) )
			);
		}

		if ( 'invalid' === $message ) {
			echo sprintf(
				'<div class="notice notice-error"><p><strong>%1$s</strong>: %2$s</p></div>',
				esc_html( __( 'Error', 'wpc-wpcf7-at' ) ),
				esc_html( __( 'Invalid key values.', 'wpc-wpcf7-at' ) )
			);
		}

		if ( 'success' === $message ) {
			echo sprintf(
				'<div class="notice notice-success"><p>%s</p></div>',
				esc_html( __( 'Settings saved.', 'wpc-wpcf7-at' ) )
			);
		}
	}

	/**
	 * Displays information / service state.
	 *
	 * @param string $action Action.
	 * @return void
	 */
	public function display( $action = '' ) {
		echo '<p>' . sprintf(
			/* translators: %s: html link */
			esc_html( __( 'Store form submissions in Airtable table. For details, see %s.', 'wpc-wpcf7-at' ) ),
			wp_kses_post(
				wpcf7_link(
					__( 'https://wordpress.org/plugins/wpconnect-contactform7-airtable/', 'wpc-wpcf7-at' ),
					__( 'Airtable integration', 'wpc-wpcf7-at' )
				)
			)
		) . '</p>';

		if ( $this->is_active() ) {
			echo sprintf(
				'<p class="dashicons-before dashicons-yes">%s</p>',
				esc_html( __( 'Airtable is active on this site.', 'wpc-wpcf7-at' ) )
			);
		}

		if ( 'setup' === $action ) {
			$this->display_setup();
		} else {
			echo sprintf(
				'<p><a href="%1$s" class="button">%2$s</a></p>',
				esc_url( $this->menu_page_url( 'action=setup' ) ),
				esc_html( __( 'Setup integration', 'wpc-wpcf7-at' ) )
			);
		}
	}

	/**
	 * Displays service form.
	 *
	 * @return void
	 */
	private function display_setup() {
		$api_key = $this->get_api_key();

		?>
		<form method="post" action="<?php echo esc_url( $this->menu_page_url( 'action=setup' ) ); ?>">
			<?php wp_nonce_field( 'wpc-wpcf7-airtable-setup' ); ?>
			<table class="form-table">
				<tbody>
				<tr>
					<th scope="row"><label for="publishable"><?php echo esc_html( __( 'API key', 'wpc-wpcf7-at' ) ); ?></label></th>
					<td>
					<?php
					if ( $this->is_active() ) {
						echo esc_html( wpcf7_mask_password( $api_key, 4, 8 ) );
						echo sprintf(
							'<input type="hidden" value="%s" id="api_key" name="api_key" />',
							esc_attr( $api_key )
						);
					} else {
						echo sprintf(
							'<input type="text" aria-required="true" value="%s" id="api_key" name="api_key" class="regular-text code" />',
							esc_attr( $api_key )
						);
					}
					?>
						</td>
				</tr>
				</tbody>
			</table>
			<?php
			if ( $this->is_active() ) {
				submit_button(
					_x( 'Remove key', 'API keys', 'wpc-wpcf7-at' ),
					'small',
					'reset'
				);
			} else {
				submit_button( __( 'Save changes', 'wpc-wpcf7-at' ) );
			}
			?>
		</form>
		<?php
	}
}
