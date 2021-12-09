<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Logo size
$logo_max_width = rt_get_akv('logoMaxWidth', $atts, 50);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(
		rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'suffix',
			'to_add' => '.site-logo-container'
		])
	),
	'variableName' => 'LogoMaxWidth',
	'value' => $logo_max_width,
]);

// Site title font
rt_customizer_output_font_css([
	'font_value' => rt_get_akv(
		'siteTitle',
		$atts,
		rt_customizer_typography_default_values([
			'size' => '27px',
			'variation' => 'n7',
			'letter-spacing' => '0em',
			'text-transform' => 'none',
			'text-decoration' => 'none',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(
		rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'suffix',
			'to_add' => '.site-title'
		])
	),
]);

// Site title color
rt_customizer_output_colors([
	'value' => rt_get_akv('siteTitleColor', $atts),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
		'hover' => ['color' => 'var(--paletteColor3)'],
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
					'to_add' => '.site-title'
				])
			),
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector(
				rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'suffix',
					'to_add' => '.site-title'
				])
			),
			'variable' => 'linkHoverColor'
		],
	],
	'responsive' => true
]);

if (isset($has_transparent_header) && $has_transparent_header) {
	rt_customizer_output_colors([
		'value' => rt_get_akv('transparentSiteTitleColor', $atts),
		'default' => [
			'default' => ['color' => 'var(--paletteColor2)'],
			'hover' => ['color' => 'var(--paletteColor3)'],
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
							'to_add' => '.site-title'
						]),
						'operation' => 'between',
						'to_add' => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'linkInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.site-title'
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

	// Site tagline color
	rt_customizer_output_colors([
		'value' => rt_get_akv('transparentSiteTaglineColor', $atts),
		'default' => [
			'default' => ['color' => 'var(--paletteColor1)'],
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
							'to_add' => '.site-description'
						]),
						'operation' => 'between',
						'to_add' => '[data-transparent-row="yes"]'
					])
				),
				'variable' => 'color'
			],
		],
		'responsive' => true
	]);
}

// sticky state
if (isset($has_sticky_header) && $has_sticky_header) {
	rt_customizer_output_colors([
		'value' => rt_get_akv('stickySiteTitleColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
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
							'to_add' => '.site-title'
						]),
						'operation' => 'between',
						'to_add' => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'linkInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_assemble_selector(
					rt_customizer_mutate_selector([
						'selector' => rt_customizer_mutate_selector([
							'selector' => $root_selector,
							'operation' => 'suffix',
							'to_add' => '.site-title'
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

	// Site tagline color
	rt_customizer_output_colors([
		'value' => rt_get_akv('stickySiteTaglineColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
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
							'to_add' => '.site-description'
						]),
						'operation' => 'between',
						'to_add' => '[data-sticky*="yes"]'
					])
				),
				'variable' => 'color'
			],
		],
		'responsive' => true
	]);

	if (rt_get_akv('has_sticky_logo_shrink', $atts, 'no') === 'yes') {
		$sticky_logo_shrink = rt_customizer_expand_responsive_value(rt_get_akv(
			'sticky_logo_shrink',
			$atts,
			70
		));

		$sticky_logo_shrink['desktop'] = intval($sticky_logo_shrink['desktop']) / 100;
		$sticky_logo_shrink['tablet'] = intval($sticky_logo_shrink['tablet']) / 100;
		$sticky_logo_shrink['mobile'] = intval($sticky_logo_shrink['mobile']) / 100;

		rt_customizer_output_responsive([
			'css' => $css,
			'tablet_css' => $tablet_css,
			'mobile_css' => $mobile_css,
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'to_add' => '[data-sticky]'
			])),
			'variableName' => 'logoStickyShrink',
			'value' => $sticky_logo_shrink,
			'unit' => ''
		]);
	}
}

// Site tagline font
$has_tagline = rt_get_akv('has_tagline', $atts, 'no');

if ($has_tagline === 'yes') {
	rt_customizer_output_font_css([
		'font_value' => rt_get_akv(
			'siteTagline',
			$atts,
			rt_customizer_typography_default_values([
				'size' => '13px',
				'variation' => 'n5',
			])
		),
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(
			rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'operation' => 'suffix',
				'to_add' => '.site-description'
			])
		),
	]);

	rt_customizer_output_colors([
		'value' => rt_get_akv('siteTaglineColor', $atts),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
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
						'to_add' => '.site-description'
					])
				),
				'variable' => 'color'
			],
		],
		'responsive' => true
	]);
}

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'important' => true,
	'value' => rt_customizer_default_akg(
		'headerLogoMargin',
		$atts,
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);


// footer logo
$horizontal_alignment = rt_get_akv('footer_logo_horizontal_alignment', $atts, 'flex-start');

if ($horizontal_alignment !== 'flex-start') {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'replace-last',
			'to_add' => '[data-column="logo"]'
		])),
		'variableName' => 'horizontal-alignment',
		'value' => $horizontal_alignment,
		'unit' => '',
	]);
}

$vertical_alignment = rt_get_akv('footer_logo_vertical_alignment', $atts, 'CT_CSS_SKIP_RULE');

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'replace-last',
		'to_add' => '[data-column="logo"]'
	])),
	'variableName' => 'vertical-alignment',
	'value' => $vertical_alignment,
	'unit' => '',
]);
