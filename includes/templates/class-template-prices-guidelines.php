<?php
/**
 * ACF fields for the Packing Prices & Guilines template.
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
 * ACF fields for the Packing Prices & Guilines template.
 *
 * @since  1.0.0
 * @access public
 */
final class Template_Prices_Guidelines {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

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

		$this->templates = [];

		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				[ $this, 'register_project_templates' ]
			);
		} else {
			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', [ $this, 'add_new_template' ]
			);
		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data',
			[ $this, 'register_project_templates' ]
		);

		// Add a filter to the template include to determine if the page has our
		// template assigned and return it's path
		add_filter(
			'template_include',
			[ $this, 'view_project_template' ]
		);

		// Add your templates to this array.
		$this->templates = [
			'pricing-guidelines.php' => __( 'Pricing & Guidelines', 'adams-plugin' ),
		];

	}

	/**
	 * Adds our template to the page dropdown for v4.7+.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public function add_new_template( $posts_templates ) {

		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;

	}
	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache.
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array.
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = [];
		}

		// New cache, therefore remove the old one.
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates.
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	}
	/**
	 * Checks if the template is assigned to the page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public function view_project_template( $template ) {

		// Return the search template if we're searching (instead of the template for the first result).
		if ( is_search() ) {
			return $template;
		}

		// Get global post
		global $post;

		// Return template if post is empty.
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined.
		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		// Allows filtering of file path.
		$filepath = apply_filters( 'page_templater_plugin_dir_path', plugin_dir_path( __FILE__ ) );
		$file     =  $filepath . get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first.
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function adams_template_prices_guidelines() {

	return Template_Prices_Guidelines::instance();

}

// Run an instance of the class.
adams_template_prices_guidelines();