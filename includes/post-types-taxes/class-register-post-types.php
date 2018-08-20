<?php
/**
 * Register post types.
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
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
class Post_Types_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom post types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom post types.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Post Type: Concerts.
         */

        $labels = [
            'name'                  => __( 'Concerts', 'adams-plugin' ),
            'singular_name'         => __( 'Concert', 'adams-plugin' ),
            'menu_name'             => __( 'Concerts', 'adams-plugin' ),
            'all_items'             => __( 'All Concerts', 'adams-plugin' ),
            'add_new'               => __( 'Add New Concert', 'adams-plugin' ),
            'add_new_item'          => __( 'Add New Concert', 'adams-plugin' ),
            'edit_item'             => __( 'Edit Concert', 'adams-plugin' ),
            'new_item'              => __( 'New Concert', 'adams-plugin' ),
            'view_item'             => __( 'View Concert', 'adams-plugin' ),
            'view_items'            => __( 'View Concerts', 'adams-plugin' ),
            'search_items'          => __( 'Search Concerts', 'adams-plugin' ),
            'not_found'             => __( 'No Concerts Found', 'adams-plugin' ),
            'not_found_in_trash'    => __( 'No Concerts Found in Trash', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Concert', 'adams-plugin' ),
            'featured_image'        => __( 'Featured image for this concert', 'adams-plugin' ),
            'set_featured_image'    => __( 'Set featured image for this concert', 'adams-plugin' ),
            'remove_featured_image' => __( 'Remove featured image for this concert', 'adams-plugin' ),
            'use_featured_image'    => __( 'Use as featured image for this concert', 'adams-plugin' ),
            'archives'              => __( 'Concert Archives', 'adams-plugin' ),
            'insert_into_item'      => __( 'Insert into Concert', 'adams-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Concert', 'adams-plugin' ),
            'filter_items_list'     => __( 'Filter Concerts', 'adams-plugin' ),
            'items_list_navigation' => __( 'Concerts list navigation', 'adams-plugin' ),
            'items_list'            => __( 'Concerts List', 'adams-plugin' ),
            'attributes'            => __( 'Concert Attributes', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Concert', 'adams-plugin' )
        ];

        $args = [
            'label'               => __( 'Concerts', 'adams-plugin' ),
            'labels'              => $labels,
            'description'         => __( 'Live music here at the Adams\'s Pack Station.', 'adams-plugin' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => '',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'concerts',
                'with_front' => true
            ],
            'query_var'           => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-format-audio',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt'
            ],
            'taxonomies'          => [
                'season'
            ]
        ];

        register_post_type(
            'concert',
            $args
        );

        /**
         * Post Type: Family Members.
         */

        $labels = [
            'name'                  => __( 'Family', 'adams-plugin' ),
            'singular_name'         => __( 'Family Member', 'adams-plugin' ),
            'menu_name'             => __( 'Family', 'adams-plugin' ),
            'all_items'             => __( 'Family Members', 'adams-plugin' ),
            'add_new'               => __( 'New Member', 'adams-plugin' ),
            'add_new_item'          => __( 'Add New Member', 'adams-plugin' ),
            'edit_item'             => __( 'Edit Family Member', 'adams-plugin' ),
            'new_item'              => __( 'New Family Member', 'adams-plugin' ),
            'view_item'             => __( 'View Family Member', 'adams-plugin' ),
            'view_items'            => __( 'View Family Members', 'adams-plugin' ),
            'search_items'          => __( 'Search Family Members', 'adams-plugin' ),
            'not_found'             => __( 'No Family Members Found', 'adams-plugin' ),
            'not_found_in_trash'    => __( 'No Family Members Found in Trash', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Family Member', 'adams-plugin' ),
            'featured_image'        => __( 'Featured Image for this Family Member', 'adams-plugin' ),
            'set_featured_image'    => __( 'Set featured image for this Family Member', 'adams-plugin' ),
            'remove_featured_image' => __( 'Remove featured image for this Family Member', 'adams-plugin' ),
            'use_featured_image'    => __( 'Use as featured image for this Family Member', 'adams-plugin' ),
            'archives'              => __( 'Family Archives', 'adams-plugin' ),
            'insert_into_item'      => __( 'Insert into Family Member', 'adams-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Family Member', 'adams-plugin' ),
            'filter_items_list'     => __( 'Filter Family Member List', 'adams-plugin' ),
            'items_list_navigation' => __( 'Family Member List Navigation', 'adams-plugin' ),
            'items_list'            => __( 'List', '' ),
            'attributes'            => __( 'Concert Attributes', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Concert', 'adams-plugin' ),
		];

        $args = [
            'label'               => __( 'Family', 'adams-plugin' ),
            'labels'              => $labels,
            'description'         => __( 'The donkeys, goats, people etc. of Adams\'s Pack Station.', 'adams-plugin' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => '',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'family',
                'with_front' => true
            ],
            'query_var'           => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-heart',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt'
            ],
            'taxonomies'          => [
                'species'
            ]
        ];

        register_post_type(
            'family',
            $args
        );

        /**
         * Post Type: Store Items.
         */

        $labels = [
            'name'                  => __( 'Store Items', 'adams-plugin' ),
            'singular_name'         => __( 'Store Item', 'adams-plugin' ),
            'menu_name'             => __( 'Store Items', 'adams-plugin' ),
            'all_items'             => __( 'Store Items', 'adams-plugin' ),
            'add_new'               => __( 'Add New Store Item', 'adams-plugin' ),
            'add_new_item'          => __( 'Add New Store Item', 'adams-plugin' ),
            'edit_item'             => __( 'Edit Store Item', 'adams-plugin' ),
            'new_item'              => __( 'New Store Item', 'adams-plugin' ),
            'view_item'             => __( 'View Store Item', 'adams-plugin' ),
            'view_items'            => __( 'View Store Items', 'adams-plugin' ),
            'search_items'          => __( 'Search Store Items', 'adams-plugin' ),
            'not_found'             => __( 'No Store Items Found', 'adams-plugin' ),
            'not_found_in_trash'    => __( 'No Store Items Found in Trash', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Store Item', 'adams-plugin' ),
            'featured_image'        => __( 'Featured image for this store item', 'adams-plugin' ),
            'set_featured_image'    => __( 'Set featured image for this store item', 'adams-plugin' ),
            'remove_featured_image' => __( 'Remove featured image for this store item', 'adams-plugin' ),
            'use_featured_image'    => __( 'Use as featured image for this store item', 'adams-plugin' ),
            'archives'              => __( 'Store Item Archives', 'adams-plugin' ),
            'insert_into_item'      => __( 'Insert into Store Item', 'adams-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Store Item', 'adams-plugin' ),
            'filter_items_list'     => __( 'Filter Store Items', 'adams-plugin' ),
            'items_list_navigation' => __( 'Store Items list navigation', 'adams-plugin' ),
            'items_list'            => __( 'Store Items List', 'adams-plugin' ),
            'attributes'            => __( 'Store Item Attributes', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Store Item', 'adams-plugin' )
        ];

        $args = [
            'label'               => __( 'Store Items', 'adams-plugin' ),
            'labels'              => $labels,
            'description'         => __( 'Maps, books, T-shirts and more at Adams\'s Pack Station.', 'adams-plugin' ),
            'public'              => true,
            'publicly_queryable'  => false,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => '',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => true,
            'rewrite'             => [
                'slug'       => 'products',
                'with_front' => false
            ],
            'query_var'           => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-store',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'page-attributes'
            ],
            'taxonomies'          => [
                'department'
            ],
        ];

        register_post_type(
            'product',
            $args
        );

        /**
         * Post Type: Menu Items.
         */

        $labels = [
            'name'                  => __( 'Menu Items', 'adams-plugin' ),
            'singular_name'         => __( 'Menu Item', 'adams-plugin' ),
            'menu_name'             => __( 'Menu Items', 'adams-plugin' ),
            'all_items'             => __( 'Menu Items', 'adams-plugin' ),
            'add_new'               => __( 'Add New Menu Item', 'adams-plugin' ),
            'add_new_item'          => __( 'Add New Menu Item', 'adams-plugin' ),
            'edit_item'             => __( 'Edit Menu Item', 'adams-plugin' ),
            'new_item'              => __( 'New Menu Item', 'adams-plugin' ),
            'view_item'             => __( 'View Menu Item', 'adams-plugin' ),
            'view_items'            => __( 'View Menu Items', 'adams-plugin' ),
            'search_items'          => __( 'Search Menu Items', 'adams-plugin' ),
            'not_found'             => __( 'No Menu Items Found', 'adams-plugin' ),
            'not_found_in_trash'    => __( 'No Menu Items Found in Trash', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Menu Item', 'adams-plugin' ),
            'featured_image'        => __( 'Featured image for this menu item', 'adams-plugin' ),
            'set_featured_image'    => __( 'Set featured image for this menu item', 'adams-plugin' ),
            'remove_featured_image' => __( 'Remove featured image for this menu item', 'adams-plugin' ),
            'use_featured_image'    => __( 'Use as featured image for this menu item', 'adams-plugin' ),
            'archives'              => __( 'Menu Item Archives', 'adams-plugin' ),
            'insert_into_item'      => __( 'Insert into Menu Item', 'adams-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Menu Item', 'adams-plugin' ),
            'filter_items_list'     => __( 'Filter Menu Items', 'adams-plugin' ),
            'items_list_navigation' => __( 'Menu Items list navigation', 'adams-plugin' ),
            'items_list'            => __( 'Menu Items List', 'adams-plugin' ),
            'attributes'            => __( 'Menu Item Attributes', 'adams-plugin' ),
            'parent_item_colon'     => __( 'Parent Store Item', 'adams-plugin' )
        ];

        $args = [
            'label'               => __( 'Menu Items', 'adams-plugin' ),
            'labels'              => $labels,
            'description'         => __( 'Fresh food and beverages at Adams\'s Pack Station.', 'adams-plugin' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => '',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => true,
            'rewrite'             => [
                'slug'       => 'menu',
                'with_front' => true
            ],
            'query_var'           => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-carrot',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'page-attributes'
            ],
            'taxonomies'          => [
                'menuitemtype'
            ],
        ];

        register_post_type(
            'menu',
            $args
        );

    }

}

// Run the class.
new Post_Types_Register;