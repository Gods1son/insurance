<?php
if ( ! function_exists( 'amazing_blog_single_featured_add' ) ) :
    /**
     * Featured Slider
     *
     * @since Amazing Blog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function amazing_blog_single_featured_add() {
        global $amazing_blog_customizer_all_values;

        $amazing_blog_fa_image = $amazing_blog_customizer_all_values['amazing-blog-fa-image'];
        $amazing_blog_fa_link = $amazing_blog_customizer_all_values['amazing-blog-fa-link'];
        $amazing_blog_fa_link_new_window = $amazing_blog_customizer_all_values['amazing-blog-fa-link-new-window'];

        if( empty ( $amazing_blog_fa_image ) ){
            return null;
        }
        $target = "";
        if( 1 == $amazing_blog_fa_link_new_window ){
            $target = "_blank";
        }
        ?>
        <section class="wrapper block-section adv-section">
            <div class="container">
                <div class="row">
                    <div class="column-md-12">
                        <div class="block-holder">
                            <a href="<?php echo esc_url( $amazing_blog_fa_link ); ?>" target="<?php echo esc_attr( $target ); ?>">
                                <img src="<?php echo esc_url( $amazing_blog_fa_image ); ?>">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
endif;
add_action( 'homepage', 'amazing_blog_single_featured_add', 30 );
