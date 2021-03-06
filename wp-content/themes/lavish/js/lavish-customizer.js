/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
} )( jQuery );

jQuery(document).ready(function() {

	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 20px auto 5px auto; display: block; text-align: center;" href="http://www.styledthemes.com/lavish-pro" class="button" target="_blank">'+ lavish_button.pro +'</a>' );
	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 20px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/lavish?filter=5" class="button" target="_blank">'+ lavish_button.review +'</a>' );

});
