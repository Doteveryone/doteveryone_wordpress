<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			if ( is_front_page() && is_home() ) {
			get_template_part( 'template-parts/content', 'home' );


			} elseif ( is_front_page()){
			get_template_part( 'template-parts/content', 'home' );

			} elseif ( is_home()){

			get_template_part( 'template-parts/content', 'blog' );

			} elseif ( is_page('work')){

			get_template_part( 'template-parts/page', 'work' );

			} elseif ( is_page('about')){

			get_template_part( 'template-parts/page', 'about' );

			}

			else {

			get_template_part( 'template-parts/content', 'page' );

			}

			// If comments are open or we have at least one comment, load up the comment template.

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
