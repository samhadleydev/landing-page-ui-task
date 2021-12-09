<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

if (empty($default_height)) {
	$default_height = [
		'mobile' => 70,
		'tablet' => 70,
		'desktop' => 120,
	];
}

if (empty($default_background)) {
	$default_background = rt_customizer_background_default_value([
		'backgroundColor' => [
			'default' => [
				'color' => 'var(--paletteColor5)',
			],
		],
	]);
}

// Row height
rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'variableName' => 'height',
	'value' => rt_get_akv('headerRowHeight', $atts, $default_height)
]);

// Row background
rt_customizer_output_background_css([
	'selector' => rt_customizer_assemble_selector($root_selector),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => rt_get_akv('headerRowBackground', $atts, $default_background),
	'responsive' => true,
]);


// Top Border
$headerRowTopBorderFullWidth = rt_get_akv('headerRowTopBorderFullWidth', $atts, 'no');

$top_has_border_selector = rt_customizer_mutate_selector([
	'selector' => $root_selector,
	'operation' => 'suffix',
	'to_add' => '> div'
]);

$top_has_no_border_selector = $root_selector;

if ($headerRowTopBorderFullWidth === 'yes') {
	$top_has_border_selector = $root_selector;

	$top_has_no_border_selector = rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'suffix',
		'to_add' => '> div'
	]);
}

$headerRowTopBorder = rt_get_akv('headerRowTopBorder', $atts, [
	'width' => 1,
	'style' => 'none',
	'color' => [
		'color' => 'rgba(44,62,80,0.2)',
	],
]);

rt_customizer_output_border([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($top_has_border_selector),
	'variableName' => 'borderTop',
	'value' => $headerRowTopBorder,
	'responsive' => true
]);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($top_has_no_border_selector),
	'variableName' => 'borderTop',
	'value' => [
		'desktop' => 'none',
		'tablet' => 'none',
		'mobile' => 'none'
	],
	'unit' => ''
]);


// Bottom Border
$headerRowBottomBorderFullWidth = rt_get_akv('headerRowBottomBorderFullWidth', $atts, 'no');

$bottom_has_border_selector = rt_customizer_mutate_selector([
	'selector' => $root_selector,
	'operation' => 'suffix',
	'to_add' => '> div'
]);
$bottom_has_no_border_selector = $root_selector;

if ($headerRowBottomBorderFullWidth === 'yes') {
	$bottom_has_border_selector = $root_selector;

	$bottom_has_no_border_selector = rt_customizer_mutate_selector([
		'selector' => $root_selector,
		'operation' => 'suffix',
		'to_add' => '> div'
	]);
}

$headerRowBottomBorder = rt_get_akv('headerRowBottomBorder', $atts, [
	'width' => 1,
	'style' => 'none',
	'color' => [
		'color' => 'rgba(44,62,80,0.2)',
	],
]);

rt_customizer_output_border([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($bottom_has_border_selector),
	'variableName' => 'borderBottom',
	'value' => $headerRowBottomBorder,
	'responsive' => true
]);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($bottom_has_no_border_selector),
	'variableName' => 'borderBottom',
	'value' => [
		'desktop' => 'none',
		'tablet' => 'none',
		'mobile' => 'none'
	],
	'unit' => ''
]);

// Box shadow
rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'value' => rt_get_akv('headerRowShadow', $atts, rt_customizer_box_shadow_value([
		'enable' => false,
		'h_offset' => 0,
		'v_offset' => 10,
		'blur' => 20,
		'spread' => 0,
		'inset' => false,
		'color' => [
			'color' => 'rgba(44,62,80,0.05)',
		],
	])),
	'responsive' => true,
	'should_skip_output' => false
]);

