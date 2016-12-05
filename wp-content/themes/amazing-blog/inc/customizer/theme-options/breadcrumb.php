<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-enable-breadcrumb'] = 1;

$amazing_blog_sections['amazing-blog-breadcrumb-options'] =
    array(
        'priority'       => 50,
        'title'          => __( 'Breadcrumb Options', 'amazing-blog' ),
        'panel'          => 'amazing-blog-theme-options',
    );

$amazing_blog_settings_controls['amazing-blog-enable-breadcrumb'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-enable-breadcrumb'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Breadcrumb', 'amazing-blog' ),
            'section'               => 'amazing-blog-breadcrumb-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );
