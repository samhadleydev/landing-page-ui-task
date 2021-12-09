<?php

$options = rt_customizer_get_options(
	get_template_directory() . '/rt-customizer-builder/panel-builder/header/middle-row/options.php',
	[
		'default_height' => [
			'mobile' => 80,
			'tablet' => 80,
			'desktop' => 80,
		],

		'default_background' => rt_customizer_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => 'var(--paletteColor5)',
				],
			],
		])
	],
	false
);
