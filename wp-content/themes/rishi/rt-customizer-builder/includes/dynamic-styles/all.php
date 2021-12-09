<?php

$colordefaults = rishi_get_color_defaults();
// Color primary
rt_customizer_output_colors([
	'value' => get_theme_mod('primary_color'),
	'default' => [
		'default' => ['color' => $colordefaults['primary_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'primaryColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('base_color'),
	'default' => [
		'default' => ['color' => $colordefaults['base_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'baseColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('genheadingColor'),
	'default' => [
		'default' => ['color' => $colordefaults['genheadingColor']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'genheadingColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('genLinkColor'),
	'default' => [
		'default' => ['color' => $colordefaults['genLinkColor']],
		'hover' => ['color' => $colordefaults['genLinkHoverColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'genLinkColor'],
		'hover' => ['variable' => 'genLinkHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('textSelectionColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
		'hover' => ['color' => $colordefaults['textSelectionColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'textSelectionColor'],
		'hover' => ['variable' => 'textSelectionHoverColor'],
	],
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('genborderColor'),
	'default' => [
		'default' => ['color' => $colordefaults['genborderColor']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'genborderColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_text_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_text_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'btnTextColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_text_hover_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_text_hover_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'btnTextHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_bg_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_bg_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'btnBgColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_bg_hover_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_bg_hover_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'btnBgHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_border_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_border_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'btnBorderColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_border_hover_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_border_hover_color']],
		'selector' => ':root',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'btnBorderHoverColor'],
	],
]);


// $css->put(':root', '--primaryColor: ' . get_theme_mod('primary_color') );

//color pallette
rt_customizer_output_colors([
	'value' => get_theme_mod('colorPalette'),
	'default' => [
		'color1' => ['color' => 'rgba(41, 41, 41, 0.9)'],
		'color2' => ['color' => '#292929'],
		'color3' => ['color' => '#307ac9'],
		'color4' => ['color' => '#5081F5'],
		'color5' => ['color' => '#ffffff'],
		'color6' => ['color' => '#EDF2FE'],
		'color7' => ['color' => '#F6F9FE'],
		'color8' => ['color' => '#F9FBFE'],
	],
	'css' => $css,
	'variables' => [
		'color1' => ['variable' => 'paletteColor1'],
		'color2' => ['variable' => 'paletteColor2'],
		'color3' => ['variable' => 'paletteColor3'],
		'color4' => ['variable' => 'paletteColor4'],
		'color5' => ['variable' => 'paletteColor5'],
		'color6' => ['variable' => 'paletteColor6'],
		'color7' => ['variable' => 'paletteColor7'],
		'color8' => ['variable' => 'paletteColor8'],
	],
]);

// Colors
rt_customizer_output_colors([
	'value' => get_theme_mod('fontColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'color'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('linkColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor1)'],
		'hover' => ['color' => 'var(--paletteColor2)'],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'linkInitialColor'],
		'hover' => ['variable' => 'linkHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('selectionColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
		'hover' => ['color' => 'var(--paletteColor1)'],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'selectionTextColor'],
		'hover' => ['variable' => 'selectionBackgroundColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('border_color'),
	'default' => [
		'default' => ['color' => 'rgba(224, 229, 235, 0.9)'],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'border-color'],
	],
]);


// Heading
rt_customizer_output_colors([
	'value' => get_theme_mod('headingColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor4)'],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root',
			'variable' => 'headingColor'
		],
	],
]);

// Content spacing
$contentSpacingMap = [
	'none' => '0',
	'compact' => '0.8em',
	'comfortable' => '1.5em',
	'spacious' => '2em',
];

$contentSpacing = get_theme_mod('contentSpacing', 'comfortable');

$contentSpacing = isset(
	$contentSpacingMap[$contentSpacing]
) ? $contentSpacingMap[$contentSpacing] : $contentSpacingMap['comfortable'];

$css->put(':root', '--contentSpacing: ' . $contentSpacing);

// Buttons
$buttondefaults = rishi_get_button_defaults();

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'variableName' => 'bottonRoundness',
	'value' => get_theme_mod('botton_roundness', [
		'desktop' => $buttondefaults['botton_roundness']['desktop'],
		'tablet'  => $buttondefaults['botton_roundness']['tablet'],
		'mobile'  => $buttondefaults['botton_roundness']['mobile'],
	]),
	'unit'         => '',
]);


rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'property' => 'buttonPadding',
	'value' => get_theme_mod(
		'button_padding',
		rt_customizer_spacing_value([
			'linked' => true,
			'top'    => $buttondefaults['button_padding']['top'],
			'left'   => $buttondefaults['button_padding']['left'],
			'right'  => $buttondefaults['button_padding']['right'],
			'bottom' => $buttondefaults['button_padding']['bottom'],
		])
	)
]);


rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'variableName' => 'buttonMinHeight',
	'value' => get_theme_mod('buttonMinHeight', [
		'mobile' => 45,
		'tablet' => 45,
		'desktop' => 45,
	])
]);

if (get_theme_mod('buttonHoverEffect', 'yes') !== 'yes') {
	$css->put(':root', '--buttonShadow: none');
	$css->put(':root', '--buttonTransform: none');
}

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'property' => 'buttonBorderRadius',
	'value' => get_theme_mod(
		'buttonRadius',
		rt_customizer_spacing_value([
			'linked' => true,
			'top' => '3px',
			'left' => '3px',
			'right' => '3px',
			'bottom' => '3px',
		])
	)
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('buttonTextColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
		'hover' => ['color' => 'var(--paletteColor5)'],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'buttonTextInitialColor'],
		'hover' => ['variable' => 'buttonTextHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('buttonColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor3)'],
		'hover' => ['color' => 'var(--paletteColor2)'],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'buttonInitialColor'],
		'hover' => ['variable' => 'buttonHoverColor'],
	],
]);

