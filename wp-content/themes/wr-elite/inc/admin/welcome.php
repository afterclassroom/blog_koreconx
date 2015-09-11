<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

if ( ! function_exists( 'wr_elite_welcome' ) ) {
	function wr_elite_welcome() { ?>
		
		<div class="wrap about-wrap elite-welcome">
			<div class="feature-section col two-col line">
				<div id="col-left">
					<a class="thickbox" href="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/img/welcome/elite.png'; ?>" width="328" height="285" alt="Elite" /></a>
				</div>
				<div id="col-right">
					<h2><?php _e( 'About Elite', 'elite' ); ?></h2>
					<p><?php _e( 'Elite is designed and coded with heart by <b>WooRockets Team</b>. It is made to be best suited for personal blog, business or ecommerce vwebsite, but it can be powerfully customized with visual page builder to be suitable for any other kinds of websites.', 'elite' ); ?></p>
					
					<div class="update-nag notice-success">
						<div>
							<p><?php echo sprintf( esc_html__( 'Current version: 1.4', 'elite' ), '<a target="_blank" href="https://themes.svn.wordpress.org/elite/1.1/changelog.txt">', '</a>' ); ?></p>
							<p><?php _e( 'Follow us to get noticed when next version of Elite is released', 'elite' ); ?></p>
						</div>
						<span>
							<?php printf( __( '%s', 'elite' ), '<a class="twitter-follow-button" data-show-count="false" data-size="large" href="https://twitter.com/WooRockets"><i>' . __( 'Follow @WooRockets', 'elite' ) . '</i></a>' ); ?>
						</span>
					</div>
				</div>
			</div>

			<div class="feature-section">
				<form class="elite-features big-icon">
					<fieldset>
						<legend><h2><?php _e( 'Support', 'elite' ); ?></h2></legend>
						<div class="three-col">
							<div class="col-1">
								<a target="_blank" href="http://www.woorockets.com/forum/product-support/elite/?utm_source=Elite%20Setting&utm_medium=link&utm_campaign=Cross%20Promo%20Themes"><span class="dashicons dashicons-groups"></span></a>
								<h4><a target="_blank" href="http://www.woorockets.com/forum/product-support/elite/?utm_source=Elite%20Setting&utm_medium=link&utm_campaign=Cross%20Promo%20Themes"><?php _e( 'Support Forum', 'elite' ); ?></a></h4>
								<p><?php _e( 'Go to our forum to ask product-related question you may concern.', 'elite' ); ?></p>
							</div>
							<div class="col-2">
								<a target="_blank" href="http://www.woorockets.com/docs/elite/?utm_source=Elite%20Setting&utm_medium=link&utm_campaign=Cross%20Promo%20Themes"><span class="dashicons dashicons-admin-page"></span></a>
								<h4><a target="_blank" href="http://www.woorockets.com/docs/elite/?utm_source=Elite%20Setting&utm_medium=link&utm_campaign=Cross%20Promo%20Themes"><?php _e( 'Documentation', 'elite' ); ?></a></h4>
								<p><?php _e( 'Detailed instruction of how to use Elite and make the best out of it.', 'elite' ); ?></p>
							</div>
							<div class="col-3 last-feature">
								<a target="_blank" href="http://www.woorockets.com/contact/?utm_source=Elite%20Setting&utm_medium=link&utm_campaign=Cross%20Promo%20Themes"><span class="dashicons dashicons-email-alt"></span></a>
								<h4><a target="_blank" href="http://www.woorockets.com/contact/?utm_source=Elite%20Setting&utm_medium=link&utm_campaign=Cross%20Promo%20Themes"><?php _e( 'Contact us', 'elite' ); ?></a></h4>
								<p><?php _e( 'Mail us if you have other non-support related issues.', 'elite' ); ?></p>
							</div>
						</div>
					</fieldset>
				</form>
				<form class="elite-features">
					<fieldset>
						<legend><h2><?php _e( 'Get involved', 'elite' ); ?></h2></legend>
						<div class="three-col">
							<div class="col-1">
								<h4><span class="dashicons dashicons-star-filled"></span><?php _e( 'Rate Elite', 'elite' ); ?></h4>
								<p><?php _e( 'Write a review to share your thoughts of Elite with other WordPress folks. Next versions of Elite will be improved based on your opinions.', 'elite' ); ?></p>
								<?php echo sprintf( esc_html__( '%sReview%s', 'elite' ), '<a class="mgt button button-primary" target="_blank" href="http://goo.gl/A7Yfhn">', '</a>' ); ?>
							</div>
							<div class="col-2">
								<h4><span class="dashicons dashicons-share"></span><?php _e( 'Share Elite', 'elite' ); ?></h4>
								<p><?php _e( 'If you like Elite why not share it with your friends & followers? It will be a big encouragement for us to make more awesome free products.', 'elite' ); ?></p>
								<?php echo sprintf( esc_html__( '%sTweet%s', 'elite' ), '<a class="mgt button button-primary" id="btnTwitter" href="https://twitter.com/intent/tweet?url=woorockets.com&amp;count=none&amp;source=tweetbutton&amp;text=I\'m using WordPress theme Elite from @WooRockets %23WRElite. Check it out! http://goo.gl/UWD6aZ">', '</a>' ); ?>
							</div>
							<div class="col-3 last-feature">
								<h4><span class="dashicons dashicons-desktop"></span><?php _e( 'Submit your Website', 'elite' ); ?></h4>
								<p><?php _e( 'Your website is using Elite? Share with us. We will include it in our customer showcase and have it exposed to thousands of WooRockets website\'s visitors.', 'elite' ); ?></p>
								<?php echo sprintf( esc_html__( '%sSubmit your website%s', 'elite' ), '<a class="button button-primary" target="_blank" href="http://www.woorockets.com/contact/?utm_source=Elite%20Setting&utm_medium=button&utm_campaign=Cross%20Promo%20Themes">', '</a>' ); ?>
							</div>
						</div>
					</fieldset>
				</form>
			</div>

			<div class="feature-section col two-col line">
				<div id="col-left">
					<a target="_blank" href="http://www.woorockets.com/blog/?utm_source=Elite%20Setting&utm_medium=banner&utm_campaign=Cross%20Promo%20Themes"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/img/welcome/from-blog.png'; ?>" width="382" height="248" alt="From woorockets blog" /></a>
				</div>
				<div id="col-right" class="products">
					<h2 class="head"><?php _e( 'View our other awesomeness', 'elite' ); ?></h2>
					<div class="three-col">
						<div>
							<a target="_blank" href="http://www.woorockets.com/freebie/?utm_source=Elite%20Setting&utm_medium=banner&utm_campaign=Cross%20Promo%20Themes"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/img/welcome/logo-freebie.png'; ?>" width="57" height="49" alt="WooRockets Page Builder" /></a>
							<p><?php _e( 'Freebies download', 'elite' ); ?></p>
						</div>
						<div>
							<a target="_blank" href="http://www.woorockets.com/plugins/wr-megamenu/?utm_source=Elite%20Setting&utm_medium=banner&utm_campaign=Cross%20Promo%20Themes"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/img/welcome/logo-mm.png'; ?>" width="51" height="53" alt="WooRockets Mega Menu" /></a>
							<p><?php _e( 'WR MegaMenu', 'elite' ); ?></p>
						</div>
						<div class="last-feature">
							<a target="_blank" href="http://www.woorockets.com/plugins/wr-contactform/?utm_source=Elite%20Setting&utm_medium=banner&utm_campaign=Cross%20Promo%20Themes"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/img/welcome/logo-cf.png'; ?>" width="79" height="32" alt="WooRockets Contact Form" /></a>
							<p><?php _e( 'WR ContactForm', 'elite' ); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="feature-section footer">
				<a target="_blank" href="http://www.woorockets.com/?utm_source=Elite%20Setting&utm_medium=logo&utm_campaign=Cross%20Promo%20Themes"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/img/welcome/logo-wr.png'; ?>" width="48" height="46" alt="WooRockets" />
				<span><?php _e( 'www.woorockets.com', 'elite' ); ?></span>
				</a>
				<h4><?php _e( 'Subscribe to our email newsletter to get updates about the latest<br /> products and news from us', 'elite' ); ?></h4>
				<a class="button button-primary" target="_blank" href="http://www.woorockets.com/?utm_source=Elite%20Setting&utm_medium=subscribe-banner-link&utm_campaign=Cross%20Promo%20Themes#subscribe"><?php _e( 'Subscribe Now', 'elite' ); ?></a>
			</div>
		</div>
	<?php }
}

