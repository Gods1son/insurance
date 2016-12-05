<?php
/**
 * @package 8Law Lite
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'eightlaw-lite' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php eightlaw_lite_entry_footer(); ?>
		</footer><!-- .entry-footer -->
</article><!-- #post-## -->
