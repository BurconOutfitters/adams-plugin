<?php
/**
 * ACF prices fields for the Packing Prices & Guilines template.
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
 * ACF fprices ields for the Packing Prices & Guilines template.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Fields_Packing_Prices {

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
				'key'    => 'group_594fdcfde5ebf-2',
				'title'  => __( 'Packing Prices', 'adams-plugin' ),
				'fields' => [
					[
						'key'               => 'field_5951664647c2a',
						'label'             => __( 'Categories', 'adams-plugin' ),
						'name'              => 'aps_packing_price_list',
						'type'              => 'repeater',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => 'field_595168a2d4b2a',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'row',
						'button_label'      => __( 'Add Category', 'adams-plugin' ),
						'sub_fields'        => [
							[
								'key'               => 'field_595168a2d4b2a',
								'label'             => __( 'Category Title', 'adams-plugin' ),
								'name'              => 'aps_packing_price_list_category_title',
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
								'key'               => 'field_595168e3d4b2b',
								'label'             => __( 'Category Description', 'adams-plugin' ),
								'name'              => 'aps_packing_price_list_category_description',
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
							[
								'key'               => 'field_59516908d4b2c',
								'label'             => __( 'Category Entry', 'adams-plugin' ),
								'name'              => 'aps_packing_price_list_entry',
								'type'              => 'repeater',
								'instructions'      => __( '', 'adams-plugin' ),
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'collapsed'         => 'field_594fddc43e795',
								'min'               => 0,
								'max'               => 0,
								'layout'            => 'block',
								'button_label'      => __( 'Add Entry', 'adams-plugin' ),
								'sub_fields'        => [
									[
										'key'               => 'field_594fddc43e795',
										'label'             => __( 'Item Name', 'adams-plugin' ),
										'name'              => 'aps_packing_price_list_entry_item',
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
										'placeholder'       => __( 'Groceries, propane tank, 2x4 board, etc.', 'adams-plugin' ),
										'prepend'           => '',
										'append'            => '',
										'maxlength'         => '',
									],
									[
										'key'               => 'field_594fdde13e796',
										'label'             => __( 'Item Description', 'adams-plugin' ),
										'name'              => 'aps_packing_price_list_entry_description',
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
										'key'               => 'field_594fde0d3e797',
										'label'             => __( 'Price Format', 'adams-plugin' ),
										'name'              => 'aps_packing_price_list_entry_format',
										'type'              => 'select',
										'instructions'      => __( '', 'adams-plugin' ),
										'required'          => 0,
										'conditional_logic' => 0,
										'wrapper'           => [
											'width' => '50',
											'class' => '',
											'id'    => '',
										],
										'choices'           => [
											'weight' => __( 'Per Pound', 'adams-plugin' ),
											'item'   => __( 'Per Item', 'adams-plugin' ),
											'hourly' => __( 'Per Hour', 'adams-plugin' ),
											'call'   => __( 'Call for Details', 'adams-plugin' ),
										],
										'default_value'     => [],
										'allow_null'        => 0,
										'multiple'          => 0,
										'ui'                => 0,
										'ajax'              => 0,
										'return_format'     => 'value',
										'placeholder'       => __( '', 'adams-plugin' ),
									],
									[
										'key'               => 'field_594fde8d3e798',
										'label'             => __( 'Price', 'adams-plugin' ),
										'name'              => 'aps_packing_price_list_entry_weight_price',
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
										'maxlength'         => '',
										'placeholder'       => __( '', 'adams-plugin' ),
										'prepend'           => '',
										'append'            => '',
									],
									[
										'key'               => 'field_594fe2293559f',
										'label'             => __( 'Price', 'adams-plugin' ),
										'name'              => 'aps_packing_price_list_entry_item_price',
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
										'maxlength'         => '',
										'placeholder'       => __( '', 'adams-plugin' ),
										'prepend'           => '',
										'append'            => '',
									],
								],
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
						]
					]
				],
				'menu_order' => 1,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => [
					0 => 'the_content',
					1 => 'custom_fields',
					2 => 'discussion',
					3 => 'comments',
					4 => 'slug',
					5 => 'author',
					6 => 'categories',
					7 => 'tags',
					8 => 'send-trackbacks',
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
function adams_acf_fields_packing_prices() {

	return ACF_Fields_Packing_Prices::instance();

}

// Run an instance of the class.
adams_acf_fields_packing_prices();