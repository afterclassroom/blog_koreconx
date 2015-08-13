<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_excerpt_function')) {

	function suevafree_excerpt_function() {
		
		global $post,$more;
		
		$more = 0;
	
		if ($pos=strpos($post->post_content, '<!--more-->')): 
			$content = the_content();
		else:
			$content = the_excerpt();
		endif;
		
		echo '<p>' . $content . ' <a class="button" href="'.get_permalink($post->ID).'" title="More">  ' . __( "Read More","suevafree") . '</a> </p>';
	
	}
	
	add_action( 'suevafree_excerpt','suevafree_excerpt_function', 10, 2 );

}

?>