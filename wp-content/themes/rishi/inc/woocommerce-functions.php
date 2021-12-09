<?php
/**
 * Rishi Woocommerce hooks and functions.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Rishi
 */

/**
 * Woocommerce related hooks
*/
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content','woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_shop_loop','woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop','woocommerce_pagination', 10 );


function rishi_woo_header_actions(){
    add_action( 'woocommerce_before_main_content','rishi_header_section_wrapper_start', 40 );
    add_action( 'woocommerce_before_shop_loop','rishi_header_section_wrap_start', 9 );
    add_action( 'woocommerce_before_shop_loop','woocommerce_output_all_notices', 30 );
    
    add_action( 'woocommerce_before_shop_loop','rishi_header_section_wrap_end', 50 );
    add_action( 'woocommerce_checkout_before_order_review_heading','rishi_woocommerce_checkout_before_order_review_heading_start' );
    add_action( 'woocommerce_checkout_after_order_review','rishi_woocommerce_checkout_after_order_review_end' );
    add_action( 'woocommerce_before_shop_loop_item_title','rishi_woocommerce_shop_after_image_start',11 );
    add_action( 'woocommerce_after_shop_loop_item','rishi_woocommerce_shop_addtocard_before',11 );
    add_action( 'woocommerce_after_shop_loop','rishi_woocommerce_pagination',11 );
    
}
add_action( 'init','rishi_woo_header_actions',11 );

/**
 * Declare Woocommerce Support
*/
function rishi_woocommerce_support() {
    global $woocommerce;
    
    add_theme_support( 'woocommerce' );
    
    if( version_compare( $woocommerce->version, '3.0', ">=" ) ) {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

}
add_action( 'after_setup_theme', 'rishi_woocommerce_support');

/**
 * Woocommerce Sidebar
*/
function rishi_wc_widgets_init(){
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'rishi' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Sidebar displaying only in woocommerce pages.', 'rishi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );    
}
add_action( 'widgets_init', 'rishi_wc_widgets_init' );

/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function rishi_wc_wrapper(){ ?>
    <main id="primary" class="site-main">   
    <?php
}
add_action( 'woocommerce_before_main_content', 'rishi_wc_wrapper' );

/**
 * After Content
 * Closes the wrapping divs
*/
function rishi_wc_wrapper_end(){ ?>
    </main>
    <?php
    do_action( 'rishi_wo_sidebar' );
}
add_action( 'woocommerce_after_main_content', 'rishi_wc_wrapper_end' );

if (! function_exists('rishi_wc_sidebar_cb')) {
    /**
     * Callback function for Shop sidebar
    */
    function rishi_wc_sidebar_cb(){
        $sidebar = rishi_sidebar();

        if ( ! $sidebar ) {
            return;
        } ?>

        <aside id="secondary" class="widget-area" <?php rishi_microdata( 'sidebar' ); ?>>
            <?php dynamic_sidebar( $sidebar ); ?>
        </aside>
        <?php
    }
}
add_action( 'rishi_wo_sidebar', 'rishi_wc_sidebar_cb' );

if (! function_exists('rishi_header_section_wrap_start')) {
    function rishi_header_section_wrap_start(){ ?>
        <div class="woowrapper">
        <?php 
    }
}
if (! function_exists('rishi_header_section_wrap_end')) {
    function rishi_header_section_wrap_end(){ ?>
        </div><!-- .woowrapper -->
        <?php 
    }
}

function rishi_woocommerce_pagination_args( $args ){
    $args['prev_text'] = esc_html__( 'Prev', 'rishi' );
    $args['next_text'] = esc_html__( 'Next', 'rishi' );
    return $args;
}
add_filter( 'woocommerce_pagination_args','rishi_woocommerce_pagination_args' );

if (! function_exists('rishi_header_section_wrapper_start')) {
    function rishi_header_section_wrapper_start(){
        $shop_cards_type = get_theme_mod( 'shop_cards_type', 'normal' );
        $shop_cards_sales_badge_design = get_theme_mod( 'shop_cards_sales_badge_design', 'circle' );
        ?>
        <div class="wholewrapper" data-card-design="<?php echo $shop_cards_type ? esc_attr( $shop_cards_type ) : '' ?>" data-card-badge="<?php echo $shop_cards_sales_badge_design ? esc_attr( $shop_cards_sales_badge_design ) : '' ?>">
        <?php 
    }
}
if (! function_exists('rishi_header_section_wrapper_end')) {
    function rishi_header_section_wrapper_end(){ ?>
        </div><!-- .wholewrapper -->
        <?php 
    }
}
if (! function_exists('rishi_woocommerce_checkout_before_order_review_heading_start')) {
    function rishi_woocommerce_checkout_before_order_review_heading_start(){ ?>
        <div class="form-order-wrapper">
        <?php 
    }
}
if (! function_exists('rishi_woocommerce_checkout_after_order_review_end')) {
    function rishi_woocommerce_checkout_after_order_review_end(){ ?>
        </div><!-- .form-order-wrapper -->
        <?php 
    }
}
if (! function_exists('rishi_woocommerce_shop_after_image_start')) {
    function rishi_woocommerce_shop_after_image_start(){ ?>
        <div class="caption-content-wrapper">
        <?php 
    }
}
if (! function_exists('rishi_woocommerce_shop_addtocard_before')) {
    function rishi_woocommerce_shop_addtocard_before(){ ?>
        </div><!-- .form-order-wrapper -->
        <?php 
    }
}

