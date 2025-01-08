<?php
namespace Gp\OpenaiTranslate;

class Ajax {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_ajax_gp_openai_translate', array( $this, 'translate' ), 10 );

	}

	/**
	 * Translate a string.
	 *
	 * @return void
	 */
	public function translate() {
		global $gp_openai_translate;

		if ( ! isset( $gp_openai_translate ) ) {
			wp_send_json( array( 'success' => false, 'message' => 'GlotPress not yet loaded.' ) );
		}

		$locale = sanitize_text_field( $_POST['locale'] );
		$string = sanitize_text_field( $_POST['original'] );

		$translate  = Translate::instance();
		$new_string = $translate->translate( $string, $locale );

		if ( is_wp_error( $new_string ) ) {
			$response = array( 'success' => false, 'error' => array( 'message' => $new_string->get_error_message(), 'reason' => $new_string->get_error_data() ) );
		} else {
			$response = array( 'success' => true, 'data' => array( 'translatedText' => $new_string ) );
		}

		wp_send_json( $response );
	}

}
