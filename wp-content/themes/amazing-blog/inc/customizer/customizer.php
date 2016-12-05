<?php
/**
 * evision themes Theme Customizer
 *
 * @package eVision themes
 * @subpackage Amazing Blog
 * @since Amazing Blog 1.0.0
 */
/*Define Url for including css and js*/
if ( !defined( 'EVISION_CUSTOMIZER_URL' ) ) {
    define( 'EVISION_CUSTOMIZER_URL', trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/evision-customizer/' );
}
/*Define path for including php files*/
if ( !defined( 'EVISION_CUSTOMIZER_PATH' ) ) {
    define( 'EVISION_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'inc/frameworks/evision-customizer/' );
}

/*define constant for evision customizer name*/
if(!defined('EVISION_CUSTOMIZER_NAME')){
    define( 'EVISION_CUSTOMIZER_NAME', 'amazing_blog_options' );
}


/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since amazing_blog 1.0
 */
if ( ! function_exists( 'amazing_blog_reset_options' ) ) :
    function amazing_blog_reset_options( $reset_options ) {
        set_theme_mod( EVISION_CUSTOMIZER_NAME, $reset_options );
    }
endif;
/**
 * Customizer framework added.
 */
require get_template_directory() . '/inc/frameworks/evision-customizer/evision-customizer.php';

global $amazing_blog_panels;
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/******************************************
Modify Site Identity sections
 *******************************************/
require get_template_directory() . '/inc/customizer/site-identity/site-identity.php';

/******************************************
Modify Site Color sections
 *******************************************/
require get_template_directory() . '/inc/customizer/colors/general.php';

/******************************************
Added font setting options
 *******************************************/
require get_template_directory() . '/inc/customizer/font-setting/font-family.php';

/******************************************
Featured Post options
 *******************************************/
require get_template_directory() . '/inc/customizer/featured-post/post-options.php';

/******************************************
Featured Advertisement Section
 *******************************************/
require get_template_directory() . '/inc/customizer/featured-advertisement/featured-advertisement.php';

/******************************************
Theme options panel
 *******************************************/
require get_template_directory() . '/inc/customizer/theme-options/option-panel.php';

/*Resetting all Values*/
/**
 * Reset color settings to default
 * @param  $input
 *
 * @since amazing_blog 1.0
 */
$amazing_blog_customizer_defaults['amazing-blog-customizer-reset'] = '';
if ( ! function_exists( 'amazing_blog_customizer_reset' ) ) :
    function amazing_blog_customizer_reset( $input ) {
        if ( $input == 1 ) {
            global $amazing_blog_customizer_defaults;

            $amazing_blog_customizer_defaults['amazing-blog-customizer-reset'] = '';
            /*resetting fields*/
            amazing_blog_reset_options( $amazing_blog_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
$amazing_blog_sections['amazing-blog-customizer-reset'] =
    array(
        'priority'       => 999,
        'title'          => __( 'Reset All Options', 'amazing-blog' )
    );
$amazing_blog_settings_controls['amazing-blog-customizer-reset'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-customizer-reset'],
            'sanitize_callback'    => 'amazing_blog_customizer_reset',
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  __( 'Reset All Options', 'amazing-blog' ),
            'description'           =>  __( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects. ', 'amazing-blog' ),
            'section'               => 'amazing-blog-customizer-reset',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/******************************************
Removing section setting control
 *******************************************/
$amazing_blog_remove_sections =
    array(
        'header_image'
    );
$amazing_blog_remove_settings_controls =
    array(
        'header_textcolor','display_header_text'
    );
$amazing_blog_customizer_args = array(
    'panels'            => $amazing_blog_panels, /*always use key panels */
    'sections'          => $amazing_blog_sections,/*always use key sections*/
    'settings_controls' => $amazing_blog_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $amazing_blog_repeated_settings_controls,/*always use key sections*/
    'remove_sections'   => $amazing_blog_remove_sections,/*always use key remove_sections*/
    'remove_settings_controls' => $amazing_blog_remove_settings_controls/*always use key remove_settings_controls*/
);

/*registering panel section setting and control start*/
function amazing_blog_add_panels_sections_settings() {
    global $amazing_blog_customizer_args;
    return $amazing_blog_customizer_args;
}
add_filter( 'evision_customizer_panels_sections_settings', 'amazing_blog_add_panels_sections_settings' );
/*registering panel section setting and control end*/


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amazing_blog_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'amazing_blog_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amazing_blog_customize_preview_js() {
    wp_enqueue_script( 'amazing_blog_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'amazing_blog_customize_preview_js' );


/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since amazing_blog 1.0
 */
if ( ! function_exists( 'amazing_blog_get_all_options' ) ) :
    function amazing_blog_get_all_options( $merge_default = 0 ) {
        $amazing_blog_customizer_saved_values = evision_customizer_get_all_values( EVISION_CUSTOMIZER_NAME );
        if( 1 == $merge_default ){
            global $amazing_blog_customizer_defaults;
            if(is_array( $amazing_blog_customizer_saved_values )){
                $amazing_blog_customizer_saved_values = array_merge($amazing_blog_customizer_defaults, $amazing_blog_customizer_saved_values );
            }
            else{
                $amazing_blog_customizer_saved_values = $amazing_blog_customizer_defaults;
            }
        }
        return $amazing_blog_customizer_saved_values;
    }
endif;
