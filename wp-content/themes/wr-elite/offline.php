<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

get_header();
?>
	<div class="page-offline">
		<header>
			<h3><?php echo _e( wr_elite_theme_option( 'wr_maintenance_mode_message' ), 'elite' ); ?></h3>
			<ul class="countdown"></ul>
		</header>
		<footer>
			<?php echo wr_elite_social_channel(); ?>
		</footer>
	</div>
	<?php echo '<scr' . 'ipt>' ?>
	( function( $ ) {
		"use strict";
		$(document).ready(function() {
			var endDate = "<?php echo esc_js( wr_elite_theme_option( 'wr_maintenance_mode_timer' ) ); ?>";
			$( ".countdown" ).countdown({
				date: endDate,
				render: function(data) {
					$(this.el).html("<li>" + this.leadingZeros(data.years, 2) + " <span><?php echo _e( 'years', 'elite' ); ?></span></li><li>" + this.leadingZeros(data.days, 3) + " <span><?php echo _e( 'days', 'elite' ); ?></span></li><li>" + this.leadingZeros(data.hours, 2) + " <span><?php echo _e( 'hours', 'elite' ); ?></span></li><li>" + this.leadingZeros(data.min, 2) + " <span><?php echo _e( 'min', 'elite' ); ?></span></li><li>" + this.leadingZeros(data.sec, 2) + " <span><?php echo _e( 'sec', 'elite' ); ?></span></li>");
				}
			});
		});
	})(jQuery);
	<?php echo '</scr' . 'ipt>' ?>
<?php get_footer(); ?>