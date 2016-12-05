<?php
/**
 * The template for adding Custom Sidebars and Widgets
 *
 * @package Catch Themes
 * @subpackage Clean Business
 * @since Clean Business 0.1
 */

/**
 * Register widgetized area
 *
 * @since Clean Business 0.1
 */
function clean_business_widgets_init() {
	//Primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'clean-business' ),
		'id'            => 'primary-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$footer_sidebar_number = 3; //Number of footer sidebars

	for( $i=1; $i <= $footer_sidebar_number; $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Area %d', 'clean-business' ), $i ),
			'id'            => sprintf( 'footer-%d', $i ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
			'description'	=> sprintf( esc_html__( 'Footer %d widget area.', 'clean-business' ), $i ),
		) );
	}
}
add_action( 'widgets_init', 'clean_business_widgets_init' );

/**
 * Loads up Necessary JS Scripts for widgets
 *
 * @since Clean Business 0.1
 */
function clean_business_widgets_scripts( $hook) {
	if ( 'widgets.php' == $hook ) {
		wp_enqueue_style( 'automobile-widgets-styles', get_template_directory_uri() . '/css/widgets.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'clean_business_widgets_scripts' );

// Load Featured Post Widget
include get_template_directory() . '/inc/widgets/featured-posts.php';

// Load Social Icon Widget
include get_template_directory() . '/inc/widgets/social-icons.php';

// Load Newsletter Widget
include get_template_directory() . '/inc/widgets/tag-cloud.php';
