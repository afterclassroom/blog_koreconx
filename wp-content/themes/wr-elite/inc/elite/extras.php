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
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	function wr_elite_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'elite' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'wr_elite_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function wr_elite_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'wr_elite_render_title' );
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function wr_elite_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'wr_elite_setup_author' );

/**
 * Output the new logo to header
 *
 * @package Elite
 */
function wr_elite_logo() {
	if ( 'logo_image' == wr_elite_theme_option( 'wr_logo_type' ) ) : ?>

		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( wr_elite_theme_option( 'wr_logo_image' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>

	<?php else : ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	<?php endif;
}

/**
 * Jetpack social channels renderer.
 *
 * @package Elite
 */
function wr_elite_social_channel() {

	$channels = array( 'facebook', 'twitter', 'linkedin', 'google_plus', 'tumblr' );

	$list = array();
	foreach ( $channels as $value ) {
		$mod_val = wr_elite_theme_option( 'jetpack-' . $value );

		if ( $mod_val ) {
			$list[] = sprintf( '<li><a href="%s" title="%s" target="_blank"><i class="icon-%s"></i></a></li>', esc_url ( $mod_val ), ucfirst( $value ), $value );
		}
	}
	$html = '';
	if ( $list ) :
		$html .= '<ul class="social">';
		$html .= implode( '', $list );
		$html .= '</ul>';
	endif;
	
	return $html;

}
add_action( 'wp_head', 'wr_elite_social_channel' );

/**
 * Print custom code at the end of head section.
 *
 * @package Elite
 */
function wr_elite_custom_head() {
	if ( wr_elite_theme_option( 'wr_code_at_end_of_head' ) ) :
		echo '' . wr_elite_theme_option( 'wr_code_at_end_of_head' ) . "\n";
	endif;
}
add_action( 'wp_head', 'wr_elite_custom_head', 999 );

/**
 * Print custom code at the end of body section.
 *
 * @package Elite
 */
function wr_elite_custom_footer() {
	if ( wr_elite_theme_option( 'wr_code_at_end_of_body' ) ) :
		echo '' . wr_elite_theme_option( 'wr_code_at_end_of_body' ) . "\n";
	endif;
}
add_action( 'wp_footer', 'wr_elite_custom_footer' );

/**
 * Print custom style of header image.
 *
 * @package Elite
 */
function wr_elite_custom_header_image() {
	if ( get_header_image() ) : ?>
		
		<style>
			.site-header {
				background: url('<?php header_image(); ?>') no-repeat 0 0;
			}
		</style>

	<?php
	endif;
}
add_action( 'wp_head', 'wr_elite_custom_header_image' );

/**
 * Redirect to offline page
 *
 * @package Elite
 */
function wr_elite_maintenance_mode() {
	// Check if maintenance mode is enabled
	if ( wr_elite_theme_option( 'wr_maintenance_mode' ) ) {
		if ( ! is_feed() ) {
			// Check if user is not logged in
			if ( ! is_user_logged_in() ) {
				// Load message for maintenance
				get_template_part( 'offline' );
				exit;
			}
		}

		// Check if user is logged in
		if ( is_user_logged_in() ) {
			global $current_user;

			// Get user role
			get_currentuserinfo();

			$loggedInUserID = $current_user->ID;
			$userData = get_userdata( $loggedInUserID );

			// If user role is not 'administrator' then redirect to coming soon page
			if ( 'administrator' != $userData->roles[0] ) {
				if ( ! is_feed() ) {
					get_template_part( 'offline' );

					exit;
				}
			}
		}
	}
}
add_action( 'template_redirect', 'wr_elite_maintenance_mode' );

/**
 * Adds offline classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wr_elite_maintenance_mode_body_class( $classes ) {
	if ( wr_elite_theme_option( 'wr_maintenance_mode' ) ) {
		if ( ! is_feed() ) {
			// Check if user is not logged in
			if ( ! is_user_logged_in() ) {
				$classes[] = 'offline';
			}
		}
	}
	return $classes;
}
add_filter( 'body_class', 'wr_elite_maintenance_mode_body_class' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	function wr_elite_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'elite' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'wr_elite_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function wr_elite_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'wr_elite_render_title' );
endif;

/**
 * Menu fallback, link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function wr_elite_fallback_menu( $args ) {
	if ( current_user_can( 'edit_theme_options' ) ) {

		// See wp-includes/nav-menu-template.php for available arguments
		extract( $args );

		$link = $link_before . '<a href="' . admin_url( 'nav-menus.php' ) . '">' . $before . __( 'Add a menu', 'elite' ) . $after . '</a>' . $link_after;

		// We have a list
		if ( FALSE !== stripos( $items_wrap, '<ul' ) or FALSE !== stripos( $items_wrap, '<ol' ) ) {
			$link = "<li class='menu-item-type-post_type'>$link</li>";
		}

		$output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
		if ( ! empty ( $container ) ) {
			$output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
		}

		if ( $echo ) {
			echo $output;
		}

		return $output;
	}
}
/**
 * Register required plugins.
 *
 * @return  void
 */
function wr_elite_register_theme_dependency() {
	$plugins = array(
		array(
			'name'     => 'WR PageBuilder',
			'slug'     => 'wr-pagebuilder',
			'required' => true,
		),
		array(
			'name'     => 'Advanced Custom Fields',
			'slug'     => 'advanced-custom-fields',
			'required' => true,
		),
		array(
			'name'     => 'WR ContactForm',
			'slug'     => 'wr-contactform',
			'required' => false,
		)
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'wr_elite_register_theme_dependency' );

/**
 * Nav Walker
 **/
class wr_elite_Walker extends Walker_Nav_menu {
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? home_url('/') . esc_attr($item->url)        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= !empty( $atts['description'] ) ? '<span class="description">' . esc_attr( $atts['description'] ) . '</span>' : '';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
