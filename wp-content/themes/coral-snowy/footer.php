<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package coral-snowy
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer grid-parent grid-100 tablet-grid-100 mobile-grid-100" role="contentinfo">
		<div class="egrid <?php coral_snowy_copyright_class(); ?>" id="footer-widget-copyright">
			<?php if ( is_active_sidebar( 'footer-copyright' ) ) dynamic_sidebar( 'footer-copyright' ); ?>
		</div>
		<div class="<?php coral_snowy_footer_link_class(); ?>">
			<a id="designer" class="alignright" href="http://www.coralthemes.com/"><?php _e( 'WordPress theme by CoralThemes', 'coral-snowy' ) ?></a>
		</div>

	</footer><!-- #colophon -->
  </div><!-- #gcontainer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
