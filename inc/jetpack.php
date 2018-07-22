<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package _Exiled
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function _exiled_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => '_exiled_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => '_exiled-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', '_exiled_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function _exiled_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}

function _exiled_jetpack_remove_related_potsts() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', '_exiled_jetpack_remove_related_potsts', 20 );


function _exiled_jetpack_related_posts( $atts ) {
  $posts_titles = array();

  if ( class_exists( 'Jetpack_RelatedPosts' ) && method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) {
    $related = Jetpack_RelatedPosts::init_raw()
    ->set_query_name( 'jetpackme-shortcode' ) // Optional, name can be anything
    ->get_for_post_id(
      get_the_ID(),
      array( 'size' => 4 )
    );
    if ( $related ) {
      echo '<ul class="list-unstyled exiled-media-list layout-single-column my-5">';
      foreach ( $related as $result ) {
        $post_ID = get_post( $result[ 'id' ] );
        $title = get_the_title($post_ID);
        $url = get_permalink($post_ID);
        $naturalTime = get_the_date($post_ID);
      ?>
      <li class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">
            <a href="<?php echo $url; ?>"><span><?php echo $title; ?></span></a>
            <time datetime="<?php echo $naturalTime; ?>" class="datetime pl-2"><?php echo $naturalTime; ?></time>
          </h5>
        </div>
      </li><?php }
      echo '</ul>';
    }
  }
}
// Create a [exiled_related] shortcode
add_shortcode( 'exiled_related_posts', '_exiled_jetpack_related_posts' );
