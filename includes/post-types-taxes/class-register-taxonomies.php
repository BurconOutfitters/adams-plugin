<?php
/**
 * Register taxonomies.
 *
 * @package    Burcon_Outfitters_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

namespace Burcon\Includes\Taxonomies_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register taxonomies.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxonomies_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom taxonomies.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom taxonomies.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Taxonomy: Concert Seasons.
         */

        $labels = [
            'name'          => __( 'Concert Seasons', 'adams-plugin' ),
            'singular_name' => __( 'Concert Season', 'adams-plugin' ),
        ];

        $args = [
            'label'              => __( 'Concert Seasons', 'adams-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => true,
            'label'              => __( 'Concert Seasons', 'adams-plugin' ),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'       => 'season',
                'with_front' => true,
            ],
            'show_admin_column'  => false,
            'show_in_rest'       => false,
            'rest_base'          => '',
            'show_in_quick_edit' => true,
        ];

        register_taxonomy(
            'season',
            [
                'concert'
            ],
            $args
        );

        /**
         * Taxonomy: Member Types.
         */

        $labels = [
            'name'          => __( 'Member Types', 'adams-plugin' ),
            'singular_name' => __( 'Member Type', 'adams-plugin' ),
        ];

        $args = [
            'label'              => __( 'Member Types', 'adams-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => false,
            'label'              => __( 'Member Types', 'adams-plugin' ),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'       => 'species',
                'with_front' => true,
            ],
            'show_admin_column'  => false,
            'show_in_rest'       => false,
            'rest_base'          => '',
            'show_in_quick_edit' => true,
        ];

        register_taxonomy(
            'species',
            [
                'family'
            ],
            $args
        );

        /**
         * Taxonomy: Store Departments.
         */

        $labels = [
            'name'          => __( 'Store Departments', 'adams-plugin' ),
            'singular_name' => __( 'Store Department', 'adams-plugin' ),
        ];

        $args = [
            'label'              => __( 'Store Departments', 'adams-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => true,
            'label'              => __( 'Store Departments', 'adams-plugin' ),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => false,
            'show_admin_column'  => true,
            'show_in_rest'       => false,
            'rest_base'          => '',
            'show_in_quick_edit' => false,
        ];

        register_taxonomy(
            'department',
            [
                'product'
            ],
            $args
        );

        /**
         * Taxonomy: Menu Item Types.
         */

        $labels = [
            'name'          => __( 'Menu Item Types', 'adams-plugin' ),
            'singular_name' => __( 'Menu Item Type', 'adams-plugin' ),
        ];

        $args = [
            'label'              => __( 'Menu Item Types', 'adams-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => true,
            'label'              => __( 'Menu Item Types', 'adams-plugin' ),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => false,
            'show_admin_column'  => false,
            'show_in_rest'       => false,
            'rest_base'          => '',
            'show_in_quick_edit' => false,
        ];

        register_taxonomy(
            'menuitemtype',
            [
                'menu'
            ],
            $args
        );

    }

}

// Run the class.
new Taxonomies_Register;