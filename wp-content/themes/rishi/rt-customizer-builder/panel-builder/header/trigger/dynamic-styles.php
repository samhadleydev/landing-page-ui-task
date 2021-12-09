<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Icon color
rt_customizer_output_colors([
	'value' => rt_get_akv('triggerIconColor', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor3)'],
		'hover' => ['color' => 'var(--paletteColor4)'],
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

rt_customizer_output_colors([
	'value' => rt_get_akv('triggerSecondColor', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor7)'],
		'hover' => ['color' => 'var(--paletteColor7)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'secondColor'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'secondColorHover'
		],
	],
]);

// Margin
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'important' => true,
	'value' => rt_customizer_default_akg(
		'triggerMargin',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);


// transparent state
if (isset($has_transparent_header) && $has_transparent_header) {
	rt_customizer_output_colors([
		'value' => rt_get_akv('transparentTriggerIconColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'linkInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'linkHoverColor'
			],
		],
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('transparentTriggerSecondColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'secondColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'secondColorHover'
			],
		],
	]);
}


// sticky state
if (isset($has_sticky_header) && $has_sticky_header) {
	rt_customizer_output_colors([
		'value' => rt_get_akv('stickyTriggerIconColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'linkInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'linkHoverColor'
			],
		],
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('stickyTriggerSecondColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'secondColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'secondColorHover'
			],
		],
	]);
}
