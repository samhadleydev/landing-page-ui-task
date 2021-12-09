<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// link font
rt_customizer_output_font_css([
	'font_value' => rt_get_akv(
		'mobileMenuFont',
		$atts,
		rt_customizer_typography_default_values([
			'size' => [
				'desktop' => '30px',
				'tablet'  => '20px',
				'mobile'  => '16px'
			],
			'variation' => 'n4',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector)
]);

// link color
rt_customizer_output_colors([
	'value' => rt_get_akv('mobileMenuColor', $atts),
	'default' => [
		'default' => ['color' =>  'var(--paletteColor1)'],
		'hover' => ['color' =>  'var(--paletteColor3)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'linkHoverColor'
		],
	],
]);

$mobile_menu_child_size = rt_get_akv('mobile_menu_child_size', $atts, '16px');

if ($mobile_menu_child_size !== '16px') {
	$css->put(
		rt_customizer_assemble_selector($root_selector),
		'--mobile_menu_child_size: ' . $mobile_menu_child_size
	);
}

$mobile_menu_type = rt_get_akv('mobile_menu_type', $atts, 'type-1');

if ($mobile_menu_type !== 'type-1' || is_customize_preview()) {
	rt_customizer_output_border([
		'css' => $css,
		'selector' => rt_customizer_assemble_selector($root_selector),
		'variableName' => 'mobile-menu-divider',
		'value' => rt_get_akv('mobile_menu_divider', $atts, [
			'width' => 1,
			'style' => 'solid',
			'color' => [
				'color' =>  'var(--paletteColor6)',
			],
		])
	]);
}


// Margin
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'value' => rt_customizer_default_akg(
		'mobileMenuMargin',
		$atts,
		rt_customizer_spacing_value([
			'left' => 'auto',
			'right' => 'auto',
			'linked' => true,
		])
	)
]);
