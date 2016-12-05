<?php
global $amazing_blog_panels;
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*creating panel for fonts-setting*/
$amazing_blog_panels['amazing-blog-fonts'] =
    array(
        'title'          => __( 'Font Setting', 'amazing-blog' ),
        'priority'       => 43
    );

/*font array*/
global $amazing_blog_google_fonts;
$amazing_blog_google_fonts = array(
    'Arapey:400,400italic' => 'Arapey',
    'Open+Sans:400,400italic,600,700' => 'Open Sans',
    'Roboto:400,500,300,700,400italic' => 'Roboto',
    'Lato:400,300,400italic,900,700' => 'Lato',
    'Slabo+27px' => 'Slabo 27px',
    'Oswald:400,300,700' => 'Oswald',
    'Roboto+Condensed:400,300,400italic,700' => 'Roboto Condensed',
    'Source+Sans+Pro:400,400italic,600,900,300' => 'Source Sans Pro',
    'Lora:400,400italic,700,700italic' => 'Lora',
    'Montserrat:400,700' => 'Montserrat',
    'PT+Sans:400,400italic,700' => 'PT Sans'
);

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-font-family-site-identity'] = 'Arapey:400,400italic';
$amazing_blog_customizer_defaults['amazing-blog-font-family-h1-h6'] = 'Open+Sans:400,400italic,600,700';


/*section*/
$amazing_blog_sections['amazing-blog-family'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Font Family', 'amazing-blog' ),
        'panel'          => 'amazing-blog-fonts',
    );

/*setting - controls*/
$amazing_blog_settings_controls['amazing-blog-font-family-site-identity'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-font-family-site-identity'],
            'sanitize_callback'    => 'esc_attr'
        ),
        'control' => array(
            'label'                 => __( 'Site Identity Font Family', 'amazing-blog' ),
            'description'           => __( 'Site title and tagline font family', 'amazing-blog' ),
            'section'               => 'amazing-blog-family',
            'type'                  => 'select',
            'choices'               => $amazing_blog_google_fonts,
            'priority'              => 2,
            'active_callback'       => ''
        )
    );

$amazing_blog_settings_controls['amazing-blog-font-family-h1-h6'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-font-family-h1-h6'],
            'sanitize_callback'    => 'esc_attr'
        ),
        'control' => array(
            'label'                 => __( 'H1-H6 Font Family', 'amazing-blog' ),
            'section'               => 'amazing-blog-family',
            'type'                  => 'select',
            'choices'               => $amazing_blog_google_fonts,
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
