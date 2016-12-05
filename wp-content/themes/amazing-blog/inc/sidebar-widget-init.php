<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function amazing_blog_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Home/Front Page', 'amazing-blog' ),
        'id'            => 'sidebar-home',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'amazing-blog' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area Full Widgets', 'amazing-blog' ),
        'id'            => 'footer-full',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'amazing_blog_widgets_init' );


require get_template_directory() . '/inc/widgets/col-posts.php';

require get_template_directory() . '/inc/widgets/author.php';

require get_template_directory() . '/inc/widgets/social-links.php';
