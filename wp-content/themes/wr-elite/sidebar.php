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
 * Load the correct sidebar according to the page layout
 *
 * @since 1.1
 */

// Get post or page id
if ( is_home() ) {
	$id = get_option( 'page_for_posts' );
} else {
	$id = get_the_ID();
}

$global_layout = wr_elite_theme_option( 'wr_page_layout' );
$page_layout   = ( function_exists( 'get_field' ) ) ? get_field( 'acf_page_layout', $id ) : '';

switch ( $page_layout ) {
	case 'main':
		$sidebars[] = '';
		break;

	case 'left-main':
		$sidebars[] = wr_elite_get_sidebar_secondary();
		break;

	case 'main-right':
		$sidebars[] = wr_elite_get_sidebar_primary();
		break;

	case 'left-main-right':
	case 'left-right-main':
	case 'main-left-right':
		$sidebars[] = wr_elite_get_sidebar_secondary();
		$sidebars[] = wr_elite_get_sidebar_primary();
		break;

	default:
		switch ( $global_layout ) {
			case 'main':
				$sidebars[] = '';
				break;

			case 'left-main':
				$sidebars[] = wr_elite_get_sidebar_secondary();
				break;

			case 'main-right':
				$sidebars[] = wr_elite_get_sidebar_primary();
				break;

			case 'left-main-right':
			case 'left-right-main':
			case 'main-left-right':
				$sidebars[] = wr_elite_get_sidebar_secondary();
				$sidebars[] = wr_elite_get_sidebar_primary();
				break;

			default:
				$sidebars[] = '';
		}
}

return $sidebars;