/**
 * Removes the "shop" title on the main shop page
*/
add_filter( 'woocommerce_show_page_title' , '__return_false' );


add_filter( 'woocommerce_demo_store',
	function ($notice) {
		$parser = new RT_Attributes_Parser();

		$notice = $parser->add_attribute_to_images_with_tag(
			$notice,
			'data-position',
			get_theme_mod('store_notice_position', 'bottom'),
			'p'
		);

		return $notice;
	}
);


// Image Ratio Filters.
add_filter( 'woocommerce_product_get_image', function($image) {

    global $product;

    if ( ! is_shop() || is_admin() || ! $product ) {
        return $image;
    }

    $new_image = rt_customizer_image([
        'no_image_type' => 'woo',
        'attachment_id' => $product->get_image_id(),
        'other_images'  => [],
        'size'          => 'woocommerce_thumbnail',
        'ratio'         => rt_customizer_get_woocommerce_ratio(),
        'tag_name'      => 'span'
    ]);

    return $new_image;
} );

if (! function_exists('rishi_archive_woocommerce_template_loop_restructure')) {
    function rishi_archive_woocommerce_template_loop_restructure(){
        if ( get_theme_mod('has_star_rating', 'yes') !== 'yes') {
            remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5 );
        }else{
            add_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5 );
        }
        if ( get_theme_mod('has_sale_badge', 'yes') !== 'yes') {
            remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
        }else{
            add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
        }

        if (get_theme_mod('has_shop_sort', 'yes') !== 'yes') {
			remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
		}else{
			add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
        }

		if (get_theme_mod('has_shop_results_count', 'yes') !== 'yes') {
			remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
		}else{
            add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
        }
    }
}
add_action( 'wp','rishi_archive_woocommerce_template_loop_restructure',9999 );

if (! function_exists('rishi_single_woocommerce_product_restructure')) {
    function rishi_single_woocommerce_product_restructure(){

        if (get_theme_mod('has_product_single_rating', 'yes') === 'no') {
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
        }else{
            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
        }

        if (get_theme_mod('has_product_single_meta', 'yes') === 'no') {
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        }else{
            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        }

        if (! get_theme_mod('rt_customizer_has_checkout_coupon', false)) {
            remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
        }
    }
}
add_action( 'wp','rishi_single_woocommerce_product_restructure',99999 );

add_filter( 'woocommerce_output_related_products_args', function( $args ){
    $woo_single_no_of_posts = get_theme_mod( 'woo_single_no_of_posts', 3 );
    $woo_single_no_of_posts_row = get_theme_mod( 'woo_single_no_of_posts_row', 3 );
    
    if( $woo_single_no_of_posts ){
        $args['posts_per_page'] = absint( $woo_single_no_of_posts );
    }
    if( $woo_single_no_of_posts_row ){
        $args['columns'] = absint( $woo_single_no_of_posts_row );
    }
    return $args;
});

//overriding the woocommerce pagination
function rishi_woocommerce_pagination() {

    $woo_post_navigation = get_theme_mod( 'woo_post_navigation','numbered' );

    if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
        return;
    }

    if( $woo_post_navigation == 'numbered' ){
       
        $args = array(
            'total'   => wc_get_loop_prop( 'total_pages' ),
            'current' => wc_get_loop_prop( 'current_page' ),
            'base'    => esc_url_raw( add_query_arg( 'product-page', '%#%', false ) ),
            'format'  => '?product-page=%#%',
        );
    
        if ( ! wc_get_loop_prop( 'is_shortcode' ) ) {
            $args['format'] = '';
            $args['base']   = esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
        }
    
        wc_get_template( 'loop/pagination.php', $args );
    }elseif( $woo_post_navigation == 'infinite_scroll' ){
        echo rt_customizer_display_posts_pagination( [ 'pagination_type' => 'infinite_scroll' ] );
    }
   
}