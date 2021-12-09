<?php

if (!function_exists('is_woocommerce')) {
	return;
}
$colordefaults = rishi_get_color_defaults();

//woo page
$prefixwoo = 'woo_'; 

rt_customizer_output_background_css([
	'selector' => '.box-layout.woocommerce .main-content-wrapper, .content-box-layout.woocommerce .main-content-wrapper',
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		$prefixwoo . 'content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor5)'
				],
			],
		])
	),
	'responsive' => true,
]);


rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.woocommerce.archive .site-content .archive-title-wrapper',
	'variableName' => 'alignment',
	'value'        => get_theme_mod( 'woo_alignment', 'left'),
	'unit'		   => '',	
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.woocommerce.archive .site-content .archive-title-wrapper',
	'variableName' => 'wooMargin',
	'value'        => get_theme_mod('woo_margin', [
		'desktop' => 85,
		'tablet' => 60,
		'mobile' => 30,
	]),
	'responsive'   => false,
]);

rt_customizer_output_box_shadow([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.box-layout.woocommerce .main-content-wrapper, .content-box-layout.woocommerce .main-content-wrapper',
	'variableName' => 'box-shadow',
	'value' => get_theme_mod( $prefixwoo . 'content_boxed_shadow', rt_customizer_box_shadow_value([
		'enable'   => false,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur'     => 18,
		'spread'   => -6,
		'inset'    => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.04)',
		],
	])),
	'responsive' => true
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.box-layout.woocommerce .main-content-wrapper, .content-box-layout.woocommerce .main-content-wrapper',
	'property' => 'padding',
	'value' => get_theme_mod(
		$prefixwoo . 'boxed_content_spacing',
		rt_customizer_spacing_value([
			'linked' => true,
		    'top'    => '40px',
		    'left'   => '40px',
		    'right'  => '40px',
		    'bottom' => '40px',
		])
	)
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.box-layout.woocommerce .main-content-wrapper, .content-box-layout.woocommerce .main-content-wrapper',
	'property' => 'box-radius',
	'value' => get_theme_mod(
		$prefixwoo . 'content_boxed_radius',
		rt_customizer_spacing_value([
			'linked' => true,
			'top'    => '3px',
			'left'   => '3px',
			'right'  => '3px',
			'bottom' => '3px',
		])
	)
]);

//card alignment
rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.woocommerce .wholewrapper',
	'variableName' => 'cardAlignment',
	'value'        => get_theme_mod( 'shop_cards_alignment', 'center'),
	'unit'		   => '',	
	'responsive'   => false,	
]);

// Store notice
rt_customizer_output_colors([
	'value' => get_theme_mod('wooNoticeContent'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)']
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.demo_store',
			'variable' => 'color'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('wooNoticeBackground'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor3)']
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.demo_store',
			'variable' => 'backgroundColor'
		],
	],
]);



rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products]',
	'variableName' => 'cardsGap',
	'value' => get_theme_mod('shopCardsGap', [
		'mobile' => 30,
		'tablet' => 30,
		'desktop' => 30,
	])
]);

$shop_columns = get_theme_mod('woocommerce_columns', 4 );

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'woocommerce .wholewrapper',
	'variableName' => 'shop-columns',
	'value' => $shop_columns,
	'unit' => ''
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('cardProductTitleColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
		'hover' => ['color' => 'var(--paletteColor3)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.woocommerce .wholewrapper .woocommerce-loop-product__title',
			'variable' => 'color'
		],

		'hover' => [
			'selector' => '.woocommerce .wholewrapper .woocommerce-loop-product__title',
			'variable' => 'colorHover'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('cardProductPriceColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor1)']
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.woocommerce .wholewrapper .price',
			'variable' => 'color'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('salesBagdgeColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)' ],
		'background' => ['color' => 'var(--paletteColor3)' ],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.woocommerce .wholewrapper .onsale',
			'variable' => 'color'
		],

		'background' => [
			'selector' => '.woocommerce .wholewrapper .onsale',
			'variable' => 'colorBg'
		],
	],
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('cardCaptionBgColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)']
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.woocommerce .wholewrapper',
			'variable' => 'cardCaptionBgColor'
		],
	],
]);

