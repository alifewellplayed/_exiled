<?php
/**
 * _Exiled functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _Exiled
 */

if ( ! function_exists( '_exiled_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _exiled_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _Exiled, use a find and replace
		 * to change '_exiled' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_exiled', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '_exiled' ),
      'menu-2' => esc_html__( 'Footer', '_exiled' ),
      'menu-3' => esc_html__( 'Mobile', '_exiled' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );


    /**
    * Add post type formats
    *
    * @link https://codex.wordpress.org/Post_Formats
    */

    add_theme_support( 'post-formats', array(
      'aside',
      'status',
      'gallery',
      'link',
      'video',
      'audio',
      'chat'
    ));
	}
endif;
add_action( 'after_setup_theme', '_exiled_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _exiled_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_exiled_content_width', 640 );
}
add_action( 'after_setup_theme', '_exiled_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _exiled_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_exiled' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_exiled' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_exiled_widgets_init' );

// Enqueue scripts and styles.
function _exiled_scripts() {
  wp_enqueue_style('_exiled-style', get_template_directory_uri() . '/dist/css/site.min.css', array(), '5', 'screen');
  wp_enqueue_script('_exiled-site-js', get_template_directory_uri() . '/dist/js/site.min.js', array('jquery'), '5', true);
	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	//	wp_enqueue_script( 'comment-reply' );
	//}
}
add_action( 'wp_enqueue_scripts', '_exiled_scripts' );

function update_main_query( $query ) {
  if ( $query->is_home() && $query->is_main_query() ) { // Run only on the homepage
    //$query->query_vars['cat'] = -2; // Exclude featured category
    $query->query_vars['ignore_sticky_posts'] = 1;
  }
}
// Hook my above function to the pre_get_posts action
add_action( 'pre_get_posts', 'update_main_query' );

// Helper functions
require get_template_directory() . '/inc/util.php';

// Custom post meta fields
require get_template_directory() . '/inc/post-type/post.php';
require get_template_directory() . '/inc/post-type/page.php';

// Register custom post types
require get_template_directory() . '/inc/post-type/notes.php';
require get_template_directory() . '/inc/post-type/promoted.php';
require get_template_directory() . '/inc/post-type/collection.php';
require get_template_directory() . '/inc/post-type/review.php';

// Register custom taxonomies
require get_template_directory() . '/inc/taxonomy/timeline.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Load Theme specific Shortcodes
require get_template_directory() . '/inc/shortcodes.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Add additional fields for the theme.
require get_template_directory() . '/inc/theme-settings.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
