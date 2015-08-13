<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_after_content_function')) {

	function suevafree_after_content_function() {
		
		if ((is_home()) || (suevafree_get_archive_title()) || (is_page()) || (is_search()) ) {
			
			if ( (!suevafree_setting('suevafree_view_readmore')) || (suevafree_setting('suevafree_view_readmore') == "on" ) ) {
			
				do_action('suevafree_excerpt'); 
			
			} else if (suevafree_setting('suevafree_view_readmore') == "off" ) {
			
				the_content(); 
			
			}
	
		} else {
	
			the_content();
			
			echo "<div class='clear'></div>";
			
			wp_link_pages();
			
			echo '<p class="categories"><strong>'. __( "Categories: ","suevafree").'</strong>'; the_category(', '); echo '</p>';
			
			the_tags( '<footer class="line"><div class="entry-info"><span class="tags">Tags: ', ', ', '</span></div></footer>' );

			comments_template();
			
		}
	
	}
	
	add_action( 'suevafree_after_content','suevafree_after_content_function', 10, 2 );

}

?>