// Box shadow
rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.woocommerce .wholewrapper',
	'value' => get_theme_mod('cardCaptionBoxShadow', rt_customizer_box_shadow_value([
		'enable'   => true,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur'     => 18,
		'spread'   => -6,
		'inset'    => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.04)',
		],
	])),
	'responsive' => true
]);

// rt_customizer_output_colors([
// 	'value' => get_theme_mod('starRatingColor'),
// 	'default' => [
// 		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 		'inactive' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 	],
// 	'css' => $css,
// 	'variables' => [
// 		'default' => [
// 			'selector' => ':root',
// 			'variable' => 'star-rating-initial-color'
// 		],

// 		'inactive' => [
// 			'selector' => ':root',
// 			'variable' => 'star-rating-inactive-color'
// 		],
// 	],
// ]);

// global quantity colors
// rt_customizer_output_colors([
// 	'value' => get_theme_mod('global_quantity_color'),
// 	'default' => [
// 		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 	],
// 	'css' => $css,
// 	'variables' => [
// 		'default' => [
// 			'selector' => '.quantity',
// 			'variable' => 'quantity-initial-color'
// 		],

// 		'hover' => [
// 			'selector' => '.quantity',
// 			'variable' => 'quantity-hover-color'
// 		],
// 	],
// ]);

// rt_customizer_output_colors([
// 	'value' => get_theme_mod('global_quantity_arrows'),
// 	'default' => [
// 		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 	],
// 	'css' => $css,
// 	'variables' => [
// 		'default' => [
// 			'selector' => '.quantity',
// 			'variable' => 'quantity-arrows-initial-color'
// 		],

// 		'hover' => [
// 			'selector' => '.quantity',
// 			'variable' => 'quantity-arrows-hover-color'
// 		],
// 	],
// ]);

// rt_customizer_output_colors([
// 	'value' => get_theme_mod('saleBadgeColor'),
// 	'default' => [
// 		'text' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 		'background' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 	],
// 	'css' => $css,
// 	'variables' => [
// 		'text' => [
// 			'selector' => ':root',
// 			'variable' => 'badge-text-color'
// 		],

// 		'background' => [
// 			'selector' => ':root',
// 			'variable' => 'badge-background-color'
// 		],
// 	],
// ]);

// rt_customizer_output_colors([
// 	'value' => get_theme_mod('outOfStockBadgeColor'),
// 	'default' => [
// 		'text' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 		'background' => ['color' => '#24292E'],
// 	],
// 	'css' => $css,
// 	'variables' => [
// 		'text' => [
// 			'selector' => '.out-of-stock-badge',
// 			'variable' => 'badge-text-color'
// 		],

// 		'background' => [
// 			'selector' => '.out-of-stock-badge',
// 			'variable' => 'badge-background-color'
// 		],
// 	],
// ]);

// rt_customizer_output_colors([
// 	'value' => get_theme_mod('cardProductCategoriesColor'),
// 	'default' => [
// 		'default' => ['color' => 'var(--color)'],
// 		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
// 	],
// 	'css' => $css,
// 	'variables' => [
// 		'default' => [
// 			'selector' => '[data-products] .entry-meta a',
// 			'variable' => 'linkInitialColor'
// 		],

// 		'hover' => [
// 			'selector' => '[data-products] .entry-meta a',
// 			'variable' => 'linkHoverColor'
// 		],
// 	],
// ]);

rt_customizer_output_colors([
	'value' => get_theme_mod('cardProductButtonText'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.woocommerce .wholewrapper ul.products li.product .button',
			'variable' => 'buttonTextInitialColor'
		],

		'hover' => [
			'selector' => '.woocommerce .wholewrapper ul.products li.product .button:hover',
			'variable' => 'buttonTextHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('cardProductButtonBackground'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.woocommerce .wholewrapper ul.products li.product .button',
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => '.woocommerce .wholewrapper ul.products li.product .button:hover',
			'variable' => 'buttonHoverColor'
		],
	],
]);


