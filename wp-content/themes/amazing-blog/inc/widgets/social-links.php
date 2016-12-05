<?php
if ( ! class_exists( 'Amazing_blog_Social_Links_Widget' ) ) :

    /**
     * Author Widget Class
     *
     * @since Amazing Blog 1.0.0
     *
     */
    class Amazing_blog_Social_Links_Widget extends WP_Widget {

        function __construct() {
            parent::__construct(
                'amazing_blog_social_links', // Base ID
                'Amazing Social Widget', // Name
                array( 'description' => __( 'Social Widget Link', 'amazing-blog' ) ) // Args
            );
        }


        function widget( $args, $instance ) {
            extract( $args );

            $title              = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            $facebook_link        = empty($instance['facebook_link']) ? '' : $instance['facebook_link'];
            $twitter_link        = empty($instance['twitter_link']) ? '' : $instance['twitter_link'];
            $linkedin_link        = empty($instance['linkedin_link']) ? '' : $instance['linkedin_link'];
            $custom_class       = apply_filters( 'widget_custom_class', empty( $instance['custom_class'] ) ? '' : $instance['custom_class'], $instance, $this->id_base );


            if ( $custom_class ) {
                $before_widget = str_replace('class="', 'class="'. $custom_class . ' ', $before_widget);
            }

            echo $before_widget;

            ?>
            <section class="widget">
                <div class="social-widget">
                    <h2 class="widget-title">
                        <?php
                        // Title
                        if ( $title ) echo $before_title . $title . $after_title;
                        //
                        ?>
                    </h2>
                    <div class="evision-social-section">
                        <ul>
                            <?php if( !empty( $facebook_link ) ){
                                ?>
                                <li><a href="<?php echo esc_url( $facebook_link ); ?>"></a></li>
                                <?php
                            }?>
                            <?php if( !empty( $twitter_link ) ){
                                ?>
                                <li><a href="<?php echo esc_url( $twitter_link ); ?>"></a></li>
                                <?php
                            }?>
                            <?php if( !empty( $linkedin_link ) ){
                                ?>
                                <li><a href="<?php echo esc_url( $linkedin_link ); ?>"></a></li>
                                <?php
                            }?>
                        </ul>
                    </div>
                </div>
            </section><!-- widget-list -->
            <?php
            //
            echo $after_widget;

        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title']        =   esc_html( strip_tags($new_instance['title']) );
            $instance['facebook_link']           =   esc_url( $new_instance['facebook_link'] );
            $instance['twitter_link']           =   esc_url( $new_instance['twitter_link'] );
            $instance['linkedin_link']           =   esc_url( $new_instance['linkedin_link'] );
            $instance['author_name']           =   esc_html( $new_instance['author_name'] );
            $instance['custom_class']       =   esc_attr( $new_instance['custom_class'] );

            return $instance;
        }

        function form( $instance ) {

            //Defaults
            $instance = wp_parse_args( (array) $instance, array(
                'title'              => '',
                'facebook_link'           => '',
                'twitter_link'           => '',
                'linkedin_link'           => '',
                'custom_class'       => '',
            ) );
            $title              = esc_attr( $instance['title'] );
            $facebook_link           = esc_url( $instance['facebook_link'] );
            $twitter_link           = esc_url( $instance['twitter_link'] );
            $linkedin_link           = esc_url( $instance['linkedin_link'] );
            $custom_class       = esc_attr( $instance['custom_class'] );

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <hr />
            <p>
                <label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php _e( 'Facebook Link:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" type="url" value="<?php echo esc_url( $facebook_link ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>"><?php _e( 'Twitter Link:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" type="url" value="<?php echo esc_url( $twitter_link ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'linkedin_link' ); ?>"><?php _e( 'Linkedin Link:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin_link' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_link' ); ?>" type="url" value="<?php echo esc_url( $linkedin_link ); ?>" />
            </p>
            <hr />
            <p>
                <label for="<?php echo $this->get_field_id( 'custom_class' ); ?>"><?php _e( 'Custom Class:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'custom_class' ); ?>" name="<?php echo $this->get_field_name( 'custom_class' ); ?>" type="text" value="<?php echo esc_attr( $custom_class ); ?>" />
            </p>
            <?php
        }

    }

endif;

add_action( 'widgets_init', 'amazing_blog_socials_widgets' );

if ( ! function_exists( 'amazing_blog_socials_widgets' ) ) :

    /**
     * Load widgets
     *
     * @since Amazing Blog 1.0.0
     *
     */
    function amazing_blog_socials_widgets() {
        register_widget( 'Amazing_blog_Social_Links_Widget' );
    }

endif;
