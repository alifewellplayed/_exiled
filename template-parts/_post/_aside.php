<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _Exiled
 */
 $classes = array(
		'layout-single-column',
    'mb-5',
    'post',
    'entry',
    'aside',
	);
?>

<aside id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
  <?php the_title( '<h1 class="entry-title sr-only">', '</h1>' ); ?>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <footer class="sr-only">
		<?php _exiled_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</aside>
