<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

$home      = __( 'Home', 'elite' ); // text for the 'Home' link
$blog      = __( 'Blog', 'elite' ); // text for the 'Home' link
$before    = '<li class="current" typeof="v:Breadcrumb">'; // tag before the current crumb
$after     = '</li>'; // tag after the current crumb

global $post;

if ( is_front_page() ) {

	echo '<ul class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><li typeof="v:Breadcrumb"><a href="' . esc_url( home_url() ) . '">' . $home . '</a></li></ul>';

} elseif ( is_home() ) {

	echo '<ul class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><li typeof="v:Breadcrumb"><a href="' . esc_url( home_url() ) . '">' . $blog . '</a></li></ul>';

} else {

	echo '<ul class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><li typeof="v:Breadcrumb"><a href="' . esc_url( home_url() ) . '">' . $home . '</a></li>';

	if ( is_category() ) {
		$thisCat = get_category( get_query_var( 'cat' ), false );
		if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' ' );
		echo $before . __( 'Archive by category', 'elite' ) . ' "' . single_cat_title( '', false ) . '"' . $after;

	} elseif ( is_search() ) {
		echo $before . __( 'Search results for', 'elite' ) . ' "' . get_search_query() . '"' . $after;

	} elseif ( is_day() ) {
		echo '<li typeof="v:Breadcrumb"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
		echo '<li typeof="v:Breadcrumb"><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'F' ) . '</a></li>';
		echo $before . get_the_time( 'd' ) . $after;

	} elseif ( is_month() ) {
		echo '<li typeof="v:Breadcrumb"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
		echo $before . get_the_time( 'F' ) . $after;

	} elseif ( is_year() ) {
		echo $before . get_the_time( 'Y' ) . $after;

	} elseif ( is_single() && ! is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
			echo '<li typeof="v:Breadcrumb"><a href="' . esc_url( home_url() ) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
			echo ' ' . $before . get_the_title() . $after;
		} else {
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents( $cat, TRUE, ' ' );
			$cats = '<li typeof="v:Breadcrumb">' . preg_replace( "#^(.+)\s\s$#", "$1", $cats ) . '</li>';
			echo $cats;
			echo $before . get_the_title() . $after;
		}

	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
		$post_type = get_post_type_object( get_post_type() );
		echo $before . $post_type->labels->singular_name . $after;

	} elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID ); $cat = $cat[0];
		echo get_category_parents( $cat, TRUE, ' ' );
		echo '<li typeof="v:Breadcrumb"><a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a></li>';
		echo ' ' . $before . get_the_title() . $after;

	} elseif ( is_page() && ! $post->post_parent ) {
		echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$breadcrumbs[] = '<li typeof="v:Breadcrumb"><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a></li>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse( $breadcrumbs );
		for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
			echo $breadcrumbs[$i];
			if ( $i != count( $breadcrumbs )-1 ) echo ' ';
		}
		echo ' ' . $before . get_the_title() . $after;

	} elseif ( is_tag() ) {
		echo $before . __( 'Posts tagged', 'elite' ) . ' "' . single_tag_title( '', false ) . '"' . $after;

	} elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata( $author );
		echo $before . __( 'Articles posted by', 'elite' ) . ' ' . $userdata->display_name . $after;

	} elseif ( is_404() ) {
		echo $before . __( 'Error 404', 'elite' ) . $after;
	}

	if ( get_query_var( 'paged' ) ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo __( 'Page', 'elite' ) . ' ' . get_query_var( 'paged' );
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	}

	echo '</ul>';

}
