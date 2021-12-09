<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rishi
*/
$prefix = 'single_page_';

$itemprop = ( rishi_get_schema_type() === 'microdata' ) ? ' itemprop="text"' : ''; 
$page_title_panel = get_theme_mod( 'page_title_panel', 'yes' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); rishi_microdata( 'article' ); ?>>
	<?php if( $page_title_panel === 'yes' && ( rt_customizer_default_akg(
			'page_title_hero_section',
			rt_customizer_get_post_options(),
			'default'
		) !== 'disabled' ) ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php 
		echo rishi_single_featured_image( 'single_page' );
	?>

	<div class="entry-content"<?php echo $itemprop; ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rishi' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'rishi' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->