// transparent state
if (isset($has_transparent_header) && $has_transparent_header) {
	// background
	rt_customizer_output_background_css([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'el-prefix',
			'to_add' => '[data-transparent-row="yes"]'
		])),

		'value' => rt_get_akv(
			'transparentHeaderRowBackground',
			$atts,
			rt_customizer_background_default_value([
				'backgroundColor' => [
					'default' => [
						'color' => 'rgba(255,255,255,0)',
					],
				],
			])
		),
		'responsive' => true
	]);

	// Border top
	$transparentHeaderRowTopBorder = rt_get_akv(
		'transparentHeaderRowTopBorder',
		$atts,
		[
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => 'rgba(44,62,80,0.2)',
			],
		]
	);

	rt_customizer_output_border([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $top_has_border_selector,
			'operation' => 'el-prefix',
			'to_add' => '[data-transparent-row="yes"]'
		])),
		'variableName' => 'borderTop',
		'value' => $transparentHeaderRowTopBorder,
		'responsive' => true
	]);

	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $top_has_no_border_selector,
			'operation' => 'el-prefix',
			'to_add' => '[data-transparent-row="yes"]'
		])),

		'variableName' => 'borderTop',
		'value' => [
			'desktop' => 'none',
			'tablet' => 'none',
			'mobile' => 'none'
		],
		'unit' => ''
	]);

	// Border bottom
	$transparentHeaderRowBottomBorder = rt_get_akv(
		'transparentHeaderRowBottomBorder',
		$atts,
		[
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => 'rgba(44,62,80,0.2)',
			],
		]
	);

	rt_customizer_output_border([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $bottom_has_border_selector,
			'operation' => 'el-prefix',
			'to_add' => '[data-transparent-row="yes"]'
		])),

		'variableName' => 'borderBottom',
		'value' => $transparentHeaderRowBottomBorder,
		'responsive' => true
	]);

	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $bottom_has_no_border_selector,
			'operation' => 'el-prefix',
			'to_add' => '[data-transparent-row="yes"]'
		])),

		'variableName' => 'borderBottom',
		'value' => [
			'desktop' => 'none',
			'tablet' => 'none',
			'mobile' => 'none'
		],
		'unit' => ''
	]);

	// box shadow
	rt_customizer_output_box_shadow([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'operation' => 'el-prefix',
			'to_add' => '[data-transparent-row="yes"]'
		])),

		'value' => rt_get_akv('transparentHeaderRowShadow', $atts, rt_customizer_box_shadow_value([
			'enable' => false,
			'h_offset' => 0,
			'v_offset' => 10,
			'blur' => 20,
			'spread' => 0,
			'inset' => false,
			'color' => [
				'color' => 'rgba(44,62,80,0.05)',
			],
		])),
		'responsive' => true,
		'should_skip_output' => false
	]);
}

// sticky state
if (isset($has_sticky_header) && $has_sticky_header) {
	// background
	rt_customizer_output_background_css([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'to_add' => '[data-sticky*="yes"]'
		])),

		'value' => rt_get_akv('stickyHeaderRowBackground', $atts, $default_background),
		'responsive' => true
	]);

	if (rt_get_akv('has_sticky_shrink', $atts, 'no') === 'yes') {
		rt_customizer_output_responsive([
			'css' => $css,
			'tablet_css' => $tablet_css,
			'mobile_css' => $mobile_css,
			'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
				'selector' => $root_selector,
				'to_add' => '[data-sticky]'
			])),
			'variableName' => 'stickyShrink',
			'value' => rt_get_akv('stickyHeaderRowShrink', $atts, 70),
			'unit' => ''
		]);
	}

	// Border top
	$stickyHeaderRowTopBorder = rt_get_akv(
		'stickyHeaderRowTopBorder',
		$atts,
		[
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => 'rgba(44,62,80,0.2)',
			],
		]
	);

	rt_customizer_output_border([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $top_has_border_selector,
			'to_add' => '[data-sticky*="yes"]'
		])),
		'variableName' => 'borderTop',
		'value' => $stickyHeaderRowTopBorder,
		'responsive' => true
	]);

	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $top_has_no_border_selector,
			'to_add' => '[data-sticky*="yes"]'
		])),

		'variableName' => 'borderTop',
		'value' => [
			'desktop' => 'none',
			'tablet' => 'none',
			'mobile' => 'none'
		],
		'unit' => ''
	]);

	// Border bottom
	$stickyHeaderRowBottomBorder = rt_get_akv(
		'stickyHeaderRowBottomBorder',
		$atts,
		[
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => 'rgba(44,62,80,0.2)',
			],
		]
	);

	rt_customizer_output_border([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $bottom_has_border_selector,
			'to_add' => '[data-sticky*="yes"]'
		])),

		'variableName' => 'borderBottom',
		'value' => $stickyHeaderRowBottomBorder,
		'responsive' => true
	]);

	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,

		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $bottom_has_no_border_selector,
			'to_add' => '[data-sticky*="yes"]'
		])),

		'variableName' => 'borderBottom',
		'value' => [
			'desktop' => 'none',
			'tablet' => 'none',
			'mobile' => 'none'
		],
		'unit' => ''
	]);

	// box shadow
	rt_customizer_output_box_shadow([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(rt_customizer_mutate_selector([
			'selector' => $root_selector,
			'to_add' => '[data-sticky*="yes"]'
		])),
		'value' => rt_get_akv('stickyHeaderRowShadow', $atts, rt_customizer_box_shadow_value([
			'enable' => false,
			'h_offset' => 0,
			'v_offset' => 10,
			'blur' => 20,
			'spread' => 0,
			'inset' => false,
			'color' => [
				'color' => 'rgba(44,62,80,0.05)',
			],
		])),
		'responsive' => true,
		'should_skip_output' => false
	]);
}
