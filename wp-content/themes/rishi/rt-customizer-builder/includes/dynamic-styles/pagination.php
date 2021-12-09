<?php

$selector_prefix = $prefix;

if ($selector_prefix === 'blog') {
	$selector_prefix = '';
}

// Pagination
rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('.rt-pagination', $selector_prefix),
	'variableName' => 'spacing',
	'value' => get_theme_mod($prefix . '_paginationSpacing', [
		'mobile' => 50,
		'tablet' => 60,
		'desktop' => 80,
	])
]);

rt_customizer_output_border([
	'css' => $css,
	'selector' => rt_customizer_prefix_selector('.rt-pagination[data-divider]', $selector_prefix),
	'variableName' => 'border',
	'value' => get_theme_mod($prefix . '_paginationDivider', [
		'width' => 1,
		'style' => 'none',
		'color' => [
			'color' => 'rgba(224, 229, 235, 0.5)',
		],
	])
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_simplePaginationFontColor', []),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'active' => ['color' => '#ffffff'],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="simple"], [data-pagination="next_prev"]',
				$selector_prefix
			),
			'variable' => 'color'
		],

		'active' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="simple"]',
				$selector_prefix
			),
			'variable' => 'colorActive'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="simple"], [data-pagination="next_prev"]',
				$selector_prefix
			),
			'variable' => 'linkHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_paginationButtonText', []),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="load_more"]',
				$selector_prefix
			),
			'variable' => 'buttonTextInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="load_more"]',
				$selector_prefix
			),
			'variable' => 'buttonTextHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_paginationButton', []),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="load_more"]',
				$selector_prefix
			),
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector(
				'[data-pagination="load_more"]',
				$selector_prefix
			),
			'variable' => 'buttonHoverColor'
		],
	],
]);
