<?php
global $amazing_blog_panels;
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-fa-image'] = '';
$amazing_blog_customizer_defaults['amazing-blog-fa-link'] = '';
$amazing_blog_customizer_defaults['amazing-blog-fa-link-new-window'] = 1;

/*creating panel for fonts-setting*/
$amazing_blog_sections['amazing-blog-fa-section'] =
    array(
        'title'          => __( 'Home/Front Featured Advertisement', 'amazing-blog' ),
        'priority'       => 170
    );

/*slider number options */
$amazing_blog_settings_controls['amazing-blog-fa-image'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-fa-image']
        ),
        'control' => array(
            'label'                 =>  __( 'Advertisement Image', 'amazing-blog' ),
            'section'               => 'amazing-blog-fa-section',
            'type'                  => 'image',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


/*select another post*/
$amazing_blog_settings_controls['amazing-blog-fa-link'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-fa-link']
        ),
        'control' => array(
            'label'                 =>  __( 'Advertisement Link', 'amazing-blog' ),
            'section'               => 'amazing-blog-fa-section',
            'type'                  => 'url',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

/*enable fa options */
$amazing_blog_settings_controls['amazing-blog-fa-link-new-window'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-fa-link-new-window']
        ),
        'control' => array(
            'label'                 =>  __( 'Open In New Window', 'amazing-blog' ),
            'section'               => 'amazing-blog-fa-section',
            'type'                  => 'checkbox',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );
