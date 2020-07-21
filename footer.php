<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agility_WP
 */

?>
</div><!-- .row -->
</div><!-- .container -->

<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
	<div class="footer-widget">
		<div class="container">
			<div class="widget-area row">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div><!-- #secondary -->
		</div>
	</div>
<?php endif; ?>

<footer id="colophon" class="site-footer">
	<div class="container">
			<div class="site-info col-12">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'awp' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'awp' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'awp' ), 'awp', '<a href="https://lucenthemes.com/">Luncent Themes</a>' );
			?>
		</div><!-- .site-info -->
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
