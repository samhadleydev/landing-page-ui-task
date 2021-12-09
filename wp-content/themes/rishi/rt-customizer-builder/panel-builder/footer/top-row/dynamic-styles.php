<?php

rt_customizer_get_variables_from_file(
	get_template_directory() . '/rt-customizer-builder/panel-builder/footer/middle-row/dynamic-styles.php',
	[],
	[
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'atts' => $atts,
		'root_selector' => $root_selector,
		'primary_item' => $primary_item,

		'default_background' => rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor2)',
				],
			],
		]),

		'default_top_bottom_spacing' => [
			'desktop' => '30px',
			'tablet' => '30px',
			'mobile' => '30px',
		],
	]
);
