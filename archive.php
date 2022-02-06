<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bezlik
 */

get_header();

$card_style = get_theme_mod( 'post_card_style', 'regular' );
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="posts-loop card-style-<?php echo esc_attr( $card_style ); ?> layout-<?php echo esc_attr( apply_filters( 'bezlik_posts_layout', 'list' ) ); ?>" <?php bezlik_masonry_init(); ?>>
				<div class="row <?php echo esc_attr( apply_filters( 'bezlik_posts_row_class', '' ) ); ?>">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile; ?>
				</div>
			</div>

			<?php
			bezlik_posts_navigation();
			do_action( 'bezlik_after_posts_loop' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
do_action( 'bezlik_sidebar' );
get_footer();
