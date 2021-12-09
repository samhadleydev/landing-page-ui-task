<?php

/**
 * Generate colors based on input.
 *
 * @param array $color_descriptor Colors array.
 */
if (!function_exists('rt_customizer_get_colors')) {
	function rt_customizer_get_colors($color_descriptor, $defaults)
	{
		$result = [];

		foreach ($defaults as $id => $default_data) {
			$data = $default_data;

			if (
				is_array($color_descriptor)
				&&
				isset($color_descriptor[$id])
				&&
				is_array($color_descriptor[$id])
			) {
				$data = $color_descriptor[$id];
			}

			$result[$id] = rt_customizer_get_color($data);
		}

		return $result;
	}
}

/**
 * Extract color from a descriptor.
 * id:
 *   - fw-custom
 *   - fw-no-color
 *   - color_skin_*
 *   - fw-inherit:location
 *   - fw-inherit:location:hover
 *   - fw-inherit:location:default
 *
 * @param array $color_descriptor Single color descriptor.
 */
if (!function_exists('rt_customizer_get_color')) {
	function rt_customizer_get_color($color_descriptor)
	{
		if (!isset($color_descriptor['color'])) {
			return null;
		}

		return $color_descriptor['color'];
	}
}

if (!function_exists('rt_customizer_output_colors')) {
	function rt_customizer_output_colors($args = [])
	{
		$args = wp_parse_args(
			$args,
			[
				'css' => null,
				'tablet_css' => null,
				'mobile_css' => null,
				'value' => null,
				'default' => null,
				'variables' => [],

				'desktop_selector_prefix' => '',
				'tablet_selector_prefix' => '',
				'mobile_selector_prefix' => '',

				'important' => false,
				'responsive' => false
			]
		);

		rt_customizer_assert_args($args, ['css', 'default']);

		if ($args['responsive']) {
			rt_customizer_assert_args($args, ['tablet_css', 'mobile_css']);
		}

		$responsive_value = rt_customizer_expand_responsive_value($args['value']);
		$responsive_default_value = rt_customizer_expand_responsive_value($args['default']);

		$desktop_colors = rt_customizer_get_colors(
			$responsive_value['desktop'],
			$responsive_default_value['desktop']
		);

		$tablet_colors = rt_customizer_get_colors(
			$responsive_value['tablet'],
			$responsive_default_value['tablet']
		);

		$mobile_colors = rt_customizer_get_colors(
			$responsive_value['mobile'],
			$responsive_default_value['mobile']
		);

		foreach ($args['variables'] as $key => $descriptor) {
			if (!isset($descriptor['selector'])) {
				$descriptor['selector'] = ':root';
			}

			$local_args = [
				'css' => $args['css'],
				'tablet_css' => $args['tablet_css'],
				'mobile_css' => $args['mobile_css'],

				'desktop_selector_prefix' => $args['desktop_selector_prefix'],
				'tablet_selector_prefix' => $args['tablet_selector_prefix'],
				'mobile_selector_prefix' => $args['mobile_selector_prefix'],

				'selector' => $descriptor['selector'],
				'variableName' => $descriptor['variable'],
				'value' => [
					'desktop' => $desktop_colors[$key],
					'tablet' => $tablet_colors[$key],
					'mobile' => $mobile_colors[$key],
				],

				'responsive' => $args['responsive']
			];

			if ($args['important']) {
				$local_args['value_suffix'] = ' !important';
			}

			rt_customizer_output_css_vars($local_args);
		}
	}
}
