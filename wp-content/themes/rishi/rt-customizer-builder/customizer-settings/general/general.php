<?php

/**
 * General options
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Rishi
 */

$options = [
	'layouts_section_options' => [
		'type' => 'rt-options',
		'setting' => ['transport' => 'postMessage'],
		'customizer_section' => 'container',
		'inner-options' => [

			rt_customizer_get_options('general/layouts/container'),

			rt_customizer_get_options('general/layouts/contentsidebar'),

			rt_customizer_get_options('general/layouts/button'),

			rt_customizer_get_options('general/layouts/back-to-top'),

			rt_customizer_get_options('general/layouts/404'),

			apply_filters('rishi:options:general:bottom', [])
		],
	],

	'customizer_color_scheme' => [
		'label' => __('Color scheme', 'rishi'),
		'type' => 'hidden',
		'label' => '',
		'value' => 'no',
		'setting' => ['transport' => 'postMessage'],
	],
];
