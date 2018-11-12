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
   'linked',
   'post',
   'entry'
 );
 $url_source = get_post_meta(get_the_ID(), 'source-url', true);
 $permalink = get_permalink();
 if (!empty( $url_source)) { $url = $url_source; } else { $url = get_permalink(); }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="entry-header mb-2">
		<?php the_title( '<h3 class="entry-title h3 d-inline"><span><a href="' . esc_url( $url ) . '" rel="bookmark">', '</a></span></h3>' );?>
    <span class="linked-list-permalink"><a href="<?php echo $permalink; ?>" rel="bookmark" class="glyph">&#8734;</a></span>
		<?php if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta sr-only">
				<?php _exiled_posted_on(); _exiled_posted_by(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php _exiled_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="sr-only"> "%s"</span>', '_exiled' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _exiled_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
