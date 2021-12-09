<?php

/**
 * Visibility helpers
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Rishi
 */

/**
 * Generate visibility classes
 *
 * @param string $data Devices state.
 */
if (!function_exists('rt_customizer_visibility_classes')) {
	function rt_customizer_visibility_classes($data)
	{
		$classes = [];

		if (isset($data['mobile']) && !$data['mobile']) {
			$classes[] = 'rt-hidden-sm';
		}

		if (isset($data['tablet']) && !$data['tablet']) {
			$classes[] = 'rt-hidden-md';
		}

		if (isset($data['desktop']) && !$data['desktop']) {
			$classes[] = 'rt-hidden-lg';
		}

		return implode(' ', $classes);
	}
}

if (!function_exists('rt_customizer_some_device')) {
	function rt_customizer_some_device($data)
	{
		return (isset($data['mobile']) && $data['mobile']
			||
			isset($data['tablet']) && $data['tablet']
			||
			isset($data['desktop']) && $data['desktop']);
	}
}

if (!function_exists('rt_customizer_output_responsive_switch')) {
	function rt_customizer_output_responsive_switch($args = [])
	{
		$args = wp_parse_args(
			$args,
			[
				'css' => null,
				'tablet_css' => null,
				'mobile_css' => null,
				'value' => null,
				'selector' => '',

				'on' => 'block',
				'off' => 'none',

				'variable' => 'visibility',

				// all_enabled | all_disabled
				'skip_when' => 'all_enabled'
			]
		);

		rt_customizer_assert_args(
			$args,
			['css', 'tablet_css', 'mobile_css', 'selector', 'value']
		);

		$all_enabled = (isset($args['value']['mobile']) && $args['value']['mobile']
			&&
			isset($args['value']['tablet']) && $args['value']['tablet']
			&&
			isset($args['value']['desktop']) && $args['value']['desktop']);

		$all_disabled = (isset($args['value']['mobile']) && !$args['value']['mobile']
			&&
			isset($args['value']['tablet']) && !$args['value']['tablet']
			&&
			isset($args['value']['desktop']) && !$args['value']['desktop']);

		if ($all_enabled && $args['skip_when'] === 'all_enabled') {
			return;
		}

		if ($all_disabled && $args['skip_when'] === 'all_disabled') {
			return;
		}

		rt_customizer_output_css_vars([
			'css' => $args['css'],
			'tablet_css' => $args['tablet_css'],
			'mobile_css' => $args['mobile_css'],

			'selector' => $args['selector'],
			'responsive' => true,
			'variableName' => $args['variable'],

			'value' => [
				'desktop' => (isset($args['value']['desktop'])
					&&
					!$args['value']['desktop']) ? $args['off'] : $args['on'],

				'tablet' => (isset($args['value']['tablet'])
					&&
					!$args['value']['tablet']) ? $args['off'] : $args['on'],

				'mobile' => (isset($args['value']['mobile'])
					&&
					!$args['value']['mobile']) ? $args['off'] : $args['on'],
			]
		]);
	}
}
