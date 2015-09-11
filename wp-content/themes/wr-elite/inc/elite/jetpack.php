<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Jetpack Compatibility File
 * Websites: http://www.woorockets.com
 */

/**
 * Add theme support for jetpack.
 * 
 * @since 1.0
 */
function wr_elite_jetpack_setup() {
	add_theme_support( 'social-links', array(
		'facebook', 'twitter', 'linkedin', 'google_plus', 'tumblr',
	) );
	add_theme_support( 'site-icon' );
}
add_action( 'after_setup_theme', 'wr_elite_jetpack_setup' );