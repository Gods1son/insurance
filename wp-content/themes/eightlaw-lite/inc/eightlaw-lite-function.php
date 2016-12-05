<?php
/**
 * Custome Function for theme template
 *
 * @package 8Law Lite
 */
    function eightlaw_lite_web_layout($classes){
	    if(get_theme_mod('eightlaw_lite_webpage_layout','fullwidth') == 'boxed'){
	        $classes[]= 'boxed-layout';
	    }
        elseif(get_theme_mod('eightlaw_lite_webpage_layout','fullwidth') == 'fullwidth'){
            $classes[]='fullwidth';
        }
	    return $classes;
   }
   add_filter( 'body_class', 'eightlaw_lite_web_layout' );

   function eightlaw_lite_sidebar_layout($classes){
    global $post;
        if( is_404()){
		$classes[] = ' ';
		}elseif(is_singular() ){
		    $post_class = get_post_meta( $post -> ID, 'eightlaw_lite_sidebar_layout', true );
		    if(empty($post_class)){
			        $post_class = 'right-sidebar';
			        $classes[] = $post_class;

			    }
		        else{
			        $post_class = get_post_meta( $post -> ID, 'eightlaw_lite_sidebar_layout', true );
			        $classes[] = $post_class;
		    }
		}
		elseif(is_archive() ){
		    $post_class = get_theme_mod('eightlaw_lite_archive_setting_sidebar_option','right-sidebar');
		    if(empty($post_class)){
		        $post_class = 'right-sidebar';
		        $classes[] = $post_class;}
		    else{
		        $classes[] = $post_class;
		    }
		}
		else{
		$classes[] = 'right-sidebar';

		}
        return $classes;
   }
   add_filter('body_class', 'eightlaw_lite_sidebar_layout');


    function eightlaw_lite_bxslidercb(){
        $eightlaw_lite_slider_category = get_theme_mod('eightlaw_lite_slider_setting_category','');
		$eightlaw_lite_show_pager = (get_theme_mod('eightlaw_lite_slider_show_pager','no') == "yes") ? "true" : "false";
		$eightlaw_lite_show_controls = (get_theme_mod('eightlaw_lite_slider_show_controls','no') == "yes") ? "true" : "false";
		$eightlaw_lite_auto_transition = (get_theme_mod('eightlaw_lite_slider_show_transitions','no') == "yes") ? "true" : "false";
		$eightlaw_lite_slider_transition = get_theme_mod('eightlaw_lite_slider_transitions_type','horizontal');
		$eightlaw_lite_slider_speed = get_theme_mod('eightlaw_lite_slider_speed','1000');
		$eightlaw_lite_slider_pause = get_theme_mod('eightlaw_lite_slider_pause','4000');
		$eightlaw_lite_show_caption = get_theme_mod('eightlaw_lite_slider_show_caption','no');

        ?>
        <section id="main-slider" class="slider">
	       	<script type="text/javascript">
	            jQuery(function($){
					$('#main-slider .bx-slider').bxSlider({
						pager: <?php echo esc_attr($eightlaw_lite_show_pager); ?>,
						controls: <?php echo esc_attr($eightlaw_lite_show_controls); ?>,
						mode: '<?php echo esc_attr($eightlaw_lite_slider_transition); ?>',
						pause: <?php echo esc_attr($eightlaw_lite_slider_pause); ?>,
						speed: <?php echo esc_attr($eightlaw_lite_slider_speed); ?>,
						auto : <?php echo esc_attr($eightlaw_lite_auto_transition); ?>
					});
				});
	        </script>
	        <?php
			if( !empty($eightlaw_lite_slider_category)) :

				$loop = new WP_Query(array(
						'cat' => $eightlaw_lite_slider_category,
						'posts_per_page' => -1
					));
	                ?>
	            <div class="bx-slider">
	                <?php
					if($loop->have_posts()) :
						while($loop->have_posts()) : $loop-> the_post();
		                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );

		                     ?>
		                    <div class="slides">
								<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_url(get_the_title()); ?>" />
			                    <?php
			                    if($eightlaw_lite_show_caption == 'yes'){ ?>
			        				<div class="caption-wrapper">
				        				<div class="ed-container">
				        					<div class="slider-caption">
				        						<div class="mid-content">
				        							<div class="small-caption"> <?php the_title(); ?> </div>
				                                    <div class="slider-content">
				        	                            <?php echo eightlaw_lite_excerpt(get_the_content(),200);
				        	                            ?>
				                                	</div>
				        							<a href="<?php the_permalink(); ?>" class="slider-btn"> <?php echo esc_html(get_theme_mod('eightlaw_lite_slider_button_text',__('Details','eightlaw-lite'))); ?> </a>
				        						</div>
				        					</div>
				        				</div>
			        				</div>
			                    <?php
			                    } ?>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
					endif; ?>
	            </div>
			<?php  endif; ?>
		</section>
