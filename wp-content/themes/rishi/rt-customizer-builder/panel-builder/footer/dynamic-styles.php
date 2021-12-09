<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

// Box shadow
$has_reveal_effect = rt_customizer_default_akg('has_reveal_effect', $atts,  [
	'desktop' => false,
	'tablet' => false,
	'mobile' => false,
]);

if (function_exists('rt_customizer_output_responsive_switch')) {
	rt_customizer_output_responsive_switch([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(
			rt_customizer_mutate_selector([
				'selector' => rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'suffix',
					'to_add' => 'footer.rt-footer'
				]),
				'operation' => 'container-suffix',
				'to_add' => '[data-footer*="reveal"]'
			])
		),
		'variable' => 'position',
		'on' => 'sticky',
		'off' => 'static',
		'value' => $has_reveal_effect,
		'skip_when' => 'all_disabled'
	]);
}

if (function_exists('rt_customizer_some_device') && rt_customizer_some_device($has_reveal_effect)) {
	rt_customizer_output_box_shadow([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector(
			rt_customizer_mutate_selector([
				'selector' => rt_customizer_mutate_selector([
					'selector' => $root_selector,
					'operation' => 'suffix',
					'to_add' => '.site-content'
				]),
				'operation' => 'container-suffix',
				'to_add' => '[data-footer*="reveal"]'
			])
		),
		'value' => rt_customizer_default_akg('footerShadow', $atts, rt_customizer_box_shadow_value([
			'enable' => true,
			'h_offset' => 0,
			'v_offset' => 30,
			'blur' => 50,
			'spread' => 0,
			'inset' => false,
			'color' => [
				'color' => 'rgba(0, 0, 0, 0.1)',
			],
		])),
		'responsive' => $has_reveal_effect
	]);
}
