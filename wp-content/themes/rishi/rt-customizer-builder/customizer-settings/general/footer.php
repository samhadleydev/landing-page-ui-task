<?php

$options = [
	'footer_general_section_options' => [
		'type' => 'rt-options',
		'setting' => [ 'transport' => 'postMessage' ],
		'customizer_section' => 'layout',
		'inner-options' => [
			'footer_placements' => [
				'type' => 'rt-footer-builder',
				'setting' => ['transport' => 'postMessage'],
				'value' => Rishi_Manager::instance()->footer_builder->get_default_value(),
				'selective_refresh' => apply_filters('rishi:footer:selective_refresh', [
					[
						'id' => 'footer_placements_1',
						'fallback_refresh' => false,
						'container_inclusive' => true,
						'selector' => '#main-container > footer.rt-footer',
						'settings' => ['footer_placements'],
						'render_callback' => function () {
							echo Rishi_Manager::instance()->footer_builder->render();
						}
					],

					[
						'id' => 'footer_placements_item:menu',
						'fallback_refresh' => false,
						'container_inclusive' => true,
						'selector' => '#main-container > footer.rt-footer',
						'loader_selector' => '.footer-menu',
						'settings' => ['footer_placements'],
						'render_callback' => function () {
							echo Rishi_Manager::instance()->footer_builder->render();
						}
					],

					[
						'id' => 'footer_placements_item:logo',
						'fallback_refresh' => false,
						'container_inclusive' => true,
						'selector' => '.rt-footer [data-id="logo"]',
						'settings' => ['footer_placements'],
						'render_callback' => function () {
							$b = new Rishi_Footer_Builder_Render();
							echo $b->render_single_item('logo');
						}
					],
					[
						'id' => 'footer_placements_item:contacts',
						'fallback_refresh' => false,
						'container_inclusive' => true,
						'selector' => '.rt-footer [data-id="contacts"]',
						'settings' => ['footer_placements'],
						'render_callback' => function () {
							$footer = new Rishi_Footer_Builder_Render();
							echo $footer->render_single_item('contacts');
						}
					],
				])
			],
		]
	],
];

