<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rishi
*/

$defaults        = rishi_get_layouts_defaults();
$post_strucuture = get_theme_mod( 'single_blog_post_post_structure', rishi_get_default_post_structure() );
$ed_post_tags    = get_theme_mod( 'ed_post_tags', $defaults['ed_post_tags'] );
$itemprop        = ( rishi_get_schema_type() === 'microdata' ) ? ' itemprop="text"' : '';
$position        = 'First'; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rt-supports-deeplink'); rishi_microdata( 'article' ); ?><?php echo rishi_frontend_deeplink_customizer_preview( 'border-dashed','singlepost' ); ?>>
    <header class="entry-header">
        <div class="rishi-entry-header-inner">
            <?php 
                foreach( $post_strucuture as $structure ){                        
                    if( $structure['enabled'] == true && $structure['id'] == 'featured_image' ){
                        echo rishi_single_featured_image( 'single_blog_post', $structure['featured_image_ratio'], $structure['featured_image_size'], $structure['featured_image_visibility'] );
                    }

                    if( $structure['enabled'] == true && $structure['id'] == 'custom_meta' ){ 
                        rishi_post_meta( $structure['meta_elements'], $structure['meta_divider'], $position );
                        $position = 'Second';
                    }

                    if( $structure['enabled'] == true && $structure['id'] == 'custom_title' ){ 
                        the_title( '<' . $structure["heading_tag"] . ' class="entry-title rt-supports-deeplink"'. rishi_frontend_deeplink_customizer_preview( 'border-dashed','singlepost' ) .'>', '</' . $structure["heading_tag"] . '>' );
                    }
                }
            ?>
        </div>
    </header>
    <div class="post-inner-wrap">
        <div class="entry-content"<?php echo $itemprop; ?>>
            <?php 
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'rishi' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );
            ?>
        </div>
    </div>
    <?php 
        if( $ed_post_tags == 'yes' && (rt_customizer_default_akg(
            'disable_post_tags',
            rt_customizer_get_post_options(),
            'no'
        ) === 'no') ){ ?>
            <div class="post-footer-meta-wrap">
                <span class="post-tags meta-wrapper">
                    <?php rishi_tags(); ?>
                </span>
            </div>
            <?php 
        } 
    ?>    
</article><!-- #post-## -->
