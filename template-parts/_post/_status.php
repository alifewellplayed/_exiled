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
    'post',
    'entry',
    'mb-5',
	);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title h4">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

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
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _exiled_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
