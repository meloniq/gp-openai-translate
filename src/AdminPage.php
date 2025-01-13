<?php
namespace Meloniq\GpOpenaiTranslate;

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
			__( 'GP Translate with OpenAI', 'gp-translate-with-openai' ),
			__( 'GP Translate with OpenAI', 'gp-translate-with-openai' ),
			'manage_options',
			'gp-translate-with-openai',
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
			<h1><?php esc_html_e( 'GP Translate with OpenAI', 'gp-translate-with-openai' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'gpoai_settings' );
				do_settings_sections( 'gpoai_settings' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

}
