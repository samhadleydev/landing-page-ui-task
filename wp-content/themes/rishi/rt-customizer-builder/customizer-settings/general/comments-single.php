<?php

if (!isset($prefix)) {
	$prefix = '';
} else {
	$prefix = $prefix . '_';
}

if (!isset($enabled)) {
	$enabled = 'yes';
}

$options = [
	$prefix . 'has_comments' => [
		'label'  => __('Comments', 'rishi'),
		'type'   => 'rt-panel',
		'switch' => true,
		'value'  => $enabled,
		'sync'   => rt_customizer_sync_whole_page([
			'prefix' => $prefix,
		]),
		'inner-options' => [

			rt_customizer_rand_md5() => [
				'title'   => __('General', 'rishi'),
				'type'    => 'tab',
				'options' => [

					$prefix . 'has_comments_website' => [
						'label' => __('Website Input Field', 'rishi'),
						'type'  => 'rara-switch',
						'value' => 'yes',
						'sync'  => rt_customizer_sync_whole_page([
							'prefix' => $prefix,
						]),
					],

					rt_customizer_rand_md5() => [
						'type' => 'rt-divider',
					],

					$prefix . 'comments_containment' => [
						'label'   => __('Module Placement', 'rishi'),
						'type'    => 'rt-radio',
						'value'   => 'separated',
						'view'    => 'text',
						'design'  => 'block',
						'desc'    => __('Separate or unify the comments module from or with the entry content area.', 'rishi'),
						'choices' => [
							'separated' => __('Separated', 'rishi'),
							'contained' => __('Contained', 'rishi'),
						],

						'sync' => rt_customizer_sync_whole_page([
							'prefix' => $prefix,
						]),
					],

					rt_customizer_rand_md5() => [
						'type' => 'rt-divider',
					],

					rt_customizer_rand_md5() => [
						'type'      => 'rt-condition',
						'condition' => [$prefix . 'comments_containment' => 'separated'],
						'options'   => [

							$prefix . 'comments_structure' => [
								'label'   => __('Container Structure', 'rishi'),
								'type'    => 'rt-radio',
								'value'   => 'narrow',
								'view'    => 'text',
								'design'  => 'block',
								'choices' => [
									'narrow' => __('Narrow', 'rishi'),
									'normal' => __('Normal', 'rishi'),
								],
								'sync' => 'live'
							],

						],
					],

					rt_customizer_rand_md5() => [
						'type'      => 'rt-condition',
						'condition' => [
							$prefix . 'comments_containment' => 'separated',
							$prefix . 'comments_structure'   => 'narrow'
						],
						'options' => [
							$prefix . 'comments_narrow_width' => [
								'label'   => __('Container Max Width', 'rishi'),
								'type'    => 'rt-slider',
								'value'   => 750,
								'min'     => 500,
								'max'     => 800,
								'divider' => 'bottom',
								'sync'    => 'live'
							],
						],
					],

				],
			],

			rt_customizer_rand_md5() => [
				'title'   => __('Design', 'rishi'),
				'type'    => 'tab',
				'options' => [

					$prefix . 'comments_font_color' => [
						'label'  => __('Font Color', 'rishi'),
						'type'   => 'rt-color-picker',
						'design' => 'inline',
						'sync'   => 'live',
						'value'  => [
							'default' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title'   => __('Initial', 'rishi'),
								'id'      => 'default',
								'inherit' => 'var(--color)'
							],

							[
								'title'   => __('Hover', 'rishi'),
								'id'      => 'hover',
								'inherit' => 'var(--linkHoverColor)'
							],
						],
					],

					rt_customizer_rand_md5() => [
						'type'      => 'rt-condition',
						'condition' => [$prefix . 'comments_containment' => 'separated'],
						'options'   => [

							$prefix . 'comments_background' => [
								'label'   => __('Container Background', 'rishi'),
								'type'    => 'rt-background',
								'design'  => 'inline',
								'divider' => 'top',
								'sync'    => 'live',
								'value'   => rt_customizer_background_default_value([
									'backgroundColor' => [
										'default' => [
											'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
										],
									],
								])
							],

						],
					],

				],
			],

		],
	],
];
