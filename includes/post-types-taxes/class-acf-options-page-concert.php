<?php
/**
 * ACF options page fields for the Concert post type settings.
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
 * ACF options page fields for the Concert post type settings.
 *
 * @since  1.0.0
 * @access public
 */
final class ACF_Options_Concert {

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
				'key'    => 'group_56feb32807797',
				'title'  => __( 'Concert Settings', 'adams-plugin' ),
				'fields' => [
					[
						'key'               => 'field_56fedd031a874',
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
						'key'               => 'field_56fee2e867a4c',
						'label'             => __( 'Prepend Concert Date', 'adams-plugin' ),
						'name'              => 'prepend_concert_date',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the date in the title of single concert posts.', 'adams-plugin' ),
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
						'key'               => 'field_56fee31e67a4d',
						'label'             => __( 'Append Concert Date', 'adams-plugin' ),
						'name'              => 'append_concert_date',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the date in the title of single concert posts.', 'adams-plugin' ),
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
						'key'               => 'field_56ff02088fe0a',
						'label'             => __( 'Title for Concert Lineup', 'adams-plugin' ),
						'name'              => 'lineup_title',
						'type'              => 'text',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => __( 'Scheduled Acts', 'adams-plugin' ),
						'placeholder'       => __( 'Scheduled Acts', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_56ff5393bfe76',
						'label'             => __( 'Default Description', 'adams-plugin' ),
						'name'              => 'concert_excerpt_fallback',
						'type'              => 'textarea',
						'instructions'      => __( 'This is fallback text for single concert posts when no description is given in the excerpt field on the concert edit screen.', 'adams-plugin' ),
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
						'key'               => 'field_56feff86b889a',
						'label'             => __( 'Prepend Season Link', 'adams-plugin' ),
						'name'              => 'prepend_post_season_link',
						'type'              => 'text',
						'instructions'      => __( 'Displays on single concert posts, before the year that links to other concerts in the same season.', 'adams-plugin' ),
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
						'key'               => 'field_56ff0099b889b',
						'label'             => __( 'Append Season Link', 'adams-plugin' ),
						'name'              => 'append_post_season_link',
						'type'              => 'text',
						'instructions'      => __( 'Displays on single concert posts, after the year that links to other concerts in the same season.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'concerts »', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56fedd2c1a875',
						'label'             => __( 'Archive Pages Title', 'adams-plugin' ),
						'name'              => 'concert_archive_title',
						'type'              => 'text',
						'instructions'      => __( 'Displays as the title of archive pages for concert posts (<a href="http://adamspackstation.com/concerts/" target="_blank">adamspackstation.com/concerts</a>)', 'adams-plugin' ),
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
						'key'               => 'field_570021669c764',
						'label'             => __( 'Concert Link Text', 'adams-plugin' ),
						'name'              => 'concert_link_text',
						'type'              => 'text',
						'instructions'      => __( 'Text on the archive and season pages that links to the single concert post.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => __( 'View Details', 'adams-plugin' ),
						'placeholder'       => __( 'View Details', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56fedece76515',
						'label'             => __( 'Prepend Season Year', 'adams-plugin' ),
						'name'              => 'prepend_season_year',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the year of the concert season in the title of archive pages.', 'adams-plugin' ),
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
						'key'               => 'field_56fee03049ec3',
						'label'             => __( 'Append Season Year', 'adams-plugin' ),
						'name'              => 'apppend_season_year',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the year of the concert season in the title of archive pages.', 'adams-plugin' ),
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
						'key'               => 'field_56fee60b023cd',
						'label'             => __( 'Concert Notice', 'adams-plugin' ),
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
						'key'               => 'field_56fee62b023ce',
						'label'             => __( 'Add Concert Notice', 'adams-plugin' ),
						'name'              => 'add_concert_notice',
						'type'              => 'true_false',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Check to add a notice to the top of concert posts & pages', 'adams-plugin' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					],
					[
						'key'               => 'field_56fee69b023cf',
						'label'             => __( 'Location', 'adams-plugin' ),
						'name'              => 'concert_notice_location',
						'type'              => 'checkbox',
						'instructions'      => __( '', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_56fee62b023ce',
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
							'posts'   => __( 'Single Concert Posts', 'adams-plugin' ),
							'archive' => __( 'Concert Archive Pages', 'adams-plugin' ),
							'season'  => __( 'Concert Season Pages', 'adams-plugin' ),
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
						'key'               => 'field_56fee757023d0',
						'label'             => __( 'Concert Notice', 'adams-plugin' ),
						'name'              => __( 'concert_notice', 'adams-plugin' ),
						'type'              => 'wysiwyg',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_56fee62b023ce',
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
						'key'               => 'field_56feb390d9580',
						'label'             => __( 'Social Sharing', 'adams-plugin' ),
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
						'key'               => 'field_56feb3a6d9581',
						'label'             => __( 'Meta Tags for Sharing', 'adams-plugin' ),
						'name'              => '',
						'type'              => 'message',
						'instructions'      => '',
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
						'key'               => 'field_56feb7ae3be0c',
						'label'             => __( 'Archive Title', 'adams-plugin' ),
						'name'              => 'concert_archive_sharing_title',
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
						'key'               => 'field_56feb7d03be0d',
						'label'             => __( 'Archive Description', 'adams-plugin' ),
						'name'              => 'concert_archive_description',
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
						'key'               => 'field_56feba5ed9516',
						'label'             => __( 'Archive Image', 'adams-plugin' ),
						'name'              => 'concert_archive_image',
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
						'key'               => 'field_56feb9e1ddecc',
						'label'             => __( 'Prepend Season Year', 'adams-plugin' ),
						'name'              => 'prepend_season_archive_year',
						'type'              => 'text',
						'instructions'      => __( 'Displays before the year of the season.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => __( 'Adams\' Pack Station', 'adams-plugin' ),
						'placeholder'       => __( 'Adams\' Pack Station', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56fec26f65835',
						'label'             => __( 'Append Season Year', 'adams-plugin' ),
						'name'              => 'apppend_season_archive_year',
						'type'              => 'text',
						'instructions'      => __( 'Displays after the year of the season.', 'adams-plugin' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => __( 'Concerts', 'adams-plugin' ),
						'placeholder'       => __( 'Concerts', 'adams-plugin' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 0,
						'disabled'          => 0,
					],
					[
						'key'               => 'field_56feba06ddecd',
						'label'             => __( 'Season Archive Description', 'adams-plugin' ),
						'name'              => 'concert_season_description',
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
						'key'               => 'field_56febb1ed9517',
						'label'             => __( 'Seasons Archive Image', 'adams-plugin' ),
						'name'              => 'concert_season_image',
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
							'value'    => 'acf-options-concert-settings',
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
				'description'           => __( 'Concert Settings page. Concert post type and archives. The Adams\' Pack Station Functions plugin must be activated for the options page to display.', 'adams-plugin' )
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
function adams_acf_options_concert() {

	return ACF_Options_Concert::instance();

}

// Run an instance of the class.
adams_acf_options_concert();