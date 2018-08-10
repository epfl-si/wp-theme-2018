<?php
/**
 * epfl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package epfl
 */

if ( ! function_exists( 'epfl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function epfl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on epfl, use a find and replace
		 * to change 'epfl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'epfl', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'epfl' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'epfl_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

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
	}
endif;
add_action( 'after_setup_theme', 'epfl_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function epfl_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'epfl_content_width', 640 );
}
add_action( 'after_setup_theme', 'epfl_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function epfl_widgets_init() {
/* 	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'epfl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'epfl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); */
}
add_action( 'widgets_init', 'epfl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function epfl_scripts() {
	wp_enqueue_style( 'epfl-style', get_stylesheet_uri() );

	wp_enqueue_style( 'epfl-vendors', get_stylesheet_directory_uri().'/assets/css/vendors.min.css' );
	wp_enqueue_style( 'epfl-base', get_stylesheet_directory_uri().'/assets/css/base.css' );

	wp_enqueue_script( 'epfl-js-jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), false, true );
	wp_enqueue_script( 'epfl-js-vendors', get_template_directory_uri() . '/assets/js/vendors.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'epfl-js-vendors-bundle', get_template_directory_uri() . '/assets/js/vendors.bundle.js', array(), '1.0.0', true );
	wp_enqueue_script( 'epfl-js', get_template_directory_uri() . '/assets/js/app.bundle.js', array('epfl-js-vendors-bundle'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'epfl_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Media gallery.
 */
require get_template_directory() . '/inc/media-gallery.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * load shortcodes
 */
require_once 'shortcodes/index.php';

/**
 * disable comments
 */
require_once 'disable_comments.php';

/**
 * load custom menu walker
 */
require_once get_template_directory() . '/menus/custom-nav-walker.php';

/**
 * load submenu filter
 */
require_once get_template_directory() . '/menus/submenu.php';

add_filter('default_page_template_title', function() {
    return __('Par défaut', 'your_text_domain');
});

function menu_link_ids ($atts, $page) {
	$atts["data-page-id"] = $page->ID;
	return $atts;
}
add_filter('page_menu_link_attributes', 'menu_link_ids', 10, 2);

// custom body class to identify wordpress
function epfl_wp_class($classes) {
	$classes[] = 'epfl-wp';
	return $classes;
}
add_filter('body_class', 'epfl_wp_class');

/**
 * declare globals
 */
function init_globals() {
	global $containerClasses;
	$containerClasses = 'nav-toggle-layout nav-aside-layout';

	$actualTemplate = get_page_template_slug();
	if (
		$actualTemplate == 'page-aside-none.php'
		|| is_home()) {
		$containerClasses = 'nav-toggle-layout';
	}
}

/**
 * add a 16/9 thumbnail size with cropping
 * used in card headers
 */
add_image_size( 'thumbnail_16_9_crop', 384, 216, ['center', 'center'] );
add_image_size( 'thumbnail_16_9_large', 1920, 1080, ['center', 'center'] );
add_image_size( 'thumbnail_square_crop', 300, 300, ['center', 'center'] );

/**
 * update CSS within admin
 */
add_action( 'admin_init', 'epfl_add_editor_styles' );
function epfl_add_editor_styles() {
	add_theme_support( 'editor-style' );
	add_editor_style('editor-styles.css');
}

/**
 * change excerpt length
 */
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

function excerpt_more( $more ) {
    return ' (...)';
}
add_filter( 'excerpt_more', 'excerpt_more' );

/**
 * Share icons directory with templates
 */
global $iconDirectory;
$iconDirectory = get_template_directory_uri().'/assets/images/shortcode-icons/';

/**
 * modify archive link markup
 */
function get_archives_link_mod ( $link_html ) {
    $string = str_replace("<a", '<small><a', $link_html).'</small>';
		return $string;
}
add_filter("get_archives_link", "get_archives_link_mod");
