<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Icon size
$socialsIconSize = rt_customizer_default_akg('socialsIconSize', $atts, 15);

if ($socialsIconSize !== 15) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector($root_selector),
		'variableName' => 'icon-size',
		'value' => $socialsIconSize,
		'responsive' => true
	]);
}

// Icon spacing
$socialsIconSpacing = rt_customizer_default_akg('socialsIconSpacing', $atts, 15);

if ($socialsIconSpacing !== 15) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector($root_selector),
		'variableName' => 'spacing',
		'value' => $socialsIconSpacing,
		'responsive' => true
	]);
}


// Horizontal alignment
$horizontal_alignment = rt_customizer_default_akg('footerSocialsAlignment', $atts, 'flex-start');

if ($horizontal_alignment !== 'flex-start') {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'replace-last',
			'to_add' => $column_selector
		])),
		'variableName' => 'horizontal-alignment',
		'value' => $horizontal_alignment,
		'unit' => '',
	]);
}


// Vertical alignment
$vertical_alignment = rt_customizer_default_akg('footerSocialsVerticalAlignment', $atts, 'CT_CSS_SKIP_RULE');

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => $column_selector
	])),
	'variableName' => 'vertical-alignment',
	'value' => $vertical_alignment,
	'unit' => '',
]);


// Icons custom color
rt_customizer_output_colors([
	'value' => rt_customizer_default_akg('footerSocialsIconColor', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
		'hover' => ['color' => 'var(--paletteColor3)'],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,

	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '[data-color="custom"]'
			])),
			'variable' => 'icon-color'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '[data-color="custom"]'
			])),
			'variable' => 'icon-hover-color'
		]
	],

	'responsive' => true
]);

// Icons custom background
rt_customizer_output_colors([
	'value' => rt_customizer_default_akg('footerSocialsIconBackground', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor7)'],
		'hover' => ['color' => 'var(--paletteColor6)'],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,

	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '[data-color="custom"]'
			])),
			'variable' => 'background-color'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '[data-color="custom"]'
			])),
			'variable' => 'background-hover-color'
		]
	],

	'responsive' => true
]);

// Margin
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'important' => true,
	'value' => rt_customizer_default_akg(
		'footerSocialsMargin',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

if (function_exists('rt_customizer_output_responsive_switch')) {
	rt_customizer_output_responsive_switch([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'suffix',
			'to_add' => '.rt-label'
		])),
		'value' => rt_customizer_default_akg(
			'socialsLabelVisibility',
			$atts,
			[
				'desktop' => false,
				'tablet' => false,
				'mobile' => false,
			]
		),
		'on' => 'block'
	]);
}
