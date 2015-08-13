<?php

/**
 * Wp in Progress
 * 
 * @theme Suevafree
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function suevafree_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'suevafree' ), max( $paged, $page ) );
	
		return $title;
		
	}

	add_filter( 'wp_title', 'suevafree_title', 10, 2 );

	function suevafree_addtitle() {
		
?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'suevafree_addtitle' );

}

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_get_archive_title')) {

	function suevafree_get_archive_title() {
		
		if ( get_the_archive_title()  && ( get_the_archive_title() <> 'Archives' ) ) :
		
			return get_the_archive_title();
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_setting')) {

	function suevafree_setting($id) {

		$suevafree_setting = get_theme_mod($id);
			
		if ( isset($suevafree_setting) ) :
			
			return $suevafree_setting;
	
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

function suevafree_postmeta($id) {

	global $post;
	
	$val = get_post_meta( $post->ID , $id, TRUE);
	if(isset($val))
		return $val;

}

/*-----------------------------------------------------------------------------------*/
/* REQUIRE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_require')) {

	function suevafree_require($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !suevafree_setting('suevafree_loadsystem') ) || ( suevafree_setting('suevafree_loadsystem') == "mode_a" ) ) {
		
				$folder = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($folder);  
				  
				foreach ($files as $key => $name) {  
				
					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
					
						require_once $folder . $name;
					
					} 
				}  
			
			} else if ( suevafree_setting('suevafree_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
					
						require_once get_template_directory()."/".$folder.$filename;
					
					}
				}
			}
		
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_enqueue_script')) {

	function suevafree_enqueue_script($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !suevafree_setting('suevafree_loadsystem') ) || ( suevafree_setting('suevafree_loadsystem') == "mode_a" ) ) {
		
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  

					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
						
						wp_enqueue_script( str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
						
					} 
				}  
			
			} else if ( suevafree_setting('suevafree_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
					
					}
					
				}
		
			}
			
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_enqueue_style')) {

	function suevafree_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !suevafree_setting('suevafree_loadsystem') ) || ( suevafree_setting('suevafree_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  
					
					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
						
						wp_enqueue_style( str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
						
					} 
				}  
			
			
			} else if ( suevafree_setting('suevafree_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
				
					}
				
				}
			
			}
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

function suevafree_post_class($classes) {
	
	if ( is_single() ) :

		$classes[] = 'pin-article ' . suevafree_template('span') . ' ' . suevafree_template('sidebar') ;

	else :

		$classes[] = 'pin-article ' . suevafree_template('span') ;

	endif;

		
	return $classes;
	
}

add_filter('post_class', 'suevafree_post_class');


/*-----------------------------------------------------------------------------------*/
/* Body class */
/*-----------------------------------------------------------------------------------*/   

function suevafree_body_class($classes) {

	$classes[] = 'custombody';
		
	return $classes;
	
}

add_filter('body_class', 'suevafree_body_class');


/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

function suevafree_template($id) {

	$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );

	$span = $template["right-sidebar"];
	$sidebar =  "right-sidebar";

	if ( ( suevafree_setting('suevafree_home') )  && (  (is_home()) )  ){
		
		$span = $template[suevafree_setting('suevafree_home')];
		$sidebar =  suevafree_setting('suevafree_home');

	} else if ( ( suevafree_setting('suevafree_category_layout') )  && ( ( suevafree_get_archive_title() ) ) ) {
		
		$span = $template[suevafree_setting('suevafree_category_layout')];
		$sidebar =  suevafree_setting('suevafree_category_layout');

	} else if ( ( suevafree_postmeta('suevafree_template') )  && ( (is_page()) || (is_single()) ) ){

		$span = $template[suevafree_postmeta('suevafree_template')];
		$sidebar =  suevafree_postmeta('suevafree_template');
			
	}
	
	return ${$id};
	
}

/*-----------------------------------------------------------------------------------*/
/* Excerpt */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_hide_excerpt_more')) {
	
	function suevafree_hide_excerpt_more() {
	
		return '';
	
	}
	
	add_filter('the_content_more_link', 'suevafree_hide_excerpt_more');
	add_filter('excerpt_more', 'suevafree_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_scripts_styles')) {

	function suevafree_scripts_styles() {
	
		suevafree_enqueue_style('/inc/css');

		if ( ( get_theme_mod('suevafree_skin') ) && ( get_theme_mod('suevafree_skin') <> "orange" ) ):
	
			wp_enqueue_style( 'suevafree-' . get_theme_mod('suevafree_skin') , get_template_directory_uri() . '/inc/skins/' . get_theme_mod('suevafree_skin') . '.css' ); 
		
		endif;

		wp_enqueue_style( 'suevafree-google-fonts', '//fonts.googleapis.com/css?family=Abel|Allura&subset=latin,latin-ext' );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));

		suevafree_enqueue_script('/inc/js');
		
	}
	
	add_action( 'wp_enqueue_scripts', 'suevafree_scripts_styles', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_prettyPhoto')) {

	function suevafree_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		else
			return $html;
	}
	
	add_filter( 'wp_get_attachment_link', 'suevafree_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_remove_category_list_rel')) {

	function suevafree_remove_category_list_rel($output) {
		
		$output = str_replace('rel="category"', '', $output);
		return $output;
		
	}
	
	add_filter('wp_list_categories', 'suevafree_remove_category_list_rel');
	add_filter('the_category', 'suevafree_remove_category_list_rel');
	
}

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_thumb_size')) {

	function suevafree_thumb_size( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'suevafree_thumb_size', 10, 3 );

}

/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_gallery_style')) {

	function suevafree_gallery_style() {
		
		return "<div class='gallery'>";
	
	}
	
	add_filter( 'gallery_style', 'suevafree_gallery_style', 99 );
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_setup')) {

	function suevafree_setup() {

		if ( ! isset( $content_width ) )
			$content_width = 940;

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
	
		add_theme_support( 'title-tag' );
	
		add_image_size( 'blog', 940,429, TRUE ); 
		add_image_size( 'large', 449,304, TRUE ); 
		add_image_size( 'medium', 290,220, TRUE ); 
		add_image_size( 'small', 211,150, TRUE ); 
	
		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		) );

		register_nav_menu( 'main-menu', 'Main menu' );
	
		load_theme_textdomain("suevafree", get_template_directory() . '/languages');
		
		$require_array = array (
			"/core/classes/",
			"/core/admin/customize/",
			"/core/functions/",
			"/core/templates/",
			"/core/metaboxes/",
		);
		
		foreach ( $require_array as $require_file ) {	
		
			suevafree_require($require_file);
		
		}
		
	}

	add_action( 'after_setup_theme', 'suevafree_setup' );

}

?>