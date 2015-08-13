/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

(function($) {
	"use strict";

	$(document).ready(function() {
		var welcome = $( '.woorockets-welcome-message' );

		$( '#wpcontent, #adminmenu' ).css( 'padding-top', welcome.outerHeight() );

		welcome.find( '.dismiss' ).click(function() {
			$.ajax( {url: 'admin-ajax.php', 
					data: {
						action: 'update_welcome_banner_status',
						status: 'hide'
					}});
			welcome.slideUp();
			$( '#wpcontent, #adminmenu' ).animate( {'padding-top':0} );
		});
	});
})(jQuery);