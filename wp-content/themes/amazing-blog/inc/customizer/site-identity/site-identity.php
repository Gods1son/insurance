<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-logo'] = '';
$amazing_blog_customizer_defaults['amazing-blog-title-tagline-message'] = sprintf( __( '%s If you do not have a logo %s', 'amazing-blog' ), '<span class="customize-control-title">','</span>' );
$amazing_blog_customizer_defaults['amazing-blog-enable-title'] = 1;
$amazing_blog_customizer_defaults['amazing-blog-enable-tagline'] = 1;

/*creating setting control*/
$amazing_blog_settings_controls['amazing-blog-logo'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-logo'],
        ),
        'control' => array(
            'label'                 =>  __( 'Logo', 'amazing-blog' ),
            'section'               => 'title_tagline',
            'type'                  => 'image',
            'priority'              => 70,
            'description'           =>  __( 'Recommended logo size 165*50', 'amazing-blog' ),
            'active_callback'       => ''
        )
    );

/*enable option for enable tagline in header*/
$amazing_blog_settings_controls['amazing-blog-title-tagline-message'] =
    array(
        'control' => array(
            'description'           =>  $amazing_blog_customizer_defaults['amazing-blog-title-tagline-message'],
            'section'               => 'title_tagline',
            'type'                  => 'message',
            'priority'              => 75,
            'active_callback'       => ''
        )
    );
/*enable option for enable tagline in header*/
$amazing_blog_settings_controls['amazing-blog-enable-title'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-enable-title'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Title', 'amazing-blog' ),
            'section'               => 'title_tagline',
            'type'                  => 'checkbox',
            'priority'              => 80,
            'active_callback'       => ''
        )
    );
$amazing_blog_settings_controls['amazing-blog-enable-tagline'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-enable-tagline'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Tagline', 'amazing-blog' ),
            'section'               => 'title_tagline',
            'type'                  => 'checkbox',
            'priority'              => 90,
            'active_callback'       => ''
        )
    );
