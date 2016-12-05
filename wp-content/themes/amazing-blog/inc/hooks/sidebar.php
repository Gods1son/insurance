<?php
if ( ! function_exists( 'amazing_blog_sidebar' ) ) :
/**
 * Sidebar
 *
 * @since Amazing BLog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_sidebar() {
    global $amazing_blog_customizer_all_values;
    if( isset($amazing_blog_customizer_all_values['amazing-blog-layout-options']) ){
        $amazing_blog_layout_page = $amazing_blog_customizer_all_values['amazing-blog-layout-options'];
        if( 'no-sidebar' == $amazing_blog_layout_page ){
            $amazing_blog_sidebar_active = 0;
        }
        else {
            $amazing_blog_sidebar_active = 1;
        }
    }
    else{
        $amazing_blog_sidebar_active = 1;
    }

    if ( ! is_active_sidebar( 'sidebar-1' ) || 0 == $amazing_blog_sidebar_active ) {
        return;
    }
    ?>

    <div id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
<?php
}
endif;
add_action( 'amazing_blog_action_sidebar', 'amazing_blog_sidebar', 10 );
