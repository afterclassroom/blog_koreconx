<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'minimum', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'minimum' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Minimum Pro Theme', 'minimum' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/minimum/' );
define( 'CHILD_THEME_VERSION', '3.0.13' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );




// REGISTER MORE JS & THIRD PARTY JS/PLUGIN
function register_more_js() {
    	wp_register_script('jquery',  dirname( get_bloginfo('stylesheet_url') ) . "/js/vendor/jquery-1.9.1.min.js", null, null, true);
        wp_register_script('fancyboxjs', dirname( get_bloginfo('stylesheet_url') ) . "/js/fancybox/jquery.fancybox.js", null, null, true);
        wp_register_script('morejs', dirname( get_bloginfo('stylesheet_url') ) . "/js/more.js", null, null, true);
	// You may REGISTER more JS files here.
}
function enqueue_more_js() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('fancyboxjs');
	wp_enqueue_script('morejs');
	// You may ENQEUE more JS files here.
}

// REGISTER MORE CSS & THIRD PARTY CSS
function register_more_css() {
	// Add CSS
        wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css', null, null, false);
  	    wp_enqueue_style( 'font-electro', '//fonts.googleapis.com/css?family=Electrolize', array(), CHILD_THEME_VERSION );
  	    wp_enqueue_style( 'font-c', '////fonts.googleapis.com/css?family=Oswald', array(), CHILD_THEME_VERSION );
            wp_register_style('fancyboxcss', dirname( get_bloginfo('stylesheet_url') ) . "/js/fancybox/jquery.fancybox.css", null, null, false);
//        wp_register_style('maincss', dirname( get_bloginfo('stylesheet_url') ) . "/main.css", null, null, false);
}

function enqueue_more_css() {
	// Add CSS
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('font-electro');
        wp_enqueue_style('font-Oswald');
        wp_enqueue_style('font-archivo');
        wp_enqueue_style('fancyboxcss');
//        wp_enqueue_style('maincss');
}

if(!is_admin()) {
	add_action('init', 'register_more_js'); 
	add_action('init', 'enqueue_more_js'); 
	
	add_action('init', 'register_more_css'); 
	add_action('init', 'enqueue_more_css'); 
}


//* Enqueue scripts
add_action( 'wp_enqueue_scripts', 'minimum_enqueue_scripts' );
function minimum_enqueue_scripts() {

	wp_enqueue_script( 'minimum-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'minimum-google-fonts', '//fonts.googleapis.com/css?family=Roboto:300,400|Roboto+Slab:300,400', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'font-archivo', '//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic&subset=latin,latin-ext', array(), CHILD_THEME_VERSION );

}

//* Add new image sizes
add_image_size( 'portfolio', 540, 340, TRUE );

//* Add support for custom background
add_theme_support( 'custom-background', array( 'wp-head-callback' => 'minimum_background_callback' ) ); 

//* Add custom background callback for background color
function minimum_background_callback() {

	if ( ! get_background_color() )
		return;

	printf( '<style>body { background-color: #%s; }</style>' . "\n", get_background_color() );

}

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 320,
	'height'          => 60,
	'header-selector' => '.site-title a',
	'header-text'     => false
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'site-tagline',
	'nav',
	'subnav',
	'home-featured',
	'site-inner',
	'footer-widgets',
	'footer'
) );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar 
unregister_sidebar( 'sidebar-alt' );

//* Create portfolio custom post type
add_action( 'init', 'minimum_portfolio_post_type' );
function minimum_portfolio_post_type() {

	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name'          => __( 'Portfolio', 'minimum' ),
				'singular_name' => __( 'Portfolio', 'minimum' ),
			),
			'exclude_from_search' => true,
			'has_archive'         => true,
			'hierarchical'        => true,
			'menu_icon'           => 'dashicons-admin-page',
			'public'              => true,
			'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ),
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes', 'genesis-seo' ),
		)
	);
	
}

//* Remove site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_after_header', 'genesis_do_nav', 15 );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 7 );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'minimum_secondary_menu_args' );
function minimum_secondary_menu_args( $args ){

	if( 'secondary' != $args['theme_location'] )
	return $args;

	$args['depth'] = 1;
	return $args;

}

