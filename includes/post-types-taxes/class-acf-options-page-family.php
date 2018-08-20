<?php
/**
 * ACF options page fields for the Family Members post type settings.
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
 * ACF options page fields for the Family Members post type settings.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Options_Family {

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

			acf_add_local_field_group( [
				'key'    => 'group_56ff30ab43a09',
				'title'  => __( 'Family Settings', 'adams-plugin' ),
				'fields' => [
					[
						'key'               => 'field_56ff30ab4b288',
						'label'             => __( 'Template Text', 'adams-plugin' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_56ff5ee5ea190',
						'label'             => __( 'Single Family Posts', 'adams-plugin' ),
						'name'              => 'single_family_posts',
						'type'              => 'divider',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'custom_css'        => '',
						'font_size'         => 14,
					],
					[
						'key'               => 'field_56ff30ab4b307',
						'label'             => __( 'Prepend Animal Name', 'adams-plugin' ),
						'name'              => 'prepend_family_name',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the name in the title of single family member posts.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'Meet', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b389',
						'label'             => __( 'Append Animal Name', 'adams-plugin' ),
						'name'              => 'append_family_name',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the name in the title of single family member posts.', 'adams-plugin' ),
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff60a91ff80',
						'label'             => __( 'Default Description', 'adams-plugin' ),
						'name'              => 'family_excerpt_fallback',
						'type'              => 'textarea',
						'instructions'      => __( 'This is fallback text for single family posts when no description is given in the excerpt field on the family edit screen.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'adams-plugin' ),
						'maxlength'         => '',
						'rows'              => 3,
						'new_lines'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b485',
						'label'             => __( 'Prepend Species Link', 'adams-plugin' ),
						'name'              => 'prepend_post_species_link',
						'type'              => 'text',
						'instructions'      => __( 'Displays on single family member posts, before the species name that links to other family members in the same species.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'View more', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b502',
						'label'             => __( 'Append Species Link', 'adams-plugin' ),
						'name'              => 'append_post_species_link',
						'type'              => 'text',
						'instructions'      => __( 'Displays on single family member posts, after the species name that links to other family members in the same species.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'family members »', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff5f1bea191',
						'label'             => __( 'Family Post Archives', 'adams-plugin' ),
						'name'              => 'family_post_archives',
						'type'              => 'divider',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'custom_css'        => '',
						'font_size'         => 14,
					],
					[
						'key'               => 'field_56ff30ab4b57d',
						'label'             => __( 'Archive Pages Title', 'adams-plugin' ),
						'name'              => 'family_archive_title',
						'type'              => 'text',
						'instructions'      => __( 'Displays as the title of archive pages for family member posts (<a href="http://adamspackstation.com/family/" target="_blank">adamspackstation.com/family</a>)', 'adams-plugin' ),
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff5f41ea192',
						'label'             => __( 'Family Species Archives', 'adams-plugin' ),
						'name'              => 'family_species_archives',
						'type'              => 'divider',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'custom_css'        => '',
						'font_size'         => 14,
					],
					[
						'key'               => 'field_56ff30ab4b5fd',
						'label'             => __( 'Prepend Species Name', 'adams-plugin' ),
						'name'              => 'prepend_species_name',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the name of the species in the title of archive pages.', 'adams-plugin' ),
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b67c',
						'label'             => __( 'Append Species Name', 'adams-plugin' ),
						'name'              => 'apppend_species_name',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the name of the species in the title of archive pages.', 'adams-plugin' ),
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b6fe',
						'label'             => __( 'Family Notice', 'adams-plugin' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b781',
						'label'             => __( 'Add Family Notice', 'adams-plugin' ),
						'name'              => 'add_family_notice',
						'type'              => 'true_false',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Check to add a notice to the top of family member posts & pages', 'adams-plugin' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					],
					[
						'key'               => 'field_56ff30ab4b80b',
						'label'             => __( 'Location', 'adams-plugin' ),
						'name'              => 'family_notice_location',
						'type'              => 'checkbox',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_56ff30ab4b781',
									'operator' => '==',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'posts'   => __( 'Single Family Member Posts', 'adams-plugin' ),
							'archive' => __( 'Family Member Archive Pages', 'adams-plugin' ),
							'season'  => __( 'Family Member Species Pages', 'adams-plugin' ),
						],
						'default_value'     => [
						],
						'layout'            => 'vertical',
						'toggle'            => 0,
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_56ff30ab4b894',
						'label'             => __( 'Family Notice', 'adams-plugin' ),
						'name'              => 'family_notice',
						'type'              => 'wysiwyg',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_56ff30ab4b781',
									'operator' => '==',
									'value'    => '1',
								],
							],
						],
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
						'key'               => 'field_56ff30ab4b916',
						'label'             => __( 'Social Sharing', 'adams-plugin' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4b99d',
						'label'             => __( 'Meta Tags for Sharing', 'adams-plugin' ),
						'name'              => '',
						'type'              => 'message',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'The various social sites & apps, as well as some email clients, will display information about a web page when the URL (link) is pasted or typed to share with others. WordPress does not inherently offer featured images and excerpts (featured text) for archive pages. Use the settings to set what people will see when sharing a URL. The run the URL through the Facebook Debugger to "scrape" the latest information: <a href="https://developers.facebook.com/tools/debug/" target="_blank">https://developers.facebook.com/tools/debug/</a>

			<a href="http://adamspackstation.com/wp-content/plugins/packstation-functions/images/aps-fb-link-example.jpg" class="thickbox" target="_blank"><strong>Example Facebook Share</strong></a>', 'adams-plugin' ),
						'new_lines'         => 'wpautop',
						'esc_html'          => 0,
					],
					[
						'key'               => 'field_56ff5f6bea193',
						'label'             => __( 'Family Post Archives', 'adams-plugin' ),
						'name'              => 'family_post_archives_copy',
						'type'              => 'divider',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'custom_css'        => '',
						'font_size'         => 14,
					],
					[
						'key'               => 'field_56ff30ab4baa0',
						'label'             => __( 'Archive Title', 'adams-plugin' ),
						'name'              => 'family_archive_sharing_title',
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4bb21',
						'label'             => __( 'Archive Description', 'adams-plugin' ),
						'name'              => 'family_archive_description',
						'type'              => 'textarea',
						'instructions'      => __( 'Maximum of 300 characters', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'adams-plugin' ),
						'maxlength'         => 300,
						'rows'              => 2,
						'new_lines'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4bba2',
						'label'             => __( 'Archive Image', 'adams-plugin' ),
						'name'              => 'family_archive_image',
						'type'              => 'image',
						'instructions'      => __( 'It is best to upload the image to the Media Library prior to setting it here so that you can use the Post Thumbnail Editor to crop the "Sharing Image" size.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'url',
						'preview_size'      => 'Sharing Image',
						'library'           => 'all',
						'min_width'         => 600,
						'min_height'        => 315,
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					],
					[
						'key'               => 'field_56ff5f87ea194',
						'label'             => __( 'Family Species Archives', 'adams-plugin' ),
						'name'              => 'family_species_archives_copy',
						'type'              => 'divider',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'custom_css'        => '',
						'font_size'         => 14,
					],
					[
						'key'               => 'field_56ff30ab4bc24',
						'label'             => __( 'Prepend Species Name', 'adams-plugin' ),
						'name'              => 'prepend_species_archive_name',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the name of the species.', 'adams-plugin' ),
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4bca7',
						'label'             => __( 'Append Species Name', 'adams-plugin' ),
						'name'              => 'append_species_archive_name',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the name of the species.', 'adams-plugin' ),
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
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4bd29',
						'label'             => __( 'Species Archive Description', 'adams-plugin' ),
						'name'              => 'species_archive_description',
						'type'              => 'textarea',
						'instructions'      => __( 'This must be a general description for a species types.<br />
			Maximum of 300 characters.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( '', 'adams-plugin' ),
						'maxlength'         => 300,
						'rows'              => 2,
						'new_lines'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56ff30ab4bd89',
						'label'             => __( 'Species Archive Image', 'adams-plugin' ),
						'name'              => 'species_archive_image',
						'type'              => 'image',
						'instructions'      => __( 'It is best to upload the image to the Media Library prior to setting it here so that you can use the Post Thumbnail Editor to crop the "Sharing Image" size.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'url',
						'preview_size'      => 'Sharing Image',
						'library'           => 'all',
						'min_width'         => 600,
						'min_height'        => 315,
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					],
				],
				'location' => [
					[
						[
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'acf-options-family-settings',
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => __( 'Family Settings page. The Adams\' Pack Station Functions plugin must be activated for the options page to display.', 'adams-plugin' )
			] );

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
function adams_acf_options_family() {

	return ACF_Options_Family::instance();

}

// Run an instance of the class.
adams_acf_options_family();