<?php

function exiled_render_timelines() {
  $args = array(
    'taxonomy'               => array( '_timeline' ),
    'fields'                 => 'all',
    'hide_empty'             => false,
  );

  $the_query = new WP_Term_Query($args);
  echo '<ul class="list-unstyled exiled-media-list">';
  foreach($the_query->get_terms() as $term){
    the_date('F Y', '<h2 class="h6 my-4 datetime">', '</h2>');
    $name = $term->name;
    $description = $term->description;
    $count = $term->count;
    $url = get_category_link($term->term_id);
    ?>
    <li class="media">
      <div class="media-body">
        <h5 class="mt-0 mb-1">
          <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
          <small class="pr-2">(<?php echo $count; ?> items)</small>
        </h5>
        <small><?php echo $description; ?></small>
      </div>
    </li>
    <?php
    //print_r($term); echo '<hr />';
  }
  echo '</ul>';
}

add_shortcode('render_timelines', 'exiled_render_timelines');
