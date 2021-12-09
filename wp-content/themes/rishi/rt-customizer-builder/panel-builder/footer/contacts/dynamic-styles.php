<?php
// Margin
rt_customizer_output_spacing([
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector' => rt_customizer_assemble_selector($root_selector),
	'important' => true,
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
		'selector'     => '[data-footer*="type-1"] [data-id="contacts"].ct-footer-contact-info',
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
		'selector'     => '[data-footer*="type-1"] [data-id="contacts"].ct-footer-contact-info',
		'variableName' => 'items-spacing',
		'value'        => $contacts_spacing,
		'responsive'   => true
	]);
}

rt_customizer_output_font_css([
	'font_value' => rt_get_akv( 'contacts_font', $atts,
		rt_customizer_typography_default_values([
			'size'        => '14px',
			'line-height' => '1.3',
		])
	),
	'css'        => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'selector'   => '[data-footer*="type-1"] [data-id="contacts"].ct-footer-contact-info .contact-info',
]);


// default state
rt_customizer_output_colors([
	'value' => rt_get_akv('contacts_font_color', $atts),
	'default' => [
		'default' => [ 'color' => 'var(--paletteColor5)' ],
		'link_initial' => [ 'color' => 'var(--paletteColor5)' ],
		'link_hover' => [ 'color' => 'var(--paletteColor3)' ],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,
	'variables' => [
		'default' => [
			'selector' => '[data-footer*="type-1"] [data-id="contacts"].ct-footer-contact-info .contact-info',
			'variable' => 'color'
		],

		'link_initial' => [
			'selector' => '[data-footer*="type-1"] [data-id="contacts"].ct-footer-contact-info .contact-info',
			'variable' => 'linkInitialColor'
		],

		'link_hover' => [
			'selector' => '[data-footer*="type-1"] [data-id="contacts"].ct-footer-contact-info .contact-info',
			'variable' => 'linkHoverColor'
		],
	],
	'responsive' => true
]);

rt_customizer_output_colors([
	'value' => rt_get_akv('contacts_icon_color', $atts),
	'default' => [
		'default' => [ 'color' => 'var(--paletteColor5)' ],
		'hover' => [ 'color' => 'var(--paletteColor3)' ],
	],
	'css' => $css,
	'tablet_css' => $tablet_css,
	'mobile_css' => $mobile_css,

	'variables' => [
		'default' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'icon-color'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
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
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'background-color'
		],

		'hover' => [
			'selector' => rt_customizer_assemble_selector($root_selector),
			'variable' => 'background-hover-color'
		]
	],
	'responsive' => true
]);