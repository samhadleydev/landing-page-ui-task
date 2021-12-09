<?php

if (!function_exists('rt_customizer_expand_responsive_value')) {
	function rt_customizer_expand_responsive_value($value, $is_responsive = true)
	{
		if (is_array($value) && isset($value['desktop'])) {
			if (!$is_responsive) {
				return $value['desktop'];
			}

			return $value;
		}

		if (!$is_responsive) {
			return $value;
		}

		return [
			'desktop' => $value,
			'tablet' => $value,
			'mobile' => $value,
		];
	}
}

function rt_customizer_output_css_vars($args = [])
{
	$args = wp_parse_args(
		$args,
		[
			'css' => null,
			'tablet_css' => null,
			'mobile_css' => null,

			'selector' => null,

			'desktop_selector_prefix' => '',
			'tablet_selector_prefix' => '',
			'mobile_selector_prefix' => '',

			'variableName' => null,
			'value' => null,

			'value_suffix' => '',

			'responsive' => false
		]
	);

	if (!$args['variableName']) {
		throw new Error('variableName missing in args!');
	}

	if ($args['responsive']) {
		rt_customizer_assert_args($args, ['tablet_css', 'mobile_css']);
	}

	$value = rt_customizer_expand_responsive_value($args['value']);

	$args['css']->put(
		empty($args['desktop_selector_prefix']) ? $args['selector'] : ($args['desktop_selector_prefix'] . ' ' . $args['selector']),
		'--' . $args['variableName'] . ': ' . $value['desktop'] . $args['value_suffix']
	);

	if (
		$args['responsive']
		&&
		$value['tablet'] !== $value['desktop']
	) {
		$args['tablet_css']->put(
			empty($args['tablet_selector_prefix']) ? $args['selector'] : ($args['tablet_selector_prefix'] . ' ' . $args['selector']),
			'--' . $args['variableName'] . ': ' . $value['tablet'] . $args['value_suffix']
		);
	}

	if (
		$args['responsive']
		&&
		$value['tablet'] !== $value['mobile']
	) {
		$args['mobile_css']->put(
			empty($args['mobile_selector_prefix']) ? $args['selector'] : ($args['mobile_selector_prefix'] . ' ' . $args['selector']),
			'--' . $args['variableName'] . ': ' . $value['mobile'] . $args['value_suffix']
		);
	}
}


if (! function_exists('rt_customizer_map_values')) {
	function rt_customizer_map_values($args = []) {
		$args = wp_parse_args(
			$args,
			[
				'value' => null,
				'map' => []
			]
		);

		if (
			! is_array($args['value'])
			&&
			isset($args['map'][$args['value']])
		) {
			return $args['map'][$args['value']];
		}

		foreach ($args['value'] as $key => $value) {
			if (! is_array($value) && isset($args['map'][$value])) {
				$args['value'][$key] = $args['map'][$value];
			}
		}

		return $args['value'];
	}
}
