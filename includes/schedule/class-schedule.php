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
 * @link       https://wordpress.org/plugins/schedule/
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
	public function __construct() {

	// Customize canonical URL for schedule custom links.
	add_action( 'init', [ $this, 'custom_canonical' ] );

	// Register all schedule widgets.
	add_action( 'widgets_init', [ $this, 'register_widgets' ] );

	// Add dmin pages.
	add_action( 'admin_menu', [ $this, 'work_schedule_menu' ] );

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		include( dirname( __FILE__ ) . '/includes/date-utilities.php' );
		include( dirname( __FILE__ ) . '/includes/general-utilities.php' );
		include( dirname( __FILE__ ) . '/includes/kses.php' );
		include( dirname( __FILE__ ) . '/includes/screen-options.php' );
		include( dirname( __FILE__ ) . '/includes/db.php' );
		/**
		 * Deprecated throws errors when run in this class/method,
		 * and it is not need because we have no legacy code.
		 *
		 * include( dirname( __FILE__ ) . '/includes/deprecated.php' );
		 */
		include( dirname( __FILE__ ) . '/my-calendar-core.php' );
		include( dirname( __FILE__ ) . '/my-calendar-install.php' );
		include( dirname( __FILE__ ) . '/my-calendar-settings.php' );
		include( dirname( __FILE__ ) . '/my-calendar-categories.php' );
		include( dirname( __FILE__ ) . '/my-calendar-locations.php' );
		include( dirname( __FILE__ ) . '/my-calendar-location-manager.php' );
		include( dirname( __FILE__ ) . '/my-calendar-help.php' );
		include( dirname( __FILE__ ) . '/my-calendar-event-manager.php' );
		include( dirname( __FILE__ ) . '/my-calendar-styles.php' );
		include( dirname( __FILE__ ) . '/my-calendar-behaviors.php' );
		include( dirname( __FILE__ ) . '/my-calendar-events.php' );
		include( dirname( __FILE__ ) . '/my-calendar-widgets.php' );
		include( dirname( __FILE__ ) . '/my-calendar-upgrade-db.php' );
		include( dirname( __FILE__ ) . '/my-calendar-output.php' );
		include( dirname( __FILE__ ) . '/my-calendar-print.php' );
		include( dirname( __FILE__ ) . '/my-calendar-templates.php' );
		include( dirname( __FILE__ ) . '/my-calendar-limits.php' );
		include( dirname( __FILE__ ) . '/my-calendar-shortcodes.php' );
		include( dirname( __FILE__ ) . '/my-calendar-templating.php' );
		include( dirname( __FILE__ ) . '/my-calendar-group-manager.php' );
		include( dirname( __FILE__ ) . '/my-calendar-api.php' );
		include( dirname( __FILE__ ) . '/my-calendar-generator.php' );

	}

	/**
	 * Customize canonical URL for schedule custom links.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function custom_canonical() {

		if ( isset( $_GET['mc_id'] ) ) {
			add_action( 'wp_head', [ $this, 'mc_canonical' ] );
			remove_action( 'wp_head', 'rel_canonical' );
		}

	}

	/**
	 * Generate canonical link.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function canonical() {

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
	 * Register all schedule widgets.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	function register_widgets() {

		register_widget( 'My_Calendar_Today_Widget' );
		register_widget( 'My_Calendar_Upcoming_Widget' );
		register_widget( 'Schedule_Mini_Widget' );
		register_widget( 'My_Calendar_Simple_Search' );
		register_widget( 'My_Calendar_Filters' );

	}

	/**
	 * Add My Calendar menu items to main admin menu
	 */
	function work_schedule_menu() {

		if ( function_exists( 'add_menu_page' ) ) {

			if ( 'true' != get_option( 'mc_remote' ) ) {
				add_menu_page(
					__( 'Work Schedule', 'adams-plugin' ),
					__( 'Work Schedule', 'adams-plugin' ),
					'mc_add_events',
					apply_filters( 'mc_modify_default', 'my-calendar' ),
					apply_filters( 'mc_modify_default_cb', 'my_calendar_edit' ),
					'dashicons-calendar',
					3
				);
			} else {
				add_menu_page(
					__( 'Work Schedule', 'adams-plugin' ),
					__( 'Work Schedule', 'adams-plugin' ),
					'mc_edit_settings',
					'my-calendar',
					'my_calendar_settings',
					'dashicons-calendar',
					3
				);
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
					$page_title = sprintf( __( 'Editing Schedule: %s', 'adams-plugin' ), mc_get_data( 'event_title', $event_id ) );
				} else {
					$page_title = __( 'Add New Schedule', 'adams-plugin' );
				}

				$edit = add_submenu_page(
					apply_filters( 'mc_locate_events_page', 'my-calendar' ),
					$page_title,
					__( 'Add New Schedule', 'adams-plugin' ),
					'mc_add_events',
					'my-calendar',
					'my_calendar_edit'
				);
				add_action( "load-$edit", 'mc_event_editing' );

				$manage = add_submenu_page(
					'my-calendar',
					__( 'Manage Schedules', 'adams-plugin' ),
					__( 'Manage Schedules', 'adams-plugin' ),
					'mc_add_events',
					'my-calendar-manage',
					'my_calendar_manage'
				);
				add_action( "load-$manage", 'mc_add_screen_option' );

				$groups = add_submenu_page(
					'my-calendar',
					__( 'Schedule Groups', 'adams-plugin' ),
					__( 'Schedule Groups', 'adams-plugin' ),
					'mc_manage_events',
					'my-calendar-groups',
					'my_calendar_group_edit'
				);
				add_action( "load-$groups", 'mc_add_screen_option' );

				add_submenu_page(
					'my-calendar',
					__( 'Add Schedule Locations', 'adams-plugin' ),
					__( 'Add New Location', 'adams-plugin' ),
					'mc_edit_locations',
					'my-calendar-locations',
					'my_calendar_add_locations'
				);

				add_submenu_page(
					'my-calendar',
					__( 'Manage Schedule Locations', 'adams-plugin' ),
					__( 'Manage Locations', 'adams-plugin' ),
					'mc_edit_locations',
					'my-calendar-location-manager',
					'my_calendar_manage_locations'
				);

				add_submenu_page(
					'my-calendar',
					__( 'Schedule Categories', 'adams-plugin' ),
					__( 'Manage Categories', 'adams-plugin' ),
					'mc_edit_cats',
					'my-calendar-categories',
					'my_calendar_manage_categories'
				);
			}

			add_submenu_page(
				'my-calendar',
				__( 'Schedule Style Editor', 'adams-plugin' ),
				__( 'Style Editor', 'adams-plugin' ),
				'mc_edit_styles',
				'my-calendar-styles',
				'my_calendar_style_edit'
			);

			add_submenu_page(
				'my-calendar',
				__( 'Schedule Script Manager', 'adams-plugin' ),
				__( 'Script Manager', 'adams-plugin' ),
				'mc_edit_behaviors',
				'my-calendar-behaviors',
				'my_calendar_behaviors_edit'
			);

			add_submenu_page(
				'my-calendar',
				__( 'Schedule Template Editor', 'adams-plugin' ),
				__( 'Template Editor', 'adams-plugin' ),
				'mc_edit_templates',
				'my-calendar-templates',
				'mc_templates_edit'
			);

			add_submenu_page(
				'my-calendar',
				__( 'Schedule Settings', 'adams-plugin' ),
				__( 'Settings', 'adams-plugin' ),
				'mc_edit_settings',
				'my-calendar-config',
				'my_calendar_settings'
			);

			add_submenu_page(
				'my-calendar',
				__( 'Schedule Help', 'adams-plugin' ),
				__( 'Help', 'adams-plugin' ),
				'mc_view_help',
				'my-calendar-help',
				'my_calendar_help'
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
function adams_schedule() {

	return Schedule::instance();

}

// Run an instance of the class.
adams_schedule();

global $mc_version, $wpdb;
$mc_version = ADAMS_VERSION;

define( 'SC_RES_DEBUG', false );

// register_activation_hook( __FILE__, 'mc_plugin_activated' );
// register_deactivation_hook( __FILE__, 'mc_plugin_deactivated' );
/**
 * Actions to execute on activation.
 */
function mc_plugin_activated() {

	flush_rewrite_rules();
	if ( my_calendar_exists() ) {
		mc_upgrade_db();
	}

	my_calendar_check();

}

/**
 * Actions to execute on plugin deactivation.
 */
function mc_plugin_deactivated() {
	flush_rewrite_rules();
}

// Add actions.
add_action( 'wp_head', 'my_calendar_head' );
add_action( 'delete_user', 'mc_deal_with_deleted_user' );
add_action( 'init', 'my_calendar_add_feed' );
add_action( 'wp_footer', 'mc_footer_js' );
add_action( 'init', 'mc_export_vcal', 200 );
// Add filters.
add_filter( 'widget_text', 'do_shortcode', 9 );
add_filter( 'plugin_action_links', 'mc_plugin_action', 10, 2 );
add_filter( 'wp_title', 'mc_event_filter', 10, 3 );

/**
 * Produce My Calendar admin sidebar
 *
 * @param string              $show deprecated.
 * @param mixed array/boolean $add boolean or array.
 * @param boolean             $remove Hide commercial blocks.
 */
function mc_show_sidebar( $show = '', $add = false, $remove = false ) {

	$add = apply_filters( 'mc_custom_sidebar_panels', $add );

	if ( current_user_can( 'mc_view_help' ) ) {
		?>
		<div class="postbox-container jcd-narrow">
		<div class="metabox-holder">
		<?php
		if ( is_array( $add ) ) {
			foreach ( $add as $key => $value ) {
				?>
				<div class="ui-sortable meta-box-sortables">
					<div class="not-postbox">
						<h2><?php echo $key; ?></h2>
						<div class='<?php echo sanitize_title( $key ); ?> inside'>
							<?php echo $value; ?>
						</div>
					</div>
				</div>
				<?php
			}
		} ?>
		<div class="ui-sortable meta-box-sortables">
			<div class="not-postbox">
				<h2><?php _e( 'Get Help', 'adams-plugin' ); ?></h2>
				<div class="inside">
					<ul>
						<li>
							<strong><a href="https://docs.joedolson.com/my-calendar/quick-start/"><?php _e( 'Documentation', 'adams-plugin' ); ?></a></strong>
						</li>
						<li>
							<strong><a href="<?php echo admin_url( 'admin.php?page=my-calendar-help' ); ?>#mc-generator"><?php _e( 'Shortcode Generator', 'adams-plugin' ); ?></a></strong>
						</li>
						<li>
							<a href="<?php echo admin_url( 'admin.php?page=my-calendar-help' ); ?>"><?php _e( 'Help with schedules', 'adams-plugin' ); ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		</div>
		</div>
		<?php
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