<?php

$maybe_taxonomy = rt_customizer_maybe_get_matching_taxonomy($post_type->name, false);

$options = [
	[
		'post_title_panel' => [
			'label' => __( 'Post Title', 'rishi' ),
			'type' => 'rt-panel',
			'wrapperAttr' => [ 'data-label' => 'heading-label' ],
			'setting' => [ 'transport' => 'postMessage' ],
			'inner-options' => [

				rt_customizer_get_options('general/page-title', [
					'has_default' => true,
					'is_single' => true
				]),

			]
		],

		rt_customizer_rand_md5() => [
			'type' => 'rt-title',
			'label' => __( 'Post Structure', 'rishi' ),
		],

		rt_customizer_rand_md5() => [
			'title' => __( 'General', 'rishi' ),
			'type' => 'tab',
			'options' => [
				'page_structure_type' => [
					'label' => false,
					'type' => 'rt-image-picker',
					'value' => 'default',
					'design' => 'block',
					'attr' => [
						'data-type' => 'background',
						'data-state' => 'sync',
					],
					'setting' => [ 'transport' => 'postMessage' ],
					'choices' => [
						'default' => [
							'src'   => rt_customizer_image_picker_url( 'default.svg' ),
							'title' => __( 'Inherit from customizer', 'rishi' ),
						],

						'type-3' => [
							'src'   => rt_customizer_image_picker_url( 'narrow.svg' ),
							'title' => __( 'Narrow Width', 'rishi' ),
						],

						'type-4' => [
							'src'   => rt_customizer_image_picker_url( 'normal.svg' ),
							'title' => __( 'Normal Width', 'rishi' ),
						],

						'type-2' => [
							'src'   => rt_customizer_image_picker_url( 'left-single-sidebar.svg' ),
							'title' => __( 'Left Sidebar', 'rishi' ),
						],

						'type-1' => [
							'src'   => rt_customizer_image_picker_url( 'right-single-sidebar.svg' ),
							'title' => __( 'Right Sidebar', 'rishi' ),
						],
					],
				],

				rt_customizer_rand_md5() => [
					'type' => 'rt-divider',
				],

				'content_style_source' => [
					'label' => __('Content Area Style Source', 'rishi'),
					'type' => 'rt-radio',
					'value' => 'inherit',
					'view' => 'text',
					'choices' => [
						'inherit' => __('Inherit', 'rishi'),
						'custom' => __('Custom', 'rishi'),
					],
				],

				rt_customizer_rand_md5() => [
					'type' => 'rt-condition',
					'condition' => ['content_style_source' => 'custom'],
					'options' => [
						'content_style' => [
							'label' => __('Content Area Style', 'rishi'),
							'type' => 'rt-radio',
							'value' => 'wide',
							'view' => 'text',
							'design' => 'block',
							'responsive' => true,
							'choices' => [
								'wide' => __( 'Wide', 'rishi' ),
								'boxed' => __( 'Boxed', 'rishi' ),
							],
						],
					]
				],

				'vertical_spacing_source' => [
					'label' => __('Content Area Vertical Spacing', 'rishi'),
					'type' => 'rt-radio',
					'value' => 'inherit',
					'view' => 'text',
					'divider' => 'top',
					'choices' => [
						'inherit' => __('Inherit', 'rishi'),
						'custom' => __('Custom', 'rishi'),
					],
				],

				rt_customizer_rand_md5() => [
					'type' => 'rt-condition',
					'condition' => [ 'vertical_spacing_source' => 'custom' ],
					'options' => [

						'content_area_spacing' => [
							'label' => false,
							'desc' => __( 'You can customize the spacing value in general settings panel.', 'rishi' ),
							'type' => 'rt-radio',
							'value' => 'both',
							'view' => 'text',
							'design' => 'block',
							'disableRevertButton' => true,
							'attr' => [ 'data-type' => 'content-spacing' ],
							'setting' => [ 'transport' => 'postMessage' ],
							'choices' => [
								'both'   => '<span></span>
								<i class="rt-tooltip-top">' . __( 'Top & Bottom', 'rishi' ) . '</i>',

								'top'    => '<span></span>
								<i class="rt-tooltip-top">' . __( 'Only Top', 'rishi' ) . '</i>',

								'bottom' => '<span></span>
								<i class="rt-tooltip-top">' . __( 'Only Bottom', 'rishi' ) . '</i>',

								'none'   => '<span></span>
								<i class="rt-tooltip-top">' . __( 'Disabled', 'rishi' ) . '</i>',
							],
							'desc' => sprintf(
								// translators: placeholder here means the actual URL.
								__( 'You can customize the global spacing value in General ➝ Layout ➝ %sContent Area Spacing%s.', 'rishi' ),
								sprintf(
									'<a data-trigger-section="general" href="%s">',
									admin_url('/customize.php?autofocus[section]=general&rt_autofocus=general:layout_panel')
								),
								'</a>'
							),
						],

					],
				],
			]
		],

		rt_customizer_rand_md5() => [
			'title' => __('Design', 'rishi'),
			'type' => 'tab',
			'options' => [
				rt_customizer_get_options('single-elements/structure-design')
			],
		],

		rt_customizer_rand_md5() => [
			'type' => 'rt-title',
			'label' => __( 'Post Elements', 'rishi' ),
		],

		'disable_featured_image' => [
			'label' => __( 'Disable Featured Image', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],
	],

	$maybe_taxonomy ? [
		'disable_post_tags' => [
			'label' => sprintf(
				__('Disable %s %s', 'rishi'),
				$post_type->labels->singular_name,
				get_taxonomy($maybe_taxonomy)->label
			),
			'type' => 'rara-switch',
			'value' => 'no',
		],
	] : [],

	[
		'disable_share_box' => [
			'label' => __( 'Disable Share Box', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],

		'disable_author_box' => [
			'label' => __( 'Disable Author Box', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],

		'disable_posts_navigation' => [
			'label' => __( 'Disable Posts Navigation', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],

		rt_customizer_rand_md5() => [
			'type' => 'rt-title',
			'label' => __( 'Page Elements', 'rishi' ),
		],

		'disable_related_posts' => [
			'label' => __( 'Disable Related Posts', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],

		'disable_header' => [
			'label' => __( 'Disable Header', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],

		'disable_footer' => [
			'label' => __( 'Disable Footer', 'rishi' ),
			'type' => 'rara-switch',
			'value' => 'no',
		],
	],

	apply_filters(
		'rt_customizer_extensions_metabox_post_bottom',
		[]
	),
];


