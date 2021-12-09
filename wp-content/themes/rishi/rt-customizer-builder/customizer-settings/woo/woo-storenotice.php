<?php

$options = [
	'woo_storenotice_section_options' => [
		'type'     => 'rt-options',
		'setting'  => [ 'transport' => 'postMessage' ],
		'priority' => 3,
        'inner-options'      => [
            'woocommerce_demo_store' => [
                'label' => __( 'Store Notice', 'rishi' ),
                'type' => 'rara-switch',
                'value' => 'no',
                'desc' => __( 'Show events or promotions to your visitors.', 'rishi' ),
                'setting' => [
                    'sanitize_callback' => 'wc_bool_to_string',
                    'sanitize_js_callback' => 'wc_bool_to_string',
                    'type' => 'option'
                ],
            ],
            rt_customizer_rand_md5() => [
                'type' => 'rt-condition',
                'condition' => [ 'woocommerce_demo_store' => 'yes' ],
                'options' => [
                    
                    rt_customizer_rand_md5() => [
                        'title'   => __('General', 'rishi'),
                        'type'    => 'tab',
                        'options' => [
                            'woocommerce_demo_store_notice' => [
                                'label' => false,
                                'type' => 'textarea',
                                'value' => __( 'This is a demo store for testing purposes &mdash; no orders shall be fulfilled.', 'rishi' ),
                                'setting' => [
                                    'type' => 'option',
                                    'transport' => 'postMessage'
                                ],
                                'disableRevertButton' => true,
                            ],

                            'store_notice_position' => [
                                'type' => 'rt-radio',
                                'label' => __( 'Notice Position', 'rishi' ),
                                'value' => 'bottom',
                                'view' => 'text',
                                'disableRevertButton' => true,
                                'setting' => [ 'transport' => 'postMessage' ],
                                'choices' => [
                                    'top' => __('Top', 'rishi'),
                                    'bottom' => __('Bottom', 'rishi'),
                                ],
                            ],
                        ],
                    ],
                    rt_customizer_rand_md5() => [
                        'title'   => __('Design', 'rishi'),
                        'type'    => 'tab',
                        'options' => [
                            'wooNoticeContent' => [
                                'label' => __( 'Notice Font Color', 'rishi' ),
                                'type'  => 'rt-color-picker',
                                'design' => 'inline',
                                'divider' => 'top',
                                'skipEditPalette' => true,
                                'setting' => [ 'transport' => 'postMessage' ],

                                'value' => [
                                    'default' => [
                                        'color' => 'var(--paletteColor5)',
                                    ],
                                ],

                                'pickers' => [
                                    [
                                        'title' => __( 'Initial', 'rishi' ),
                                        'id' => 'default',
                                    ],
                                ],
                            ],

                            'wooNoticeBackground' => [
                                'label' => __( 'Notice Background Color', 'rishi' ),
                                'type'  => 'rt-color-picker',
                                'design' => 'inline',
                                'skipEditPalette' => true,
                                'setting' => [ 'transport' => 'postMessage' ],

                                'value' => [
                                    'default' => [
                                        'color' => 'var(--paletteColor3)',
                                    ],
                                ],

                                'pickers' => [
                                    [
                                        'title' => __( 'Initial', 'rishi' ),
                                        'id' => 'default',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
