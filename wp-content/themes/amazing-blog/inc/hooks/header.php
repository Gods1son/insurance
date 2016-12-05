<?php
if ( ! function_exists( 'amazing_blog_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_set_global() {
    /*Getting saved values start*/
    $GLOBALS['amazing_blog_customizer_all_values'] = amazing_blog_get_all_options(1);
}
endif;
add_action( 'amazing_blog_action_before_head', 'amazing_blog_set_global', 0 );

if ( ! function_exists( 'amazing_blog_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_doctype() {
    ?>
       <!DOCTYPE html><html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'amazing_blog_action_before_head', 'amazing_blog_doctype', 10 );

if ( ! function_exists( 'amazing_blog_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_before_wp_head() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
}
endif;
add_action( 'amazing_blog_action_before_wp_head', 'amazing_blog_before_wp_head', 10 );

if( ! function_exists( 'amazing_blog_default_layout' ) ) :
    /**
     * Amazing Blog default layout function
     *
     * @since  Amazing Blog 1.0.0
     *
     * @param int
     * @return string
     */
    function amazing_blog_default_layout( $post_id = null ){

        global $amazing_blog_customizer_all_values,$post;
        $amazing_blog_default_layout = $amazing_blog_customizer_all_values['amazing-blog-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $amazing_blog_default_layout_meta = get_post_meta( $post_id, 'amazing-blog-default-layout', true );

        if( false != $amazing_blog_default_layout_meta ) {
            $amazing_blog_default_layout = $amazing_blog_default_layout_meta;
        }
        return $amazing_blog_default_layout;
    }
endif;


if ( ! function_exists( 'amazing_blog_body_class' ) ) :
/**
 * add body class
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_body_class( $amazing_blog_body_classes ) {
         $amazing_blog_default_layout = amazing_blog_default_layout();
        if( !empty( $amazing_blog_default_layout ) ){
            if( 'left-sidebar' == $amazing_blog_default_layout ){
                $amazing_blog_body_classes[] = 'evision-left-sidebar';
            }
            elseif( 'right-sidebar' == $amazing_blog_default_layout ){
                $amazing_blog_body_classes[] = 'evision-right-sidebar';
            }
            elseif( 'both-sidebar' == $amazing_blog_default_layout ){
                $amazing_blog_body_classes[] = 'evision-both-sidebar';
            }
            elseif( 'no-sidebar' == $amazing_blog_default_layout ){
                $amazing_blog_body_classes[] = 'evision-no-sidebar';
            }
            else{
                $amazing_blog_body_classes[] = 'evision-right-sidebar';
            }
        }
        else{
            $amazing_blog_body_classes[] = 'evision-right-sidebar';
        }
    return $amazing_blog_body_classes;

}
endif;
add_action( 'body_class', 'amazing_blog_body_class', 10, 1);

if ( ! function_exists( 'amazing_blog_page_start' ) ) :
/**
 * page start
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_page_start() { ?>
    <div id="page" class="site">
<?php
}
endif;
add_action( 'amazing_blog_action_before', 'amazing_blog_page_start', 15 );

if ( ! function_exists( 'amazing_blog_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'amazing-blog' ); ?></a>
<?php
}
endif;
add_action( 'amazing_blog_action_before_header', 'amazing_blog_skip_to_content', 10 );

if ( ! function_exists( 'amazing_blog_header' ) ) :
/**
 * Main header
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function amazing_blog_header() {
    global $amazing_blog_customizer_all_values;
    ?>
    <header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="column-md-3">
					<?php
					$amazing_blog_show_social = $amazing_blog_customizer_all_values['amazing-blog-show-social'];
					if( has_nav_menu( 'social' ) && 1 == $amazing_blog_show_social ){
						?>
						<div class="social-widget evision-social-section social-icon-only">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'container' => false
							) );
							?>
						</div>
					<?php
					}
					?>
				</div>
				<div class="column-md-6">
					<div class="site-branding">
                        <?php if ( isset($amazing_blog_customizer_all_values['amazing-blog-logo']) && !empty($amazing_blog_customizer_all_values['amazing-blog-logo'])) :
                            if ( is_front_page() && is_home() ){
                                echo '<h1 class="site-title">';
                            }
                            else{
                                echo '<p class="site-title">';
                            }
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img class="header-logo" src="<?php echo esc_url($amazing_blog_customizer_all_values['amazing-blog-logo']); ?>" alt="<?php bloginfo( 'name' )?>">
                            </a>
                            <?php if ( is_front_page() && is_home() ){
                                echo '</h1>';
                            }
                            else{
                                echo '</p>';
                            }
                        ?>
                        <?php else :
                            if ( is_front_page() && is_home() ){
                                echo '<h1 class="site-title">';
                            }
                            else{
                                echo '<p class="site-title">';
                            }
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php
                                if ( 1 == $amazing_blog_customizer_all_values['amazing-blog-enable-title'] ) :
                                    bloginfo( 'name' );
                                endif;
                                ?>
                            </a>
                                <?php
                                if ( 1 == $amazing_blog_customizer_all_values['amazing-blog-enable-tagline'] ) :
                                    echo '<p class="site-description">'. get_bloginfo('description' ).'</p>';
                                endif;
                                ?>
                            <?php if ( is_front_page() && is_home() ){
                                echo '</h1>';
                            }
                            else{
                                echo '</p>';
                            }
                        endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="column-md-3">
					<a href="#menu" id="hamburger"><span></span></a>
				</div>
			</div>
		</div>

		<nav id="menu" class="main-navigation" role="navigation">
		    <?php wp_nav_menu( array(
		    'theme_location' => 'primary',
		    'container' => false,
		    ) ); ?>
		</nav>
	</header><!-- #masthead -->
<?php
}
endif;
add_action( 'amazing_blog_action_header', 'amazing_blog_header', 10 );


if( ! function_exists( 'amazing_blog_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function amazing_blog_add_breadcrumb(){
        global $amazing_blog_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $amazing_blog_customizer_all_values['amazing-blog-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb"><div class="container">';
         amazing_blog_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'amazing_blog_action_after_header', 'amazing_blog_add_breadcrumb', 10 );

if( ! function_exists( 'amazing_blog_content_wrapper' ) ) :

/**
 * Post Content
 *
 * @since Amazing Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function amazing_blog_content_wrapper(){
        echo '<div class="site-content">';
    }
endif;
add_action( 'amazing_blog_action_before_content', 'amazing_blog_content_wrapper', 40 );
