<?php
global $amazing_blog_panels;
/*creating panel for fonts-setting*/
$amazing_blog_panels['amazing-blog-theme-options'] =
    array(
        'title'          => __( 'Theme Options', 'amazing-blog' ),
        'priority'       => 200
    );

/*layout options */
require get_template_directory() . '/inc/customizer/theme-options/layout-options.php';

/*header options */
require get_template_directory() . '/inc/customizer/theme-options/header.php';

/*footer options */
require get_template_directory() . '/inc/customizer/theme-options/footer.php';

/*custom css options */
require get_template_directory() . '/inc/customizer/theme-options/custom-css.php';

/*breadcrumb options */
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';
