<?php

function sneaklite_widgets_init() {

	unregister_sidebar( 'sidebar-area' );
	unregister_sidebar( 'home_sidebar_area' );
	unregister_sidebar( 'category-sidebar-area' );
	unregister_sidebar( 'bottom-sidebar-area' );

	register_sidebar(array(
	
		'name' => 'Sidebar',
		'id'   => 'sidebar-area',
		'description'   => 'This sidebar will be shown after the contents.',
		'before_widget' => '<div class="pin-article span4"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));
	
	register_sidebar(array(
	
		'name' => 'Home Sidebar',
		'id'   => 'home_sidebar_area',
		'description'   => __( "This sidebar will be shown for the homepage","wip"),
		'before_widget' => '<div class="pin-article span4"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(
	
		'name' => 'Category Sidebar',
		'id'   => 'category-sidebar-area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="pin-article span4"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(
	
		'name' => 'Bottom Sidebar',
		'id'   => 'bottom-sidebar-area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="span3"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

}

add_action( 'widgets_init', 'sneaklite_widgets_init' , 11);

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneaklite_scripts_styles')) {

	function sneaklite_scripts_styles() {

		wp_deregister_style ( 'suevafree-' . get_theme_mod('suevafree_skin') );

		if ( ( get_theme_mod('suevafree_skin') ) && ( get_theme_mod('suevafree_skin') <> "cyan" ) ):
		
			wp_enqueue_style( 'sneaklite- ' . get_theme_mod('suevafree_skin') , get_stylesheet_directory_uri() . '/inc/skins/' . get_theme_mod('suevafree_skin') . '.css' ); 
		
		endif;
	
		wp_deregister_style ( 'suevafree-google-fonts' );
		wp_enqueue_style( 'sneaklite-google-fonts', '//fonts.googleapis.com/css?family=Abel|Allura|Roboto+Slab|Fjalla+One&subset=latin,latin-ext' );

	}
	
	add_action( 'wp_enqueue_scripts', 'sneaklite_scripts_styles', 20 );

}

?>