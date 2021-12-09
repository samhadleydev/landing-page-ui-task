<?php

if (!isset($location)) {
	$location = 'Header Menu 1';
}

$options = [
	'menu' => [
		'label'       => __('Select Menu', 'rishi'),
		'type'        => 'rt-select',
		'value'       => 'rt_customizer_location',
		'view'        => 'text',
		'design'      => 'inline',
		'setting'     => ['transport' => 'postMessage'],
		'placeholder' => __('Select menu...', 'rishi'),
		'choices'     => rt_customizer_ordered_keys(rt_customizer_get_menus_items($location)),
		'desc' => sprintf(
			// translators: placeholder here means the actual URL.
			__('Manage your menu items in the %sMenus screen%s.', 'rishi'),
			sprintf(
				'<a href="%s" target="_blank">',
				admin_url('/nav-menus.php')
			),
			'</a>'
		),
	],

	rt_customizer_rand_md5() => [
		'type' => 'rt-title',
		'label' => __('Top Level Options', 'rishi'),
	],

	rt_customizer_rand_md5() => [
		'title' => __('General', 'rishi'),
		'type' => 'tab',
		'options' => [
			'header_menu_type' => [
				'label'                => false,
				'type'                 => 'rt-image-picker',
				'value'                => 'type-1',
				'attr'                 => [
					'data-type' => 'background', 
					'data-usage' => 'menu-type',
				],
				'setting'              => ['transport' => 'postMessage'],
				'switchDeviceOnChange' => 'desktop',
				'choices' => [

					'type-1' => [
						'src'   => rt_customizer_image_picker_url('menu-type-1.svg'),
						'title' => __('Type 1', 'rishi'),
					],

					'type-2' => [
						'src'   => rt_customizer_image_picker_url('menu-type-2.svg'),
						'title' => __('Type 2', 'rishi'),
					],

					'type-3' => [
						'src'   => rt_customizer_image_picker_url('menu-type-3.svg'),
						'title' => __('Type 3', 'rishi'),
					],

					'type-4' => [
						'src'   => rt_customizer_image_picker_url('menu-type-4.svg'),
						'title' => __('Type 4', 'rishi'),
					],
				],
			],

			rt_customizer_rand_md5() => [
				'type' => 'rt-condition',
				'condition' => ['header_menu_type' => 'type-2'],
				'options' => [
					'menu_indicator_effect' => [
						'label'   => __('Indicator Effect', 'rishi'),
						'type'    => 'rt-select',
						'value'   => 'default',
						'view'    => 'text',
						'divider' => 'top',
						'design'  => 'inline',
						'choices' => rt_customizer_ordered_keys(
							[
								'default' => __('Default', 'rishi'),
								'center'  => __('Center to Sides', 'rishi'),
								'left'    => __('Left to Right', 'rishi'),
							]
						),
					],
				],
			],

			'headerMenuItemsSpacing' => [
				'label'   => __('Items Spacing', 'rishi'),
				'type'    => 'rt-slider',
				'value'   => 25,
				'min'     => 5,
				'max'     => 100,
				'divider' => 'top',
				'setting' => ['transport' => 'postMessage'],
			],

			rt_customizer_rand_md5() => [
				'type' => 'rt-condition',
				'condition' => ['header_menu_type' => '!type-1'],
				'options' => [

					'headerMenuItemsHeight' => [
						'label'       => __('Items Height', 'rishi'),
						'type'        => 'rt-slider',
						'value'       => 100,
						'min'         => 0,
						'max'         => 100,
						'defaultUnit' => '%',
						'setting'     => ['transport' => 'postMessage'],
					],
				],
			],

			'stretch_menu' => [
				'label'   => __('Stretch Menu', 'rishi'),
				'type'    => 'rara-switch',
				'value'   => 'no',
				'divider' => 'top',
				'desc'    => __('Enabling this option will make the menu to stretch and fit the width of its parent column. ', 'rishi'),
				'setting' => ['transport' => 'postMessage'],
			],

		],
	],

	rt_customizer_rand_md5() => [
		'title' => __('Design', 'rishi'),
		'type' => 'tab',
		'options' => [

			'headerMenuFont' => [
				'type' => 'rt-typography',
				'label' => __('Font', 'rishi'),
				'value' => rt_customizer_typography_default_values([
					'size' => '16px',
					'variation' => 'n4',
					'line-height' => '2.25',
					'text-transform' => 'normal',
				]),
				'typography_responsive' => [
					'desktop' => true,
					'tablet' => false,
					'mobile' => false,
				],
				'setting' => ['transport' => 'postMessage'],
			],

			rt_customizer_rand_md5() => [
				'type' => 'rt-labeled-group',
				'label' => __('Font Color', 'rishi'),
				'responsive' => false,
				'choices' => [
					[
						'id' => 'menuFontColor',
						'label' => __('Default State', 'rishi')
					],

					[
						'id' => 'transparentMenuFontColor',
						'label' => __('Transparent State', 'rishi'),
						'condition' => [
							'row' => '!offcanvas',
							'builderSettings/has_transparent_header' => 'yes',
						],
					],

					[
						'id' => 'stickyMenuFontColor',
						'label' => __('Sticky State', 'rishi'),
						'condition' => [
							'row' => '!offcanvas',
							'builderSettings/has_sticky_header' => 'yes',
						],
					],
				],
				'options' => [

					'menuFontColor' => [
						'label' => __('Font Color', 'rishi'),
						'type'  => 'rt-color-picker',
						'design' => 'inline',
						'setting' => ['transport' => 'postMessage'],

						'value' => [
							'default' => [
								'color' => 'var(--paletteColor1)',
							],

							'hover' => [
								'color' => 'var(--paletteColor3)',
							],

							'hover-type-3' => [
								'color' => 'var(--paletteColor5)',
							],
						],

						'pickers' => [
							[
								'title' => __('Initial', 'rishi'),
								'id' => 'default',
							],

							[
								'title' => __('Hover/Active', 'rishi'),
								'id' => 'hover',
								'inherit' => 'var(--linkHoverColor)',
								'condition' => ['header_menu_type' => '!type-3']
							],

							[
								'title' => __('Hover/Active', 'rishi'),
								'id' => 'hover-type-3',
								'condition' => ['header_menu_type' => 'type-3']
							],
						],
					],

					'transparentMenuFontColor' => [
						'label' => __('Font Color', 'rishi'),
						'type'  => 'rt-color-picker',
						'design' => 'inline',
						'setting' => ['transport' => 'postMessage'],

						'value' => [
							'default' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover-type-3' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __('Initial', 'rishi'),
								'id' => 'default',
							],

							[
								'title' => __('Hover/Active', 'rishi'),
								'id' => 'hover',
								'condition' => ['header_menu_type' => '!type-3']
							],

							[
								'title' => __('Hover/Active', 'rishi'),
								'id' => 'hover-type-3',
								'condition' => ['header_menu_type' => 'type-3']
							],
						],
					],

					'stickyMenuFontColor' => [
						'label' => __('Font Color', 'rishi'),
						'type'  => 'rt-color-picker',
						'design' => 'inline',
						'setting' => ['transport' => 'postMessage'],

						'value' => [
							'default' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover-type-3' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __('Initial', 'rishi'),
								'id' => 'default',
							],

							[
								'title' => __('Hover/Active', 'rishi'),
								'id' => 'hover',
								'condition' => ['header_menu_type' => '!type-3']
							],

							[
								'title' => __('Hover/Active', 'rishi'),
								'id' => 'hover-type-3',
								'condition' => ['header_menu_type' => 'type-3']
							],
						],
					],

				],
			],

			rt_customizer_rand_md5() => [
				'type'      => 'rt-condition',
				'condition' => ['header_menu_type' => 'type-4'],
				'options'   => [

					'activeIndicatorbackgroundColor' => [
						'label'           => __('Active Indicator Background', 'rishi'),
						'type'            => 'rt-color-picker',
						'skipEditPalette' => true,
						'design'          => 'inline',
						'setting'         => ['transport' => 'postMessage'],
						'value'           => [
							'default' => [
								'color' => 'var(--paletteColor7)',
							],
						],
						'pickers' => [
							[
								'title' => __('Initial', 'rishi'),
								'id'    => 'default',
							],
						],
					],

				],
			],

			rt_customizer_rand_md5() => [
				'type' => 'rt-labeled-group',
				'label' => __('Hover/Active Indicator Color', 'rishi'),
				'responsive' => false,
				'divider' => 'top',
				'choices' => [
					[
						'id' => 'menuIndicatorColor',
						'label' => __('Default State', 'rishi'),
						'condition' => ['header_menu_type' => '!type-1'],
					],

					[
						'id' => 'transparentMenuIndicatorColor',
						'label' => __('Transparent State', 'rishi'),
						'condition' => [
							'row' => '!offcanvas',
							'header_menu_type' => '!type-1',
							'builderSettings/has_transparent_header' => 'yes',
						],
					],

					[
						'id' => 'stickyMenuIndicatorColor',
						'label' => __('Sticky State', 'rishi'),
						'condition' => [
							'row' => '!offcanvas',
							'header_menu_type' => '!type-1',
							'builderSettings/has_sticky_header' => 'yes',
						],
					],
				],
				'options' => [

					'menuIndicatorColor' => [
						'label' => __('Active Indicator Color', 'rishi'),
						'type'  => 'rt-color-picker',
						'design' => 'inline',
						'setting' => ['transport' => 'postMessage'],

						'value' => [
							'active' => [
								'color' => 'var(--paletteColor3)',
							],
						],

						'pickers' => [
							[
								'title' => __('Active', 'rishi'),
								'id' => 'active',
							],
						],
					],

					'transparentMenuIndicatorColor' => [
						'label' => __('Active Indicator Color', 'rishi'),
						'type'  => 'rt-color-picker',
						'design' => 'inline',
						'setting' => ['transport' => 'postMessage'],

						'value' => [
							'active' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __('Active', 'rishi'),
								'id' => 'active',
							],
						],
					],

					'stickyMenuIndicatorColor' => [
						'label' => __('Active Indicator Color', 'rishi'),
						'type'  => 'rt-color-picker',
						'design' => 'inline',
						'setting' => ['transport' => 'postMessage'],

						'value' => [
							'active' => [
								'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __('Active', 'rishi'),
								'id' => 'active',
							],
						],
					],

				],
			],

			'headerMenuMargin' => [
				'label' => __('Margin', 'rishi'),
				'type' => 'rt-spacing',
				'divider' => 'top',
				'setting' => ['transport' => 'postMessage'],
				'value' => rt_customizer_spacing_value([
					'top' => 'auto',
					'bottom' => 'auto',
					'left' => '20px',
					'right' => '20px',
					'linked' => true,
				]),
				'responsive' => true
			],

		],
	],

	rt_customizer_rand_md5() => [
		'type' => 'rt-title',
		'label' => __('Dropdown Options', 'rishi'),
	],

	rt_customizer_rand_md5() => [
		'title' => __('General', 'rishi'),
		'type' => 'tab',
		'options' => [

			'dropdown_items_type' => [
				'label' => __('Items Hover Effect', 'rishi'),
				'type' => 'rt-radio',
				'value' => 'simple',
				'view' => 'radio',
				'design' => 'block',
				'divider' => 'bottom',
				'attr' => ['data-columns' => '2'],
				'setting' => ['transport' => 'postMessage'],
				'choices' => [
					'simple' => __('Simple', 'rishi'),
					'solid' => __('Solid Color', 'rishi'),
					'padded' => __('Boxed Color', 'rishi'),
					// 'bordered' => __( 'Bordered', 'rishi' ),
				],
			],

			'dropdownItemsSpacing' => [
				'label' => __('Inner Spacing', 'rishi'),
				'type' => 'rt-slider',
				'value' => 15,
				'min' => 5,
				'max' => 30,
				'setting' => ['transport' => 'postMessage'],
			],

			rt_customizer_rand_md5() => [
				'type' => 'rt-divider',
			],

			'dropdown_animation' => [
				'label' => __('Dropdown Reveal Effect', 'rishi'),
				'type' => 'rt-radio',
				'value' => 'type-1',
				'view' => 'radio',
				'design' => 'block',
				'divider' => 'bottom',
				'attr' => ['data-columns' => '2'],
				'setting' => ['transport' => 'postMessage'],
				'choices' => [
					'type-1' => __('Default', 'rishi'),
					'type-3' => __('Inner Reveal', 'rishi'),
					'type-2' => __('Opacity', 'rishi'),
					'type-4' => __('Simple', 'rishi'),
				],
			],

			'dropdownTopOffset' => [
				'label' => __('Dropdown Top Offset', 'rishi'),
				'type' => 'rt-slider',
				'value' => 0,
				'min' => -150,
				'max' => 150,
				'steps' => 'half',
				'setting' => ['transport' => 'postMessage'],
			],

			'dropdownMenuWidth' => [
				'label' => __('Dropdown Width', 'rishi'),
				'type' => 'rt-slider',
				'value' => 250,
				'min' => 100,
				'max' => 300,
				'divider' => 'bottom',
				'setting' => ['transport' => 'postMessage'],
			],

		],
	],

	rt_customizer_rand_md5() => [
		'title' => __('Design', 'rishi'),
		'type' => 'tab',
		'options' => [

			'headerDropdownFont' => [
				'type' => 'rt-typography',
				'label' => __('Font', 'rishi'),
				'value' => rt_customizer_typography_default_values([
					'size' => '16px',
					'variation' => 'n4',
				]),
				'typography_responsive' => [
					'desktop' => true,
					'tablet' => false,
					'mobile' => false,
				],
				'setting' => ['transport' => 'postMessage'],
			],

			'headerDropdownFontColor' => [
				'label' => __('Font Color', 'rishi'),
				'type'  => 'rt-color-picker',
				'design' => 'inline',
				'divider' => 'bottom',
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
						'id' => 'default',
					],

					[
						'title' => __('Hover/Active', 'rishi'),
						'id' => 'hover',
						'inherit' => 'var(--linkHoverColor)'
					],
				],
			],

			'headerDropdownBackground' => [
				'label' => __('Items Background Color', 'rishi'),
				'type'  => 'rt-color-picker',
				'design' => 'inline',
				'divider' => 'bottom',
				'setting' => ['transport' => 'postMessage'],

				'value' => [
					'default' => [
						'color' => 'var(--paletteColor5)',
					],

					'hover' => [
						'color' => 'var(--paletteColor7)',
					],
				],

				'pickers' => [
					[
						'title' => __('Initial', 'rishi'),
						'id' => 'default',
					],

					[
						'title' => __('Hover/Active', 'rishi'),
						'id' => 'hover',
						'condition' => ['dropdown_items_type' => 'solid|padded']
					],
				],
			],

			'headerDropdownDivider' => [
				'label' => __('Items Divider', 'rishi'),
				'type' => 'rt-border',
				'design' => 'inline',
				'divider' => 'bottom',
				'setting' => ['transport' => 'postMessage'],
				'value' => [
					'width' => 1,
					'style' => 'dashed',
					'color' => [
						'color' => 'var(--paletteColor6)',
					],
				]
			],

			'headerDropdownShadow' => [
				'label' => __('Dropdown Shadow', 'rishi'),
				'type' => 'rt-box-shadow',
				'design' => 'inline',
				'divider' => 'bottom',
				'value' => rt_customizer_box_shadow_value([
					'enable' => true,
					'h_offset' => 0,
					'v_offset' => 10,
					'blur' => 20,
					'spread' => 0,
					'inset' => false,
					'color' => [
						'color' => 'rgba(41, 51, 61, 0.1)',
					],
				])
			],

			'headerDropdownRadius' => [
				'label' => __('Dropdown Border Radius', 'rishi'),
				'type' => 'rt-spacing',
				'setting' => ['transport' => 'postMessage'],
				'value' => rt_customizer_spacing_value([
					'linked' => false,
					'top' => '0px',
					'left' => '2px',
					'right' => '0px',
					'bottom' => '2px',
				]),
				// 'responsive' => true
			],

		],
	],
];
