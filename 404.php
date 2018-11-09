<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _Exiled
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found layout-single-column mb-5">
				<header class="page-header">
					<h1 class="h1 page-title"><?php esc_html_e( '404.', '_exiled' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'That page can&rsquo;t be found.', '_exiled' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
