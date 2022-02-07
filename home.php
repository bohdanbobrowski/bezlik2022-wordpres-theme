<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bezlik
 */

get_header();

$card_style = get_theme_mod( 'post_card_style', 'regular' );

?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			?>

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
					// get_template_part( 'template-parts/content', get_post_type() );

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

get_footer();
