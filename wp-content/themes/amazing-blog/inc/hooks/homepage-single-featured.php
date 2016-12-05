<?php
if ( ! function_exists( 'amazing_blog_single_featured_post' ) ) :
    /**
     * Featured Slider
     *
     * @since Amazing Blog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function amazing_blog_single_featured_post() {
        global $amazing_blog_customizer_all_values;

        $amazing_blog_fp_enable = $amazing_blog_customizer_all_values['amazing-blog-fp-enable'];
        $amazing_blog_fp = $amazing_blog_customizer_all_values['amazing-blog-fp'];

        if( 1 != $amazing_blog_fp_enable ){
            return null;
        }
        ?>
        <section class="wrapper block-section large-feature-post">
            <div class="container">
                <div class="row">
                    <div class="column-md-12">
                        <div class="block-holder block-container">
                            <div class="thumb-holder">
                                <?php
                                $thumb_image = get_the_post_thumbnail( $amazing_blog_fp );
                                if ( 0 != $amazing_blog_fp_enable && $thumb_image  ):
                                    echo $thumb_image;
                                else:
                                    echo '<img src="' . trailingslashit( get_template_directory_uri() ) . 'assets/img/no-image-126_530.png' . '" alt="no image" />';
                                endif ?>
                                <?php //echo get_the_post_thumbnail( $amazing_blog_fp, "full" );?>
                            </div>
                            <div class="block-overlay-content">
                                <div class="vmiddle-holder">
                                    <div class="vmiddle">
                                        <span class="cat-list-holder">
                                                <?php echo get_the_category_list( ",", "", $amazing_blog_fp ); ?>
                                            </span>
                                        <h1>
                                            <a href="<?php echo esc_url( get_permalink( ) ); ?>"><?php esc_attr( get_the_title( $amazing_blog_fp ) );?></a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'homepage', 'amazing_blog_single_featured_post', 10 );
