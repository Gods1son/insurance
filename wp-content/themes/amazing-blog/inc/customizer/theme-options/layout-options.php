<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-default-layout'] = 'right-sidebar';


$amazing_blog_sections['amazing-blog-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Layout Options', 'amazing-blog' ),
        'panel'          => 'amazing-blog-theme-options',
    );

/*layout-options option responsive lodader start*/
$amazing_blog_settings_controls['amazing-blog-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-default-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Layout', 'amazing-blog' ),
            'description'           =>  __( 'Please note that this setting can be override from individual post/page', 'amazing-blog' ),
            'section'               => 'amazing-blog-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'amazing-blog' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'amazing-blog' ),
                'no-sidebar' => __( 'No Sidebar', 'amazing-blog' )
            ),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );
