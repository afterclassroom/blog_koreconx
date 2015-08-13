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

<article id="post-<?php the_ID(); ?>" <?php post_class(); wr_elite_schema_metadata( array( 'context' => 'entry' ) ); ?>>
	<?php
	if ( has_post_format('quote') ) :
		echo '<div class="quote-content"><i class="icon-quote"></i>';
			the_content( '' );
		echo '</div>';
	else :
		
		get_template_part( 'post', 'format' ); ?>

		<div class="entry-content" <?php wr_elite_schema_metadata( array( 'context' => 'entry_content' ) ); ?>>
			
			<?php
				$time_string = '<time class="entry-date published" datetime="%1$s"><span class="m">%2$s</span><span class="d">%3$s</span><span class="y">%4$s</span></time>';

				$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date( 'M' ) ),
					esc_html( get_the_date( 'j' ) ),
					esc_html( get_the_date( 'Y' ) )
				);
				$posted_on = sprintf(
					_x( '%s', 'post date', 'emax' ),
					'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
				);
				echo '<div class="posted-on">' . $posted_on . '</div>';
			?>

			<div class="posted-entry">

				<h2 class="entry-title" <?php wr_elite_schema_metadata( array( 'context' => 'entry_title' ) ); ?>>
					<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
				</h2><!-- entry-title -->

				<div class="entry-meta">
					<?php wr_elite_post_meta(); ?>
				</div><!-- .entry-meta -->

				<?php
					// Render post content
					the_content( sprintf(
						__( 'Read More %s', 'elite' ), 
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					// Post navigation
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'elite' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .posted-entry -->
		</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