// Layout
$max_site_width = get_theme_mod('maxSiteWidth', 1290);
$css->put(
	':root',
	'--container-max-width: ' . $max_site_width . 'px'
);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'variableName' => 'content-vertical-spacing',
	'unit' => '',
	'value' => get_theme_mod('contentAreaSpacing', [
		'desktop' => '60px',
		'tablet' => '60px',
		'mobile' => '50px',

	])
]);

$narrowContainerWidth = get_theme_mod('narrowContainerWidth', 750);
$css->put(
	':root',
	'--narrow-container-max-width: ' . $narrowContainerWidth . 'px'
);

$wideOffset = get_theme_mod('wideOffset', 130);
$css->put(
	':root',
	'--wide-offset: ' . $wideOffset . 'px'
);

// Sidebar
$sidebar_width = get_theme_mod('sidebarWidth', '27');
$css->put('[data-sidebar]', '--sidebarWidth: ' . $sidebar_width . '%');
$css->put('[data-sidebar]', '--sidebarWidthNoUnit: ' . intval($sidebar_width));

$sidebarGap = rt_customizer_get_with_percentage('sidebarGap', '4%');
$css->put('[data-sidebar]', '--sidebarGap: ' . $sidebarGap);

$sidebarOffset = get_theme_mod('sidebarOffset', '50');
$css->put('[data-sidebar]', '--sidebarOffset: ' . $sidebarOffset . 'px');

$defaults = rishi_get_layouts_defaults();

$content_sidebar_width = get_theme_mod('content_sidebar_width',$defaults['content_sidebar_width'] );

rt_customizer_output_responsive([
  'css'          => $css,
  'tablet_css'   => $tablet_css,
  'mobile_css'   => $mobile_css,
  'selector'     => ':root',
  'variableName' => 'contentSidebarWidth',
  'unit'         => '%',
  'value'        =>  $content_sidebar_width,
]);

rt_customizer_output_responsive([
  'css'          => $css,
  'tablet_css'   => $tablet_css,
  'mobile_css'   => $mobile_css,
  'selector'     => ':root',
  'variableName' => 'sidebarWidgetSpacing',
  'unit'         => '',
  'value' => get_theme_mod('sidebar_widget_spacing', [
      'desktop' => $defaults['sidebar_widget_spacing']['desktop'],
      'tablet'  => $defaults['sidebar_widget_spacing']['tablet'],
      'mobile'  => $defaults['sidebar_widget_spacing']['mobile'],
  ]),
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('sidebarWidgetsTitleColor'),
	'default' => [
		'default' => ['color' => 'var(--genheadingColor)'],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '#secondary',
			'variable' => 'headingColor'
		],
	],
	'responsive' => true
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('widgets_link_color'),
	'default' => [
		'default' => ['color' => 'var(--primaryColor)'],
		'hover'   => ['color' => 'var(--paletteColor3)'],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '.sidebar-wrap-main > *',
			'variable' => 'widgetsLinkColor'
		],
		'hover' => [
			'selector' => '.sidebar-wrap-main',
			'variable' => 'widgetsLinkHoverColor'
		],
	],
	'responsive' => true
]);


rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => "#secondary",
	'variableName' => 'widgetsFontSize',
	'value' => get_theme_mod('widgets_font_size', [
		'desktop' => $defaults['widgets_font_size']['desktop'],
		'tablet'  => $defaults['widgets_font_size']['tablet'],
		'mobile'  => $defaults['widgets_font_size']['mobile'],
	]),
	'unit' => '',
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'property' => 'widgetsContentAreaSpacing',
	'value' => get_theme_mod(
		'widgets_content_area_spacing',
		rt_customizer_spacing_value([
			'linked' => true,
			'top'    => '10px',
			'left'   => '20px',
			'right'  => '10px',
			'bottom' => '20px',
		])
	)
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('sidebarWidgetsHeadingFontColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '.widget > *:not(.widget-title)',
			'variable' => 'headingColor'
		],
	],
	'responsive' => true
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('sidebarBackgroundColor'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor5)'],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '[data-sidebar] > aside',
			'variable' => 'sidebarBackgroundColor'
		],
	],
	'responsive' => true
]);

// Sidebar border
rt_customizer_output_border([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'aside[data-type="type-2"]',
	'variableName' => 'border',
	'value' => get_theme_mod('sidebarBorder', [
		'width' => 1,
		'style' => 'none',
		'color' => [
			'color' => 'var(--paletteColor6)',
		],
	]),
	'responsive' => true
]);

rt_customizer_output_border([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'aside[data-type="type-3"]',
	'variableName' => 'border',
	'value' => get_theme_mod('sidebarDivider', [
		'width' => 1,
		'style' => 'solid',
		'color' => [
			'color' => 'var(--paletteColor6)',
		],
	]),
	'responsive' => true
]);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.rt-sidebar',
	'variableName' => 'sidebar-widgets-spacing',
	'value' => get_theme_mod('sidebarWidgetsSpacing', [
		'desktop' => 60,
		'tablet' => 40,
		'mobile' => 40,
	])
]);

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => "[data-sidebar] > aside",
	'variableName' => 'sidebarInnerSpacing',
	'value' => get_theme_mod('sidebarInnerSpacing', [
		'mobile' => 35,
		'tablet' => 35,
		'desktop' => 35,
	])
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'aside[data-type="type-2"]',
	'property' => 'borderRadius',
	'value' => get_theme_mod(
		'sidebarRadius',
		rt_customizer_spacing_value([
			'linked' => true,
		])
	)
]);

