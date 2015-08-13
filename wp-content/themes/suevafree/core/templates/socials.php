<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function suevafree_socials_function() {
	
	$socials = array ("facebook","twitter","flickr","google","linkedin","myspace","pinterest","tumblr","youtube","vimeo");
	
	foreach ( $socials as $social ) {
		
		if (suevafree_setting('suevafree_footer_'.$social.'_button')): 
		
			echo '<a href="'.esc_url(suevafree_setting('suevafree_footer_'.$social.'_button')).'" target="_blank" title="'.$social.'" class="social '.$social.'"> '.$social.'  </a> ';
				
		endif;

	}

	if (suevafree_setting('suevafree_footer_skype_button')): 
    	echo '<a href="skype:'.suevafree_setting('suevafree_footer_skype_button').'" title="Skype" class="social skype"> Skype  </a>'; 
	endif; 

	if (suevafree_setting('suevafree_footer_email_button')): 
    	echo '<a href="mailto:'.suevafree_setting('suevafree_footer_email_button').'" title="Email" class="social email"> Email  </a>'; 
	endif; 

	if (suevafree_setting('suevafree_footer_rss_button') == "on"): 
    	echo '<a href="'; bloginfo('rss2_url'); echo '" title="Rss" class="social rss"> Rss  </a> ';
	endif; 
}

add_action( 'suevafree_socials','suevafree_socials_function', 10, 2 );

?>