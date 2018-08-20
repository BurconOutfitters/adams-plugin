<?php
/**
 * The core plugin class.
 *
 * @package    Adams_Plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Burcon\Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Get plugins path to check for active plugins.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Define the core functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
final class Init {

	/**
	 * Get an instance of the plugin class.
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
	 * @access public
	 * @return void Constructor method is empty.
	 */
	public function __construct() {}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Translation functionality.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-i18n.php';

		// Post types and taxonomies.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/post-types-taxes/class-post-type-tax.php';

		// Post and page templates.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/templates/class-templates.php';

		// Admin/backend functionality, scripts and styles.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin.php';

		// Schedule for employees, volunteers, etc.
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/schedule/class-schedule.php';

		// Frontend functionality, scripts and styles.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'frontend/class-frontend.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function adams_init() {

	return Init::instance();

}

// Run an instance of the class.
adams_init();