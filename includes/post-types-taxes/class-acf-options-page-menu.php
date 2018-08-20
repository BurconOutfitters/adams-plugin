<?php
/**
 * ACF options page fields for the Menu Items post type settings.
 *
 * @package    Burcon_Outfitters_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Burcon\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * ACF options page fields for the Menu Items post type settings.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Options_Menu {

	/**
	 * Get an instance of the class.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return self
	 */
	private function __construct() {

		// Add ACF options page fields.
		add_action( 'plugins_loaded', [ $this, 'options_fields' ] );

	}

	/**
	 * Add ACF options page fields.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function options_fields() {

		if ( function_exists( 'acf_add_local_field_group' ) ) {



		}

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function adams_acf_options_menu() {

	return ACF_Options_Menu::instance();

}

// Run an instance of the class.
adams_acf_options_menu();