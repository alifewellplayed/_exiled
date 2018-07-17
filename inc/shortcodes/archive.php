<?php
// Archive related shortcodes

function exiled_render_posts() {
  $format = 'F Y';
  $args = array(
    'post_status' => 'publish',
    'numberposts' => -1,
    'suppress_filters' => true,
    'tax_query' => array( array(
      'taxonomy' => 'post_format',
      'field' => 'slug',
      'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
      'operator' => 'NOT IN'
    ) )
  );
  $query = new WP_Query( $args );
  if ( $query->have_posts() ) {
    echo '<ul class="list-unstyled replica-media-list">';

    the_date('F Y', '<h2 class="h6 my-4 datetime">', '</h2>');

    while ( $query->have_posts() ) {
      $query->the_post();
      $title = get_the_title();
      $url = get_permalink();
      $absolute_url = get_permalink();
      $naturalTime = get_the_date();
      $humanTime = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
      $excerpt = get_the_excerpt(); ?>
      <li class="media">
        <div class="media-body">
          <time datetime="<?php echo $naturalTime; ?>" class="sr-only"><?php echo $naturalTime; ?></time>
        </datetime>
        <h5 class="mt-0 mb-1">
          <a href="<?php echo $url; ?>"><span><?php echo $title; ?></span></a>
          <small class="datetime pl-2"><?php echo $naturalTime; ?></small>
        </h5>
      </div>
    </li>
  <?php }
  echo '</ul>';
}
wp_reset_postdata();
}

add_shortcode('render_posts', 'exiled_render_posts');
