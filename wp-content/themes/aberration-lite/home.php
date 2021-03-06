<?php
/**
 * A template for the blog home page.
 *
 * This template is used when a home.php file exists, otherwise it uses the index.php template.
 * This template will load your blog post summaries.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Senses
 */

get_header(); ?>

<div id="primary" class="content-area">
        <main id="main" class="site-main" itemprop="mainEntityOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php

                  $blogstyle = esc_attr(get_theme_mod( 'blog_style', 'top-featured-right' ) );
                  $blogstyleclass = esc_attr(get_theme_mod( 'blog_style', 'top-featured-right' ));

                        switch ($blogstyle) {

                            // left featured image no sidebar columns
                            case "left-featured" :
                                echo '<div class="container"><div class="row"><div class="col-md-12 ' . $blogstyleclass . '">';
                                    get_template_part( 'loop' );
                                    aberration_lite_blog_pagination();
                                echo '</div></div></div>';
                            break;

                            // right featured image no sidebar columns
                            case "right-featured" :
                                echo '<div class="container"><div class="row"><div class="col-md-12 ' . $blogstyleclass . '">';
                                    get_template_part( 'loop' );
                                    aberration_lite_blog_pagination();
                                echo '</div></div></div>';
                            break;

                            // Top featured image with a left column
                            case "top-featured-left" :
                                echo '<div class="container"><div class="row"><div class="col-md-8 col-md-push-4 ' . $blogstyleclass . '">';
                                    get_template_part( 'loop' );
                                    aberration_lite_blog_pagination();
                                echo '</div><div class="col-md-4 col-md-pull-8">';
                                    get_sidebar( 'left' );
                                echo '</div></div></div>';
                            break;

                            // Top featured image with a right column
                            case "top-featured-right" :
                                echo '<div class="container"><div class="row"><div class="col-md-8 ' . $blogstyleclass . '">';
                                    get_template_part( 'loop' );
                                    aberration_lite_blog_pagination();
                                echo '</div><div class="col-md-4">';
                                    get_sidebar( 'right' );
                                echo '</div></div></div>';
                            break;

                            // Top featured image with a left and right column
                            case "top-left-right-featured" :
                                echo '<div class="container"><div class="row"><div class="col-md-6 col-md-push-3 ' . $blogstyleclass . '">';
                                    get_template_part( 'loop' );
                                    aberration_lite_blog_pagination();
                                echo '</div><div class="col-md-3 col-md-pull-6">';
                                    get_sidebar( 'left' );
                                echo '</div><div class="col-md-3">';
									get_sidebar( 'right' );
								echo '</div></div></div>';
                            break;

                            // top featured image centered with no sidebar columns
                            case "top-featured-centered" :
                                echo '<div class="container"><div class="row"><div class="col-md-12 ' . $blogstyleclass . '">';
                                    get_template_part( 'loop' );
                                    aberration_lite_blog_pagination();
                                echo '</div></div></div>';
                            break;

                        }

                    ?>

        </main>
</div>

<?php get_footer(); ?>
