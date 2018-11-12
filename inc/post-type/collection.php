<?php

function _exiled_collection() {

	$labels = array(
		'name'                  => _x( 'Collections', 'Post Type General Name', '_exiled' ),
		'singular_name'         => _x( 'Collection', 'Post Type Singular Name', '_exiled' ),
		'menu_name'             => __( 'Collections', '_exiled' ),
		'name_admin_bar'        => __( 'Collections', '_exiled' ),
		'archives'              => __( 'Collection Archives', '_exiled' ),
		'attributes'            => __( 'Collection Attributes', '_exiled' ),
		'parent_item_colon'     => __( 'Parent Collection:', '_exiled' ),
		'all_items'             => __( 'All Collections', '_exiled' ),
		'add_new_item'          => __( 'Add New Collection', '_exiled' ),
		'add_new'               => __( 'Add New', '_exiled' ),
		'new_item'              => __( 'New Collection', '_exiled' ),
		'edit_item'             => __( 'Edit Collection', '_exiled' ),
		'update_item'           => __( 'Update Collection', '_exiled' ),
		'view_item'             => __( 'View Collection', '_exiled' ),
		'view_items'            => __( 'View Collections', '_exiled' ),
		'search_items'          => __( 'Search Collection', '_exiled' ),
		'not_found'             => __( 'Not found', '_exiled' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_exiled' ),
		'featured_image'        => __( 'Featured Image', '_exiled' ),
		'set_featured_image'    => __( 'Set featured image', '_exiled' ),
		'remove_featured_image' => __( 'Remove featured image', '_exiled' ),
		'use_featured_image'    => __( 'Use as featured image', '_exiled' ),
		'insert_into_item'      => __( 'Insert into Collection', '_exiled' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Collection', '_exiled' ),
		'items_list'            => __( 'collection list', '_exiled' ),
		'items_list_navigation' => __( 'Collection list navigation', '_exiled' ),
		'filter_items_list'     => __( 'Filter Collection list', '_exiled' ),
	);
	$rewrite = array(
		'slug'                  => 'collections',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Collection', '_exiled' ),
		'description'           => __( 'Collection of posts', '_exiled' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions' ),
		'taxonomies'            => array( 'collection_categories', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-list-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'collections',
	);
	register_post_type( '_exiled_collection', $args );

}
add_action( 'init', '_exiled_collection', 0 );

add_action( 'load-post.php', 'collection_meta_boxes_setup' );
add_action( 'load-post-new.php', 'collection_meta_boxes_setup' );

/* Meta box setup function. */
function collection_meta_boxes_setup() {
  add_action( 'add_meta_boxes', 'collection_meta_boxes' );
  add_action( 'save_post', 'save_collection_meta', 10, 2 );
}

function collection_meta_boxes(){
  add_meta_box( 'related_meta_box', 'Posts', 'render_collection_related_box', '_exiled_collection', 'normal');
}

function render_collection_related_box($object, $box){
  $args = array(
    'posts_per_page'   => -1,
    'offset'           => 0,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
  );
  $posts_array = get_posts( $args );
  $post_options = array();
  foreach($posts_array as $post){
    $post_options[$post->ID] = get_the_title($post->ID);
  }
  $curr_related = get_post_meta($object->ID, 'related-posts', true);
  if(empty($curr_related)) { $curr_related = []; }
  ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'post_related_nonce' ); ?>

	<style>
		.collection-post-option {
			width: 48%;
			display: inline-block;
		}
	</style>
	<p>
    <?php foreach ($post_options as $key => $val){ ?>
      <label class="collection-post-option">
				<input type="checkbox" name="related-posts[]" value="<?php echo $key; ?>" <?php if (in_array($key, $curr_related)){ echo "checked"; }?>> <?php echo $val; ?>
			</label>
    <?php } ?>
	</p>
  <?php
}

function save_collection_meta( $post_id, $post ) {
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['post_related_nonce'] ) || !wp_verify_nonce( $_POST['post_related_nonce'], basename( __FILE__ ) ) )
  return $post_id;
  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );
  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
  return $post_id;
  $related_meta = get_post_val('related-posts', []);
  update_post_meta($post_id, 'related-posts', $related_meta);
}
