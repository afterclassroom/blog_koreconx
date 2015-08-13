( function( $ ) {

	$('.preview-notice').append('<a class="getpremium" target="_blank" href="' + suevafree_details.url + '">' + suevafree_details.label + '</a>'); 
	$('.preview-notice').on("click",function(a){a.stopPropagation()});

} )( jQuery );   