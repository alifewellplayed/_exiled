<?php


function exiled_render_timelines() {
  // WP_Term_Query arguments
  $args = array(
  	'taxonomy'               => array( '_timeline' ),
  	'fields'                 => 'all',
  );

  $the_query = new WP_Term_Query($args);
  echo '<ul class="list-unstyled">';
  foreach($the_query->get_terms() as $term){
    $name = $term->name;
    $description = $term->description;
    $count = $term->count;
    $url = get_category_link($term->term_id);
  ?>
      <li>
        <span class="d-block h4">
          <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
          <small class="pr-2">(<?php echo $count; ?> items)</small>
        </span>
        <span><?php echo $description; ?></span>
      </li>
      <hr />
  <?php
  //print_r($term); echo '<hr />';
  }
  echo '</ul>';
}

add_shortcode('render_timelines', 'exiled_render_timelines');
