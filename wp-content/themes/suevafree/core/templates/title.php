<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_get_title_function')) {

	function suevafree_get_title_function($type) {
		
		global $post;
		
		$title = get_the_title();
		
		if (!empty($title)) {
		
			if ( $type == "blog" ) { 
		
		?>
				
				<h3 class="title"> 
				
                	<a href="<?php echo get_permalink($post->ID); ?>"> <?php echo $title; ?> </a>
				
                </h3>
		
		<?php 
		
			} else if ( $type == "single" ) { ?>
	
				<h1 class="title"> 
				
                	<?php echo $title; ?>
				
                </h1>
	
		<?php 
			
			}
		}
	}

	add_action( 'suevafree_title', 'suevafree_get_title_function', 10, 2 );

}

?>