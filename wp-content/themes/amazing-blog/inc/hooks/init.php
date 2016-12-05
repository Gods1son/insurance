<?php
/**
 * Implement Editor Styles
 *
 * @since Amazing blog 1.0.0.5
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'amazing_blog_add_editor_styles' );

if ( ! function_exists( 'amazing_blog_add_editor_styles' ) ) :
    function amazing_blog_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;
