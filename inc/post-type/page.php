<?php

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'post_meta_boxes_setup' );

/* Meta box setup function. */
function page_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'page_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_page', 'save_page_meta', 10, 2 );
}

function page_meta_boxes(){
    add_meta_box( 'page_meta_box', 'Page Meta', 'render_post_meta_box', 'page', 'side', 'high');
}

function render_page_meta_box($object, $box){
   wp_nonce_field( basename( __FILE__ ), 'post_meta_nonce' );
   $curr_title = get_post_meta($object->ID, 'hide_title', true);
   if(empty($curr_title)) { $curr_title = false; } ?>

   <p>
     <label for="hide_title">
       <input type="checkbox" name="hide_title" value="true" <?php if($curr_title){ echo "checked"; } ?>> <strong>Hide Page Title</strong>
     </label>
   </p>


<?php }

/* Save the meta box's post metadata. */
function save_page_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['post_meta_nonce'] ) || !wp_verify_nonce( $_POST['post_meta_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    $meta_keys = array('hide_title');
    foreach($meta_keys as $key){
      $meta_val = get_post_val($key);
      update_post_meta($post_id, $key, $meta_val);
    }
  }
