<?php
/**
 * Schedule for employees, volunteers, etc.
 *
 * Forked copy of the My Calendar plugin.
 *
 * @package    Adams_Plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://wordpress.org/plugins/my-calendar/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the core functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
class Schedule {

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
	 * @return self
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



	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function adams_schedule() {

	return Schedule::instance();

}

// Run an instance of the class.
adams_schedule();

global $mc_version, $wpdb;
$mc_version = '3.0.15';

define( 'MC_DEBUG', false );

include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/includes/date-utilities.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/includes/general-utilities.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/includes/kses.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/includes/screen-options.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/includes/db.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/includes/deprecated.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-core.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-install.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-settings.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-categories.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-locations.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-location-manager.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-event-manager.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-styles.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-behaviors.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-events.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-widgets.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-upgrade-db.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-output.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-print.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-templates.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-limits.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-shortcodes.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-templating.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-group-manager.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-api.php';
include_once plugin_dir_path( dirname( __FILE__ ) ) .'schedule/my-calendar-generator.php';

// Add actions.
add_action( 'admin_menu', 'my_calendar_menu' );
add_action( 'wp_head', 'my_calendar_head' );
add_action( 'delete_user', 'mc_deal_with_deleted_user' );
add_action( 'widgets_init', 'mc_register_widgets' );
add_action( 'init', 'my_calendar_add_feed' );
add_action( 'wp_footer', 'mc_footer_js' );
add_action( 'init', 'mc_export_vcal', 200 );
// Add filters.
add_filter( 'widget_text', 'do_shortcode', 9 );
add_filter( 'plugin_action_links', 'mc_plugin_action', 10, 2 );
add_filter( 'wp_title', 'mc_event_filter', 10, 3 );

/**
 * Register all Schedule widgets
 */
function mc_register_widgets() {
	register_widget( 'My_Calendar_Today_Widget' );
	register_widget( 'My_Calendar_Upcoming_Widget' );
	register_widget( 'My_Calendar_Mini_Widget' );
	register_widget( 'My_Calendar_Simple_Search' );
	register_widget( 'My_Calendar_Filters' );
}

add_action( 'init', 'mc_custom_canonical' );

/**
 * Customize canonical URL for Schedule custom links
 */
function mc_custom_canonical() {
	if ( isset( $_GET['mc_id'] ) ) {
		add_action( 'wp_head', 'mc_canonical' );
		remove_action( 'wp_head', 'rel_canonical' );
	}
}

/**
 * Generate canonical link
 */
function mc_canonical() {
	// Original code.
	if ( ! is_singular() ) {
		return;
	}

	$id = get_queried_object_id();

	if ( 0 === $id ) {
		return;
	}

	$link = wp_get_canonical_url( $id );

	// End original code.
	if ( isset( $_GET['mc_id'] ) ) {
		$mc_id = ( absint( $_GET['mc_id'] ) ) ? absint( $_GET['mc_id'] ) : false;
		$link  = add_query_arg( 'mc_id', $mc_id, $link );
	}

	echo "<link rel='canonical' href='$link' />\n";
}

/**
 * Add Schedule menu items to main admin menu
 */
