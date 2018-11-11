<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _Exiled
 */

 $_exiled_title = get_bloginfo( 'name', 'display' );
 $_exiled_description = get_bloginfo( 'description', 'display' );

 $site_author =  get_option('site_author');
 $site_website = get_option('site_author_website');
 $site_email =  get_option('social_email');


?>
	</div><!-- #content -->
</div><!-- #river -->
	<footer id="colophon" class="site-footer" role="footer">
		<div class="site-info layout-single-column">
      <?php get_sidebar(); ?>
      <nav class="footer-links sr-only">
        <?php wp_nav_menu( array(
          'theme_location' => 'menu-2',
          'menu_id' => 'footer-menu',
        ) ); ?>
      </nav>
      <small class="d-block"><?php echo $_exiled_title; ?>, Copyright &copy; <?php echo date("Y"); ?></small>
      <small class="d-block">By <a href="<?php echo $site_website; ?>"><?php echo $site_author; ?></a></small>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php include get_template_directory() . '/template-parts/_partial_infoModal.php'; ?>

<?php wp_footer(); ?>

</body>
</html>
