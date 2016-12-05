<?php
/**
 * check if all sections of front page disable
 *
 * @since Amazing Blog 1.0.0
 */
if ( ! function_exists( 'amazing_blog_if_all_disable' ) ) :
    function amazing_blog_if_all_disable() {
        global $amazing_blog_customizer_all_values;
        $amazing_blog_fa_image = $amazing_blog_customizer_all_values['amazing-blog-fa-image'];
        if(
            1 != $amazing_blog_customizer_all_values['amazing-blog-fp-enable']  &&
            ( empty( $amazing_blog_fa_image ) ) &&
            ( !is_active_sidebar( 'sidebar-home') )
        ) {
            return 0;
        }
        else{
            return 1;
        }
    }
endif;
if ( ! function_exists( 'amazing_blog_front_page' ) ) :
    /**
     * Before main content
     *
     * @since Amazing Blog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function amazing_blog_front_page() {
        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        elseif( 1 == amazing_blog_if_all_disable()){
            /**
             * homepage hook
             * @since Amazing Blog 1.0.0
             *
             * @hooked amazing_blog_single_featured_post -  10
             * @hooked amazing_blog_single_featured_add -  30
             * @hooked amazing_blog_main_section -  50
             */
            do_action('homepage');
        }
        else {
            include( get_page_template() );
        }

    }
endif;
add_action( 'amazing_blog_action_front_page', 'amazing_blog_front_page', 10 );
