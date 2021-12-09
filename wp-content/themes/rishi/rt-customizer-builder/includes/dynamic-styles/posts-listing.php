<?php

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		$prefix . '_cardTitleFont',
		rt_customizer_typography_default_values([
			'size' => [
				'desktop' => '20px',
				'tablet'  => '20px',
				'mobile'  => '18px'
			],
			'line-height' => '1.3'
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('.entry-card .entry-title', $prefix)
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardTitleColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-card .entry-title', $prefix),
			'variable' => 'headingColor'
		],
		'hover' => [
			'selector' => rt_customizer_prefix_selector('.entry-card .entry-title', $prefix),
			'variable' => 'linkHoverColor'
		],
	],
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		$prefix . '_cardExcerptFont',
		rt_customizer_typography_default_values([
			'size' => [
				'desktop' => '16px',
				'tablet'  => '16px',
				'mobile'  => '16px'
			],
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('.entry-excerpt', $prefix)
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardExcerptColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')]
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-excerpt', $prefix),
			'variable' => 'color'
		]
	],
]);

rt_customizer_output_font_css([
	'font_value' => get_theme_mod(
		$prefix . '_cardMetaFont',
		rt_customizer_typography_default_values([
			'size' => [
				'desktop' => '12px',
				'tablet'  => '12px',
				'mobile'  => '12px'
			],
			'variation' => 'n6',
			'text-transform' => 'uppercase',
		])
	),
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('.entry-card .entry-meta', $prefix)
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardMetaColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-card .entry-meta', $prefix),
			'variable' => 'color'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector('.entry-card .entry-meta', $prefix),
			'variable' => 'linkHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardButtonSimpleTextColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-button[data-type="simple"]', $prefix),
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector('.entry-button[data-type="simple"]', $prefix),
			'variable' => 'linkHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardButtonBackgroundTextColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-button[data-type="background"]', $prefix),
			'variable' => 'buttonTextInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector('.entry-button[data-type="background"]', $prefix),
			'variable' => 'buttonTextHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardButtonOutlineTextColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-button[data-type="outline"]', $prefix),
			'variable' => 'linkInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector('.entry-button[data-type="outline"]', $prefix),
			'variable' => 'linkHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardButtonColor'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.entry-button', $prefix),
			'variable' => 'buttonInitialColor'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector('.entry-button', $prefix),
			'variable' => 'buttonHoverColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod($prefix . '_cardBackground'),
	'default' => [
		'default' => ['color' => '#ffffff'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('[data-cards="boxed"] .entry-card', $prefix),
			'variable' => 'cardBackground'
		],
	],
]);

rt_customizer_output_border([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('[data-cards="boxed"] .entry-card', $prefix),
	'variableName' => 'border',
	'value' => get_theme_mod($prefix . '_cardBorder', [
		'width' => 1,
		'style' => 'none',
		'color' => [
			'color' => 'rgba(44,62,80,0.2)',
		],
	]),
	'responsive' => true
]);

rt_customizer_output_border([
	'css' => $css,
	'selector' => rt_customizer_prefix_selector('.entry-card', $prefix),
	'variableName' => 'entry-divider',
	'value' => get_theme_mod($prefix . '_entryDivider', [
		'width' => 1,
		'style' => 'solid',
		'color' => [
			'color' => 'rgba(224, 229, 235, 0.8)',
		],
	])
]);

rt_customizer_output_border([
	'css' => $css,
	'selector' => rt_customizer_prefix_selector('[data-cards="simple"] .entry-card', $prefix),
	'variableName' => 'border',
	'value' => get_theme_mod($prefix . '_cardDivider', [
		'width' => 1,
		'style' => 'dashed',
		'color' => [
			'color' => 'rgba(224, 229, 235, 0.8)',
		],
	])
]);

$cards_gap = get_theme_mod($prefix . '_cardsGap', 30);

