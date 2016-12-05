<?php
/**
 * Checks if there are options already present from Amazing BLog free version and adds it to the Amazing BLog theme options
 *
 * @since Amazing BLog 1.0.0
 * @hook after_theme_switch
 */
function amazing_blog_setup_options() {
    //Perform action only if theme_mods_amazing-blog[amazing-blog-options] does not exist
    if( !get_theme_mod( 'amazing-blog-options' ) ) {
        //Perform action only if theme_mods_amazing_blog free version exists
        if ( $amazing_blog_free_options = get_option ( 'theme_mods_amazing_blog' ) ) {
            if ( isset( $amazing_blog_free_options['amazing-blog-options'] ) ) {
                global $amazing_blog_customizer_defaults;
                $amazing_blog_default_options = $amazing_blog_customizer_defaults;

                $amazing_blog_theme_options = $amazing_blog_free_options;

                $amazing_blog_theme_options['amazing-blog-options'] = array_merge( $amazing_blog_default_options , $amazing_blog_free_options['amazing-blog-options'] );

                update_option('theme_mods_amazing-blog', $amazing_blog_theme_options );
            }
        }
    }
}

add_action('after_switch_theme', 'amazing_blog_setup_options');