/**
 * Handles calls to show message.
 */
function wr_elite_welcome_message_status() {
	$status = $_REQUEST['status'];
	if( ! empty( $status ) && preg_match('/^[a-z]*$/', $status) ) {
		update_option( 'wr_elite_welcome_banner_status', $status );
	}
}
add_action( 'wp_ajax_update_welcome_banner_status', 'wr_elite_welcome_message_status' );

/**
 * Display the welcome message.
 */
function wr_elite_welcome_message_show() {
	if ( get_option( 'wr_elite_welcome_banner_status' ) == 'hide' ) return;
	?>
	<div class="woorockets-welcome-message">
		<div class="woorockets-logo">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/welcome/woorockets.png' ?>" width="48" height="45" />
		</div>
		<p><?php
			printf(
				__( 'Thank you for installing Elite from WooRockets Team! We are making new hi-quality themes and plugins for you ;) Follow us on %1$s or %2$s to our email list and be the first to get updated.', 'elite' ),
				'<a target="_blank" href="https://twitter.com/WooRockets">Twitter</a>',
				'<a target="_blank" href="http://www.woorockets.com/?utm_source=Elite%20Setting&utm_medium=subscribe-button&utm_campaign=Cross%20Promo%20Themes#subscribe">Subscribe</a>'
			);
		?></p>
		<a href="#" class="dismiss"><span class="dashicons dashicons-no-alt"></span></a>
	</div>
	<?php
}
add_action( 'in_admin_header', 'wr_elite_welcome_message_show' );

/**
 * Handles calls message after switch theme.
 */
function wr_elite_welcome_message_dismiss() {
    update_option( 'wr_elite_welcome_banner_status', 'show' );
}
add_action( 'switch_theme', 'wr_elite_welcome_message_dismiss' );

/**
 * Enqueue style for welcome pages.
 */
function wr_elite_welcome_page_style() {
	wp_enqueue_style( 'elite-welcome-css', get_template_directory_uri() . '/assets/css/welcome.css' );
	wp_enqueue_script( 'elite-welcome-script', get_template_directory_uri() . '/assets/js/welcome.js' );
}
add_action( 'admin_enqueue_scripts', 'wr_elite_welcome_page_style' );

/**
 * Enqueue twitter button script.
 */
function wr_elite_twitter_follow_btn() { ?>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
}
add_action( 'admin_footer', 'wr_elite_twitter_follow_btn' );



