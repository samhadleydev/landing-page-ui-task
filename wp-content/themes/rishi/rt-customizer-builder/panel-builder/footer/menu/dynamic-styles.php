<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Items spacing
$footerMenuItemsSpacing = rt_customizer_default_akg('footerMenuItemsSpacing', $atts, 25);

if ($footerMenuItemsSpacing !== 25) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector($root_selector),
		'variableName' => 'menu-items-spacing',
		'value' => $footerMenuItemsSpacing
	]);
}

// Horizontal alignment
$horizontal_alignment = rt_customizer_default_akg('footerMenuAlignment', $atts, 'flex-start');

if ($horizontal_alignment !== 'flex-start') {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'replace-last',
			'to_add' => '[data-column="' . $item['id'] . '"]'
		])),
		'variableName' => 'horizontal-alignment',
		'value' => $horizontal_alignment,
		'unit' => '',
	]);
}

// Vertical alignment
$vertical_alignment = rt_customizer_default_akg('footerMenuVerticalAlignment', $atts, 'CT_CSS_SKIP_RULE');

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => '[data-column="' . $item['id'] . '"]'
	])),
	'variableName' => 'vertical-alignment',
	'value' => $vertical_alignment,
	'unit' => '',
]);


// Top level font
rt_customizer_output_font_css([
	'font_value' => rt_customizer_default_akg(
		'footerMenuFont',
		$atts,
		rt_customizer_typography_default_values([
			'size' => '14px',
			'variation' => 'n4',
			'line-height' => '1.3',
			'text-transform' => 'normal',
			'letter-spacing' => '0.3px'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'suffix',
		'to_add' => 'ul'
	])),
]);


// Font color
rt_customizer_output_colors([
	'value' => rt_customizer_default_akg('footerMenuFontColor', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
		'hover' => ['color' => 'var(--paletteColor3)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '> ul > li > a'
			])),
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '> ul > li > a'
			])),
			'variable' => 'linkHoverColor'
		],
	],
]);

// Top level margin
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'important' => true,
	'value' => rt_customizer_default_akg(
		'footerMenuMargin',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);
