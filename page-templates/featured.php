<?php
/**
 * Template Name: Full-width layout
 * Template Post Type: post, page
 * The template for displaying a simple page layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _exiled
 */

?>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="pageFull" class="site">

	<header role="masthead" class="site-header">
    <?php include get_template_directory() . '/template-parts/_partial_promoted.php'; ?>
    <div class="site-branding site-header-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php include get_template_directory() . '/template-parts/_partial_logo.php'; ?>
      </a>
      <h1 class="sr-only"><?php echo $_exiled_title; ?></h1>
      <h6 class="sr-only site-description"><span><?php echo $_exiled_description; ?></span></h6>
    </div><!-- .site-branding -->
  </header><!-- #masthead -->

  <div class="site-content-full">
    <main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'featured' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
  </div>
</div>

<?php
get_footer();
