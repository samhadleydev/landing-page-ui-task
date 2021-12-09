<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Font
rt_customizer_output_font_css([
	'font_value' => rt_customizer_default_akg(
		'copyrightFont',
		$atts,
		rt_customizer_typography_default_values([
			'size' => '14px',
			'variation' => 'n4',
			'line-height' => '1.3',
			'letter-spacing' => '0.6px',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector)
]);

// Font color
rt_customizer_output_colors([
	'value' => rt_customizer_default_akg('copyrightColor', $atts),
	'default' => [
		'default' => ['color' => 'rgba(255,255,255,0.6)'],
		'link_initial' => ['color' =>'var(--paletteColor5)'],
		'link_hover' => ['color' => 'var(--paletteColor3)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'color'
		],

		'link_initial' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'linkInitialColor'
		],

		'link_hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'linkHoverColor'
		],
	],
]);

// Alignment
rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,

	'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => '[data-column="copyright"]'
	])),

	'variableName' => 'horizontal-alignment',
	'unit' => '',
	'value' => rt_customizer_default_akg('footerCopyrightAlignment', $atts, [
		'desktop' => 'center',
		'tablet' => 'center',
		'mobile' => 'center'
	])
]);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => '[data-column="copyright"]'
	])),
	'variableName' => 'vertical-alignment',
	'unit' => '',
	'value' => rt_customizer_default_akg('footerCopyrightVerticalAlignment', $atts, [
		'desktop' => 'flex-start',
		'tablet' => 'flex-start',
		'mobile' => 'flex-start'
	])
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'important' => true,
	'value' => rt_customizer_default_akg(
		'copyrightMargin',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);
