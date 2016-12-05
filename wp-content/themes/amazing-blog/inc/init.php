<?php
/**
 * evision themes init file
 *
 * @package eVision themes
 * @subpackage Amazing Blog
 * @since Amazing Blog 1.0.0
 */

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Include Functions
 */

require get_template_directory() . '/inc/function/category-list.php';

require get_template_directory() . '/inc/function/image-sizes.php';

require get_template_directory() . '/inc/function/breadcrumb.php';

/**
 * Include Hooks
 */
require get_template_directory().'/inc/hooks/init.php';

require get_template_directory() . '/inc/hooks/theme-switch.php';

require get_template_directory() . '/inc/hooks/wp-head.php';

require get_template_directory() . '/inc/hooks/header.php';

require get_template_directory() . '/inc/hooks/footer.php';

require get_template_directory() . '/inc/hooks/posts-navigation.php';

require get_template_directory() . '/inc/hooks/sidebar.php';

require get_template_directory() . '/inc/hooks/homepage-single-featured.php';

require get_template_directory() . '/inc/hooks/home-featured-add.php';

require get_template_directory() . '/inc/hooks/homepage-main-section.php';

require get_template_directory() . '/inc/hooks/front-page.php';

/**
 * Include sidebar widgets
 */
require get_template_directory() . '/inc/sidebar-widget-init.php';
