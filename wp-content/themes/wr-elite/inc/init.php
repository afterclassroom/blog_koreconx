<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

if ( ! function_exists( 'wr_elite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0
 */
function wr_elite_setup() {

	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on elite, use a find and replace
	 * to change 'elite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'elite', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/**
	 * Enable support for Post Formats.
	 *
	 * @link http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'gallery', 'video', 'quote', 'audio',
	) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'wr_elite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Setup the WordPress core custom header image.
	 */
	add_theme_support( 'custom-header', array(
		// Header text display default
		'header-text' => false,
		// Header image flex width
		'flex-width'  => true,
		// Header image width (in pixels)
		'width'       => 1170,
		// Header image flex height
		'flex-height' => true,
		// Header image height (in pixels)
		'height'      => 130,
	) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'one_page_menu' => __( 'One Page Menu', 'elite' ),
		'main_menu'     => __( 'Main Menu', 'elite' ),
	) );

	/**
	 * Tell the TinyMCE editor to use a custom stylesheet
	 */
	add_editor_style( 'assets/css/editor-style.css' );

}
endif; // wr_elite_setup
add_action( 'after_setup_theme', 'wr_elite_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @since 1.0
 */
function wr_elite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'elite' ),
		'id'            => 'primary-sidebar',
		'description'   => __( 'This is the primary sidebar if you are using a two or three column site layout option.', 'elite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'elite' ),
		'id'            => 'secondary-sidebar',
		'description'   => __( 'This is the secondary sidebar if you are using a two or three column site layout option.', 'elite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wr_elite_widgets_init' );

/**
 * Add menu for welcome page.
 *
 * @since 1.1
 */
function wr_elite_add_menu() {
	add_theme_page( __( 'About Elite', 'elite' ), __( 'About Elite', 'elite' ), 'manage_options', 'elite-home', 'wr_elite_welcome' );
}
add_action( 'admin_menu', 'wr_elite_add_menu' );

/**
 * Redirect to welcome page after active theme.
 *
 * @since 1.1
 */
function wr_elite_theme_activation_redirect() {
	if ( isset( $_GET['activated'] ) ) {
		wp_redirect( admin_url( 'themes.php?page=elite-home' ) );
	}
}
add_action( 'admin_init', 'wr_elite_theme_activation_redirect' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since 1.0
 */
function wr_elite_scripts() {
	// Load owl carousel stylesheet.
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/vendor/owl.carousel.css' );

	// Load our main stylesheet.
	wp_enqueue_style( 'elite-main', get_template_directory_uri() . '/assets/css/main.css', array( 'dashicons' ) );

	// Load responsive stylesheet.
	wp_enqueue_style( 'elite-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '', 'screen' );

	// Load owl-carousel javascript.
	wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.js', array(), '', true );

	// Load owl-carousel javascript.
	wp_enqueue_script( 'single-pageNav-script', get_template_directory_uri() . '/assets/js/vendor/jquery.singlePageNav.js', array(), '', true );

	// Load our custom javascript.
	wp_enqueue_script( 'elite-main-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '', true );

	// Adds the comment-reply JavaScript to the single post pages
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue countdown timer script if maintenance mode is enable
	if ( wr_elite_theme_option( 'wr_maintenance_mode' ) ) {
		wp_enqueue_script( 'jquery-countdown-script', get_template_directory_uri() . '/assets/js/vendor/jquery.countdown.js', array(), '', true );
	}

	// Enqueue style of WR PageBuilder
	if ( class_exists( 'WR_Pb_Init' ) ) {
		wp_enqueue_style( 'elite-pagebuilder', get_template_directory_uri() . '/assets/css/pagebuilder.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'wr_elite_scripts', 10000 );

/**
 * Jetpack Compatibility File.
 */
require get_template_directory() . '/inc/elite/jetpack.php';

/**
 * Filter the content width based on the user selected layout.
 */
require get_template_directory() . '/inc/elite/layout.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/elite/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/elite/extras.php';

/**
 * HTML5 Schema Markup initialization.
 */
require get_template_directory() . '/inc/elite/markup.php';

/**
 * Additions color schemes for themes
 */
require get_template_directory() . '/inc/elite/colors.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/admin/customizer.php';

/**
 * Load TGM Plugin Activation library
 */
require get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php';

/**
 * Additions field for advanced custom fields
 */
require get_template_directory() . '/inc/admin/acf.php';

/**
 * Additions welcome page.
 */
require get_template_directory() . '/inc/admin/welcome.php';

/**
 * Define function to get theme option.
 *
 * @param   string  $option  Name of option to get value for.
 *
 * @return  mixed
 */
function wr_elite_theme_option( $option ) {
	static $theme_options;

	// Get saved value for the specified option
	$value = get_theme_mod( $option, false );

	if ( false === $value ) {
		// Get all theme options
		if ( ! isset( $theme_options ) ) {
			$theme_options = wr_elite_theme_options();
		}

		// Loop thru theme options to get default value for the specified option
		foreach ( $theme_options as $section => $define ) {
			if ( isset( $define['settings'][ $option ] ) && isset( $define['settings'][ $option ]['default'] ) ) {
				return $define['settings'][ $option ]['default'];
			}
		}
	}

	return $value;
}
