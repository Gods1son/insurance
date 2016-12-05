<?php
if ( ! function_exists( 'amazing_blog_numeric_posts_navigation' ) ) :

    /**
     * Numeric navigation options
     *
     * @since  Amazing BLog 1.0.0
     *
     * @param null
     * @return int
     */
    function amazing_blog_numeric_posts_navigation() {
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        $translated = __( 'Page', 'amazing-blog' ); // Supply translatable string\
        $args = array(
            'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'             => '?paged=%#%',
            'total'              => $wp_query->max_num_pages,
            'current'            => max( 1, get_query_var('paged') ),
            'show_all'           => False,
            'prev_next'          => True,
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
        );
        echo paginate_links( $args);
    }
endif;

if ( ! function_exists( 'amazing_blog_posts_navigation' ) ) :

    /**
     * Posts navigation options
     *
     * @since  Amazing BLog 1.0.0
     *
     * @param null
     * @return int
     */
    function amazing_blog_posts_navigation() {
        the_posts_navigation();

    }
endif;
add_action( 'amazing_blog_action_posts_navigation', 'amazing_blog_posts_navigation' );
