<?php

if (get_theme_mod($prefix . '_has_comments', 'yes') !== 'yes') {
	return;
}

$comments_narrow_width = get_theme_mod($prefix . '_comments_narrow_width', 750);

if ($comments_narrow_width !== 750) {
	$css->put(
		rt_customizer_prefix_selector('.rt-comments-container', $prefix),
		'--narrow-container-max-width: ' . $comments_narrow_width . 'px'
	);
}

rt_customizer_output_colors([
	'value' => get_theme_mod(
		$prefix . '_comments_font_color',
		[
			'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
			'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		]
	),
	'default' => [
		'default' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
		'hover' => ['color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT')],
	],
	'css' => $css,
	'variables' => [
		'default' => [
			'selector' => rt_customizer_prefix_selector('.rt-comments', $prefix),
			'variable' => 'color'
		],

		'hover' => [
			'selector' => rt_customizer_prefix_selector('.rt-comments', $prefix),
			'variable' => 'linkHoverColor'
		],
	],
]);

rt_customizer_output_background_css([
	'selector' => rt_customizer_prefix_selector('.rt-comments-container', $prefix),
	'css' => $css,
	'value' => get_theme_mod(
		$prefix . '_comments_background',
		rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => RT_CSS_Injector::get_skip_rule_keyword()
				],
			],
		])
	)
]);
