/**
 *
 *	Custom JS Code for the theme goes here.
 *
**/

jQuery(document).ready(function() {
	jQuery('#search-top input[type="text"]').width('0px');
	jQuery('#search-icon').on('click', function() {
		jQuery('#search-top input[type="text"]').animate( {
			width: '200px'
		}, 'slow' );
	});
	jQuery('#search-top input[type="text"]').focusout( function() {
		jQuery('#search-top input[type="text"]').animate( {
			width: '0px'
		}, 'slow' );
	});
});

