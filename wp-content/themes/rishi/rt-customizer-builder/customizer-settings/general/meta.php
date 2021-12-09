<?php

if (!isset($skip_sync_id)) {
	$skip_sync_id = null;
}

if (!isset($sync_id)) {
	$sync_id = null;
}

if (!isset($is_cpt)) {
	$is_cpt = false;
}

if (!isset($has_label)) {
	$has_label = false;
}

if (!isset($prefix)) {
	$prefix = '';
} else {
	$prefix = $prefix . '_';
}

if (!isset($is_page)) {
	$is_page = false;
}

if (!isset($item_style_type)) {
	$item_style_type = 'slash';
}

if (!isset($item_divider_type)) {
	$item_divider_type = 'rt-radio';
}

if (!isset($meta_elements)) {
	$meta_elements = rt_customizer_post_meta_defaults([
		[
			'id' => 'author',
			'enabled' => true,
		],
		[
			'id' => 'post_date',
			'enabled' => true,
		],
		[
			'id' => 'updated_date',
			'enabled' => false,
		],
		[
			'id' => 'categories',
			'enabled' => true,
		],
		[
			'id' => 'comments',
			'enabled' => true,
		]
	]);
}

$date_format_options = [
	rt_customizer_rand_md5() => [
		'type' => 'rt-group',
		'attr' => ['data-columns' => '1'],
		'options' => [
			'date_format_source' => [
				'label' => __('Date Format', 'rishi'),
				'type' => 'rt-radio',
				'value' => 'default',
				'view' => 'text',
				'choices' => [
					'default' => __('Default', 'rishi'),
					'custom' => __('Custom', 'rishi'),
				],
			],

			rt_customizer_rand_md5() => [
				'type' => 'rt-condition',
				'condition' => [
					'date_format_source' => 'custom'
				],
				'options' => [
					'date_format' => [
						'label' => false,
						'type' => 'text',
						'design' => 'block',
						'value' => 'M j, Y',
						// translators: The interpolations addes a html link around the word.
						'desc' => sprintf(
							__('Date format %sinstructions%s.', 'rishi'),
							'<a href="https://wordpress.org/support/article/formatting-date-and-time/#format-string-examples" target="_blank">',
							'</a>'
						),
						'disableRevertButton' => true,
					],
				],
			],
		],
	],
];

$options = [
	$prefix . 'meta_elements' => [
		'label'       => $has_label ? __('Meta Elements', 'rishi') : false,
		'type'        => 'rt-layers',
		'wrapperAttr' => ['data-layer' => 'inner'],
		'itemClass'   => 'rt-inner-layer',
		'manageable'  => true,
		'value'       => $meta_elements,
		'sync'        => $sync_id ? $sync_id : 'refresh',
		'settings'    => array_merge([
			'author' => [
				'label'   => __('Author', 'rishi'),
				'options' => [
					'has_author_avatar' => [
						'label' => __('Author Avatar', 'rishi'),
						'type'  => 'rara-switch',
						'value' => 'no',
					],

					rt_customizer_rand_md5() => [
						'type'      => 'rt-condition',
						'condition' => ['has_author_avatar' => 'yes'],
						'options'   => [
							'avatar_size' => array_merge([
								'label'  => __('Avatar Size', 'rishi'),
								'type'   => 'rt-number',
								'design' => 'inline',
								'value'  => 25,
								'min'    => 15,
								'max'    => 50,
							], $skip_sync_id ? [
								'sync' => $skip_sync_id
							] : []),
						],
					],

					'label' => [
						'type'   => 'text',
						'design' => 'inline',
						'value'  => __('By', 'rishi')
					],
				],
			],
			'comments' => [
				'label' => __('Comments', 'rishi'),
			],
			'post_date' => [
				'label'   => __('Published Date', 'rishi'),
				'options' => [
					$date_format_options,
				],
			],
			'updated_date' => [
				'label'   => __('Updated Date', 'rishi'),
				'options' => [
					$date_format_options,
					'label' => [
						'type'   => 'text',
						'design' => 'inline',
						'value'  => __('Updated On', 'rishi')
					],
				],
			],
		], !$is_page ? [
			'categories' => [
				'label' => $is_cpt ? __('Taxonomies', 'rishi') : __('Categories', 'rishi'),
				'options' => [
					'divider' => [
						'label' => __('Category Seperator', 'rishi'),
						'type'  => 'rt-image-picker',
						'value' => 'dot',
						'attr'  => [
							'data-type'    => 'background',
							'data-columns' => '2',
							'data-usage'   => 'category-seperator'
						],
						'choices' => [
							'dot' => [
								'src'   => rt_customizer_image_picker_file('dot'),
								'title' => __('Seperator 1', 'rishi'),
							],
							'normal-slash' => [
								'src'   => rt_customizer_image_picker_file('normal-slash'),
								'title' => __('Seperator 2', 'rishi'),
							],
							'forward-slash' => [
								'src'   => rt_customizer_image_picker_file('forward-slash'),
								'title' => __('Seperator 3', 'rishi'),
							],
							'back-slash' => [
								'src'   => rt_customizer_image_picker_file('back-slash'),
								'title' => __('Seperator 4', 'rishi'),
							],
						],
					],					
					'divider_style' => [
						'label'   => __('Divider Style', 'rishi'),
						'desc'   => __('Choose the Divider Style for the Category', 'rishi'),
						'type'    => 'rt-radio',
						'value'   => 'normal',
						'view'    => 'text',
						'design'  => 'block',
						'choices' => [
							'normal' => __('Normal', 'rishi'),
							'filled' => __('Filled', 'rishi'),
						],
					],
					'divider_color' => [
						'label'   => __('Divider Color', 'rishi'),
						'type'    => 'rt-color-picker',
						'setting' => ['transport' => 'postMessage'],
						'value' => [
							'default' => [
								'color' => 'var(--paletteColor1)',
							],

							'hover' => [
								'color' => 'var(--paletteColor3)',
							],
						],

						'pickers' => [
							[
								'title' => __('Initial', 'rishi'),
								'id'    => 'default',
							],

							[
								'title' => __('Hover', 'rishi'),
								'id'    => 'hover',
							],
						],
					],
				],
			],
		] : []),
	],

	$prefix . 'meta_divider' => array_merge([
		'label'   => __('Items Divider', 'rishi'),
		'type'    => $item_divider_type,
		'value'   => $item_style_type,
		'view'    => 'text',
		'attr'    => ['data-type' => 'meta-divider'],
		'choices' => [
			'none'   => __('none', 'rishi'),
			'slash'  => '',
			'line'   => '',
			'circle' => '',
		],
	], $skip_sync_id ? [
		'sync' => $skip_sync_id
	] : [
		'sync' => 'live'
	]),
];
