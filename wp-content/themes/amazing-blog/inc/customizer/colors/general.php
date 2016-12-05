<?php
global $amazing_blog_panels;
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*creating panel for general*/
$amazing_blog_panels['amazing-blog-colors'] =
    array(
        'title'          => __( 'Colors', 'amazing-blog' ),
        'description'    => __( 'Customize colors of you awesome site', 'amazing-blog' ),
        'priority'       => 42,
    );

/*Default color*/
$amazing_blog_sections['colors'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Basic Colors Options', 'amazing-blog' ),
        'panel'          => 'amazing-blog-colors',
    );

/*Amazing Blog colors*/
$amazing_blog_sections['amazing-blog-colors'] =
    array(
        'priority'       => 50,
        'title'          => __( 'Amazing Colors Options', 'amazing-blog' ),
        'panel'          => 'amazing-blog-colors',
    );
/*Amazing Blog colors*/
$amazing_blog_sections['amazing-blog-colors-reset'] =
    array(
        'priority'       => 60,
        'title'          => __( 'Amazing Colors Reset', 'amazing-blog' ),
        'panel'          => 'amazing-blog-colors',
    );
/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-h1-h6-color'] = '#212121';
$amazing_blog_customizer_defaults['amazing-blog-link-color'] = '#30373b';
$amazing_blog_customizer_defaults['amazing-blog-link-hover-color'] = '#F4B758';
$amazing_blog_customizer_defaults['amazing-blog-site-identity-color'] = '#30373b';
$amazing_blog_customizer_defaults['amazing-blog-post-thumb-title-color'] = '#ffffff';


$amazing_blog_customizer_defaults['amazing-blog-color-reset'] = '';


/**
 * Reset color settings to default
 * @param  $input
 *
 * @since amazing_blog 1.0
 */
if ( ! function_exists( 'amazing_blog_color_reset' ) ) :
    function amazing_blog_color_reset( $input ) {
        if ( $input == 1 ) {
            global $amazing_blog_customizer_defaults;

            /*getting fields*/
            $amazing_blog_customizer_saved_values = amazing_blog_get_all_options();

            /*setting fields */
            $amazing_blog_customizer_saved_values['amazing-blog-h1-h6-color'] = $amazing_blog_customizer_defaults['amazing-blog-h1-h6-color'];
            $amazing_blog_customizer_saved_values['amazing-blog-link-color'] = $amazing_blog_customizer_defaults['amazing-blog-link-color'];
            $amazing_blog_customizer_saved_values['amazing-blog-link-hover-color'] = $amazing_blog_customizer_defaults['amazing-blog-link-hover-color'];
            $amazing_blog_customizer_saved_values['amazing-blog-site-identity-color'] = $amazing_blog_customizer_defaults['amazing-blog-site-identity-color'];
            $amazing_blog_customizer_saved_values['amazing-blog-post-thumb-title-color'] = $amazing_blog_customizer_defaults['amazing-blog-post-thumb-title-color'];

            $amazing_blog_customizer_defaults['amazing-blog-color-reset'] = '';

            /*resetting fields*/
            amazing_blog_reset_options( $amazing_blog_customizer_saved_values );
        }
        else {
            return '';
        }
    }
endif;

$amazing_blog_settings_controls['amazing-blog-site-identity-color'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-site-identity-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Site Identity Color', 'amazing-blog' ),
            'description'           =>  __( 'Site title and tagline color', 'amazing-blog' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 11,
            'active_callback'       => ''
        )
    );

$amazing_blog_settings_controls['amazing-blog-h1-h6-color'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-h1-h6-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Heading (H1-H6) Color', 'amazing-blog' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 32,
            'active_callback'       => ''
        )
    );

$amazing_blog_settings_controls['amazing-blog-link-color'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-link-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Link Color', 'amazing-blog' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 32,
            'active_callback'       => ''
        )
    );

$amazing_blog_settings_controls['amazing-blog-link-hover-color'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-link-hover-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Link Hover Color', 'amazing-blog' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 32,
            'active_callback'       => ''
        )
    );

$amazing_blog_settings_controls['amazing-blog-post-thumb-title-color'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-post-thumb-title-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Feature Post Title Color', 'amazing-blog' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 32,
            'active_callback'       => ''
        )
    );

/*Amazing Blog colors setting controls*/
$amazing_blog_settings_controls['amazing-blog-color-reset'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-color-reset'],
            'sanitize_callback'    => 'amazing_blog_color_reset',
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  __( 'Reset', 'amazing-blog' ),
            'description'           =>  __( 'Caution: Reset all above color settings to default. Refresh the page after save to view the effects. ', 'amazing-blog' ),
            'section'               => 'amazing-blog-colors-reset',
            'type'                  => 'checkbox',
            'priority'              => 220,
            'active_callback'       => ''
        )
    );