// Sidebar shadow
rt_customizer_output_box_shadow([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => 'aside[data-type="type-2"]',
	'value' => get_theme_mod('sidebarShadow', rt_customizer_box_shadow_value([
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
// Passepartout
$has_passepartout = get_theme_mod('has_passepartout', 'no');

if ($has_passepartout !== 'no' || is_customize_preview()) {
	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => '[data-frame]',
		'variableName' => 'frame-size',
		'value' => get_theme_mod('passepartoutSize', 10)
	]);

	rt_customizer_output_colors([
		'value' => get_theme_mod('passepartoutColor'),
		'default' => [
			'default' => ['color' => 'var(--paletteColor1)'],
		],
		'css' => $css,
		'variables' => [
			'default' => [
				'selector' => '[data-frame]',
				'variable' => 'frame-color'
			],
		],
	]);
}

//breadcrumbs 
rt_customizer_output_colors([
	'value' => get_theme_mod('breadcrumbs_color'),
	'default' => [
		'default' => ['color' => $colordefaults['breadcrumbsColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root',
			'variable' => 'breadcrumbsColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('breadcrumbs_current_color'),
	'default' => [
		'default' => ['color' => $colordefaults['breadcrumbsCurrentColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root',
			'variable' => 'breadcrumbsCurrentColor'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('breadcrumbsSeparatorColor'),
	'default' => [
		'default' => ['color' => $colordefaults['breadcrumbsSeparatorColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root',
			'variable' => 'breadcrumbsSeparatorColor'
		],
	],
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.rishi-breadcrumb-main-wrap',
	'variableName' => 'alignment',
	'value'        => get_theme_mod( 'breadcrumbs_alignment', 'left'),
	'unit'		   => '',	
	'responsive'   => false,
  ]);

//pages settings

$prefixpage = 'single_page_';

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.page .entry-header',
	'variableName' => 'alignment',
	'value'        => get_theme_mod( $prefixpage . 'alignment', 'left'),
	'unit'		   => '',	
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.page .entry-header',
	'variableName' => 'margin-bottom',
	'value' => get_theme_mod( $prefixpage . 'margin', [
		'desktop' => 50,
		'tablet' => 30,
		'mobile' => 30,
	])
]);

rt_customizer_output_background_css([
	'selector' => '.box-layout.page .main-content-wrapper, .content-box-layout.page .main-content-wrapper',
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		$prefixpage . 'content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor5)'
				],
			],
		])
	),
	'responsive' => true,
]);


rt_customizer_output_box_shadow([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.box-layout.page .main-content-wrapper, .content-box-layout.page .main-content-wrapper',
	'variableName' => 'box-shadow',
	'value' => get_theme_mod( $prefixpage . 'content_boxed_shadow', rt_customizer_box_shadow_value([
		'enable'   => false,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur'     => 18,
		'spread'   => -6,
		'inset'    => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.04)',
		],
	])),
	'responsive' => true
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.box-layout.page .main-content-wrapper, .content-box-layout.page .main-content-wrapper',
	'property' => 'padding',
	'value' => get_theme_mod(
		$prefixpage . 'boxed_content_spacing',
		rt_customizer_spacing_value([
			'linked' => true,
		    'top'    => '40px',
		    'left'   => '40px',
		    'right'  => '40px',
		    'bottom' => '40px',
		])
	)
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.box-layout.page .main-content-wrapper, .content-box-layout.page .main-content-wrapper',
	'property' => 'box-radius',
	'value' => get_theme_mod(
		$prefixpage . 'content_boxed_radius',
		rt_customizer_spacing_value([
			'linked' => true,
			'top'    => '3px',
			'left'   => '3px',
			'right'  => '3px',
			'bottom' => '3px',
		])
	)
]);

//single post

$prefixpost = 'single_post_';

rt_customizer_output_colors([
	'value' => get_theme_mod('linkHighlightColor'),
	'default' => [
		'default' => ['color' => $colordefaults['linkHighlightColor']],
		'hover' => ['color' => $colordefaults['linkHighlightHoverColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'linkHighlightColor'],
		'hover' => ['variable' => 'linkHighlightHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('linkHighlightBackgroundColor'),
	'default' => [
		'default' => ['color' => $colordefaults['linkHighlightBackgroundColor']],
		'hover' => ['color' => $colordefaults['linkHighlightBackgroundHoverColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'linkHighlightBackgroundColor'],
		'hover' => ['variable' => 'linkHighlightBackgroundHoverColor'],
	],
]);



rt_customizer_output_background_css([
	'selector' => '.box-layout.single .main-content-wrapper, .content-box-layout.single .main-content-wrapper',
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		$prefixpost . 'content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor5)'
				],
			],
		])
	),
	'responsive' => true,
]);

rt_customizer_output_box_shadow([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.box-layout.single .main-content-wrapper, .content-box-layout.single .main-content-wrapper',
	'variableName' => 'box-shadow',
	'value' => get_theme_mod( $prefixpost . 'content_boxed_shadow', rt_customizer_box_shadow_value([
		'enable'   => false,
		'h_offset' => 0,
		'v_offset' => 12,
		'blur'     => 18,
		'spread'   => -6,
		'inset'    => false,
		'color' => [
			'color' => 'rgba(34, 56, 101, 0.04)',
		],
	])),
	'responsive' => true
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.box-layout.single .main-content-wrapper, .content-box-layout.single .main-content-wrapper',
	'property' => 'padding',
	'value' => get_theme_mod(
		$prefixpost . 'boxed_content_spacing',
		rt_customizer_spacing_value([
			'linked' => true,
		    'top'    => '40px',
		    'left'   => '40px',
		    'right'  => '40px',
		    'bottom' => '40px',
		])
	)
]);

rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => '.box-layout.single .main-content-wrapper, .content-box-layout.single .main-content-wrapper',
	'property' => 'box-radius',
	'value' => get_theme_mod(
		$prefixpost . 'content_boxed_radius',
		rt_customizer_spacing_value([
			'linked' => true,
			'top'    => '3px',
			'left'   => '3px',
			'right'  => '3px',
			'bottom' => '3px',
		])
	)
]);

