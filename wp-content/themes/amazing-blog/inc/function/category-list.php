<?php
if ( ! function_exists( 'amazing_blog_get_the_category_uno' ) ) :

    /**
     * Return one category link of a post.
     *
     * @since Amazing Blog 1.0.0
     */
    function amazing_blog_get_the_category_uno( $id = '' ){

        global $post;
        if ( empty( $id )) {
            if ( $post ) {
                $id = $post->ID;
            }
        }
        if ( empty( $id ) ) {
            return;
        }
        $categories = get_the_terms( $id, 'category' );
        if ( ! $categories || is_wp_error( $categories ) )
            $categories = array();

        $categories = array_values( $categories );
        $output = '';
        if ( ! empty( $categories ) && is_array( $categories ) ) {
            $cat = $categories[0];
            $output .= '<a href="' . esc_url( get_term_link( $cat ) ). '">' . esc_html( $cat->name ) . '</a>';
        }
        return $output;

    }

endif;

if ( ! function_exists( 'amazing_blog_the_category_uno' ) ) :

    /**
     * Return one category link of a post.
     *
     * @since Amazing Blog 1.0.0
     */
    function amazing_blog_the_category_uno( $id = '' ){

        $output = amazing_blog_get_the_category_uno( $id );
        echo $output;

    }

endif;
