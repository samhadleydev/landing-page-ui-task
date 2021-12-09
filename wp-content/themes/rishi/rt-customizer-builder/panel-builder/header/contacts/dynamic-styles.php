<?php
// Margin
rt_customizer_output_spacing([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => '[data-header*="type-1"] [data-id="contacts"].ct-header-contact-info',
	'important'  => true,
	'value' => rt_customizer_default_akg(
		'contacts_margin', $atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

$contacts_icon_size = rt_get_akv( 'contacts_icon_size', $atts, 15 );

if ($contacts_icon_size !== 15) {
	rt_customizer_output_responsive([
		'css'          => $css,
		'tablet_css'   => $tablet_css,
		'mobile_css'   => $mobile_css,
		'selector'     => '[data-header*="type-1"] [data-id="contacts"].ct-header-contact-info .ct-icon-container',
		'variableName' => 'icon-size',
		'value'        => $contacts_icon_size,
		'responsive'   => true
	]);
}

$contacts_spacing = rt_get_akv( 'contacts_spacing', $atts, 15 );

if ($contacts_spacing !== 15) {
	rt_customizer_output_responsive([
		'css'          => $css,
		'tablet_css'   => $tablet_css,
		'mobile_css'   => $mobile_css,
		'selector'     => '[data-header*="type-1"] [data-id="contacts"].ct-header-contact-info',
		'variableName' => 'items-spacing',
		'value'        => $contacts_spacing,
		'responsive'   => true
	]);
}

rt_customizer_output_font_css([
	'font_value' => rt_get_akv( 'contacts_font', $atts,
		rt_customizer_typography_default_values([
			'size' => '14px',
			'line-height' => '1.3',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector( $root_selector ),
]);


// default state
rt_customizer_output_colors([
	'value' => rt_get_akv('contacts_font_color', $atts),
	'default' => [
		'default'      => [ 'color' => 'var(--paletteColor1)' ],
		'link_initial' => [ 'color' => 'var(--paletteColor2)' ],
		'link_hover'   => [ 'color' => 'var(--paletteColor4)' ],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector'  => $root_selector,
					'operation' => 'suffix',
					'to_add'    => '.contact-info'
				])
			),
			'variable' => 'color'
		],

		'link_initial' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector'  => $root_selector,
					'operation' => 'suffix',
					'to_add'    => '.contact-info'
				])
			),
			'variable' => 'linkInitialColor'
		],

		'link_hover' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector'  => $root_selector,
					'operation' => 'suffix',
					'to_add'    => '.contact-info'
				])
			),
			'variable' => 'linkHoverColor'
		],
	],
	'responsive' => true
]);

rt_customizer_output_colors([
	'value' => rt_get_akv('contacts_icon_color', $atts),
	'default' => [
		'default' => [ 'color' => 'var(--paletteColor4)' ],
		'hover' => [ 'color' => 'var(--paletteColor2)' ],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,

	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector'  => $root_selector,
					'operation' => 'suffix',
					'to_add'    => '.ct-icon-container'
				])
			),
			'variable' => 'icon-color'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector'  => $root_selector,
					'operation' => 'suffix',
					'to_add'    => '.ct-icon-container'
				])
			),
			'variable' => 'icon-hover-color'
		]
	],

	'responsive' => true
]);

rt_customizer_output_colors([
	'value' => rt_get_akv('contacts_icon_background', $atts),
	'default' => [
		'default' => [ 'color' => 'var(--paletteColor6)' ],
		'hover' => [ 'color' => 'rgba(218, 222, 228, 0.7)' ],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,

	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'suffix',
					'to_add' => '.ct-icon-container'
				])
			),
			'variable' => 'background-color'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'suffix',
					'to_add' => '.ct-icon-container'
				])
			),
			'variable' => 'background-hover-color'
		]
	],
	'responsive' => true
]);


// transparent state
if (isset($has_transparent_header) && $has_transparent_header) {
	rt_customizer_output_colors([
		'value' => rt_get_akv('transparent_contacts_font_color', $atts),
		'default' => [
			'default' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'link_initial' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'link_hover' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
		],
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.contact-info'
						]),
						'operation' => 'between',
						'to_add' => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'color'
			],

			'link_initial' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.contact-info'
						]),
						'operation' => 'between',
						'to_add' => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'linkInitialColor'
			],

			'link_hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.contact-info'
						]),
						'operation' => 'between',
						'to_add' => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'linkHoverColor'
			],
		],
		'responsive' => true
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('transparent_contacts_icon_color', $atts),
		'default' => [
			'default' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'hover' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
		],
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'icon-color'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'icon-hover-color'
			],
		],
		'responsive' => true
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('transparent_contacts_icon_background', $atts),
		'default' => [
			'default' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'hover' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
		],
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'background-color'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-transparent-row="yes"]'
				])),
				'variable' => 'background-hover-color'
			],
		],
		'responsive' => true
	]);
}


// sticky state
if (isset($has_sticky_header) && $has_sticky_header) {
	rt_customizer_output_colors([
		'value' => rt_get_akv('sticky_contacts_font_color', $atts),
		'default' => [
			'default' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'link_initial' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'link_hover' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
		],
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.contact-info'
						]),
						'operation' => 'between',
						'to_add' => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'color'
			],

			'link_initial' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.contact-info'
						]),
						'operation' => 'between',
						'to_add' => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'linkInitialColor'
			],

			'link_hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.contact-info'
						]),
						'operation' => 'between',
						'to_add' => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'linkHoverColor'
			],
		],
		'responsive' => true
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('sticky_contacts_icon_color', $atts),
		'default' => [
			'default' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'hover' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
		],
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'icon-color'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'icon-hover-color'
			],
		],
		'responsive' => true
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('sticky_contacts_icon_background', $atts),
		'default' => [
			'default' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
			'hover' => [ 'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT') ],
		],
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'variables' => [
			'default' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => rt_customizer_mutate_selector([
						'selector' => $root_selector,
						'operation' => 'suffix',
						'to_add' => '.ct-icon-container'
					]),
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'background-color'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'between',
					'to_add' => '[data-sticky*="yes"]'
				])),
				'variable' => 'background-hover-color'
			],
		],
		'responsive' => true
	]);
}