// Border radius
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.woocommerce .wholewrapper ul.products .product',
	'property' => 'borderRadius',
	'value' => get_theme_mod(
		'cardProductRadius',
		rt_customizer_spacing_value([
			'linked' => true,
			'top' => '3px',
			'left' => '3px',
			'right' => '3px',
			'bottom' => '3px',

		])
	)
]);

// Box shadow
rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products="type-2"]',
	'value' => get_theme_mod('cardProductShadow', rt_customizer_box_shadow_value([
		'enable' => true,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur' => 18,
		'spread' => -6,
		'inset' => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.03)',
		],
	])),
	'responsive' => true
]);

// woo single product
$product_thumbs_spacing = get_theme_mod('product_thumbs_spacing', '15px');

if ($product_thumbs_spacing !== '15px') {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => '.rt-product-view',
		'variableName' => 'thumbs-spacing',
		'unit' => '',
		'value' => $product_thumbs_spacing
	]);
}



$productGalleryWidth = get_theme_mod('productGalleryWidth', 50);

if ($productGalleryWidth !== 50) {
	$css->put(
		'.product-entry-wrapper',
		'--product-gallery-width: ' . $productGalleryWidth . '%'
	);
}

rt_customizer_output_colors([
	'value' => get_theme_mod('singleProductTitleColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .product_title',
			'variable' => 'headingColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('singleProductPriceColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor1)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .price',
			'variable' => 'productColor'
		],
	],
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'cardProductTitleFont',
		rt_customizer_typography_default_values([
			'size' => '17px',
			'variation' => 'n6',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '[data-products] .woocommerce-loop-product__title, [data-products] .woocommerce-loop-category__title'
]);

rt_customizer_output_responsive_switch([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.single-product .up-sells',
	'value' => get_theme_mod('upsell_products_visibility', [
		'desktop' => true,
		'tablet' => false,
		'mobile' => false,
	])
]);

rt_customizer_output_responsive_switch([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.single-product .related',
	'value' => get_theme_mod('related_products_visibility', [
		'desktop' => true,
		'tablet' => false,
		'mobile' => false,
	])
]);

// messages
rt_customizer_output_colors([
	'value' => get_theme_mod('infoMessageColor'),
	'default' => [
		'text' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'background' => ['color' => '#F0F1F3'],
	],
	'css' => $css,
	'variables' => [
		'text' => [
			'selector' => '.woocommerce-info, .woocommerce-message',
			'variable' => 'color'
		],

		'background' => [
			'selector' => '.woocommerce-info, .woocommerce-message',
			'variable' => 'background-color'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('errorMessageColor'),
	'default' => [
		'text' => ['color' => 'var(--paletteColor5)'],
		'background' => ['color' => 'var(--paletteColor7)'],
	],
	'css' => $css,
	'variables' => [
		'text' => [
			'selector' => '.woocommerce-error',
			'variable' => 'color'
		],

		'background' => [
			'selector' => '.woocommerce-error',
			'variable' => 'background-color'
		],
	],
]);


// add to cart actions
$add_to_cart_button_width = get_theme_mod('add_to_cart_button_width', '100%');

if ($add_to_cart_button_width !== '100%') {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => '.entry-summary form.cart',
		'variableName' => 'button-width',
		'unit' => '',
		'value' => $add_to_cart_button_width,
	]);
}


