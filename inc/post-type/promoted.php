<?php

// Register Custom Post Type
function register_promoted_post() {

	$labels = array(
		'name'                  => _x( 'Promoted Posts', 'Post Type General Name', '_exiled' ),
		'singular_name'         => _x( 'Promoted Post', 'Post Type Singular Name', '_exiled' ),
		'menu_name'             => __( 'Promoted', '_exiled' ),
		'name_admin_bar'        => __( 'Promoted', '_exiled' ),
		'archives'              => __( 'Item Archives', '_exiled' ),
		'attributes'            => __( 'Item Attributes', '_exiled' ),
		'parent_item_colon'     => __( 'Parent Item:', '_exiled' ),
		'all_items'             => __( 'All Promotions', '_exiled' ),
		'add_new_item'          => __( 'Add New Item', '_exiled' ),
		'add_new'               => __( 'Add New', '_exiled' ),
		'new_item'              => __( 'New Item', '_exiled' ),
		'edit_item'             => __( 'Edit Item', '_exiled' ),
		'update_item'           => __( 'Update Item', '_exiled' ),
		'view_item'             => __( 'View Item', '_exiled' ),
		'view_items'            => __( 'View Items', '_exiled' ),
		'search_items'          => __( 'Search Item', '_exiled' ),
		'not_found'             => __( 'Not found', '_exiled' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_exiled' ),
		'featured_image'        => __( 'Featured Image', '_exiled' ),
		'set_featured_image'    => __( 'Set featured image', '_exiled' ),
		'remove_featured_image' => __( 'Remove featured image', '_exiled' ),
		'use_featured_image'    => __( 'Use as featured image', '_exiled' ),
		'insert_into_item'      => __( 'Insert into item', '_exiled' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_exiled' ),
		'items_list'            => __( 'Items list', '_exiled' ),
		'items_list_navigation' => __( 'Items list navigation', '_exiled' ),
		'filter_items_list'     => __( 'Filter items list', '_exiled' ),
	);
	$args = array(
		'label'                 => __( 'Promoted Post', '_exiled' ),
		'description'           => __( 'Promoted posts', '_exiled' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'promoted',
	);
	register_post_type( '_exiled_promoted', $args );

}
add_action( 'init', 'register_promoted_post', 0 );
