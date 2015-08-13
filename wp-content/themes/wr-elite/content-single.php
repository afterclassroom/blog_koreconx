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
	<?php get_template_part( 'post', 'format' ); ?>
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

	<footer class="entry-footer">

		<?php
			// Used between list items, there is a space after the comma
			$tags_list = get_the_tag_list( '', __( ', ', 'elite' ) );

			if ( $tags_list ) :
		?>
			<span class="tags-links">
				<?php printf( __( '<i class="icon-tags"></i>%1$s', 'elite' ), $tags_list ); ?>
			</span>
		<?php endif; // End if $tags_list ?>

		<nav class="single-nav cl" role="navigation">
			<?php
				previous_post_link( '<div class="prev">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'elite' ) );
				next_post_link(     '<div class="next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'elite' ) );
			?>
		</nav><!-- .single-nav -->

		<?php
			$author_info = apply_filters( 'wr_elite_author_info', '<div class="author-info">%1$s<div class="author-bio"><h4>' . __( 'Written by ', 'elite' ) . '&nbsp;%2$s</h4><p>%3$s</p></div></div>' );
			printf( $author_info, get_avatar( get_the_author_meta( 'user_email' ), '120', '' ), get_the_author_link(), get_the_author_meta( 'description' ) );
		?>

	</footer><!-- .entry-footer -->
</article><!-- #post -->