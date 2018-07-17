<?php
/**
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
* @package _Exiled
*/

function exiled_promoted() {
  $args = array(
    'numberposts' => 1,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => '_exiled_promoted',
    'post_status' => 'publish',
    'suppress_filters' => true
  );
  $promoted_posts = wp_get_recent_posts($args);
  foreach( $promoted_posts as $post ){
    $url_source = get_post_meta($post["ID"], 'source-url', true);
    if (!empty( $url_source)) { $url = $url_source; } else { $url = get_permalink($post["ID"]); }
    $title = $post["post_title"];
    $excerpt = get_the_excerpt($post["ID"]);
    $image = get_the_post_thumbnail( $post["ID"], 'full', array( 'class' => 'sr-only image-full' ) );
    echo '<div class="site-promoted-story">'; ?>
      <?php if ( has_post_thumbnail($post["ID"]) ) :
        echo '<div class="site-promoted-image">' . $image . '</div>';
      endif; ?>
      <h6><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h6>
      <span class="linked-excerpt">
        <?php echo $excerpt; ?>
      </span>
    <?php echo '</div>';
  } wp_reset_query();
}

exiled_promoted();
?>
