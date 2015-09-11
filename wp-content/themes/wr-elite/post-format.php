<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

global $post;
$post_format = get_post_format();

if ( post_password_required() ) { ?>

	<div class="entry-thumb">
		<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" method="post">
			<input name="post_password" type="password" size="20" maxlength="20" />
		</form>
	</div><!-- .entry-thumb -->

<?php } else {

	if ( has_post_thumbnail() ) :
?>
	
	<div class="entry-thumb">
		<?php
			$post_format = get_post_format();
			switch ( $post_format ) :
				case 'gallery' :
					echo '<i class="icon-gallery"></i>';
					break;

				case 'video' :
					echo '<i class="icon-video"></i>';
					break;

				case 'audio' :
					echo '<i class="icon-music"></i>';
					break;

				default:
					echo '<i class="icon-edit"></i>';
					break;

			endswitch;
		?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>	
	</div><!-- .entry-thumb -->

<?php endif;
	
	}