rt_customizer_output_colors([
	'value' => get_theme_mod('quantity_color'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary form.cart .quantity',
			'variable' => 'quantity-initial-color'
		],

		'hover' => [
			'selector' => '.entry-summary form.cart .quantity',
			'variable' => 'quantity-hover-color'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('quantity_arrows'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary form.cart .quantity',
			'variable' => 'quantity-arrows-initial-color'
		],

		'hover' => [
			'selector' => '.entry-summary form.cart .quantity',
			'variable' => 'quantity-arrows-hover-color'
		],
	],
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('add_to_cart_text'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .single_add_to_cart_button',
			'variable' => 'buttonTextInitialColor'
		],

		'hover' => [
			'selector' => '.entry-summary .single_add_to_cart_button',
			'variable' => 'buttonTextHoverColor'
		],
	],
	'responsive' => true
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('add_to_cart_background'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .single_add_to_cart_button',
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => '.entry-summary .single_add_to_cart_button',
			'variable' => 'buttonHoverColor'
		],
	],
	'responsive' => true
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('view_cart_button_text'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .rt-cart-actions .added_to_cart',
			'variable' => 'buttonTextInitialColor'
		],

		'hover' => [
			'selector' => '.entry-summary .rt-cart-actions .added_to_cart',
			'variable' => 'buttonTextHoverColor'
		],
	],
	'responsive' => true
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('view_cart_button_background'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '.entry-summary .rt-cart-actions .added_to_cart',
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => '.entry-summary .rt-cart-actions .added_to_cart',
			'variable' => 'buttonHoverColor'
		],
	],
	'responsive' => true
]);


rt_customizer_output_background_css([
	'selector'   => '.woocommerce.archive .site-content .archive-title-wrapper',
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		'shop_page_content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor7)'
				],
			],
		])
	),
	'responsive' => true,
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value'      => get_theme_mod('shop_font_color'),
	'default'    => [
		'default'  => ['color' => 'var(--paletteColor1)'],
		'selector' => '.woocommerce.archive .site-content .archive-title-wrapper',
	],
	'variables' => [
		'default' => ['variable' => 'shopFontColor'],
	],
]);




rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod('woo_btn_text_color'),
	'default' => [
		'default' => ['color' => $colordefaults['woo_btn_text_color']],
		'selector' => '.woocommerce-cart .woocommerce, .woocommerce-checkout .woocommerce, .woocommerce-account .woocommerce, .single-product.woocommerce div.product .summary form.cart .button',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'wooTextColor'],
	],
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod('woo_btn_text_hover_color'),
	'default' => [
		'default' => ['color' => $colordefaults['woo_btn_text_hover_color']],
		'selector' => '.woocommerce-cart .woocommerce, .woocommerce-checkout .woocommerce, .woocommerce-account .woocommerce, .single-product.woocommerce div.product .summary form.cart .button',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'wooHoverColor'],
	],
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod('woo_btn_bg_color'),
	'default' => [
		'default' => ['color' => $colordefaults['woo_btn_bg_color']],
		'selector' => '.woocommerce-cart .woocommerce, .woocommerce-checkout .woocommerce, .woocommerce-account .woocommerce, .single-product.woocommerce div.product .summary form.cart .button',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'wooBgColor'],
	],
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod('woo_btn_bg_hover_color'),
	'default' => [
		'default' => ['color' => $colordefaults['woo_btn_bg_hover_color']],
		'selector' => '.woocommerce-cart .woocommerce, .woocommerce-checkout .woocommerce, .woocommerce-account .woocommerce, .single-product.woocommerce div.product .summary form.cart .button',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'wooBgHoverColor'],
	],
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod('woo_btn_border_color'),
	'default' => [
		'default' => ['color' => $colordefaults['woo_btn_border_color']],
		'selector' => '.woocommerce-cart .woocommerce, .woocommerce-checkout .woocommerce, .woocommerce-account .woocommerce, .single-product.woocommerce div.product .summary form.cart .button',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'wooBorderColor'],
	],
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod('woo_btn_border_hover_color'),
	'default' => [
		'default' => ['color' => $colordefaults['woo_btn_border_hover_color']],
		'selector' => '.woocommerce-cart .woocommerce, .woocommerce-checkout .woocommerce, .woocommerce-account .woocommerce, .single-product.woocommerce div.product .summary form.cart .button',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'wooBorderHoverColor'],
	],
]);