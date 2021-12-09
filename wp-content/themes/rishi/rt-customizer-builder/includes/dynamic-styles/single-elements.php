<?php
// Author Box
if (
	get_theme_mod($prefix . '_has_author_box', 'no') === 'yes'
	&&
	$prefix !== 'single_page'
) {

	$author_box_spacing = get_theme_mod($prefix . '_single_author_box_spacing', '40px');

	if ($author_box_spacing !== '40px') {
		rt_customizer_output_responsive([
			'css' => $css,
			'tablet_css' => $tablet_css,
			'mobile_css' => $mobile_css,
			'selector' => rt_customizer_prefix_selector('.author-box', $prefix),
			'variableName' => 'spacing',
			'value' => $author_box_spacing,
			'unit' => ''
		]);
	}


	$author_box_type = get_theme_mod($prefix . '_single_author_box_type', 'type-2');

	if ($author_box_type === 'type-1') {
		rt_customizer_output_colors([
			'value' => get_theme_mod($prefix . '_single_author_box_background', []),
			'default' => [
				'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			],
			'css' => $css,
			'variables' => [
				'default' => [
					'selector' => rt_customizer_prefix_selector('.author-box[data-type="type-1"]', $prefix),
					'variable' => 'background-color'
				],
			],
		]);

		rt_customizer_output_box_shadow([
			'css' => $css,
			'tablet_css' => $tablet_css,
			'mobile_css' => $mobile_css,
			'selector' => rt_customizer_prefix_selector('.author-box[data-type="type-1"]', $prefix),
			'value' => get_theme_mod(
				$prefix . '_single_author_box_shadow',
				rt_customizer_box_shadow_value([
					'enable' => true,
					'h_offset' => 0,
					'v_offset' => 50,
					'blur' => 90,
					'spread' => 0,
					'inset' => false,
					'color' => [
						'color' => 'rgba(210, 213, 218, 0.4)',
					],
				])
			),
			'responsive' => true
		]);
	}

	if ($author_box_type === 'type-2') {
		rt_customizer_output_colors([
			'value' => get_theme_mod($prefix . '_single_author_box_border', []),
			'default' => [
				'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			],
			'css' => $css,
			'variables' => [
				'default' => [
					'selector' => rt_customizer_prefix_selector('.author-box[data-type="type-2"]', $prefix),
					'variable' => 'border-color'
				],
			],
		]);
	}
}

// Posts Navigation
if (
	get_theme_mod($prefix . '_has_post_nav', 'yes') === 'yes'
	&&
	$prefix !== 'single_page'
) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_prefix_selector('.post-navigation', $prefix),
		'variableName' => 'margin',
		'value' => get_theme_mod($prefix . '_post_nav_spacing', [
			'mobile' => '40px',
			'tablet' => '60px',
			'desktop' => '80px',
		]),
		'unit' => ''
	]);

	rt_customizer_output_colors([
		'value' => get_theme_mod($prefix . '_posts_nav_font_color', []),
		'default' => [
			'default' => ['color' => 'var(--color)'],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => rt_customizer_prefix_selector('.post-navigation', $prefix),
				'variable' => 'linkInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_prefix_selector('.post-navigation', $prefix),
				'variable' => 'linkHoverColor'
			],
		],
	]);
}


