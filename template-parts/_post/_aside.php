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

  $content = get_post_field( 'post_content', get_the_ID() );
  $word_count = str_word_count( strip_tags( $content ) );
  if ($word_count >= 100) {$fontSize = 'fs-2'; }
  elseif ($word_count >= 250) {$fontSize = 'fs-1'; }
  else { $fontSize = 'fs-3'; }
?>

<aside id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
  <?php the_title( '<h1 class="entry-title sr-only">', '</h1>' ); ?>
  <div class="entry-content <?php echo $fontSize; ?> ">
    <?php the_content(); ?>
  </div>
  <footer class="sr-only">
		<?php _exiled_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</aside>