//author page
rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive.author .site-content .archive-title-wrapper',
	'variableName' => 'width',
	'value' => get_theme_mod( 'author_page_avatar_size', [
		'desktop' => 142,
		'tablet' => 100,
		'mobile' => 80,
	])
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive.author .site-content .archive-title-wrapper',
	'variableName' => 'margin',
	'value' => get_theme_mod( 'author_page_margin', [
		'desktop' => 78,
		'tablet' => 30,
		'mobile' => 30,
	])
]);

rt_customizer_output_colors([
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value'      => get_theme_mod('author_page_color'),
	'default'    => [
		'default'  => ['color' => 'var(--paletteColor2)'],
		'selector' => '.archive.author .site-content .archive-title-wrapper',
	],
	'variables' => [
		'default' => ['variable' => 'authorFontColor'],
	],
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive.author .site-content .archive-title-wrapper',
	'variableName' => 'alignment',
	'value'        => get_theme_mod( 'author_page_alignment', 'left'),
	'unit'		   => '',	
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive.author .site-content .archive-title-wrapper',
	'variableName' => 'authorMargin',
	'value'        => get_theme_mod( 'author_page_author_margin', 30),
	'responsive'   => false,
]);

rt_customizer_output_background_css([
	'selector'   => '.archive.author .site-content .archive-title-wrapper',
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		'author_page_header_content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor7)'
				],
			],
		])
	),
	'responsive' => true,
]);

//search page
rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.search .site-content .archive-title-wrapper',
	'variableName' => 'alignment',
	'value'        => get_theme_mod( 'search_page_alignment', 'left'),
	'unit'		   => '',	
	'responsive'   => false,
 ]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.search .site-content .archive-title-wrapper',
	'variableName' => 'margin',
	'value' => get_theme_mod( 'search_page_margin', [
		'desktop' => 78,
		'tablet' => 30,
		'mobile' => 30,
	])
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('search_font_color'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
		'selector' => '.search .site-content .archive-title-wrapper',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'searchFontColor'],
	],
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.search .site-content .archive-title-wrapper',
	'variableName' => 'searchMargin',
	'value'        => get_theme_mod( 'search_page_search_margin', 30),
	'responsive'   => false,
]);

rt_customizer_output_background_css([
	'selector'   => '.search .site-content .archive-title-wrapper',
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		'search_page_header_content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor7)'
				],
			],
		])
	),
	'responsive' => true,
]);

//archive pages
rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive .site-content .archive-title-wrapper',
	'variableName' => 'margin',
	'value' => get_theme_mod( 'archive_page_margin', [
		'desktop' => 60,
		'tablet' => 30,
		'mobile' => 30,
	])
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive .site-content .archive-title-wrapper',
	'variableName' => 'alignment',
	'value'        => get_theme_mod( 'archive_page_alignment', 'left'),
	'unit'		   => '',	
]);

rt_customizer_output_responsive([
	'css'          => $css,
	'tablet_css'   => $tablet_css,
	'mobile_css'   => $mobile_css,
	'selector'     => '.archive .site-content .archive-title-wrapper',
	'variableName' => 'archiveMargin',
	'value'        => get_theme_mod( 'archive_page_archive_margin', 30),
	'responsive'   => false,
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('archive_font_title_color'),
	'default' => [
		'default' => ['color' => 'var(--paletteColor2)'],
		'selector' => '.archive .site-content .archive-title-wrapper',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'archiveFontColor'],
	],
]);

rt_customizer_output_background_css([
	'selector'   => '.archive .site-content .archive-title-wrapper',
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'value' => get_theme_mod(
		'archive_page_header_content_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor7)'
				],
			],
		])
	),
	'responsive' => true,
]);