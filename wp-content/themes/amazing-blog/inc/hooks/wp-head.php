<?php

if( ! function_exists( 'amazing_blog_wp_head' ) ) :

    /**
     * Amazing BLog wp_head hook
     *
     * @since  Amazing BLog 1.0.0
     */
    function amazing_blog_wp_head(){
        global $amazing_blog_customizer_all_values;
        global $amazing_blog_google_fonts;

        $amazing_blog_font_family_site_identity = $amazing_blog_google_fonts[$amazing_blog_customizer_all_values['amazing-blog-font-family-site-identity']];
        $amazing_blog_font_family_h1_h6 = $amazing_blog_google_fonts[$amazing_blog_customizer_all_values['amazing-blog-font-family-h1-h6']];
        /*Color options */
        $amazing_blog_h1_h6_color = $amazing_blog_customizer_all_values['amazing-blog-h1-h6-color'];
        $amazing_blog_link_color = $amazing_blog_customizer_all_values['amazing-blog-link-color'];
        $amazing_blog_link_hover_color = $amazing_blog_customizer_all_values['amazing-blog-link-hover-color'];
        $amazing_blog_site_identity_color = $amazing_blog_customizer_all_values['amazing-blog-site-identity-color'];
        $amazing_blog_post_thumb_title_color = $amazing_blog_customizer_all_values['amazing-blog-post-thumb-title-color'];
        ?>
        <style type="text/css">
            /*site identity font family*/
            .site-title,
            .site-title a,
            .site-description
            .site-branding .site-title,
            .site-branding .site-title a,
            .large-feature-post h1,
            .large-feature-post h1 a{
                font-family: '<?php echo esc_attr( $amazing_blog_font_family_site_identity ); ?>'!important;
            }
            h1, h1 a,
            h2, h2 a,
            h3, h3 a,
            h4, h4 a,
            h5, h5 a,
            h6, h6 a {
                font-family: '<?php echo esc_attr( $amazing_blog_font_family_h1_h6 ); ?>'!important;
            }
            <?php
            /*Main h1-h6 color*/
            if( !empty($amazing_blog_h1_h6_color) ){
            ?>
            h1, h1 a,
            h2, h2 a,
            h3, h3 a,
            h4, h4 a,
            h5, h5 a,
            h6, h6 a{
                color: <?php echo esc_attr( $amazing_blog_h1_h6_color );?> !important; /*#212121*/
            }
            <?php
            }
          /*Link color*/
            if( !empty($amazing_blog_link_color) ){
            ?>
            a,
            a > p,
            .posted-on a,
            .cat-links a,
            .tags-links a,
            .author a,
            .comments-link a,
            .edit-link a,
            .nav-links .nav-previous a,
            .nav-links .nav-next a,
            .page-links a {
                color: <?php echo esc_attr( $amazing_blog_link_color ); ?> !important; /*#212121*/
            }
            <?php
            }
            /*Link hover color*/
            if( !empty($amazing_blog_link_hover_color) ){
            ?>
            .site-title:hover,
            .site-title a:hover,
            .site-branding .site-title:hover,
            .site-branding .site-title a:hover,
            .main-navigation a:hover,
            .main-navigation li > a.mm-next:hover,
            .main-navigation li em.mm-counter:hover,
            a:active,
            a:hover,
            a:focus,
            .widget li a:hover,
            .posted-on a:hover,
            .cat-links a:hover,
            .tags-links a:hover,
            .author a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .edit-link a:focus,
            .nav-links .nav-previous a:hover,
            .nav-links .nav-next a:hover,
            .page-links a:hover,
            .page-links a:focus,
            .page-links > span:hover,
            .page-links > span:focus,
            .page-numbers:hover,
            .page-numbers:focus,
            .page-numbers.current,
            .evision-social-section.social-icon-only a:hover:before,
            .social-widget .evision-social-section a:hover,
            .site-content .date:hover,
            .site-content .slider-post .caption .date:hover,
            .highlight-post .block-container .block-overlay-content .caption a:hover,
            .site-content .block-overlay-content a:hover,
            .site-content .vmiddle-holder .date:hover,
            .site-footer .site-info a:hover {
                color: <?php echo esc_attr( $amazing_blog_link_hover_color ); ?> !important; /*#F4B758*/
            }
            <?php
            }
            /*Link hover color*/
            if( !empty($amazing_blog_link_hover_color) ){
            ?>
            article.sticky .block-holder {
                border-color: <?php echo esc_attr( $amazing_blog_link_hover_color ); ?> !important; /*#F4B758*/
            }
            <?php
            }
            /*header menu text*/
            if( !empty( $amazing_blog_site_identity_color ) ){
            ?>
            .site-title,
            .site-title a,
            .site-branding .site-title,
            .site-branding .site-title a,
            .site-description{
                color: <?php echo esc_attr( $amazing_blog_site_identity_color );?>!important;
            }
            <?php
            }
            /*main title color*/
            if( !empty($amazing_blog_post_thumb_title_color) ){
            ?>
            .large-feature-post h1 a{
                color: <?php echo esc_attr( $amazing_blog_post_thumb_title_color );?> !important; /*#ffffff*/
            }
            <?php
            }
            $amazing_blog_custom_css = $amazing_blog_customizer_all_values['amazing-blog-custom-css'];
            $amazing_blog_custom_css_output = '';
            if ( ! empty( $amazing_blog_custom_css ) ) {
                $amazing_blog_custom_css_output .= esc_textarea( $amazing_blog_custom_css ) ;
            }
            echo $amazing_blog_custom_css_output;/*escaping done above*/
            ?>
        </style>
    <?php
    }
endif;
add_action( 'wp_head', 'amazing_blog_wp_head' );
