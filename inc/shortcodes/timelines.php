<?php

function exiled_render_timelines() {
  $args = array(
    'taxonomy'               => array( '_timeline' ),
    'fields'                 => 'all',
    'hide_empty'             => false,
  );

  $timeline_query = new WP_Term_Query($args);
  $return_string = '<ul class="list-unstyled exiled-media-list mt-4">';
  $previous_date  = '';
  foreach($timeline_query->get_terms() as $term){
    $datetime = get_the_date('F Y');
    $name = $term->name;
    $description = $term->description;
    $count = $term->count;
    $url = get_category_link($term->term_id);
    if($datetime !== $previous_date) {
      $return_string .= '<h2 class="h6 my-4 datetime">'.$datetime.'</h2>';
    }
    $return_string .= '
    <li class="media">
      <div class="media-body">
        <h5 class="mt-0 mb-1"><a href="'.$url.'">'.$name.'</a>
          <small class="pr-2">('.$count.' items)</small>
        </h5>
        <small>'.$description.'</small>
      </div>
    </li>';
    //print_r($term); echo '<hr />';
  }
  $return_string .= '</ul>';
  wp_reset_query();
  return $return_string;

}

function register_timeline_shortcodes(){
   add_shortcode('render_timelines', 'exiled_render_timelines');
}

add_action( 'init', 'register_timeline_shortcodes');
