<?php

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'rootTypography',
		rt_customizer_typography_default_values([
			'family' => 'System Default',
			'variation' => 'n4',
			'size' => '18px',
			'line-height' => '1.75',
			'letter-spacing' => '0em',
			'text-transform' => 'none',
			'text-decoration' => 'none',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'h1Typography',
		rt_customizer_typography_default_values([
			'size' => '40px',
			'variation' => 'n7',
			'line-height' => '1.5'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'h1, .block-editor-page .editor-styles-wrapper h1, .block-editor-page .editor-post-title__block .editor-post-title__input'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'h2Typography',
		rt_customizer_typography_default_values([
			'size' => '36px',
			'variation' => 'n7',
			'line-height' => '1.5'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'h2'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'h3Typography',
		rt_customizer_typography_default_values([
			'size' => '30px',
			'variation' => 'n7',
			'line-height' => '1.5'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'h3'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'h4Typography',
		rt_customizer_typography_default_values([
			'size' => '26px',
			'variation' => 'n7',
			'line-height' => '1.5'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'h4'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'h5Typography',
		rt_customizer_typography_default_values([
			'size' => '22px',
			'variation' => 'n7',
			'line-height' => '1.5'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'h5'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'h6Typography',
		rt_customizer_typography_default_values([
			'size' => '18px',
			'variation' => 'n7',
			'line-height' => '1.5'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'h6'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'blockquote',
		rt_customizer_typography_default_values([
			'family' => 'Georgia',
			'size' => '25px',
			'variation' => 'n6',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.wp-block-quote.is-style-large p, .wp-block-pullquote p, .rt-quote-widget blockquote'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'pre',
		rt_customizer_typography_default_values([
			'family' => 'monospace',
			'size' => '16px',
			'variation' => 'n4',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'code, kbd, samp, pre'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'sidebarWidgetsTitleFont',
		rt_customizer_typography_default_values([
			'size' => '18px',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.rt-sidebar .widget-title'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'sidebarWidgetsFont',
		rt_customizer_typography_default_values([
			// 'size' => '18px',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.rt-sidebar .widget > *:not(.widget-title):not(blockquote)'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'singleProductTitleFont',
		rt_customizer_typography_default_values([
			'size' => '30px',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.entry-summary > .product_title'
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'singleProductPriceFont',
		rt_customizer_typography_default_values([
			'size' => '20px',
			'variation' => 'n7',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.entry-summary .price'
]);

// breadcrumbs_typo
rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		'breadcrumbsTypo',
		rt_customizer_typography_default_values([
			'variation'       => 'n5',
			'size'            => '15px',
		])
	),
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => '.rishi-breadcrumb-main-wrap .rishi-breadcrumbs',
	'variable'   => 'breadcrumbsTypo'
]);

