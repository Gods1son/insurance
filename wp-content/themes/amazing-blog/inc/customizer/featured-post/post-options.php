<?php
global $amazing_blog_panels;
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-fp-enable'] = 1;
$amazing_blog_customizer_defaults['amazing-blog-fp'] = -1;

/*fs options*/
$amazing_blog_sections['amazing-blog-fp-options'] =
    array(
        'priority'       => 150,
        'title'          => __( 'Home/Front Featured Post', 'amazing-blog' )
    );

$amazing_blog_settings_controls['amazing-blog-fp-enable'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-fp-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Featured Post', 'amazing-blog' ),
            'section'               => 'amazing-blog-fp-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$amazing_blog_settings_controls['amazing-blog-fp'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-fp']
        ),
        'control' => array(
            'label'                 =>  __( 'Select a Post', 'amazing-blog' ),
            'section'               => 'amazing-blog-fp-options',
            'type'                  => 'post_dropdown',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );
