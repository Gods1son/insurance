<?php
if( ! function_exists( 'amazing_blog_get_image_sizes_options' ) ) :

    /**
     * Returns archive layout options.
     *
     * @since Amazing Blog 1.0.0
     */
    function amazing_blog_get_image_sizes_options( $add_disable = true ){

        global $_wp_additional_image_sizes;
        $get_intermediate_image_sizes = get_intermediate_image_sizes();
        $choices = array();
        if ( true == $add_disable ) {
            $choices['disable'] = __( 'No Image', 'amazing-blog' );
        }
        foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
            $choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
        }
        $choices['full'] = __( 'full (original)', 'amazing-blog' );
        if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

            foreach ($_wp_additional_image_sizes as $key => $size ) {
                $choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
            }

        }
        return $choices;

    }

endif;
