<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package _Exiled
 */
 $_exiled_title = get_bloginfo( 'name', 'display' );
 $_exiled_description = get_bloginfo( 'description', 'display' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

  <div class="site-sidebar">
    <div class="site-sidebar-inner">
      <nav id="site-navigation" class="site-nav text-right">
        <?php wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'menu_id' => 'primary-menu',
          'menu_class' => 'primary list-unstyled list-menu',
        ) ); ?>
      </nav>
      <div class="pulse-header d-block d-md-none">
        <?php include get_template_directory() . '/template-parts/_partial_pulsemarker.php'; ?>
      </div>
    </div>
  </div>

  <header role="masthead" class="site-header">
    <?php include get_template_directory() . '/template-parts/_partial_promoted.php'; ?>
    <div class="site-branding site-header-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php the_custom_logo(); ?>
        <?php include get_template_directory() . '/template-parts/_partial_logo.php'; ?>
      </a>
      <h1 class="sr-only"><?php echo $_exiled_title; ?></h1>
      <h6 class="sr-only site-description"><span><?php echo $_exiled_description; ?></span></h6>
    </div><!-- .site-branding -->
  </header><!-- #masthead -->

  <div id="river" class="site-content">
  	<div id="content" class="fadeIn">
