<?php
if ( ! function_exists( 'amazing_blog_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since Amazing BLog 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function amazing_blog_before_footer() {
    ?>
    </div>
    </div><!-- #content -->
    <section class="wrapper block-section footer-block">
		<?php dynamic_sidebar( 'footer-full' ); ?>
	</section>
    <?php
    }
endif;
add_action( 'amazing_blog_action_before_footer', 'amazing_blog_before_footer', 10 );

if ( ! function_exists( 'amazing_blog_footer' ) ) :
    /**
     * Footer content
     *
     * @since Amazing BLog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function amazing_blog_footer() {
        global $amazing_blog_customizer_all_values;
        ?>
        <!-- *****************************************
             Footer section starts
    ****************************************** -->
        <footer id="colophon" class="wrapper site-footer" role="contentinfo">
                <div class="container copyright">
                    <?php
                    if(isset($amazing_blog_customizer_all_values['amazing-blog-copyright-text'])){
                        echo wp_kses_post( $amazing_blog_customizer_all_values['amazing-blog-copyright-text'] );
                    }
                    ?>
                </div>
                <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'amazing-blog' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'amazing-blog' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'amazing-blog' ), 'Amazing Blog', '<a href="http://evisionthemes.com/" rel="designer">eVisionThemes </a>' ); ?>
                </div><!-- .site-info -->
            </footer><!-- #colophon -->
        <!-- *****************************************
                 Footer section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'amazing_blog_action_footer', 'amazing_blog_footer', 10 );

if ( ! function_exists( 'amazing_blog_page_end' ) ) :
    /**
     * Page end
     *
     * @since Amazing BLog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function amazing_blog_page_end() {
    global $amazing_blog_customizer_all_values;
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'amazing_blog_action_after', 'amazing_blog_page_end', 10 );
