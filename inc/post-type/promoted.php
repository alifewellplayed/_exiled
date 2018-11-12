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

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'promoted_meta_boxes_setup' );
add_action( 'load-post-new.php', 'promoted_meta_boxes_setup' );

/* Meta box setup function. */
function promoted_meta_boxes_setup() {
	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'promoted_meta_boxes' );
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'save_promoted_meta', 10, 2 );
}

function promoted_meta_boxes(){
	add_meta_box( 'promoted_meta_box', 'Meta', 'render_post_meta_box', '_exiled_promoted', 'side', 'high');
}

function render_promoted_meta_box($object, $box){
	wp_nonce_field( basename( __FILE__ ), 'promoted_meta_nonce' ); ?>
	<p>
		<label for="source-name">Source Name</label>
		<input type="text" name="source-name" id="source-name" value="<?php echo get_post_meta($object->ID, 'source-name', true); ?>"/>
	</p>
	<p>
		<label for="source-url">Source URL</label>
		<input type="text" name="source-url" id="source-url" value="<?php echo get_post_meta($object->ID, 'source-url', true); ?>"/>
	</p>
	<?php
}

/* Save the meta box's post metadata. */
function save_promoted_meta( $post_id, $post ) {
	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['promoted_meta_nonce'] ) || !wp_verify_nonce( $_POST['promoted_meta_nonce'], basename( __FILE__ ) ) )
	return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	return $post_id;

	$source_meta = get_post_val('source-name');
	update_post_meta($post_id, 'source-name', $source_meta);
	$url_meta = get_post_val('source-url');
	update_post_meta($post_id, 'source-url', $url_meta);
}
