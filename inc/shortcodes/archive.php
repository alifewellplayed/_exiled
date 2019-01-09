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
  $previous_date  = '';
  if ( $query->have_posts() ) {
    $return_string = '<ul class="list-unstyled exiled-media-list">';
    //$return_string .= '<h2 class="h6 my-4 datetime">' . get_the_date('F Y') . '</h2>';
    while ( $query->have_posts() ) {
      $query->the_post();
      $title = get_the_title();
      $url = get_permalink();
      $absolute_url = get_permalink();
      $datetime = get_the_date('F Y');
      $naturalTime = get_the_date();
      $humanTime = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
      $excerpt = get_the_excerpt();
      if($datetime !== $previous_date) {
        $return_string .= '<h2 class="h6 my-4 datetime">'.$datetime.'</h2>';
      }
      $return_string .= '<li class="media">
        <div class="media-body">
          <time datetime="'.$naturalTime.'" class="sr-only">'.$naturalTime.'</time>
        </datetime>
        <h5 class="mt-0 mb-1">
          <a href="'.$url.'"><span>'.$title.'</span></a>
          <small class="datetime pl-2">'.$naturalTime.'</small>
        </h5>
      </div>
    </li>';
    }
    $return_string .= '</ul>';
    wp_reset_query();
    return $return_string;
  }
}
add_shortcode('render_posts', 'exiled_render_posts');
