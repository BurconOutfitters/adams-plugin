<?php
/**
 * ACF guidelines fields for the Packing Prices & Guilines template.
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
 * ACF guidelines fields for the Packing Prices & Guilines template.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Fields_Packing_Guilines {

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

		// Add prices page template fields.
		add_action( 'plugins_loaded', [ $this, 'fields' ] );

	}

	/**
	 * Add prices page template fields.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function fields() {

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			acf_add_local_field_group( [
				'key'    => 'group_594fdd5e24c37-2',
				'title'  => __( 'Packing Guidelines', 'adams-plugin' ),
				'fields' => [
					[
						'key'               => 'field_594fe4a320c81',
						'label'             => __( 'Guidelines', 'adams-plugin' ),
						'name'              => 'aps_packing_guidelines',
						'type'              => 'repeater',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => 'field_594fe569c823d',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'block',
						'button_label'      => __( 'Add Topic', 'adams-plugin' ),
						'sub_fields'        => [
							[
								'key'               => 'field_594fe569c823d',
								'label'             => __( 'Topic Title', 'adams-plugin' ),
								'name'              => 'aps_packing_guidelines_topic_title',
								'type'              => 'text',
								'instructions'      => __( '', 'adams-plugin' ),
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => __( '', 'adams-plugin' ),
								'prepend'           => '',
								'append'            => '',
								'maxlength'         => '',
							],
							[
								'key'               => 'field_594fe52020c82',
								'label'             => __( 'Topic Content', 'adams-plugin' ),
								'name'              => 'aps_packing_guidelines_topic_content',
								'type'              => 'wysiwyg',
								'instructions'      => __( '', 'adams-plugin' ),
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'tabs'              => 'all',
								'toolbar'           => 'full',
								'media_upload'      => 1,
								'delay'             => 0,
							],
						],
					],
				],
				'location' => [
					[
						[
							'param'    => 'page_template',
							'operator' => '==',
							'value'    => 'pricing-guidelines.php',
						],
					],
				],
				'menu_order'            => 2,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => [
					0 => 'discussion',
					1 => 'comments',
					2 => 'slug',
					3 => 'author',
					4 => 'categories',
					5 => 'tags',
					6 => 'send-trackbacks',
				],
				'active'      => 1,
				'description' => __( '', 'adams-plugin' )
			] );

		endif;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function adams_acf_fields_packing_guilines() {

	return ACF_Fields_Packing_Guilines::instance();

}

// Run an instance of the class.
adams_acf_fields_packing_guilines();