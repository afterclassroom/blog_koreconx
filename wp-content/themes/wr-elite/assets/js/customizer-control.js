/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	"use strict";

	$(document).ready(function() {

		var LogoType  = $( 'select[data-customize-setting-link="wr_logo_type"]' );
		var LogoImage = $( '#customize-control-wr_logo_image' );
		var LogoText  = $( '#customize-control-blogname' );

		LogoType.change( function() {
			if ( $( this ).val() == 'logo_text') {

				LogoImage.css( 'display', 'none' );
				LogoText.css( 'display', 'block' );

			} else if ( $( this ).val() == 'logo_image') {

				LogoImage.css( 'display', 'block' );
				LogoText.css( 'display', 'none' );

			}
		});
		LogoType.trigger( 'change' );

		var Offline        = $( 'input[data-customize-setting-link="wr_maintenance_mode"]' );
		var OfflineMessage = $( 'li[id*="customize-control-wr_maintenance_mode_"]' );

		Offline.change( function() {
			if( $( this ).is( ':checked' ) && $( this ).val() == '0' ) {

				OfflineMessage.css( 'display', 'none' );

			} else {

				OfflineMessage.css( 'display', 'block' );

			}
		});
		Offline.trigger( 'change' );

		// Check background has image
		if ( ! $('#ccustomize-control-wr_page_title_image').find('img.attachment-thumb').length ) {
			$( 'li[id*="customize-control-wr_page_title_background_"]' ).hide();
		}
	});

	// Image upload control
	wp.customize( 'wr_page_title_image', function( value ) {
		value.bind( function( to ) {
			var bg_control = $( 'li[id*="customize-control-wr_page_title_background_"]' );
			0 === $.trim( to ).length ? bg_control.hide() : bg_control.show();
		});
	});

} )( jQuery );
