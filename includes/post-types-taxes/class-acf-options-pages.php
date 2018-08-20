<?php
/**
 * Register Advanced Custom Fields options pages.
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
 * Register Advanced Custom Fields options pages.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Options {

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
	 * @return self
	 */
	private function __construct() {

		// Add ACF options pages.
		add_action( 'plugins_loaded', [ $this, 'options_pages' ] );

	}

	/**
     * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
     */
	public function dependencies() {

		// Fields for the News (relabeled from Post) post type settings.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'post-types-taxes/class-acf-options-page-news.php';

		// Fields for the Concert post type settings.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'post-types-taxes/class-acf-options-page-concert.php';

		// Fields for the Concert post type settings.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'post-types-taxes/class-acf-options-page-family.php';

		// Fields for the Concert post type settings.
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'post-types-taxes/class-acf-options-page-menu.php';

		// Fields for the Concert post type settings.
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'post-types-taxes/class-acf-options-page-store.php';

	}

	/**
	 * Add ACF options pages.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function options_pages() {

		if ( function_exists( 'acf_add_options_page' ) ) {

			// News (relabeled from Post) post type settings.
			acf_add_options_page(
				[
					'title'      => __( 'News Settings', 'adams-plugin' ),
					'parent'     => 'edit.php',
					'capability' => 'manage_options'
				]
			);

			// Concert post type settings.
			acf_add_options_page(
				[
					'title'      => __( 'Concert Settings', 'adams-plugin' ),
					'parent'     => 'edit.php?post_type=concert',
					'capability' => 'manage_options'
				]
			);

			// Family Members post type settings.
			acf_add_options_page(
				[
					'title'      => 'Family Settings',
					'parent'     => 'edit.php?post_type=family',
					'capability' => 'manage_options'
				]
			);

			// Menu Items post type settings.
			acf_add_options_page(
				[
					'title'      => 'Menu Settings',
					'parent'     => 'edit.php?post_type=menu',
					'capability' => 'manage_options'
				]
			);

			// Store Items post type settings.
			acf_add_options_page(
				[
					'title'      => 'Store Settings',
					'parent'     => 'edit.php?post_type=product',
					'capability' => 'manage_options'
				]
			);

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
function adams_acf_options() {

	return ACF_Options::instance();

}

// Run an instance of the class.
adams_acf_options();