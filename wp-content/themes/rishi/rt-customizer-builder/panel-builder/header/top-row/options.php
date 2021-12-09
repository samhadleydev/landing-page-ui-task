<?php

$options = rt_customizer_get_options(
	get_template_directory() . '/rt-customizer-builder/panel-builder/header/middle-row/options.php',
	[
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
		])
	],
	false
);
