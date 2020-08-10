<?php
/**
 * Agility WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Agility_WP
 */

if ( ! defined( 'AWP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'AWP_VERSION', '0.0.2' );
}

if ( ! function_exists( 'awp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function awp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Agility WP, use a find and replace
		 * to change 'awp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'awp', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'awp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'awp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add Theme Support for Editor Style.
		add_theme_support( 'editor-styles' );

		// Add Theme Support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add Theme Support for Wide and FFull alignment.
		add_theme_support( 'align-wide' );

		// Add Support for responsive embed.
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'awp_setup' );

/**
 * Enqueue styles for Editor.
 */
function awp_block_editor_styles() {
    wp_enqueue_style( 'awp-editor-styles', get_theme_file_uri( 'assets/css/style-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'awp_block_editor_styles' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function awp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'awp_content_width', 640 );
}
add_action( 'after_setup_theme', 'awp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function awp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'awp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'awp' ),
			'before_widget' => '<section id="%1$s" class="sidebar-block widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget', 'awp' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'awp' ),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-6 col-12  widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title"><span>',
			'after_title'   => '</span></h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Bottom Widget', 'awp' ),
			'id'            => 'footer_bottom_widget',
			'description'   => esc_html__( 'Add widgets here.', 'awp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title"><span>',
			'after_title'   => '</span></h6>',
		)
	);
}
add_action( 'widgets_init', 'awp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function awp_scripts() {
	wp_enqueue_style( 'awp-style', get_stylesheet_uri(), array(), AWP_VERSION );
	wp_style_add_data( 'awp-style', 'rtl', 'replace' );

	wp_enqueue_style( 'awp-catamaran-font', '//fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), AWP_VERSION );
	wp_enqueue_style( 'awp-quicksend-font', '//fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap', array(), AWP_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'awp-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), AWP_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'awp_scripts' );

/**
 * Custom Header for this theme.
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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
	// File does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'awp' ) );
} else {
	// File exists... require it.
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

/**
 * Replaces the excerpt "Read More" text by a link.
 *
 * @param string $more for blog page.
 * @return Post Link
 */
function awp_excerpt_more( $more ) {
	global $post;
	return '<p class="text-right"><a class="read-more_tag " href="' . get_permalink( $post->ID ) . '"> Continue Reading <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
</svg></a></p>';
}
add_filter( 'excerpt_more', 'awp_excerpt_more' );