<?php

}
add_action('eightlaw_lite_bxslider','eightlaw_lite_bxslidercb', 10);

function eightlaw_lite_social_cb(){
	$facebooklink = esc_url( get_theme_mod('eightlaw_lite_social_facebook','#') );
	$twitterlink = esc_url( get_theme_mod('eightlaw_lite_social_twitter','#'));
	$google_pluslink = esc_url( get_theme_mod('eightlaw_lite_social_googleplus','#') );
	$youtubelink = esc_url( get_theme_mod('eightlaw_lite_social_youtube','#') );
	$pinterestlink = esc_url( get_theme_mod('eightlaw_lite_social_pinterest') );
	$linkedinlink = esc_url( get_theme_mod('eightlaw_lite_social_linkedin') );
	$vimeolink = esc_url( get_theme_mod('eightlaw_lite_social_vimeo') );
	$instagramlink = esc_url( get_theme_mod('eightlaw_lite_social_instagram') );
	$flickrlink = esc_url(get_theme_mod('eightlaw_lite_social_flicker'));
	$stumbleuponlink = esc_url(get_theme_mod('eightlaw_lite_social_stumbleupon'));
    $soundcloudlink = esc_url(get_theme_mod('eightlaw_lite_social_soundcloud'));
    $githublink = esc_url(get_theme_mod('eightlaw_lite_social_github'));
    $tumblrlink = esc_url(get_theme_mod('eightlaw_lite_social_tumbler'));
    $rsslink = esc_url(get_theme_mod('eightlaw_lite_social_rss'));
	$skypelink = get_theme_mod('eightlaw_lite_social_skype');

	?>
	<div class="social-icons ">
		<?php if(!empty($facebooklink)){ ?>
			<a href="<?php echo $facebooklink; ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
			<?php } ?>

		<?php if(!empty($twitterlink)){ ?>
		<a href="<?php echo $twitterlink; ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($google_pluslink)){ ?>
		<a href="<?php echo $google_pluslink; ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($youtubelink)){ ?>
		<a href="<?php echo $youtubelink; ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($pinterestlink)){ ?>
		<a href="<?php echo $pinterestlink; ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($linkedinlink)){ ?>
		<a href="<?php echo $linkedinlink; ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($vimeolink)){ ?>
		<a href="<?php echo $vimeolink; ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($instagramlink)){ ?>
		<a href="<?php echo $instagramlink; ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($flickrlink)){ ?>
		<a href="<?php echo $flickrlink; ?>" class="flickr" data-title="Flickr" target="_blank"><i class="fa fa-flickr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($stumbleuponlink)){ ?>
		<a href="<?php echo $stumbleuponlink; ?>" class="stumbleupon" data-title="Stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($soundcloudlink)){ ?>
		<a href="<?php echo $soundcloudlink; ?>" class="delicious" data-title="Delicious" target="_blank"><i class="fa fa-delicious"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($githublink)){ ?>
		<a href="<?php echo $githublink; ?>" class="github" data-title="Github" target="_blank"><i class="fa fa-github"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($tumblrlink)){ ?>
		<a href="<?php echo $tumblrlink; ?>" class="tumblr" data-title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($rsslink)){ ?>
		<a href="<?php echo $rsslink; ?>" class="rss" data-title="Rss" target="_blank"><i class="fa fa-rss"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($skypelink)){ ?>
		<a href="<?php echo esc_attr('skype:'.$skypelink); ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
		<?php } ?>
	</div>
<?php
}
add_action('eightlaw_lite_social','eightlaw_lite_social_cb', 10);

