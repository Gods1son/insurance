<?php
global $amazing_blog_sections;
global $amazing_blog_settings_controls;
global $amazing_blog_repeated_settings_controls;
global $amazing_blog_customizer_defaults;

/*defaults values*/
$amazing_blog_customizer_defaults['amazing-blog-copyright-text'] = __('Copyright &copy; eVisionThemes','amazing-blog');

$amazing_blog_sections['amazing-blog-footer-options'] =
    array(
        'priority'       => 60,
        'title'          => __( 'Footer Options', 'amazing-blog' ),
        'panel'          => 'amazing-blog-theme-options'
    );


$amazing_blog_settings_controls['amazing-blog-copyright-text'] =
    array(
        'setting' =>     array(
            'default'              => $amazing_blog_customizer_defaults['amazing-blog-copyright-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Copyright Text', 'amazing-blog' ),
            'section'               => 'amazing-blog-footer-options',
            'type'                  => 'text_html',
            'priority'              => 20,
        )
    );
