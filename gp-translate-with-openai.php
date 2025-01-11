<?php
/*
 * Plugin Name: GP Translate with OpenAI
 * Plugin URI: https://blog.meloniq.net/gp-translate-with-openai
 * Description: GlotPress Translate with OpenAI.
 * Version: 1.0
 * Author: MELONIQ.NET
 * Author URI: https://meloniq.net/
 * Tags: glotpress, translate, machine translate, openai, chatgpt
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: gp-translate-with-openai
 */

namespace Gp\OpenaiTranslate;

// If this file is accessed directly, then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GP_OAI_TD', 'gp-translate-with-openai' );
define( 'GP_OAI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GP_OAI_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// Include the autoloader so we can dynamically include the rest of the classes.
require_once trailingslashit( dirname( __FILE__ ) ) . 'vendor/autoload.php';


/**
 * Setup plugin data.
 *
 * @return void
 */
function setup() {
	global $gp_oai_translate;

	$gp_oai_translate['admin-page'] = new AdminPage();
	$gp_oai_translate['settings']   = new Settings();
	$gp_oai_translate['profile']    = new Profile();
	$gp_oai_translate['frontend']   = new Frontend();
	$gp_oai_translate['ajax']       = new Ajax();

}
add_action( 'after_setup_theme', 'Gp\OpenaiTranslate\setup' );


/**
 * Load Text-Domain.
 *
 * @return void
 */
function load_textdomain() {
	load_plugin_textdomain( GP_OAI_TD, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'Gp\OpenaiTranslate\load_textdomain' );