function eightlaw_lite_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-1'))
	$count++;

	if(is_active_sidebar('footer-2'))
	$count++;

	if(is_active_sidebar('footer-3'))
	$count++;

	if(is_active_sidebar('footer-4'))
	$count++;

	return $count;
}

function eightlaw_lite_excerpt( $eightlaw_lite_content , $eightlaw_lite_letter_count){
		$eightlaw_lite_letter_count = !empty($eightlaw_lite_letter_count) ? $eightlaw_lite_letter_count : 100 ;
		$eightlaw_lite_striped_content = strip_tags($eightlaw_lite_content);
		$eightlaw_lite_excerpt = mb_substr($eightlaw_lite_striped_content, 0 , $eightlaw_lite_letter_count);
		if(strlen($eightlaw_lite_striped_content) > strlen($eightlaw_lite_excerpt)){
			$eightlaw_lite_excerpt.= "...";
		}
		return $eightlaw_lite_excerpt;
	}

//Dynamic styles on header
function eightlaw_lite_cta_styles_scripts(){
	$cta_bg_v = get_theme_mod('eightlaw_lite_callto_bkgimage');

	echo "<style type='text/css' media='all'>";
    if(!empty($cta_bg_v)){
    $cta_bg =   '.call-to-action {background: url("'.esc_url(get_theme_mod('eightlaw_lite_callto_bkgimage')).'") no-repeat scroll center top rgba(0, 0, 0, 0);';
    echo $cta_bg;
    }
   	echo "</style>\n";

}

add_action('wp_head','eightlaw_lite_cta_styles_scripts');



/** Plugin Install ***/
function eightlaw_lite_required_plugins() {

/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(
    array(
        'name'      => '8 Degree Coming Soon Page',
        'slug'      => '8-degree-coming-soon-page',
        'required'  => false,
        'force_activation'   => false,
        'force_deactivation' => true,
        ),
    array(
        'name'      => '8 Degree Notification Bar',
        'slug'      => '8-degree-notification-bar',
        'required'  => false,
        'force_activation'   => false,
        'force_deactivation' => true,
        ),
    );

    /**
    * Array of configuration settings. Amend each line as needed.
    * If you want the default strings to be available under your own theme domain,
    * leave the strings uncommented.
    * Some of the strings are added into a sprintf, so see the comments at the
    * end of each line for what each argument will be.
    */
    $config = array(
        'default_path' => '',
        'menu'         => 'eightlaw_lite-install-plugins',
        'has_notices'  => true,
        'dismissable'  => false,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'eightlaw-lite' ),
            'menu_title'                      => __( 'Install Plugins', 'eightlaw-lite' ),
            'installing'                      => __( 'Installing Plugin: %s', 'eightlaw-lite' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'eightlaw-lite' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','eightlaw-lite' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','eightlaw-lite' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','eightlaw-lite' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','eightlaw-lite' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','eightlaw-lite' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','eightlaw-lite' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','eightlaw-lite' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','eightlaw-lite' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','eightlaw-lite' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','eightlaw-lite' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'eightlaw-lite' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'eightlaw-lite' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'eightlaw-lite' ),
            'nag_type'                        => 'updated'
            )
);

tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'eightlaw_lite_required_plugins' );



