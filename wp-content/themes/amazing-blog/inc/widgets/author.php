<?php
if ( ! class_exists( 'Amazing_blog_Author_Widget' ) ) :

    /**
     * Author Widget Class
     *
     * @since Amazing Blog 1.0.0
     *
     */
    class Amazing_blog_Author_Widget extends WP_Widget {

        function __construct() {
            parent::__construct(
                'amazing_blog_widget_author', // Base ID
                'Amazing Blog Author', // Name
                array( 'description' => __( 'Author Widget', 'amazing-blog' ) ) // Args
            );
        }


        function widget( $args, $instance ) {
            extract( $args );

            $title              = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            $image_url          = empty($instance['image_url']) ? '' : $instance['image_url'];
            $author_link           = empty($instance['author_link']) ? '' : $instance['author_link'];
            $author_name        = empty($instance['author_name']) ? '' : $instance['author_name'];
            $description        = empty($instance['description']) ? '' : $instance['description'];
            $custom_class       = apply_filters( 'widget_custom_class', empty( $instance['custom_class'] ) ? '' : $instance['custom_class'], $instance, $this->id_base );


            if ( $custom_class ) {
                $before_widget = str_replace('class="', 'class="'. $custom_class . ' ', $before_widget);
            }

            echo $before_widget;

            // Title
            if ( $title ) echo $before_title . $title . $after_title;
            //
            ?>
            <section class="widget">
                <div class="about-widget">
                    <?php
                    if ( ! empty( $image_url ) ) {
                        ?>
                        <div class="profile-thumb">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="profile image">
                        </div>
                        <?php
                    }
                    ?>
                    <h2 class="widget-title"><?php echo esc_html( $author_name ); ?></h2>
                    <p>
                        <?php echo esc_html( $description ); ?>
                    </p>
                    <?php if( !empty( $author_link ) ) {
                        ?>
                        <div class="btn-container">
                            <a href="<?php echo esc_url( $author_link ); ?>" class="button button-outline">
                                <?php _e('Read more','amazing-blog'); ?>
                            </a>
                        </div>
                        <?php
                    }?>

                </div>
            </section><!-- widget-list -->
            <?php
            //
            echo $after_widget;

        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title']        =   esc_html( strip_tags($new_instance['title']) );
            $instance['image_url']          =   esc_url( $new_instance['image_url'] );
            $instance['author_link']           =   esc_url( $new_instance['author_link'] );
            $instance['author_name']           =   esc_html( $new_instance['author_name'] );
            $instance['description']           =   esc_attr( $new_instance['description'] );
            $instance['custom_class']       =   esc_attr( $new_instance['custom_class'] );

            return $instance;
        }

        function form( $instance ) {

            //Defaults
            $instance = wp_parse_args( (array) $instance, array(
                'title'              => '',
                'image_url'          => '',
                'author_link'           => '',
                'author_name'           => '',
                'description'           => '',
                'custom_class'       => '',
            ) );
            $title              = esc_attr( $instance['title'] );
            $image_url          = esc_url( $instance['image_url'] );
            $author_link           = esc_url( $instance['author_link'] );
            $author_name           = esc_attr( $instance['author_name'] );
            $description           = esc_attr( $instance['description'] );
            $custom_class       = esc_attr( $instance['custom_class'] );

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <hr />
            <div>
                <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image URL:', 'amazing-blog' ); ?></label><br/>
                <input id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>" class="img" />
                <input type="button" class="select-img button button-primary" value="<?php _e('Upload', 'amazing-blog' ); ?>" data-uploader_title="<?php _e( 'Select Image', 'amazing-blog' ); ?>" data-uploader_button_text="<?php _e( 'Choose Image', 'amazing-blog' ); ?>" />
                <?php
                $full_image_url = '';
                if (! empty( $image_url ) ){
                    $full_image_url = $image_url;
                }
                $wrap_style = '';
                if ( empty( $full_image_url ) ) {
                    $wrap_style = ' style="display:none;" ';
                }
                ?>
                <div class="author-preview-wrap" <?php echo $wrap_style; ?>>
                    <img src="<?php echo esc_url( $full_image_url ); ?>" alt="<?php _e( 'Preview', 'amazing-blog' ); ?>" style="max-width: 100%;"  />
                </div><!-- .author-preview-wrap -->

            </div>
            <p>
                <label for="<?php echo $this->get_field_id( 'author_link' ); ?>"><?php _e( 'Author Link:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'author_link' ); ?>" name="<?php echo $this->get_field_name( 'author_link' ); ?>" type="text" value="<?php echo esc_attr( $author_link ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php _e( 'Author Name:', 'amazing-blog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'amazing-blog' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_attr( $description ); ?></textarea>
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

add_action( 'widgets_init', 'amazing_blog_loauthor_widgets' );

if ( ! function_exists( 'amazing_blog_loauthor_widgets' ) ) :

    /**
     * Load widgets
     *
     * @since Amazing Blog 1.0.0
     *
     */
    function amazing_blog_loauthor_widgets() {        // Author widget
        register_widget( 'Amazing_blog_Author_Widget' );
    }

endif;
