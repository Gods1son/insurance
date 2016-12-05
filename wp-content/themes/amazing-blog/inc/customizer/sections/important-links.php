<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;

/**
 * Returns amazing_blog_important_links
 *
 * @since Amazing Blog 1.0.0
 */
if ( ! function_exists( 'amazing_blog_important_links' ) ) :
    function amazing_blog_important_links(){
        $important_links = array(
            'theme_docs' => array(
                'link'	=> esc_url( 'http://doc.evisionthemes.com/amazing-blog/' ),
                'text' 	=> __( 'Theme Documentation', 'amazing-blog' ),
            ),
            'theme_demo' => array(
                'link'	=> esc_url( 'http://demo.evisionthemes.com/amazing-blog/' ),
                'text' 	=> __( 'Theme Demo', 'amazing-blog' ),
            ),
            'theme_author' => array(
                'link'	=> esc_url( 'http://evisionthemes.com/' ),
                'text' 	=> __( 'Theme Author', 'amazing-blog' ),
            ),
            'support' => array(
                'link'	=> esc_url( 'https://wordpress.org/support/theme/amazing-blog' ),
                'text' 	=> __( 'Support', 'amazing-blog' ),
            ),
            'review' => array(
                'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/amazing-blog' ),
                'text' 	=> __( 'Review', 'amazing-blog' ),
            )
        );
        $important_links_text = '';
        foreach ( $important_links as $important_link) {
            $important_links_text .= '<p><a target="_blank" href="' . $important_link['link'] .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
        }
        return $important_links_text;
    }
endif;


$amazing_blog_sections['amazing-blog-imp-links'] =
    array(
        'priority'       => 200,
        'title'          => __( 'Important Links ', 'amazing-blog' ),
    );

/*creating setting control for amazing-blog-imp-links start*/
$amazing_blog_settings_controls['amazing-blog-imp-links-copyright'] =
    array(
        'control' => array(
            'label'                 =>  __( 'Copyright Text', 'amazing-blog' ),
            'section'               => 'amazing-blog-imp-links',
            'type'                  => 'message',
            'priority'              => 2,
            'description'           => amazing_blog_important_links(),
            'active_callback'       => ''
        )
    );
