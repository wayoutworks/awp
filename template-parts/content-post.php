<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agility_WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-meta row">
	<div class="author col-sm-4">
		<img src="<?php echo esc_url( get_avatar_url( 'ID' ) ); ?>" />
		<div class="author-name">
			<p>Author</p>
			<span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a></span>
		</div>
	</div>
	<div class="col-sm-4">
		<p>Published On</p>
		<p><?php echo get_the_date(); ?></p>
	</div>
	<div class="col-sm-4">
		<?php /* translators: 1: number of categories. */ ?>
		<p><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'awp' ), number_format_i18n( get_comments_number() ) ); ?></p>
		<span><a href="<?php the_permalink(); ?>#commentform">Join The Conversation</a></span>
	</div>
</div><!-- .entry-meta -->

	<?php
	if ( has_post_thumbnail() ) {
		?>
			<?php awp_post_thumbnail(); ?>
		<?php
	}
	?>
	<header class="entry-header">
		<?php 
		$awp_categories_list = get_the_category_list();
		if ( $awp_categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'awp' ) . '</span>', $awp_categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<div class="entry-content">
		<?php

			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'awp' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);


			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awp' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php awp_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
