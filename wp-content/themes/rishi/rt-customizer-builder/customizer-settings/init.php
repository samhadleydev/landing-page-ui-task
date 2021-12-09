<?php

/**
 * Customizer options
 *
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package RT_Customizer_Builder
 */
// $custom_post_types = rt_customizer_get_options('general/custom-post-types');

$extensions_options = apply_filters(
	'rt_customizer_extensions_customizer_options',
	[]
);

// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
$options = [
	[
		rt_customizer_rand_md5() => [
			'type'     => 'rt-group-title',
			'title'    => __('General Options', 'rishi'),
			'priority' => 1,
		],
		'layout' => [
			'title'     => __('Layouts', 'rishi'),
			'container' => ['priority' => 1],
			'options'   => rt_customizer_get_options('general/general'),
		],
		'colors_panel' => [
			'title'     => __('Colors', 'rishi'),
			'container' => ['priority' => 1],
			'options'   => rt_customizer_get_options('general/colors/color-options'),
		],
		'header' => [
			'title'     => __('Header', 'rishi'),
			'container' => ['priority' => 1],
			'options'   => rt_customizer_get_options('general/header'),
		],
		'footer' => [
			'title'     => __('Footer', 'rishi'),
			'container' => ['priority' => 1],
			'options'   => rt_customizer_get_options('general/footer'),
		],
		'typography' => [
			'title'     => __('Typography', 'rishi'),
			'container' => ['priority' => 1],
			'options'   => rt_customizer_get_options('general/typography/typography'),
		],
		'seo' => [
			'title'     => __('SEO', 'rishi'),
			'container' => ['priority' => 1],
			'options'   => rt_customizer_get_options('general/seo/seo-options'),
		],
		rt_customizer_rand_md5() => [
			'type'     => 'rt-group-title',
			'title'    => __('Posts / Pages', 'rishi'),
			'priority' => 10,
		],
		'blogarchive' => [
			'title'     => __('Blog Page', 'rishi'),
			'container' => ['priority' => 10.5],
			'options'   => rt_customizer_get_options('posts/postoptions'),
		],
		'archive' => [
			'title'     => __('Archive Page', 'rishi'),
			'container' => ['priority' => 11],
			'options'   => rt_customizer_get_options('pages/archive'),
		],
		'authorarchive' => [
			'title'     => __('Author Page', 'rishi'),
			'container' => ['priority' => 11.5],
			'options'   => rt_customizer_get_options('pages/author'),
		],
		'search' => [
			'title'     => __('Search Page', 'rishi'),
			'container' => ['priority' => 12],
			'options'   => rt_customizer_get_options('pages/search'),
		],
		'singlepost' => [
			'title'     => __('Single Post', 'rishi'),
			'container' => ['priority' => 12.5],
			'options'   => rt_customizer_get_options('posts/singlepost'),
		],		
		'pages' => [
			'title'     => __('Pages', 'rishi'),
			'container' => ['priority' => 13],
			'options'   => rt_customizer_get_options('pages/pages'),
		],
		rt_customizer_rand_md5() => [
			'type' => 'rt-group-title',
			'title' => __('Visitor Engagement', 'rishi'),
			'priority' => 6,
		],
		'social_accounts' => [
			'title' => __('Social Networks', 'rishi'),
			'container' => ['priority' => 6],
			'options' => rt_customizer_get_options('engagement/social-accounts'),
		],
	],
	[
		function_exists('is_shop') ? [
			rt_customizer_rand_md5() => [
				'type' => 'rt-group-title',
				'title' => __( 'WooCommerces', 'rishi' ),
				'priority' => 3,
			],
			
			'woocommerce_storenotice' => [
				'title' => __( 'Store Notice', 'rishi' ),
				'container' => [
					'priority' => 3
				],
				'options' => rt_customizer_get_options( 'woo/woo-storenotice' ),
			],

			'woocommerce_general' => [
				'title' => __( 'General', 'rishi' ),
				'container' => [
					'priority' => 3
				],
				'options' => rt_customizer_get_options( 'woo/woo-general' ),
			],

			'woocommerce_product_archives' => [
				'title' => __( 'Shop Page', 'rishi' ),
				'container' => [
					'priority' => 3
				],
				'options' => rt_customizer_get_options( 'woo/woo-archives' ),
			],

			'woocomerrce_single' => [
				'title' => __( 'Single Product', 'rishi' ),
				'container' => [
					'priority' => 3,
				],
				'options' => rt_customizer_get_options( 'woo/woo-single' ),
			],


			'woocommerce_checkout' => [
				'title' => __('Checkout Page', 'rishi'),
				'container' => [
					'priority' => 3,
					// 'type' => 'child'
				],
				'only_if_exists' => true,
				'options' => []
			],

			apply_filters(
				'rishi_customizer_options:woocommerce:end',
				[]
			)
		] : [
			// $custom_post_types
		],
	],

	empty($extensions_options) ? [] : [

		rt_customizer_rand_md5() => [
			'type' => 'rt-group-title',
			'title' => __( 'Extensions', 'rishi' ),
			'priority' => 7,
		],

	],

	$extensions_options
];
