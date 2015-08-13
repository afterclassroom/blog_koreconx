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
 * Customizer Color Schemes CSS Output
 *
 * @package Elite
 */
function wr_elite_color_schemes_output() {
	// Get theme options
	$color = wr_elite_theme_option( 'wr_color_schemes' );

	if ( 'blue' == $color ) : ?>

		<style>
			blockquote,
			address,
			q,
			.entry-thumb {
				border-color: #57a664;
			}
			a:hover,
			a:focus,
			a:active,
			.format-quote .quote-content i,
			.posted-on time span,
			.entry-meta a:hover,
			.author-info .author-bio h4,
			.comments-area .comments-title,
			.comments-area .comment-body .comment-author,
			.comments-area .action-link a,
			.widget a:hover,
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-content-wrap h4,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:before,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:after {
				color: #57a664;
			}
			#menu-main li.current-menu-item > a,
			#menu-main li a:hover,
			#menu-main li a.current {
				border-top-color: #57a664;
			}
			.entry-thumb i,
			.page-offline footer,
			.comment-respond .comment-form .form-submit input[type="submit"],
			.widget #wp-calendar caption,
			.back-to-top i:hover,
			.jsn-bootstrap3 .wr-element-list.hover .wr-position-center.wr-list-icons:after,
			.jsn-bootstrap3 .wr-element-testimonial .carousel.wr-testimonial ol.carousel-indicators li.active,
			.jsn-bootstrap3 .wr-element-button .btn.btn-success,
			.wr-contactform.jsn-master .jsn-bootstrap .jsn-row-container .btn-toolbar .btn {
				background: #57a664;
			}
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-icons .wr-icon-base {
				background: #57a664 !important;
			}
			.page-offline .countdown li {
				border-color: #57a664 #eee #eee;
			}
		</style>

	<?php elseif ( 'brown' == $color ) : ?>

		<style>
			blockquote,
			address,
			q,
			.entry-thumb {
				border-color: #35281c;
			}
			a:hover,
			a:focus,
			a:active,
			.format-quote .quote-content i,
			.posted-on time span,
			.entry-meta a:hover,
			.author-info .author-bio h4,
			.comments-area .comments-title,
			.comments-area .comment-body .comment-author,
			.comments-area .action-link a,
			.widget a:hover,
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-content-wrap h4,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:before,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:after {
				color: #35281c;
			}
			#menu-main li.current-menu-item > a,
			#menu-main li a:hover,
			#menu-main li a.current {
				border-top-color: #35281c;
			}
			.entry-thumb i,
			.page-offline footer,
			.comment-respond .comment-form .form-submit input[type="submit"],
			.widget #wp-calendar caption,
			.back-to-top i:hover,
			.jsn-bootstrap3 .wr-element-list.hover .wr-position-center.wr-list-icons:after,
			.jsn-bootstrap3 .wr-element-testimonial .carousel.wr-testimonial ol.carousel-indicators li.active,
			.jsn-bootstrap3 .wr-element-button .btn.btn-success,
			.wr-contactform.jsn-master .jsn-bootstrap .jsn-row-container .btn-toolbar .btn {
				background: #35281c;
			}
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-icons .wr-icon-base {
				background: #35281c !important;
			}
			.page-offline .countdown li {
				border-color: #35281c #eee #eee;
			}
		</style>

	<?php elseif ( 'black' == $color ) : ?>

		<style>
			blockquote,
			address,
			q,
			.entry-thumb {
				border-color: #211e13;
			}
			a:hover,
			a:focus,
			a:active,
			.format-quote .quote-content i,
			.posted-on time span,
			.entry-meta a:hover,
			.author-info .author-bio h4,
			.comments-area .comments-title,
			.comments-area .comment-body .comment-author,
			.comments-area .action-link a,
			.widget a:hover,
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-content-wrap h4,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:before,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:after {
				color: #211e13;
			}
			#menu-main li.current-menu-item > a,
			#menu-main li a:hover,
			#menu-main li a.current {
				border-top-color: #211e13;
			}
			.entry-thumb i,
			.page-offline footer,
			.comment-respond .comment-form .form-submit input[type="submit"],
			.widget #wp-calendar caption,
			.back-to-top i:hover,
			.jsn-bootstrap3 .wr-element-list.hover .wr-position-center.wr-list-icons:after,
			.jsn-bootstrap3 .wr-element-testimonial .carousel.wr-testimonial ol.carousel-indicators li.active,
			.jsn-bootstrap3 .wr-element-button .btn.btn-success,
			.wr-contactform.jsn-master .jsn-bootstrap .jsn-row-container .btn-toolbar .btn {
				background: #211e13;
			}
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-icons .wr-icon-base {
				background: #211e13 !important;
			}
			.page-offline .countdown li {
				border-color: #211e13 #eee #eee;
			}
		</style>

	<?php elseif ( 'orange' == $color ) : ?>

		<style>
			blockquote,
			address,
			q,
			.entry-thumb {
				border-color: #f29849;
			}
			a:hover,
			a:focus,
			a:active,
			.format-quote .quote-content i,
			.posted-on time span,
			.entry-meta a:hover,
			.author-info .author-bio h4,
			.comments-area .comments-title,
			.comments-area .comment-body .comment-author,
			.comments-area .action-link a,
			.widget a:hover,
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-content-wrap h4,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:before,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:after {
				color: #f29849;
			}
			#menu-main li.current-menu-item > a,
			#menu-main li a:hover,
			#menu-main li a.current {
				border-top-color: #f29849;
			}
			.entry-thumb i,
			.page-offline footer,
			.comment-respond .comment-form .form-submit input[type="submit"],
			.widget #wp-calendar caption,
			.back-to-top i:hover,
			.jsn-bootstrap3 .wr-element-list.hover .wr-position-center.wr-list-icons:after,
			.jsn-bootstrap3 .wr-element-testimonial .carousel.wr-testimonial ol.carousel-indicators li.active,
			.jsn-bootstrap3 .wr-element-button .btn.btn-success,
			.wr-contactform.jsn-master .jsn-bootstrap .jsn-row-container .btn-toolbar .btn {
				background: #f29849;
			}
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-icons .wr-icon-base {
				background: #f29849 !important;
			}
			.page-offline .countdown li {
				border-color: #f29849 #eee #eee;
			}
		</style>

	<?php elseif ( 'red' == $color ) : ?>

		<style>
			blockquote,
			address,
			q,
			.entry-thumb {
				border-color: #c45252;
			}
			a:hover,
			a:focus,
			a:active,
			.format-quote .quote-content i,
			.posted-on time span,
			.entry-meta a:hover,
			.author-info .author-bio h4,
			.comments-area .comments-title,
			.comments-area .comment-body .comment-author,
			.comments-area .action-link a,
			.widget a:hover,
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-content-wrap h4,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:before,
			.jsn-bootstrap3 .wr-element-testimonial .wr-testimonial-meta .wr-testimonial-name:after {
				color: #c45252;
			}
			#menu-main li.current-menu-item > a,
			#menu-main li a:hover,
			#menu-main li a.current {
				border-top-color: #c45252;
			}
			.entry-thumb i,
			.page-offline footer,
			.comment-respond .comment-form .form-submit input[type="submit"],
			.widget #wp-calendar caption,
			.back-to-top i:hover,
			.jsn-bootstrap3 .wr-element-list.hover .wr-position-center.wr-list-icons:after,
			.jsn-bootstrap3 .wr-element-testimonial .carousel.wr-testimonial ol.carousel-indicators li.active,
			.jsn-bootstrap3 .wr-element-button .btn.btn-success,
			.wr-contactform.jsn-master .jsn-bootstrap .jsn-row-container .btn-toolbar .btn {
				background: #c45252;
			}
			.jsn-bootstrap3 .wr-element-list.hover:hover .wr-list-icons .wr-icon-base {
				background: #c45252 !important;
			}
			.page-offline .countdown li {
				border-color: #c45252 #eee #eee;
			}
		</style>

	<?php endif;
}
add_action( 'wp_head', 'wr_elite_color_schemes_output', 100001 );