<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agility_WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card border-0 shadow-lg mb-5 bg-white rounded'); ?>>
<div class="row g-0">

    <?php
    if ( has_post_thumbnail() ) {
        ?>
        <div class="blog-thumbnail img-square-wrapper col-md-5">
            <?php awp_post_thumbnail(); ?>
        </div>
        <?php
        }
        ?>
    <div class="card-body col-md-7">
	<header class="entry-header">
		<?php
		$categories_list = get_the_category_list( esc_html__( ', ', 'awp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="cat-links">' . esc_html__( '%1$s', 'awp' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				awp_posted_on();
				awp_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
        <?php

            the_excerpt(
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
</div><!--.card-body -->
    </div><!--.row -->
</article><!-- #post-<?php the_ID(); ?> -->
