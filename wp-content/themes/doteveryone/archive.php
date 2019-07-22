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
 * @package doteveryone
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container" id="blogs">
				<div class="row">
					<div class="col-sm-9">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					<div class="row">
					<?php
					if ( have_posts() ) :


						$i = 0;
						echo '<div class="row">';
						/* Start the Loop */
						while ( have_posts() ) :
							if ($i % 2 == 0) { echo '</div><div class="row">'; };
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'post-box' );
							$i++;
						endwhile;
						if ($i %2 != 0) { echo '</div'; };
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					</div>
					</div>
										<div class="row pagination">
						<hr />
						<?php 						the_posts_pagination(); ?>
					</div>
				</div>
				<div class="col-sm-3">
					<?php get_sidebar(); ?>
				</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
