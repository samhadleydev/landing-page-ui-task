<?php

$defaults = rishi_get_color_defaults();

// Color palette
$colorPalette = rt_customizer_get_colors(
	get_theme_mod('colorPalette'),
	[
		'color1' => ['color' => 'rgba(41, 41, 41, 0.9)'],
		'color2' => ['color' => '#292929'],
		'color3' => ['color' => '#307ac9'],
		'color4' => ['color' => '#5081F5'],
		'color5' => ['color' => '#ffffff'],
		'color6' => ['color' => '#EDF2FE'],
		'color7' => ['color' => '#F6F9FE'],
		'color8' => ['color' => '#F9FBFE'],
	]
);

// $css->put(
// 	':root .block-editor-page',
// 	"--paletteColor1: {$colorPalette['color1']}"
// );

// $css->put(
// 	':root .block-editor-page',
// 	"--paletteColor2: {$colorPalette['color2']}"
// );

// $css->put(
// 	':root .block-editor-page',
// 	"--paletteColor3: {$colorPalette['color3']}"
// );

// $css->put(
// 	':root .block-editor-page',
// 	"--paletteColor4: {$colorPalette['color4']}"
// );

// $css->put(
// 	':root .block-editor-page',
// 	"--paletteColor5: {$colorPalette['color5']}"
// );

$css->put(
	':root',
	"--paletteColor1: {$colorPalette['color1']}"
);

$css->put(
	':root',
	"--paletteColor2: {$colorPalette['color2']}"
);

$css->put(
	':root',
	"--paletteColor3: {$colorPalette['color3']}"
);

$css->put(
	':root',
	"--paletteColor4: {$colorPalette['color4']}"
);

$css->put(
	':root',
	"--paletteColor5: {$colorPalette['color5']}"
);

$css->put(
	':root',
	"--paletteColor6: {$colorPalette['color6']}"
);

$css->put(
	':root',
	"--paletteColor7: {$colorPalette['color7']}"
);

$css->put(
	':root',
	"--paletteColor8: {$colorPalette['color8']}"
);


