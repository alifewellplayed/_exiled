<?php
function register_reviews() {
	$labels = array(
		'name'                  => _x( 'Reviews', 'Post Type General Name', '_exiled' ),
		'singular_name'         => _x( 'Review', 'Post Type Singular Name', '_exiled' ),
		'menu_name'             => __( 'Reviews', '_exiled' ),
		'name_admin_bar'        => __( 'Review', '_exiled' ),
		'archives'              => __( 'Item Archives', '_exiled' ),
		'attributes'            => __( 'Item Attributes', '_exiled' ),
		'parent_item_colon'     => __( 'Parent Item:', '_exiled' ),
		'all_items'             => __( 'All Items', '_exiled' ),
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
	$rewrite = array(
		'slug'                  => 'reviews',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Review', '_exiled' ),
		'description'           => __( 'Reviews of various things', '_exiled' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( '_exiled_review', $args );

}
add_action( 'init', 'register_reviews', 0 );
