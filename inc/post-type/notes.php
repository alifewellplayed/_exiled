<?php

// Register Notes Post Type
function register_notes() {
	$labels = array(
		'name'                  => _x( 'Notes', 'Post Type General Name', '_exiled' ),
		'singular_name'         => _x( 'Note', 'Post Type Singular Name', '_exiled' ),
		'menu_name'             => __( 'Notes', '_exiled' ),
		'name_admin_bar'        => __( 'Notes', '_exiled' ),
		'archives'              => __( 'Note Archives', '_exiled' ),
		'attributes'            => __( 'Note Attributes', '_exiled' ),
		'parent_item_colon'     => __( 'Parent Item:', '_exiled' ),
		'all_items'             => __( 'All Notes', '_exiled' ),
		'add_new_item'          => __( 'New Note', '_exiled' ),
		'add_new'               => __( 'Add New Note', '_exiled' ),
		'new_item'              => __( 'New Note', '_exiled' ),
		'edit_item'             => __( 'Edit Note', '_exiled' ),
		'update_item'           => __( 'Update Note', '_exiled' ),
		'view_item'             => __( 'View Note', '_exiled' ),
		'view_items'            => __( 'View Notes', '_exiled' ),
		'search_items'          => __( 'Search Note', '_exiled' ),
		'not_found'             => __( 'Not found', '_exiled' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_exiled' ),
		'featured_image'        => __( 'Featured Image', '_exiled' ),
		'set_featured_image'    => __( 'Set featured image', '_exiled' ),
		'remove_featured_image' => __( 'Remove featured image', '_exiled' ),
		'use_featured_image'    => __( 'Use as featured image', '_exiled' ),
		'insert_into_item'      => __( 'Insert into Note', '_exiled' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Note', '_exiled' ),
		'items_list'            => __( 'Items list', '_exiled' ),
		'items_list_navigation' => __( 'Items list navigation', '_exiled' ),
		'filter_items_list'     => __( 'Filter notes list', '_exiled' ),
	);
	$rewrite = array(
		'slug'                  => 'status',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Note', '_exiled' ),
		'description'           => __( 'Short entries. Similar to posts.', '_exiled' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', '_timeline' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'notes',
	);
	register_post_type( '_exiled_note', $args );

}
add_action( 'init', 'register_notes', 0 );
