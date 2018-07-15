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

 $url = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h3 class="entry-title"><a href="' . esc_url( $url ) . '" rel="bookmark">', '</a></h3>' );

		if ( 'post' === get_post_type() ) :
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

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_exiled' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _exiled_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
