<?php

$default_content_style = rt_customizer_default_akg(
	'content_style',
	rt_customizer_get_post_options(),
	'inherit'
);

$source = [
	'prefix' => $prefix,
	'strategy' => 'customizer'
];

$source = null;

if ($default_content_style === 'boxed') {
	$source = [
		'strategy' => rt_customizer_get_post_options()
	];
}

$default_background = rt_customizer_default_akg(
	'background',
	rt_customizer_get_post_options(),
	rt_customizer_background_default_value([
		'backgroundColor' => [
			'default' => [
				'color' => RT_CSS_Injector::get_skip_rule_keyword()
			],
		],
	])
);

$background_source = rt_customizer_default_akg(
	'background',
	rt_customizer_get_post_options(),
	rt_customizer_background_default_value([
		'backgroundColor' => [
			'default' => [
				'color' => RT_CSS_Injector::get_skip_rule_keyword()
			],
		],
	])
);

if (
	isset($background_source['background_type'])
	&&
	$background_source['background_type'] === 'color'
	&&
	isset($background_source['backgroundColor']['default']['color'])
	&&
	$background_source['backgroundColor']['default']['color'] === RT_CSS_Injector::get_skip_rule_keyword()
) {
	$background_source = get_theme_mod(
		$prefix . '_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => RT_CSS_Injector::get_skip_rule_keyword()
				],
			],
		])
	);
}

rt_customizer_output_background_css([
	'selector' => rt_customizer_prefix_selector('', $prefix),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => $background_source,
	'responsive' => true,
]);



$post_atts = rt_customizer_get_post_options();

$source = [
	'strategy' => $post_atts
];

if (rt_customizer_default_akg(
	'content_style_source',
	$post_atts,
	'inherit'
) === 'inherit') {
	$source = [
		'strategy' => 'customizer'
	];
}

if (rt_customizer_default_akg(
	'content_style_source',
	$post_atts,
	'inherit'
) === 'custom') {

$prefixpost = 'single_post_';

rt_customizer_output_background_css([
	'selector' => '.box-layout.single #main-container .main-content-wrapper, .content-box-layout.single #main-container .main-content-wrapper',
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => rt_get_akv_or_customizer(
		$prefixpost . 'content_background', $source,
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => '#ffffff'
				],
			],
		])
	),
	'responsive' => true,
]);

rt_customizer_output_box_shadow([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.box-layout.single #main-container .main-content-wrapper, .content-box-layout.single #main-container .main-content-wrapper',
	'variableName' => 'box-shadow',
	'value' => rt_get_akv_or_customizer( $prefixpost . 'content_boxed_shadow', $source, rt_customizer_box_shadow_value([
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
	'selector' => '.box-layout.single #main-container .main-content-wrapper, .content-box-layout.single #main-container .main-content-wrapper',
	'property' => 'padding',
	'value' => rt_get_akv_or_customizer(
		$prefixpost . 'boxed_content_spacing', $source,
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
	'selector' => '.box-layout.single #main-container .main-content-wrapper, .content-box-layout.single #main-container .main-content-wrapper',
	'property' => 'box-radius',
	'value' => rt_get_akv_or_customizer(
		$prefixpost . 'content_boxed_radius', $source,
		rt_customizer_spacing_value([
			'linked' => true,
			'top'    => '3px',
			'left'   => '3px',
			'right'  => '3px',
			'bottom' => '3px',
		])
	)
]);
}