if ($cards_gap !== 30) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_prefix_selector('.entries', $prefix),
		'variableName' => 'cardsGap',
		'value' => $cards_gap
	]);
}

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('[data-cards="boxed"] .entry-card', $prefix),
	'variableName' => 'cardSpacing',
	'value' => get_theme_mod($prefix . '_card_spacing', [
		'mobile' => 25,
		'tablet' => 35,
		'desktop' => 35,
	])
]);

// Border radius
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('[data-cards="boxed"] .entry-card', $prefix),
	'property' => 'borderRadius',
	'value' => get_theme_mod(
		$prefix . '_cardRadius',
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

// Box shadow
rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('[data-cards="boxed"] .entry-card', $prefix),
	'value' => get_theme_mod($prefix . '_cardShadow', rt_customizer_box_shadow_value([
		'enable' => true,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur' => 18,
		'spread' => -6,
		'inset' => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.04)',
		],
	])),
	'responsive' => true
]);

// Featured Image Radius
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_prefix_selector('.entry-card .rt-image-container', $prefix),
	'property' => 'borderRadius',
	'value' => get_theme_mod(
		$prefix . '_cardThumbRadius',
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

//divider style
$defaults         = rishi_get_layouts_defaults();
$blog_structure   = get_theme_mod( 'archive_blog_post_structure', rishi_get_default_blogpost_structure() );
$position         = 'First';
$divider_position = 'First';
$default          = 'blogCategoryDividerInitialColor';
$hover            = 'blogCategoryDividerHoverColor';
$heading_font     = 'blogHeadingFontSize';
$divider_margin   = 'blogDividerMargin';

if( is_archive() ){
	if( is_author() ){
		$blog_structure = get_theme_mod( 'author_post_structure', rishi_get_default_blogpost_structure() );
		$default        = 'authorCategoryDividerInitialColor';
		$hover          = 'authorCategoryDividerHoverColor';
		$heading_font   = 'authorHeadingFontSize';
		$divider_margin = 'authorDividerMargin';
	}else{
		$blog_structure = get_theme_mod( 'archive_post_structure', rishi_get_default_blogpost_structure() );
		$default        = 'archiveCategoryDividerInitialColor';
		$hover          = 'archiveCategoryDividerHoverColor';
		$heading_font   = 'archiveHeadingFontSize';
		$divider_margin = 'archiveDividerMargin';
	}
}

if( is_search() ){
	$blog_structure = get_theme_mod( 'search_post_structure', rishi_get_default_blogpost_structure() );
	$default        = 'searchCategoryDividerInitialColor';
	$hover          = 'searchCategoryDividerHoverColor';
	$heading_font   = 'searchHeadingFontSize';
	$divider_margin = 'searchDividerMargin';
}

foreach( $blog_structure as $structure ){                        
	if( $structure['enabled'] == true && $structure['id'] == 'custom_meta' ){
		foreach( $structure['meta_elements'] as $meta ){
            if( $meta['enabled'] == true && $meta['id'] == 'categories' ){
				rt_customizer_output_colors([
					'value'   => $meta['divider_color'],
					'default' => [
						'default' => ['color' => 'var(--paletteColor1)'],
						'hover'   => ['color' => 'var(--paletteColor3)'],
					],
					'css'       => $css,
					'variables' => [
						'default' => ['variable' => $default . $position],
						'hover'   => ['variable' => $hover . $position],
					],
				]);
			}
		}
		$position = 'Second';
	}
    if( $structure['enabled'] == true && $structure['id'] == 'custom_title' ){
        rt_customizer_output_responsive([
            'css'          => $css,
            'tablet_css'   => $tablet_css,
            'mobile_css'   => $mobile_css,
            'selector'     => ':root',
            'variableName' => $heading_font,
            'value'        => $structure['font_size'],
            'unit'         => ''
        ]);
    }
    if( $structure['enabled'] == true && $structure['id'] == 'divider' ){
        rt_customizer_output_spacing([
            'css'        => $css,
            'tablet_css' => $tablet_css,
            'mobile_css' => $mobile_css,
            'selector'   => ':root',
            'property'   => $divider_margin . $divider_position,
            'value'      => $structure['divider_margin']
        ]);
        $divider_position = 'Second';
    }
}