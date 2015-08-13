<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); wr_elite_schema_metadata( array( 'context' => 'body' ) ); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header cl" <?php wr_elite_schema_metadata( array( 'context' => 'header' ) ); ?>>
		<div class="container">
		
			<div class="site-branding">
				<?php wr_elite_logo(); ?>
			</div><!-- .site-brading -->

			<nav id="site-navigation" class="main-navigation" <?php wr_elite_schema_metadata( array( 'context' => 'nav' ) ); ?>>
				<button class="menu-toggle"><i class="dashicons dashicons-menu"></i></button>
				<?php
					// Get post or page id
					if ( is_home() ) {
						$id = get_option( 'page_for_posts' );
					} else {
						$id = get_the_ID();
					}
					$get_menu = ( function_exists( 'get_field' ) ) ? get_field( 'acf_page_menu', $id ) : '';
					$location = '';

					if ( 'one_page_menu' == $get_menu ) {
						$location = 'one_page_menu';
					} else {
						$location = 'main_menu';
					}
					wp_nav_menu(
						array(
							'theme_location' => $location,
							'container'      => false,
							'menu_id'        => 'menu-main',
							'menu_class'	 => 'top-menu',
							'fallback_cb'    => 'wr_elite_fallback_menu',
						)
					);
				?>
			</nav><!-- #site-navigation -->

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<?php get_template_part( 'inc/structure/title' ); ?>

			<div class="container">
