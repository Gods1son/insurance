<?php
/**
 * Template part for displaying posts.
 *
 * @package 8Law Lite
 */
?>
<?php
$cat_team = get_theme_mod('eightlaw_lite_teammember_setting_category','');
$cat_testimonial = get_theme_mod('eightlaw_lite_testimonial_setting_category','');
$cat_blog = get_theme_mod('eightlaw_lite_blog_setting_category');
$layout_blog = get_theme_mod('eightlaw_lite_archive_setting_blog_layout','large');
$layout_team_member = get_theme_mod('eightlaw_lite_archive_setting_teammember_layout','grid');
$layout_testimonial = get_theme_mod('eightlaw_lite_archive_setting_testimonial_layout','grid');
$layout_archive = get_theme_mod('eightlaw_lite_archive_setting_archive_layout','large');
$read_more_blog      =   get_theme_mod('eightlaw_lite_archive_setting_blog_readmore',__('Read More','eightlaw-lite'));
$read_more_archive      =   get_theme_mod('eightlaw_lite_archive_setting_archive_readmore',__('Read More','eightlaw-lite'));
$read_more_team      =   get_theme_mod('eightlaw_lite_archive_setting_teammember_readmore',__('Read More','eightlaw-lite'));
$read_more_testimonial	= 	get_theme_mod('eightlaw_lite_archive_setting_testimonial_readmore',__('Read More','eightlaw-lite'));

?>


<?php if(!empty($cat_team) && is_category() && is_category($cat_team)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-team">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
        		<div class="cat-team-image">
        		<?php
				if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eightlaw-lite-feature-image', false );
				?>
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
				<?php } else{ ?>
                            <img src="<?php echo esc_url(get_template_directory_uri().'/images/team-fallback-367-413.jpg'); ?>" alt="<?php the_title_attribute(); ?>" />
                        <?php } ?>
				</div>
				<div class="cat-team-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
				<?php
				?>
				    <p><?php echo esc_attr(eightlaw_lite_excerpt( get_the_excerpt() , 350 )) ?></p>
				    <a href="<?php the_permalink(); ?>" class="cat-team-more bttn"><?php echo esc_html($read_more_team);?></a>
				</div>


	</div><!-- .entry-content -->


</article>

<?php
elseif(!empty($cat_testimonial) && is_category() && is_category($cat_testimonial)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-testimonial">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">

		        <div class="cat-testimonial-image">
		         <?php
		            if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eightlaw-lite-feature-image', false );
				?>

				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
				<?php } else{?>
                            <img src="<?php echo esc_url(get_template_directory_uri().'/images/testimonial-fallback.jpg'); ?>" alt="<?php the_title_attribute(); ?>" />

				<?php }?>
				</div>
				<div class="cat-testimonial-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
				    <p><?php echo esc_attr(eightlaw_lite_excerpt( get_the_excerpt() , 350)) ?></p>
				    <a href="<?php the_permalink(); ?>" class="cat-testimonial-more bttn"><?php echo esc_html($read_more_testimonial);?></a>
				</div>


	</div><!-- .entry-content -->
</article>
<?php
elseif(!empty($cat_blog) && is_category() && is_category($cat_blog)):

	?>
<article id="post-<?php the_ID(); ?>" class="cat-blog">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if($layout_blog=='large'): ?>
        		<div class="cat-blog-image">
        		<?php
				if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
				?>
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
				<?php } ?>
				</div>
				<div class="cat-blog-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
				<?php
				?>
				    <p><?php echo eightlaw_lite_excerpt( get_the_excerpt() , 250 ) ?></p>
				    <a href="<?php the_permalink(); ?>" class="cat-blog-more bttn"><?php echo esc_html($read_more_blog);?></a>
				</div>
        <?php elseif($layout_blog=='medium'): ?>
        		<div class="cat-blog-image">
        		<?php
				if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eightlaw-lite-blog-medium', false );
				?>
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
				<?php } ?>
				</div>
				<div class="cat-blog-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
				<?php
				?>
				    <p><?php echo eightlaw_lite_excerpt( get_the_excerpt() , 250 ); ?></p>
				    <a href="<?php the_permalink(); ?>" class="cat-blog-more bttn"><?php echo esc_html($read_more_blog); ?></a>
				</div>



        <?php
        else:
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eightlaw-lite-blog-medium', false );
			?>
				<div class="cat-blog-image">
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
				<?php } ?>
				</div>
				<div class="cat-blog-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
				<?php
				?>
				    <p><?php echo eightlaw_lite_excerpt( get_the_excerpt() , 450 ) ?></p>
				    <a href="<?php the_permalink(); ?>" class="cat-blog-more bttn"><?php echo esc_html($read_more_blog);?></a>
				</div>


        <?php endif;?>
	</div><!-- .entry-content -->


</article>

<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_html($read_more_archive); ?></a>
	</div><!-- .entry-summary -->

	<?php else : ?>
	<div class="entry-content">
		<?php
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eightlaw-lite-blog-medium', false );
			?>
			<div class="cat-archive-image">
			<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
			</div>
			<?php } ?>
			<div class="cat-archive-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
			<?php
			?>
			 	<p><?php echo eightlaw_lite_excerpt( get_the_excerpt() , 350 ) ?></p>
			 	<a href="<?php the_permalink(); ?>" class="cat-archive-more bttn"><?php echo esc_html($read_more_archive);?></a>
			 </div>

	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
<?php endif; ?>
