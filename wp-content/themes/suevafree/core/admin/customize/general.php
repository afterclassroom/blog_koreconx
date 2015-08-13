<?php

if (!function_exists('suevafree_admin_init')) {

	function suevafree_admin_init() {
		
		global $wp_version;

		 wp_enqueue_style( "thickbox" );
		 add_thickbox();
	
		$file_dir = get_template_directory_uri()."/core/admin/inc/";
	
		wp_enqueue_style ( 'suevafree_style', $file_dir.'css/theme.css' ); 
		wp_enqueue_script( 'suevafree_script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 

		wp_enqueue_style ( 'suevafree_on_off', $file_dir.'css/on_off.css' ); 
		wp_enqueue_script( 'suevafree_on_off', $file_dir.'js/on_off.js',array('jquery'),'',TRUE ); 

		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
	
	}
	
	add_action('admin_init', 'suevafree_admin_init');

}

?>