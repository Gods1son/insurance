jQuery(document).ready(function () {
	var $sel = jQuery('#customize-info');
	if( $sel.length ){
    	$sel.first( '.accordion-section-title' ).append('<div class="admin-button"><a class="cusbtn theme-update" target="_blank" href="http://themepalace.com/downloads/amazing-blog-pro">Update to pro</a><a class="cusbtn theme-demo" target="_blank" href="http://demo.evisionthemes.com/amazing-blog/demos">More Demos</a> </div>');
	}
});
