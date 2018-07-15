<?php

// Register custom Timeline taxonomy for Notes
function timeline_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Timelines', 'Taxonomy General Name', '_exiled' ),
		'singular_name'              => _x( 'Timeline', 'Taxonomy Singular Name', '_exiled' ),
		'menu_name'                  => __( 'Timelines', '_exiled' ),
		'all_items'                  => __( 'Timelines', '_exiled' ),
		'parent_item'                => __( 'Parent Timeline', '_exiled' ),
		'parent_item_colon'          => __( 'Parent Timeline:', '_exiled' ),
		'new_item_name'              => __( 'New Timeline', '_exiled' ),
		'add_new_item'               => __( 'Add Timeline', '_exiled' ),
		'edit_item'                  => __( 'Edit Timeline', '_exiled' ),
		'update_item'                => __( 'Update Timeline', '_exiled' ),
		'view_item'                  => __( 'View Timeline', '_exiled' ),
		'separate_items_with_commas' => __( 'Separate items with commas', '_exiled' ),
		'add_or_remove_items'        => __( 'Add or remove Timeline', '_exiled' ),
		'choose_from_most_used'      => __( 'Choose from the most used', '_exiled' ),
		'popular_items'              => __( 'Popular Timelines', '_exiled' ),
		'search_items'               => __( 'Search Timelines', '_exiled' ),
		'not_found'                  => __( 'Nothing Found', '_exiled' ),
		'no_terms'                   => __( 'No Timelines', '_exiled' ),
		'items_list'                 => __( 'Timeline list', '_exiled' ),
		'items_list_navigation'      => __( 'Timeline list navigation', '_exiled' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( '_timeline', array( '_exiled_note' ), $args );

}
add_action( 'init', 'timeline_taxonomy', 0 );
