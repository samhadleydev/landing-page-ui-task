<?php

$options = rt_customizer_get_options(
	get_template_directory() . '/rt-customizer-builder/panel-builder/footer/middle-row/options.php',
	[
		'default_background' => rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor2)',
				],
			],
		]),

		'default_top_bottom_spacing' => [
			'mobile' => '30px',
			'tablet' => '30px',
			'desktop' => '30px',
		]
	],
	false
);
