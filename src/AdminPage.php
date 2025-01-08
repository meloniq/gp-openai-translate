<?php
namespace Gp\OpenaiTranslate;

class AdminPage {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu_page' ), 10 );

	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public function add_menu_page() : void {
		add_submenu_page(
			'options-general.php',
			__( 'GP OpenAI Translate', GP_OAI_TD ),
			__( 'GP OpenAI Translate', GP_OAI_TD ),
			'manage_options',
			'gp-openai-translate',
			array( $this, 'render_page' )
		);
	}

	/**
	 * Render page.
	 *
	 * @return void
	 */
	public function render_page() : void {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'GP OpenAI Translate', GP_OAI_TD ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'gp_oai_settings' );
				do_settings_sections( 'gp_oai_settings' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

}
