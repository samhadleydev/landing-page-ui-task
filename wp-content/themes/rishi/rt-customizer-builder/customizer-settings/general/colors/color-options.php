<?php
/**
 * Color options
 *
 * @license   http: //www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Rishi
 */
 
$defaults = rishi_get_color_defaults();

$options = [
	'layouts_color_options' => [
		'type'               => 'rt-options',
		'customizer_section' => 'container',
		'inner-options' => [

			[
				'colorPalette' => [
					'label' => __( 'Global Color Palette', 'rishi' ),
					'type'  => 'rt-color-palettes-picker',
					'design' => 'block',
					// translators: The interpolations addes a html link around the word.
					'desc' => sprintf(
						__('Learn more about palettes and colors %shere%s.', 'rishi'),
						'<a href="https://rishitheme.com/" target="_blank">',
						'</a>'
					),
					'setting' => [ 'transport' => 'postMessage' ],
					'predefined' => true,
					'wrapperAttr' => [
						'data-type' => 'color-palette',
						'data-label' => 'heading-label'
					],

					'value' => [
						'color1' => [
							'color' => 'rgba(41, 41, 41, 0.9)',
						],

						'color2' => [
							'color' => '#292929',
						],

						'color3' => [
							'color' => '#307ac9',
						],

						'color4' => [
							'color' => '#5081F5',
						],

						'color5' => [
							'color' => '#ffffff',
						],

						'color6' => [
							'color' => '#EDF2FE',
						],

						'color7' => [
							'color' => '#F6F9FE',
						],

						'color8' => [
							'color' => '#F9FBFE',
						],

						'current_palette' => 'palette-1',

						'palettes' => [
							[
								'id' => 'palette-1',

								'color1' => [
									'color' => 'rgba(41, 41, 41, 0.9)',
								],

								'color2' => [
									'color' => '#292929',
								],

								'color3' => [
									'color' => '#307ac9',
								],

								'color4' => [
									'color' => '#5081F5',
								],

								'color5' => [
									'color' => '#ffffff',
								],

								'color6' => [
									'color' => '#EDF2FE',
								],

								'color7' => [
									'color' => '#F6F9FE',
								],

								'color8' => [
									'color' => '#F9FBFE',
								],
							],
							
							[
								'id' => 'palette-2',

								'color1' => [
									'color' => 'rgba(0, 26, 26, 0.8)',
								],

								'color2' => [
									'color' => 'rgba(0, 26, 26, 0.9)',
								],

								'color3' => [
									'color' => '#03a6a6',
								],

								'color4' => [
									'color' => '#001a1a',
								],

								'color5' => [
									'color' => '#ffffff',
								],

								'color6' => [
									'color' => '#E5E8E8',
								],

								'color7' => [
									'color' => '#F4FCFC',
								],

								'color8' => [
									'color' => '#FEFEFE',
								],
							],

							[
								'id' => 'palette-3',

								'color1' => [
									'color' => '#1e2436',
								],

								'color2' => [
									'color' => '#242b40',
								],

								'color3' => [
									'color' => '#ff8b3c',
								],

								'color4' => [
									'color' => '#8E919A',
								],

								'color5' => [
									'color' => '#ffffff',
								],

								'color6' => [
									'color' => '#E9E9EC',
								],

								'color7' => [
									'color' => '#FFF7F1',
								],

								'color8' => [
									'color' => '#FFFBF9',
								],
							],

							[
								'id' => 'palette-4',

								'color1' => [
									'color' => '#8D8D8D',
								],

								'color2' => [
									'color' => '#31332e',
								],

								'color3' => [
									'color' => '#8cb369',
								],

								'color4' => [
									'color' => '#A3C287',
								],

								'color5' => [
									'color' => '#ffffff',
								],

								'color6' => [
									'color' => '#E8F0E1',
								],

								'color7' => [
									'color' => '#F3F7F0',
								],

								'color8' => [
									'color' => '#ffffff',
								],
							],

							[
								'id' => 'palette-5',

								'color1' => [
									'color' => '#21201d',
								],

								'color2' => [
									'color' => '#21201d',
								],

								'color3' => [
									'color' => '#dea200',
								],

								'color4' => [
									'color' => '#343330',
								],

								'color5' => [
									'color' => '#ffffff',
								],

								'color6' => [
									'color' => '#F8ECCC',
								],

								'color7' => [
									'color' => '#FDF8ED',
								],

								'color8' => [
									'color' => '#fdfcf7',
								],
							],
						]
					],
				],

			],
			
			'primary_color' => [
				'label'           => __('Base Font Color', 'rishi'),
				'type'            => 'rt-color-picker',
				'skipEditPalette' => true,
				'design'          => 'inline',
				'setting'         => ['transport' => 'postMessage'],
				'value'           => [
					'default' => [
						'color' => 'var(--paletteColor1)',
					],
				],
				'pickers' => [
					[
						'title' => __('Initial', 'rishi'),
						'id'    => 'default',
					],
				],
			],

			'genLinkColor' => [
				'label'           => __('Link Color', 'rishi'),
				'type'            => 'rt-color-picker',
				'skipEditPalette' => true,
				'design'          => 'inline',
				'setting'         => ['transport' => 'postMessage'],

				'value' => [
					'default' => [
						'color' => 'var(--paletteColor3)',
					],

					'hover' => [
						'color' => 'var(--paletteColor2)',
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

			'genheadingColor' => [
				'label'           => __('Heading Color', 'rishi'),
				'type'            => 'rt-color-picker',
				'skipEditPalette' => true,
				'design'          => 'inline',
				'setting'         => ['transport' => 'postMessage'],
				'value'           => [
					'default' => [
						'color' => 'var(--paletteColor2)',
					],
				],
				'pickers' => [
					[
						'title' => __('Initial', 'rishi'),
						'id'    => 'default',
					],
				],
			],
			'textSelectionColor' => [
				'label'           => __('Text Selection Color', 'rishi'),
				'type'            => 'rt-color-picker',
				'skipEditPalette' => true,
				'design'          => 'inline',
				'setting'         => ['transport' => 'postMessage'],

				'value' => [
					'default' => [
						'color' => 'var(--paletteColor5)',
					],

					'hover' => [
						'color' => 'var(--paletteColor4)',
					],
				],

				'pickers' => [
					[
						'title' => __('Initial', 'rishi'),
						'id'    => 'default',
					],

					[
						'title' => __('Highlighted', 'rishi'),
						'id'    => 'hover',
					],
				],
			],
			'genborderColor' => [
				'label'           => __('Border Color', 'rishi'),
				'type'            => 'rt-color-picker',
				'skipEditPalette' => true,
				'design'          => 'inline',
				'setting'         => ['transport' => 'postMessage'],
				'value'           => [
					'default' => [
						'color' => 'var(--paletteColor6)',
					],
				],
				'pickers' => [
					[
						'title' => __('Initial', 'rishi'),
						'id'    => 'default',
					],
				],
			],
			'base_color' => [
				'label'           => __('Section Background Color', 'rishi'),
				'desc'            => __('This color is used in some sections of the site as a background.', 'rishi'),
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
			'site_background' => [
				'label'      => __('Site Background', 'rishi'),
				'type'       => 'rt-background',
				'design'     => 'block:right',
				'responsive' => true,
				'divider'    => 'top',
				'setting'    => ['transport' => 'postMessage'],
				'value'      => rt_customizer_background_default_value([
					'backgroundColor' => [
						'default' => [
							'color' => 'var(--paletteColor8)',
						],
					],
				])
			],
		],
	],
];
