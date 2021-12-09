<?php

$post_type = get_current_screen()->post_type;

$post_id = null;

if (isset($_GET['post']) && $_GET['post']) {
	$post_id = $_GET['post'];
}

$prefix = rt_customizer_manager()->screen->get_admin_prefix($post_type);

$post_atts = rt_customizer_get_post_options($post_id);

$background_source = rt_customizer_default_akg(
	'background',
	$post_atts,
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
			'site_background',
			rt_customizer_background_default_value([
				'backgroundColor' => [
					'default' => [
						'color' => 'var(--paletteColor8)'
					],
				],
			])
		);
	}
}

rt_customizer_output_background_css([
	'selector' => '.editor-styles-wrapper',
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => $background_source,
	'responsive' => true,
]);

$source = [
	'strategy' => $post_atts
];

if (rt_customizer_default_akg(
	'content_style_source',
	$post_atts,
	'inherit'
) === 'inherit' && $post_type !== 'ct_content_block') {
	$source = [
		'prefix' => $prefix,
		'strategy' => 'customizer'
	];
}

$has_boxed = rt_customizer_akg_or_customizer(
	'content_style',
	$source,
	'boxed'
);

if (rt_customizer_some_device($has_boxed, 'boxed')) {

	rt_customizer_output_background_css([
		'selector' => '.block-editor-writing-flow',
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'value' => rt_customizer_akg_or_customizer(
			'content_background',
			$source,
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

	rt_customizer_output_spacing([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => '.block-editor-writing-flow',
		'property' => 'boxed-content-spacing',
		'value' => rt_customizer_akg_or_customizer(
			'boxed_content_spacing',
			$source,
			[
				'desktop' => rt_customizer_spacing_value([
					'linked' => true,
					'top' => '40px',
					'left' => '40px',
					'right' => '40px',
					'bottom' => '40px',
				]),
				'tablet' => rt_customizer_spacing_value([
					'linked' => true,
					'top' => '35px',
					'left' => '35px',
					'right' => '35px',
					'bottom' => '35px',
				]),
				'mobile'=> rt_customizer_spacing_value([
					'linked' => true,
					'top' => '20px',
					'left' => '20px',
					'right' => '20px',
					'bottom' => '20px',
				]),
			]
		)
	]);

	rt_customizer_output_spacing([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => '.block-editor-writing-flow',
		'property' => 'border-radius',
		'value' => rt_customizer_akg_or_customizer(
			'content_boxed_radius',
			$source,
			rt_customizer_spacing_value([
				'linked' => true,
				'top' => '3px',
				'left' => '3px',
				'right' => '3px',
				'bottom' => '3px',
			])
		)
	]);

	rt_customizer_output_box_shadow([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => '.block-editor-writing-flow',
		'value' => rt_customizer_akg_or_customizer(
			'content_boxed_shadow',
			$source,
			rt_customizer_box_shadow_value([
				'enable' => true,
				'h_offset' => 0,
				'v_offset' => 12,
				'blur' => 18,
				'spread' => -6,
				'inset' => false,
				'color' => [
					'color' => 'rgba(34, 56, 101, 0.04)',
				],
			])
		),
		'responsive' => true
	]);
}