function my_calendar_menu() {
	if ( function_exists( 'add_menu_page' ) ) {
		if ( 'true' != get_option( 'mc_remote' ) ) {
			add_menu_page( __( 'Work Schedule', 'my-calendar' ), __( 'Work Schedule', 'my-calendar' ), 'mc_add_events', apply_filters( 'mc_modify_default', 'my-calendar' ), apply_filters( 'mc_modify_default_cb', 'my_calendar_edit' ), 'dashicons-calendar', 3 );
		} else {
			add_menu_page( __( 'Work Schedule', 'my-calendar' ), __( 'Work Schedule', 'my-calendar' ), 'mc_edit_settings', 'my-calendar', 'my_calendar_settings', 'dashicons-calendar', 3 );
		}
	}
	if ( function_exists( 'add_submenu_page' ) ) {
		add_action( 'admin_head', 'my_calendar_write_js' );
		add_action( 'admin_enqueue_scripts', 'my_calendar_add_styles' );
		if ( 'true' == get_option( 'mc_remote' ) && function_exists( 'mc_remote_db' ) ) {
			// If we're accessing a remote site, remove these pages.
		} else {
			if ( isset( $_GET['event_id'] ) ) {
				$event_id = absint( $_GET['event_id'] );
				// Translators: Title of event.
				$page_title = sprintf( __( 'Editing Schedule: %s', 'my-calendar' ), mc_get_data( 'event_title', $event_id ) );
			} else {
				$page_title = __( 'Add New Schedule', 'my-calendar' );
			}
			$edit = add_submenu_page( apply_filters( 'mc_locate_events_page', 'my-calendar' ), $page_title, __( 'Add New Schedule', 'my-calendar' ), 'mc_add_events', 'my-calendar', 'my_calendar_edit' );
			add_action( "load-$edit", 'mc_event_editing' );
			$manage = add_submenu_page( 'my-calendar', __( 'Manage Schedules', 'my-calendar' ), __( '&rarr; Manage Schedules', 'my-calendar' ), 'mc_add_events', 'my-calendar-manage', 'my_calendar_manage' );
			add_action( "load-$manage", 'mc_add_screen_option' );
			$groups = add_submenu_page( 'my-calendar', __( 'Schedule Groups', 'my-calendar' ), __( '&rarr; Schedule Groups', 'my-calendar' ), 'mc_manage_events', 'my-calendar-groups', 'my_calendar_group_edit' );
			add_action( "load-$groups", 'mc_add_screen_option' );
			add_submenu_page( 'my-calendar', __( 'Add Schedule Locations', 'my-calendar' ), __( 'Add New Location', 'my-calendar' ), 'mc_edit_locations', 'my-calendar-locations', 'my_calendar_add_locations' );
			add_submenu_page( 'my-calendar', __( 'Manage Schedule Locations', 'my-calendar' ), __( '&rarr; Manage Locations', 'my-calendar' ), 'mc_edit_locations', 'my-calendar-location-manager', 'my_calendar_manage_locations' );
			add_submenu_page( 'my-calendar', __( 'Schedule Categories', 'my-calendar' ), __( 'Manage Categories', 'my-calendar' ), 'mc_edit_cats', 'my-calendar-categories', 'my_calendar_manage_categories' );
		}
		add_submenu_page( 'my-calendar', __( 'Style Editor', 'my-calendar' ), __( 'Style Editor', 'my-calendar' ), 'mc_edit_styles', 'my-calendar-styles', 'my_calendar_style_edit' );
		add_submenu_page( 'my-calendar', __( 'Script Manager', 'my-calendar' ), __( 'Script Manager', 'my-calendar' ), 'mc_edit_behaviors', 'my-calendar-behaviors', 'my_calendar_behaviors_edit' );
		add_submenu_page( 'my-calendar', __( 'Template Editor', 'my-calendar' ), __( 'Template Editor', 'my-calendar' ), 'mc_edit_templates', 'my-calendar-templates', 'mc_templates_edit' );
		add_submenu_page( 'my-calendar', __( 'Settings', 'my-calendar' ), __( 'Settings', 'my-calendar' ), 'mc_edit_settings', 'my-calendar-config', 'my_calendar_settings' );
	}
	if ( function_exists( 'mcs_submissions' ) ) {
		$permission = apply_filters( 'mcs_submission_permissions', 'manage_options' );
		add_action( 'admin_head', 'my_calendar_sub_js' );
		add_action( 'admin_head', 'my_calendar_sub_styles' );
		add_submenu_page( 'my-calendar', __( 'Schedule Pro Settings', 'my-calendar' ), __( 'Schedule Pro', 'my-calendar' ), $permission, 'my-calendar-submissions', 'mcs_settings' );
		// Only show payments screen if enabled.
		if ( 'true' == get_option( 'mcs_payments' ) ) {
			add_submenu_page( 'my-calendar', __( 'Payments Received', 'my-calendar' ), __( 'Payments', 'my-calendar' ), $permission, 'my-calendar-payments', 'mcs_sales_page' );
		}
	}
}

add_shortcode( 'my_calendar', 'my_calendar_insert' );
add_shortcode( 'my_calendar_upcoming', 'my_calendar_insert_upcoming' );
add_shortcode( 'my_calendar_today', 'my_calendar_insert_today' );
add_shortcode( 'my_calendar_locations', 'my_calendar_locations' );
add_shortcode( 'my_calendar_categories', 'my_calendar_categories' );
add_shortcode( 'my_calendar_access', 'my_calendar_access' );
add_shortcode( 'mc_filters', 'my_calendar_filters' );
add_shortcode( 'my_calendar_show_locations', 'my_calendar_show_locations_list' );
add_shortcode( 'my_calendar_event', 'my_calendar_show_event' );
add_shortcode( 'my_calendar_search', 'my_calendar_search' );
add_shortcode( 'my_calendar_now', 'my_calendar_now' );
