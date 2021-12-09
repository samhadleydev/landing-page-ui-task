<?php

/**
 * Dynamic styles.
 */
if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Button Minwidth
$header_button_minwidth = rt_get_akv('header_button_minwidth', $atts, 50);
rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => rt_customizer_assemble_selector($root_selector),
	'variableName' => 'buttonMinWidth',
	'value'        => $header_button_minwidth,
	'responsive'   => true
]);

// Font color
rt_customizer_output_colors([
	'value'   => rt_get_akv('headerButtonFontColor', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
		'hover'   => ['color' => 'var(--paletteColor5)'],

		'default_2' => ['color' => 'var(--paletteColor3)'],
		'hover_2'   => ['color' => 'var(--paletteColor2)'],
	],
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables'  => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector'  => $root_selector,
				'operation' => 'suffix',
				'to_add'    => '.rt-button'
			])),
			'variable' => 'buttonTextInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector'  => $root_selector,
				'operation' => 'suffix',
				'to_add'    => '.rt-button'
			])),
			'variable' => 'buttonTextHoverColor'
		],


		'default_2' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector'  => $root_selector,
				'operation' => 'suffix',
				'to_add'    => '.rt-button-ghost'
			])),
			'variable' => 'buttonTextInitialColor'
		],

		'hover_2' => [
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector'  => $root_selector,
				'operation' => 'suffix',
				'to_add'    => '.rt-button-ghost'
			])),
			'variable' => 'buttonTextHoverColor'
		],
	],
	'responsive' => true
]);

// Background color
rt_customizer_output_colors([
	'value'   => rt_get_akv('headerButtonForeground', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor3)'],
		'hover'   => ['color' => 'var(--paletteColor2)'],
	],
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables'  => [
		'default' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'buttonHoverColor'
		],
	],
	'responsive' => true
]);


rt_customizer_output_colors([
	'value'   => rt_get_akv('header_button_border_color', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor3)'],
		'hover' => ['color' => 'var(--paletteColor2)'],
	],
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables'  => [
		'default' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'headerButtonBorderColor'
		],
		'hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'headerButtonBorderHoverColor'
		],
	],
	'responsive' => false
]);

if (isset($has_transparent_header) && $has_transparent_header) {
	rt_customizer_output_colors([
		'value'   => rt_get_akv('transparentHeaderButtonFontColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover'   => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],

			'default_2' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover_2'   => ['color' => '#292929'],
		],
		'css'        => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button'
						]),
						'operation' => 'between',
						'to_add'    => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'buttonTextInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button'
						]),

						'operation' => 'between',
						'to_add'    => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'buttonTextHoverColor'
			],

			'default_2' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button-ghost'
						]),

						'operation' => 'between',
						'to_add'    => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'buttonTextInitialColor'
			],

			'hover_2' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button-ghost'
						]),

						'operation' => 'between',
						'to_add'    => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'buttonTextHoverColor'
			],
		],
		'responsive' => true
	]);

	// Background color
	rt_customizer_output_colors([
		'value'   => rt_get_akv('transparentHeaderButtonForeground', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover'   => ['color' => '#292929'],
		],
		'css'        => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector'  => $root_selector,
						'operation' => 'between',
						'to_add'    => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'buttonInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector'  => $root_selector,
						'operation' => 'between',
						'to_add'    => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'buttonHoverColor'
			],
		],
		'responsive' => true
	]);
}


// sticky state
if (isset($has_sticky_header) && $has_sticky_header) {
	rt_customizer_output_colors([
		'value'   => rt_get_akv('stickyHeaderButtonFontColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover'   => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],

			'default_2' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover_2'   => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css'        => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button'
						]),

						'operation' => 'between',
						'to_add'    => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'buttonTextInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button'
						]),

						'operation' => 'between',
						'to_add'    => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'buttonTextHoverColor'
			],


			'default_2' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button-ghost'
						]),

						'operation' => 'between',
						'to_add'    => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'buttonTextInitialColor'
			],

			'hover_2' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector'  => $root_selector,
							'operation' => 'suffix',
							'to_add'    => '.rt-button-ghost'
						]),

						'operation' => 'between',
						'to_add'    => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'buttonTextHoverColor'
			],
		],
		'responsive' => true
	]);

	rt_customizer_output_colors([
		'value'   => rt_get_akv('stickyHeaderButtonForeground', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover'   => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css'        => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector'  => $root_selector,
						'operation' => 'between',
						'to_add'    => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'buttonInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector'  => $root_selector,
						'operation' => 'between',
						'to_add'    => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'buttonHoverColor'
			],
		],
		'responsive' => true
	]);
}


// Margin
rt_customizer_output_spacing([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => rt_customizer_assemble_selector($root_selector),
	'important'  => true,
	'value'      => rt_customizer_default_akg(
		'headerCtaMargin',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

// Border radius
rt_customizer_output_spacing([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => rt_customizer_assemble_selector($root_selector),
	'property'   => 'buttonBorderRadius',
	'value'      => rt_customizer_default_akg(
		'headerCtaRadius',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

//padding header
rt_customizer_output_spacing([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => rt_customizer_assemble_selector($root_selector),
	'property'   => 'headerCtaPadding',
	'value'      => rt_customizer_default_akg(
		'headerCtaPadding',
		$atts,
		rt_customizer_spacing_value([
			'linked' => false,
			'top'    => '10px',
			'left'   => '20px',
			'right'  => '20px',
			'bottom' => '10px',
		])
	)
]);


// footer button
$horizontal_alignment = rt_get_akv('footer_button_horizontal_alignment', $atts, 'flex-start');

if ($horizontal_alignment !== 'flex-start') {
	rt_customizer_output_responsive([
		'css'        => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector'   => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector'  => $root_selector,
			'operation' => 'replace-last',
			'to_add'    => $column_selector
		])),
		'variableName' => 'horizontal-alignment',
		'value'        => $horizontal_alignment,
		'unit'         => '',
	]);
}


$vertical_alignment = rt_get_akv('footer_button_vertical_alignment', $atts, 'CT_CSS_SKIP_RULE');

rt_customizer_output_responsive([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector'  => $root_selector,
		'operation' => 'replace-last',
		'to_add'    => $column_selector
	])),
	'variableName' => 'vertical-alignment',
	'value'        => $vertical_alignment,
	'unit'         => '',
]);

// Box shadow
rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(
		rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'suffix',
			'to_add' => 'a'
		])
	),
	'value' => rt_get_akv('headerCTAShadow', $atts, rt_customizer_box_shadow_value([
		'enable'   => true,
		'h_offset' => 0,
		'v_offset' => 5,
		'blur'     => 20,
		'spread'   => 0,
		'inset'    => false,
		'color' => [
			'color' => 'rgba(44,62,80,0.05)',
		],
	])),
	'responsive' => true
]);

rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(
		rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'suffix',
			'to_add' => 'a:hover'
		])
	),
	'value' => rt_get_akv('headerCTAShadowHover', $atts, rt_customizer_box_shadow_value([
		'enable'   => true,
		'h_offset' => 0,
		'v_offset' => 5,
		'blur'     => 20,
		'spread'   => 0,
		'inset'    => false,
		'color' => [
			'color' => 'rgba(44,62,80,0.05)',
		],
	])),
	'responsive' => true
]);
