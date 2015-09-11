<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */
$bg_title      = wr_elite_theme_option( 'wr_page_title_image' );
$bg_repeat     = wr_elite_theme_option( 'wr_page_title_background_repeat' );
$bg_position   = wr_elite_theme_option( 'wr_page_title_background_position' );
$bg_attachment = wr_elite_theme_option( 'wr_page_title_background_attachment' );
$css = array();
if ( ! empty( $bg_title ) ) {
	$css[] = 'background-image: url(' . esc_url( $bg_title ) . ');';
	if ( ! empty( $bg_repeat ) ) {
		$css[] = 'background-repeat: ' . esc_attr( $bg_repeat ) . ';';
	}
	if ( ! empty( $bg_position ) ) {
		$css[] = 'background-position: ' . esc_attr( $bg_position ) . ';';
	}
	if ( ! empty( $bg_attachment ) ) {
		$css[] = 'background-attachment: ' . esc_attr( $bg_attachment ) . ';';
	}
}
?>
<div class="page-title" style="<?php echo implode( ';', $css ); ?>">
	<div class="container">
		<h1>
			<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					printf( __( 'Author: %s', 'elite' ), '<span class="vcard">' . get_the_author() . '</span>' );

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'elite' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'elite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'elite' ) ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'elite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'elite' ) ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					_e( 'Galleries', 'elite' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'elite' );

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'elite' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'elite' );

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					_e( 'Audios', 'elite' );

				elseif ( is_home() ) :
					_e( 'Blog', 'elite' );				

				else :
					the_title();

				endif;
			?>
		</h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
	</div><!-- .container -->
</div><!-- page-title -->