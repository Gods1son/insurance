<?php
if ( ! function_exists( 'amazing_blog_main_section' ) ) :
    /**
     * Featured Slider
     *
     * @since Amazing Blog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function amazing_blog_main_section() {
        ?>
        <section class="wrapper block-section right-panel">
            <div class="container">
                <div class="row">
                    <div class="column-md-12">
                        <div class="row">
                            <div id="primary" class="content-area">
                                <!--col widget-->
                                <?php dynamic_sidebar( 'sidebar-home' ); ?>
                                <!--col widget-->
                            </div><!-- #primary -->
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
endif;
add_action( 'homepage', 'amazing_blog_main_section', 50 );
