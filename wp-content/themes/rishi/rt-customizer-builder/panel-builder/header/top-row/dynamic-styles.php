<?php

rt_customizer_get_variables_from_file(
	get_template_directory() . '/rt-customizer-builder/panel-builder/header/middle-row/dynamic-styles.php',
	[],
	[
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'atts' => $atts,
		'root_selector' => $root_selector,

		'default_height' => [
			'mobile' => 50,
			'tablet' => 50,
			'desktop' => 50,
		],

		'default_background' => rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => '#f9f9f9',
				],
			],
		]),

		'has_transparent_header' => isset($has_transparent_header) ? $has_transparent_header : false,
		'has_sticky_header' => isset($has_sticky_header) ? $has_sticky_header : false
	]
);