// Related Posts
if (
	get_theme_mod($prefix . '_has_related_posts', 'yes') === 'yes'
	&&
	$prefix !== 'single_page'
) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_prefix_selector('.rt-related-posts-container', $prefix),
		'variableName' => 'padding',
		'value' => get_theme_mod(
			$prefix . '_related_posts_container_spacing',
			[
				'mobile' => '30px',
				'tablet' => '50px',
				'desktop' => '70px',
			]
		),
		'unit' => ''
	]);

	rt_customizer_output_background_css([
		'selector' => rt_customizer_prefix_selector('.rt-related-posts-container', $prefix),
		'css' => $css,
		'value' => get_theme_mod(
			$prefix . '_related_posts_background',
			rt_customizer_background_default_value([
				'backgroundColor' => [
					'default' => [
						'color' => '#eff1f5'
					],
				],
			])
		)
	]);

	rt_customizer_output_colors([
		'value' => get_theme_mod($prefix . '_related_posts_label_color'),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => rt_customizer_prefix_selector('.rt-related-posts-container .rt-block-title', $prefix),
				'variable' => 'headingColor'
			],
		],
	]);

	if (function_exists('rt_customizer_output_responsive_switch')) {
		rt_customizer_output_responsive_switch([
			'css' => $css,
			'tablet_css' => $tablet_css,
			'mobile_css' => $mobile_css,
			'selector' => rt_customizer_prefix_selector('.rt-related-posts-container', $prefix),
			'value' => get_theme_mod(
				$prefix . '_related_visibility',
				[
					'desktop' => true,
					'tablet' => false,
					'mobile' => false,
				]
			),
			'on' => 'block'
		]);
	}

	if (function_exists('rt_customizer_output_responsive_switch')) {
		rt_customizer_output_responsive_switch([
			'css' => $css,
			'tablet_css' => $tablet_css,
			'mobile_css' => $mobile_css,
			'selector' => rt_customizer_prefix_selector('.rt-related-posts', $prefix),
			'value' => get_theme_mod(
				$prefix . '_related_visibility',
				[
					'desktop' => true,
					'tablet' => false,
					'mobile' => false,
				]
			),
			'on' => 'grid'
		]);
	}

	rt_customizer_output_colors([
		'value' => get_theme_mod($prefix . '_related_posts_link_color'),
		'default' => [
			'default' => ['color' => 'var(--color)'],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => rt_customizer_prefix_selector('.related-entry-title', $prefix),
				'variable' => 'linkInitialColor'
			],

			'hover' => [
				'selector' => rt_customizer_prefix_selector('.related-entry-title', $prefix),
				'variable' => 'linkHoverColor'
			],
		],
	]);

	rt_customizer_output_colors([
		'value' => get_theme_mod($prefix . '_related_posts_meta_color'),
		'default' => [
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => rt_customizer_prefix_selector('.rt-related-posts .entry-meta', $prefix),
				'variable' => 'color'
			],

			'hover' => [
				'selector' => rt_customizer_prefix_selector('.rt-related-posts .entry-meta', $prefix),
				'variable' => 'linkHoverColor'
			],
		],
	]);

	rt_customizer_output_spacing([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_prefix_selector('.rt-related-posts .rt-image-container', $prefix),
		'property' => 'borderRadius',
		'value' => get_theme_mod(
			$prefix . '_related_thumb_radius',
			rt_customizer_spacing_value([
				'linked' => true,
			])
		)
	]);


	$relatedNarrowWidth = get_theme_mod($prefix . '_related_narrow_width', 750);

	if ($relatedNarrowWidth !== 750) {
		$css->put(
			rt_customizer_prefix_selector('.rt-related-posts-container', $prefix),
			'--narrow-container-max-width: ' . $relatedNarrowWidth . 'px'
		);
	}
}

//divider style
$post_strucuture = get_theme_mod( 'single_blog_post_post_structure', rishi_get_default_post_structure() );
$position        = 'First';

foreach( $post_strucuture as $structure ){                        
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
						'default' => ['variable' => "singleCategoryDividerInitialColor$position"],
						'hover'   => ['variable' => "singleCategoryDividerHoverColor$position"],
					],
				]);
			}
		}
		$position = 'Second';
	}	
}

$meta_elements = get_theme_mod( 'related_post_meta_elements', rishi_get_default_postmeta_structure() );
foreach( $meta_elements as $meta ){
    if( $meta['enabled'] == true && $meta['id'] == 'categories' ){
        rt_customizer_output_colors([
            'value'   => $meta['divider_color'],
            'default' => [
                'default' => ['color' => 'var(--paletteColor1)'],
                'hover'   => ['color' => 'var(--paletteColor3)'],
            ],
            'css'       => $css,
            'variables' => [
                'default' => ['variable' => "relatedPostCategoryDividerInitialColor"],
                'hover'   => ['variable' => "relatedPostCategoryDividerHoverColor"],
            ],
        ]);
    }
}