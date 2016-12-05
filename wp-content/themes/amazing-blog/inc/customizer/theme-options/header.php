<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-show-social'] = 1;

$amazing_blog_sections['amazing-blog-header-options'] =
    array(
        'priority'       => 55,
        'title'          => __( 'Header Options', 'amazing-blog' ),
        'panel'          => 'amazing-blog-theme-options'
    );

$amazing_blog_settings_controls['amazing-blog-show-social'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-show-social'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Social Menu', 'amazing-blog' ),
            'section'               => 'amazing-blog-header-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'description'           => '',
            'active_callback'       => ''
        )
    );
