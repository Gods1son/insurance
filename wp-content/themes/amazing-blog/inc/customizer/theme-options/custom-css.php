<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-custom-css'] = '';

$amazing_blog_sections['amazing-blog-custom-css'] =
    array(
        'priority'       => 120,
        'title'          => __( 'Custom CSS', 'amazing-blog' ),
        'panel'          => 'amazing-blog-theme-options'
    );

$amazing_blog_settings_controls['amazing-blog-custom-css'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-custom-css'],
        ),
        'control' => array(
            'label'                 =>  __( 'Custom CSS', 'amazing-blog' ),
            'section'               => 'amazing-blog-custom-css',
            'type'                  => 'textarea',
            'priority'              => 40,
        )
    );
