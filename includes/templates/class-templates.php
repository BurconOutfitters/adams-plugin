<?php
/**
 * Post and page templates.
 *
 * @package    Burcon_Outfitters_Plugin
 * @subpackage Includes\Templates
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Burcon\Includes\Templates;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Post and page templates.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Page_Templates {

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

			// Get class dependencies.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void Constructor method is empty.
	 */
	private function __construct() {}

	/**
     * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
     */
	public function dependencies() {

		// Create a Packing Prices & Guilines page template.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'templates/class-template-prices-guidelines.php';

		// ACF prices fields for the Packing Prices template.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'templates/class-acf-template-prices.php';

		// ACF guidelines fields for the Packing Guidelines template.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'templates/class-acf-template-guidelines.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function adams_post_page_templates() {

	return Post_Page_Templates::instance();

}

// Run an instance of the class.
adams_post_page_templates();