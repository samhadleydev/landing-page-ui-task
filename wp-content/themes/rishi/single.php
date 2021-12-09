<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rishi
 */

get_header(); ?>

	<main id="primary" class="site-main">
		<div class="rishi-container-wrap">
			<?php 
				/**
				 * Rishi After Container Wrap
				*/
				do_action( 'rishi_after_container_wrap' );
			
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'single' );

				endwhile; // End of the loop.

				/**
				 * After post loop
				*/
				do_action( 'rishi_after_post_loop' );
			?>
		</div>
	</main><!-- #main -->	
<?php
get_sidebar();
get_footer();