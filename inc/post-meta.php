<?php

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'post_meta_boxes_setup' );

/* Meta box setup function. */
function post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'post_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'save_post_meta', 10, 2 );
}

function post_meta_boxes(){
    add_meta_box( 'post_meta_box', 'Post Meta', 'render_post_meta_box', 'post', 'side', 'high');
}

function render_post_meta_box($object, $box){
    ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'post_meta_nonce' ); ?>
    <p>
      <label for="news-source-name">Source Name</label>
      <input type="text" name="news-source-name" id="news-source-name" value="<?php echo get_post_meta($object->ID, 'source-name', true); ?>"/>
    </p>
    <p>
      <label for="news-source-url">Source URL</label>
      <input type="text" name="news-source-url" id="news-source-url" value="<?php echo get_post_meta($object->ID, 'source-url', true); ?>"/>
    </p>
<?php
}

/* Save the meta box's post metadata. */
function save_post_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['post_meta_nonce'] ) || !wp_verify_nonce( $_POST['post_meta_nonce'], basename( __FILE__ ) ) )
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