//base color
rt_customizer_output_colors([
	'value' => get_theme_mod('base_color'),
	'default' => [
		'default' => ['color' => $defaults['base_color']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'adminBaseColor'],
	],
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('genheadingColor'),
	'default' => [
		'default' => ['color' => $defaults['genheadingColor']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'adminGenHeadingColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('primary_color'),
	'default' => [
		'default' => ['color' => $defaults['primary_color']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'adminprimaryColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('base_color'),
	'default' => [
		'default' => ['color' => $defaults['base_color']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'adminbaseColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('genheadingColor'),
	'default' => [
		'default' => ['color' => $defaults['genheadingColor']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'admingenheadingColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('genLinkColor'),
	'default' => [
		'default' => ['color' => $defaults['genLinkColor']],
		'hover' => ['color' => $defaults['genLinkHoverColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'admingenLinkColor'],
		'hover' => ['variable' => 'admingenLinkHoverColor'],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('textSelectionColor'),
	'default' => [
		'default' => ['color' => '#ffffff'],
		'hover' => ['color' => $defaults['textSelectionColor']],
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'admintextSelectionColor'],
		'hover' => ['variable' => 'admintextSelectionHoverColor'],
	],
]);


rt_customizer_output_colors([
	'value' => get_theme_mod('genborderColor'),
	'default' => [
		'default' => ['color' => $defaults['genborderColor']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'admingenborderColor'],
	],
]);

$layoutsdefaults = rishi_get_layouts_defaults();

rt_customizer_output_responsive([
    'css'          => $css,
    'tablet_css'   => $tablet_css,
    'mobile_css'   => $mobile_css,
    'selector'     => ':root',
    'variableName' => 'adminContainerWidth',
    'unit'         => '',
    'value' => get_theme_mod('container_width', [
        'desktop' => $layoutsdefaults['container_width']['desktop'],
        'tablet'  => $layoutsdefaults['container_width']['tablet'],
        'mobile'  => $layoutsdefaults['container_width']['mobile'],
    ]),
]);

rt_customizer_output_responsive([
    'css'          => $css,
    'tablet_css'   => $tablet_css,
    'mobile_css'   => $mobile_css,
    'selector'     => ':root',
    'variableName' => 'adminContainerContentMaxWidth',
    'unit'         => '',
    'value' => get_theme_mod('container_content_max_width', [
      'desktop' => $layoutsdefaults['container_content_max_width']['desktop'],
      'tablet'  => $layoutsdefaults['container_content_max_width']['tablet'],
      'mobile'  => $layoutsdefaults['container_content_max_width']['mobile'],
    ]),
]);

// Buttons
$buttondefaults = rishi_get_button_defaults();

rt_customizer_output_responsive([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => ':root',
	'variableName' => 'adminBottonRoundness',
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
	'property' => 'adminButtonPadding',
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

$buttonTextColor = rt_customizer_get_colors(
	get_theme_mod('buttonTextColor'),
	[
		'default' => ['color' => '#ffffff'],
		'hover' => ['color' => '#ffffff'],
	]
);

$colordefaults = rishi_get_color_defaults();

rt_customizer_output_colors([
	'value' => get_theme_mod('btn_text_color'),
	'default' => [
		'default' => ['color' => $colordefaults['btn_text_color']],
		'selector' => ':root .block-editor-page',
	],
	'css' => $css,
	'variables' => [
		'default' => ['variable' => 'adminBtnTextColor'],
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
		'default' => ['variable' => 'adminBtnTextHoverColor'],
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
		'default' => ['variable' => 'adminBtnBgColor'],
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
		'default' => ['variable' => 'adminBtnBgHoverColor'],
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
		'default' => ['variable' => 'adminBtnBorderColor'],
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
		'default' => ['variable' => 'adminBtnBorderHoverColor'],
	],
]);

$css->put(
	':root .block-editor-page',
	"--buttonTextInitialColor: {$buttonTextColor['default']}"
);

$css->put(
	':root .block-editor-page',
	"--buttonTextHoverColor: {$buttonTextColor['hover']}"
);

$button_color = rt_customizer_get_colors(
	get_theme_mod('buttonColor'),
	[
		'default' => ['color' => 'var(--paletteColor1)'],
		'hover' => ['color' => 'var(--paletteColor2)'],
	]
);

$css->put(
	':root .block-editor-page',
	"--buttonInitialColor: {$button_color['default']}"
);

$css->put(
	':root .block-editor-page',
	"--buttonHoverColor: {$button_color['hover']}"
);

rt_customizer_output_colors([
	'value' => get_theme_mod('global_quantity_color'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root .block-editor-page',
			'variable' => 'quantity-initial-color'
		],

		'hover' => [
			'selector' => ':root .block-editor-page',
			'variable' => 'quantity-hover-color'
		],
	],
]);

rt_customizer_output_colors([
	'value' => get_theme_mod('global_quantity_arrows'),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => ':root .block-editor-page',
			'variable' => 'quantity-arrows-initial-color'
		],

		'hover' => [
			'selector' => ':root .block-editor-page',
			'variable' => 'quantity-arrows-hover-color'
		],
	],
]);

if (
	function_exists('get_current_screen')
	&&
	get_current_screen()
	&&
	get_current_screen()->is_block_editor()
) {
	if (get_current_screen()->base === 'post') {
		rt_customizer_theme_get_dynamic_styles([
			'name' => 'editor',
			'css' => $css,
			'mobile_css' => $mobile_css,
			'tablet_css' => $tablet_css,
			'context' => $context,
			'chunk' => 'admin'
		]);
	}

	rt_customizer_theme_get_dynamic_styles([
		'name' => 'typography',
		'css' => $css,
		'mobile_css' => $mobile_css,
		'tablet_css' => $tablet_css,
		'context' => 'inline',
		'chunk' => 'admin'
	]);

	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => ':root .block-editor-page',
		'variableName' => 'buttonMinHeight',
		'value' => get_theme_mod('buttonMinHeight', [
			'mobile' => 45,
			'tablet' => 45,
			'desktop' => 45,
		])
	]);

	rt_customizer_output_spacing([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => ':root .block-editor-page',
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
}
