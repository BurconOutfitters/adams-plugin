<?php
/**
 * ACF options page fields for the News (relabeled from Post) post type settings.
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
 * ACF options page fields for the News (relabeled from Post) post type settings.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Options_News {

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
				'key'    => 'group_56fff51e62590',
				'title'  => __( 'News Settings', 'adams-plugin' ),
				'fields' => [
					[
						'key'               => 'field_56fff51e69482',
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
						'key'               => 'field_56fff51e694fc',
						'label'             => __( 'Single News Posts', 'adams-plugin' ),
						'name'              => 'single_concert_posts',
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
						'key'               => 'field_56fff51e696d2',
						'label'             => __( 'Default Description', 'adams-plugin' ),
						'name'              => 'news_excerpt_fallback',
						'type'              => 'textarea',
						'instructions'      => __( 'This is fallback text for single news posts when no description is given in the excerpt field on the post edit screen.', 'adams-plugin' ),
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
						'key'               => 'field_56fff51e69815',
						'label'             => __( 'News Post Archives', 'adams-plugin' ),
						'name'              => 'concert_post_archive',
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
						'key'               => 'field_56fff51e69887',
						'label'             => __( 'Archive Pages Title', 'adams-plugin' ),
						'name'              => 'news_archive_title',
						'type'              => 'text',
						'instructions'      => __( 'Displays as the title of archive pages for news posts (<a href="http://adamspackstation.com/news/" target="_blank">adamspackstation.com/news</a>)', 'adams-plugin' ),
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
						'key'               => 'field_56fff51e698f9',
						'label'             => __( 'News Category Archives', 'adams-plugin' ),
						'name'              => 'concert_post_archive_copy',
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
						'key'               => 'field_56fff5e19c203',
						'label'             => __( 'News Tag Archives', 'adams-plugin' ),
						'name'              => 'concert_post_archive_copy_copy',
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
						'key'               => 'field_56fff51e69a51',
						'label'             => __( 'News Notice', 'adams-plugin' ),
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
						'key'               => 'field_56fff51e69ac3',
						'label'             => __( 'Add News Notice', 'adams-plugin' ),
						'name'              => 'add_news_notice',
						'type'              => 'true_false',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Check to add a notice to the top of news posts & pages', 'adams-plugin' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					],
					[
						'key'               => 'field_56fff51e69b34',
						'label'             => __( 'Location', 'adams-plugin' ),
						'name'              => 'news_notice_location',
						'type'              => 'checkbox',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_56fff51e69ac3',
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
							'posts'   => __( 'Single News Posts', 'adams-plugin' ),
							'archive' => __( 'News Archive Pages', 'adams-plugin' ),
							'cat'     => __( 'News Category Pages', 'adams-plugin' ),
							'tag'     => __( 'News Tag Pages', 'adams-plugin' )
						],
						'default_value'     => [],
						'layout'            => 'vertical',
						'toggle'            => 0,
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_56fff51e69b8a',
						'label'             => __( 'News Notice', 'adams-plugin' ),
						'name'              => 'news_notice',
						'type'              => 'wysiwyg',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_56fff51e69ac3',
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
						'key'               => 'field_56fff51e69bfc',
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
						'key'               => 'field_56fff51e69c6e',
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
						'key'               => 'field_56fff51e69ce0',
						'label'             => __( 'News Post Archives', 'adams-plugin' ),
						'name'              => 'concert_post_archive_copy',
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
						'key'               => 'field_56fff51e69d51',
						'label'             => __( 'Archive Title', 'adams-plugin' ),
						'name'              => 'news_archive_sharing_title',
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
						'key'               => 'field_56fff51e69dc3',
						'label'             => __( 'Archive Description', 'adams-plugin' ),
						'name'              => 'news_archive_description',
						'type'              => 'textarea',
						'instructions'      => __( 'Maximum of 300 characters', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper' => [
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
						'key'               => 'field_56fff51e69e35',
						'label'             => __( 'Archive Image', 'adams-plugin' ),
						'name'              => 'news_archive_image',
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
						'key'               => 'field_56fff51e69ea6',
						'label'             => __( 'News Category Archives', 'adams-plugin' ),
						'name'              => 'concert_post_archive_copy_copy',
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
						'key'               => 'field_56fff51e69f18',
						'label'             => __( 'Prepend Category Name', 'adams-plugin' ),
						'name'              => 'prepend_news_archive_cat',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the name of the category.', 'adams-plugin' ),
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
						'key'               => 'field_56fff51e69f71',
						'label'             => __( 'Append Category Name', 'adams-plugin' ),
						'name'              => 'apppend_news_archive_cat',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the name of the category.', 'adams-plugin' ),
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
						'key'               => 'field_56fff51e69fe3',
						'label'             => __( 'News Category Archive Description', 'adams-plugin' ),
						'name'              => 'news_cat_description',
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
						'key'               => 'field_56fff51e6a054',
						'label'             => __( 'News Category Archive Image', 'adams-plugin' ),
						'name'              => 'news_cat_image',
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
							'value'    => 'acf-options-news-settings',
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
				'description'           => __( 'News Settings page. News posts and archives (renamed from Posts). The Adams\' Pack Station Functions plugin must be activated for the options page to display.', 'adams-plugin' )
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
function adams_acf_options_news() {

	return ACF_Options_News::instance();

}

// Run an instance of the class.
adams_acf_options_news();