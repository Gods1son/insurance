<?php
if ( ! class_exists( 'Amazing_Blog_Cols_Widget' ) ) :

    /**
     * Latest News Widget Class
     *
     * @since Amazing_Blog 1.0.0
     *
     */
    class Amazing_Blog_Cols_Widget extends WP_Widget {

        function __construct() {
            parent::__construct(
                'amazing_blog_widget_latest_news', // Base ID
                'Amazing Blog Latest News', // Name
                array( 'description' => __( 'Blog Widget with different options', 'amazing-blog' ) ) // Args
            );
        }


        function widget( $args, $instance ) {
            extract( $args );

            $title             = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base );
            $post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
            $post_number       = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 4;
            $custom_class      = apply_filters( 'widget_custom_class', empty( $instance['custom_class'] ) ? '' : $instance['custom_class'], $instance, $this->id_base );



            // Add Custom class
            if ( $custom_class ) {
                $before_widget = str_replace( 'class="', 'class="'. $custom_class . ' ', $before_widget );
            }

            echo $before_widget;

            // Title
            if ( $title ) echo $before_title . $title . $after_title;

            //
            ?>
            <?php
            $qargs = array(
                'posts_per_page' => $post_number,
                'no_found_rows'  => true,
                'ignore_sticky_posts'  => 1
            );
            if ( absint( $post_category ) > 0  ) {
                $qargs['cat'] = $post_category;
            }

            $all_posts = new WP_Query( $qargs );
            ?>
            <?php if ( ! empty( $all_posts ) ): ?>

                <div class="block-section block-holder">
                    <div class="content-bottom-post">
                        <div class="row">
                            <?php
                            /*Loop*/
                            if ( $all_posts->have_posts() ) {

                                while ( $all_posts->have_posts() ) {
                                    $all_posts->the_post();
                                    ?>
                                    <div class="column-md-12">
                                        <div class="block-container clearblock">
                                            <div class="thumb-holder">
                                                <div class="latest-news-thumb">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                        <?php
                                                        if ( has_post_thumbnail() ):
                                                            the_post_thumbnail( 'full' );
                                                        else:
                                                            echo '<img src="' . trailingslashit( get_template_directory_uri() ) . 'assets/img/no-image.jpg' . '" alt="" />';
                                                        endif ?>
                                                    </a>
                                                </div><!-- .latest-news-thumb -->
                                            </div>
                                            <?php
                                            $format = get_post_format();
                                            if ( false === $format ) {
                                                $format = 'standard';
                                            }
                                            ?>
                                            <div class="block-overlay-content <?php echo esc_attr( $format ); ?>">
                                                <span class="format-icon">
                                                    <i class="amazing-post-icon"></i>
                                                </span>
                                                <div class="vmiddle-holder">
                                                    <div class="vmiddle">
                                                        <span class="cat-list-holder">
                                                            <?php echo get_the_category_list( ",", "", get_the_id()); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <h3>
                                                <a href="<?php echo get_post_permalink(); ?>">
                                                    <?php the_title();?>
                                                </a>
                                            </h3>
                                            <div class="date">
                                                <?php echo esc_html( get_the_date() );?>
                                            </div>
                                                <?php the_excerpt(); ?>
                                            <div class="btn-container">
                                                <a class="button" href="<?php the_permalink();?>">
                                                    <?php _e( 'Read more.', 'amazing-blog' ); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            else {
                                // no posts found
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                            ?>

                        </div>
                    </div><!-- content-bottom-post -->
                </div><!-- block holder -->

                <?php wp_reset_postdata(); // Reset ?>

            <?php endif; ?>
            <?php
            //
            echo $after_widget;

        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title']            = strip_tags($new_instance['title']);
            $instance['post_category']    = absint( $new_instance['post_category'] );
            $instance['post_number']      = absint( $new_instance['post_number'] );
            $instance['custom_class']     = esc_attr( $new_instance['custom_class'] );

            return $instance;
        }

        function form( $instance ) {

            //Defaults
            $instance = wp_parse_args( (array) $instance, array(
                'title'            => '',
                'post_category'    => '',
                'post_number'      => 4,
                'custom_class'     => '',
            ) );
            $title            = strip_tags( $instance['title'] );
            $post_category    = absint( $instance['post_category'] );
            $post_number      = absint( $instance['post_number'] );
            $custom_class     = esc_attr( $instance['custom_class'] );

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_category' ); ?>"><?php _e( 'Category:', 'amazing-blog' ); ?></label>
                <?php
                $cat_args = array(
                    'orderby'         => 'name',
                    'hide_empty'      => 0,
                    'taxonomy'        => 'category',
                    'name'            => $this->get_field_name('post_category'),
                    'id'              => $this->get_field_id('post_category'),
                    'selected'        => $post_category,
                    'show_option_all' => __( 'All Categories','amazing-blog' ),
                );
                wp_dropdown_categories( $cat_args );
                ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e('Number of Posts:', 'amazing-blog' ); ?></label>
                <input class="widefat1" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="number" value="<?php echo esc_attr( $post_number ); ?>" min="1" style="max-width:50px;" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'custom_class' ); ?>"><?php _e( 'Custom Class:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'custom_class'); ?>" name="<?php echo $this->get_field_name( 'custom_class' ); ?>" type="text" value="<?php echo esc_attr( $custom_class ); ?>" />
            </p>
            <?php
        }


        function dropdown_post_columns( $args ){
            $defaults = array(
                'id'       => '',
                'name'     => '',
                'selected' => 0,
                'echo'     => 1,
            );

            $r = wp_parse_args( $args, $defaults );
            $output = '';

            $choices = array(
                '1' => sprintf( __( '%d Column','amazing-blog' ), 1 ),
                '2' => sprintf( __( '%d Columns','amazing-blog' ), 2 ),
            );

            if ( ! empty( $choices ) ) {

                $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
                foreach ( $choices as $key => $choice ) {
                    $output .= '<option value="' . esc_attr( $key ) . '" ';
                    $output .= selected( $r['selected'], $key, false );
                    $output .= '>' . esc_html( $choice ) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            if ( $r['echo'] ) {
                echo $output;
            }
            return $output;

        }

        function dropdown_image_sizes( $args ){
            $defaults = array(
                'id'       => '',
                'name'     => '',
                'selected' => 0,
                'echo'     => 1,
            );

            $r = wp_parse_args( $args, $defaults );
            $output = '';

            $choices = amazing_blog_get_image_sizes_options();

            if ( ! empty( $choices ) ) {

                $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
                foreach ( $choices as $key => $choice ) {
                    $output .= '<option value="' . esc_attr( $key ) . '" ';
                    $output .= selected( $r['selected'], $key, false );
                    $output .= '>' . esc_html( $choice ) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            if ( $r['echo'] ) {
                echo $output;
            }
            return $output;

        }

    }
    add_action( 'widgets_init', 'amazing_blog_load_widgets' );

    if ( ! function_exists( 'amazing_blog_load_widgets' ) ) :

        /**
         * Load widgets
         *
         * @since Amazing Blog 1.0.0
         *
         */
        function amazing_blog_load_widgets(){
            // Latest News widget
            register_widget( 'Amazing_Blog_Cols_Widget' );
        }

    endif;

endif;
