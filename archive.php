<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _Exiled
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header layout-single-column mb-4">
				<?php
				the_archive_title( '<h1 class="page-title mb-2">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="layout-single-column">
			<ul class="list-unstyled exiled-media-list">
			<?php
			while ( have_posts() ) :
				the_post();
				$previous_date  = '';
				$title = get_the_title();
				$url = get_permalink();
				$absolute_url = get_permalink();
				$datetime = get_the_date('F Y');
				$naturalTime = get_the_date();
				$humanTime = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
				if($datetime !== $previous_date) {
					echo '<h2 class="h6 my-4 datetime">'.$datetime.'</h2>';
					$previous_date  = $datetime;
      	} ?>
				<li class="media">
					<div class="media-body">
						<time datetime="<?php echo $naturalTime; ?>" class="sr-only"><?php echo $naturalTime; ?></time>
						<h5 class="mt-0 mb-1">
							<a href="<?php echo $url; ?>">
								<span><?php echo $title; ?></span>
							</a>
							<small class="datetime pl-2"><?php echo $naturalTime; ?></small>
						</h5>
					</div>
				</li>
			<?php
			
			endwhile;
			//the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</ul>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
