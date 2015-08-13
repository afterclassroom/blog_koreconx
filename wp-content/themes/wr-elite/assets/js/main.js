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

		/*  [ Detecting Mobile Devices ]
		- - - - - - - - - - - - - - - - - - - - */
		var isMobile = {
			Android: function() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function() {
				return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
			},
			Desktop: function() {
				return window.innerWidth <= 960;
			},
			any: function() {
				return ( isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows() || isMobile.Desktop() );
			}
		};

		/*  [ Custom RTL Menu ]
		- - - - - - - - - - - - - - - - - - - - */
		if ( ! isMobile.any() ) {
			$( '.sub-menu li' ).on( 'hover', function () {
			var sub_menu = $( this ).find( ' > .sub-menu' );
				if ( sub_menu.length ) {
					if ( sub_menu.outerWidth() > ( $( window ).outerWidth() - sub_menu.offset().left ) ) {
						$( this ).addClass( 'menu-rtl' );
					}
				}
			});
		}

		/*  [ Back To Top ]
		- - - - - - - - - - - - - - - - - - - - */
		$(window).scroll(function () {
			if ( $( this ).scrollTop() > 50 ) {
				$( '.back-to-top' ).fadeIn( 'slow' );
				$( '.site-header' ).addClass( 'sticky' );
			} else {
				$( '.back-to-top' ).fadeOut( 'slow' );
				$( '.site-header' ).removeClass( 'sticky' );
			}
		});
		$('.back-to-top').click(function () {
			$( "html, body" ).animate({
				scrollTop: 0
			}, 500);
			return false;
		});

		/*  [ Title page ]
		- - - - - - - - - - - - - - - - - - - - */
		var headerHeight = $( '.site-header' ).height();
		$( '.page-title' ).css( 'padding-top', headerHeight + 'px' );

		/*  [ Menu Responsive ]
		- - - - - - - - - - - - - - - - - - - - */
		var container = $('#site-navigation'),
			button = container.find('> button'),
			menu = container.find('> ul');

		button.on('click', function(){
			container.toggleClass('active');
		});

		var MenuChildren = $('#menu-main .menu-item-has-children');

		MenuChildren.children('a').after('<i class="dashicons dashicons-arrow-down"></i>');
		MenuChildren.on('click', '.dashicons', function(e){
			e.stopPropagation();
			$(this).parent('.menu-item').toggleClass('active');
			$( '.site-header' ).addClass( 'un-sticky' );
		});

		$('#menu-main').singlePageNav({
			offset: $('.site-header').outerHeight(),
			filter: ':not(.menu-item-type-post_type a)',
			updateHash: false,
			beforeStart: function() { },
			onComplete: function() { }
		});

		/*  [ Remove p empty tag of page builder ]
		- - - - - - - - - - - - - - - - - - - - */
		$( 'p' ).each(function() {
			var $this = $( this );
				if( $this.html().replace(/\s|&nbsp;/g, '').length == 0) {
				$this.remove();
			}
		});


		/*  [ Modify default gallery of wordpress to carousel ]
		- - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		$( ".gallery" ) .owlCarousel({
			items: 1,
			pagination: true,
		});

	});
})(jQuery);