//* Add the site tagline section
add_action( 'genesis_after_header', 'minimum_site_tagline' );
function minimum_site_tagline() {

	printf( '<div %s>', genesis_attr( 'site-tagline' ) );
	genesis_structural_wrap( 'site-tagline' );

		printf( '<div %s>', genesis_attr( 'site-tagline-left' ) );
		printf( '<p %s>%s</p>', genesis_attr( 'site-description' ), esc_html( get_bloginfo( 'description' ) ) );
		echo '</div>';
	
		printf( '<div %s>', genesis_attr( 'site-tagline-right' ) );
		genesis_widget_area( 'site-tagline-right' );
		echo '</div>';

	genesis_structural_wrap( 'site-tagline', 'close' );
	echo '</div>';

}

//* Hook after post widget after the entry content
add_action( 'genesis_after_entry', 'minimum_after_entry', 5 );
function minimum_after_entry() {

	if ( is_singular( 'post' ) )
		genesis_widget_area( 'after-entry', array(
			'before' => '<div class="after-entry widget-area">',
			'after'  => '</div>',
		) );

}

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'minimum_author_box_gravatar' );
function minimum_author_box_gravatar( $size ) {

	return 144;

}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'minimum_comments_gravatar' );
function minimum_comments_gravatar( $args ) {

	$args['avatar_size'] = 96;
	return $args;

}

//* Change the number of portfolio items to be displayed (props Bill Erickson)
add_action( 'pre_get_posts', 'minimum_portfolio_items' );
function minimum_portfolio_items( $query ) {

	if ( $query->is_main_query() && !is_admin() && is_post_type_archive( 'portfolio' ) ) {
		$query->set( 'posts_per_page', '6' );
	}

}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'minimum_remove_comment_form_allowed_tags' );
function minimum_remove_comment_form_allowed_tags( $defaults ) {
	
	$defaults['comment_notes_after'] = '';
	return $defaults;

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'site-tagline-right',
	'name'        => __( 'Site Tagline Right', 'minimum' ),
	'description' => __( 'This is the site tagline right section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-1',
	'name'        => __( 'Home Featured 1', 'minimum' ),
	'description' => __( 'This is the home featured 1 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-2',
	'name'        => __( 'Home Featured 2', 'minimum' ),
	'description' => __( 'This is the home featured 2 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-3',
	'name'        => __( 'Home Featured 3', 'minimum' ),
	'description' => __( 'This is the home featured 3 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-4',
	'name'        => __( 'Home Featured 4', 'minimum' ),
	'description' => __( 'This is the home featured 4 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-entry',
	'name'        => __( 'After Entry', 'minimum' ),
	'description' => __( 'This is the after entry widget area.', 'minimum' ),
) );

// Custom Addon by Aleksandar Jovanov
// Creating the widget 
class testimonials_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'testimonials_widget', 

// Widget name will appear in UI
__('Testimonials', 'testimonials_widget_ui'), 

// Widget description
array( 'description' => __( 'Testimonials widget for Private Label Custom page', 'testimonials_widget_ui' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$textarea = $instance['textarea'];
// before and after widget arguments are defined by themes
echo $args['before_widget'];
echo $args['before_title'];
echo $args['after_title'];
//echo __( 'What lawyers are saying about us', 'testimonials_widget_ui' );
?>
<div class="testimonials">
    <div class='heading'>
        <h1><?php echo $title; ?></h1>
    </div>
    <div class="testimonials-wrap">
        <?php echo $textarea; ?>
    </div>
</div>
<?php
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Title', 'testimonials_widget_ui' );
}
if ( isset( $instance[ 'textarea' ] ) ) {
$textarea = $instance['textarea'];
}
else {
$textarea = __( 'Testimonials', 'testimonials_widget_ui' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'textarea' ); ?>"><?php _e( 'Testimonials:' ); ?></label> 
<textarea class="widefat" rows="16" id="<?php echo $this->get_field_id( 'textarea' ); ?>" name="<?php echo $this->get_field_name( 'textarea' ); ?>"><?php echo esc_attr( $textarea ); ?></textarea>
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['textarea'] = ( ! empty( $new_instance['textarea'] ) ) ? $new_instance['textarea'] : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function testimonials_load_widget() {
	register_widget( 'testimonials_widget' );
}
add_action( 'widgets_init', 'testimonials_load_widget' );

add_action( 'init', 'excerpts_to_pages' );
function excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}