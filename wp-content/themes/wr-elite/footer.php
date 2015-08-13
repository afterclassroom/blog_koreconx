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
			</div><!-- .container -->

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" <?php wr_elite_schema_metadata( array( 'context' => 'footer' ) ); ?>>
			<div class="container">
				<div class="logo-footer">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( wr_elite_theme_option( 'wr_footer_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
				</div><!-- .logo-footer -->
				<div class="site-info">
					<?php echo ent2ncr( wr_elite_theme_option( 'wr_footer_info' ) ); ?>
				</div><!-- .site-info -->
			</div>
		</footer><!-- #colophon -->
	</div><!-- .container -->
	<a href="#" class="back-to-top"><i class="icon-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
