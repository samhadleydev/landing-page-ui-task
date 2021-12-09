<?php

/**
 * Helpers for generating CSS output.
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Rishi
 */

if (!function_exists('rt_customizer_output_responsive')) {
	function rt_customizer_output_responsive($args = [])
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
				'unit' => 'px',
				'value' => null,
			]
		);

		$args['value_suffix'] = $args['unit'];
		$args['responsive'] = true;

		rt_customizer_output_css_vars($args);
	}
}

if (!function_exists('rt_customizer_units_config')) {
	function rt_customizer_units_config($overrides = [])
	{
		$units = [
			[
				'unit' => 'px',
				'min' => 0,
				'max' => 40,
			],
			[
				'unit' => 'em',
				'min' => 0,
				'max' => 30,
			],
			[
				'unit' => '%',
				'min' => 0,
				'max' => 100,
			],
			[
				'unit' => 'vw',
				'min' => 0,
				'max' => 100,
			],
			[
				'unit' => 'vh',
				'min' => 0,
				'max' => 100,
			],
			[
				'unit' => 'pt',
				'min' => 0,
				'max' => 100,
			],
			[
				'unit' => 'rem',
				'min' => 0,
				'max' => 30,
			],
		];

		foreach ($overrides as $single_override) {
			foreach ($units as $key => $single_unit) {
				if ($single_override['unit'] === $single_unit['unit']) {
					$units[$key] = $single_override;
				}
			}
		}

		return $units;
	}
}

if (!function_exists('rt_customizer_output_border')) {
	function rt_customizer_output_border($args = [])
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

				'important' => false,
				'responsive' => false
			]
		);

		$value = rt_customizer_expand_responsive_value($args['value']);

		$border_values = [
			'desktop' => '',
			'tablet' => '',
			'mobile' => '',
		];

		if ($value['desktop']['style'] === 'none') {
			$border_values['desktop'] = 'none';
		} else {
			$color = rt_customizer_get_colors([
				'default' => $value['desktop']['color']
			], [
				'default' => $value['desktop']['color']
			]);

			$border_values['desktop'] = $value['desktop']['width'] . 'px ' .
				$value['desktop']['style'] . ' ' . $color['default'];
		}

		if (
			isset($value['desktop']['inherit'])
			&&
			$value['desktop']['inherit']
		) {
			$border_values['desktop'] = 'CT_CSS_SKIP_RULE';
		}

		if ($value['tablet']['style'] === 'none') {
			$border_values['tablet'] = 'none';
		} else {
			$color = rt_customizer_get_colors([
				'default' => $value['tablet']['color']
			], [
				'default' => $value['tablet']['color']
			]);

			$border_values['tablet'] = $value['tablet']['width'] . 'px ' .
				$value['tablet']['style'] . ' ' . $color['default'];
		}

		if (
			isset($value['tablet']['inherit'])
			&&
			$value['tablet']['inherit']
		) {
			$border_values['tablet'] = 'CT_CSS_SKIP_RULE';
		}

		if ($value['mobile']['style'] === 'none') {
			$border_values['mobile'] = 'none';
		} else {
			$color = rt_customizer_get_colors([
				'default' => $value['mobile']['color']
			], [
				'default' => $value['mobile']['color']
			]);

			$border_values['mobile'] = $value['mobile']['width'] . 'px ' .
				$value['mobile']['style'] . ' ' . $color['default'];
		}

		if (
			isset($value['mobile']['inherit'])
			&&
			$value['mobile']['inherit']
		) {
			$border_values['mobile'] = 'CT_CSS_SKIP_RULE';
		}

		$args['value'] = $border_values;

		if ($args['important']) {
			$args['value_suffix'] = ' !important';
		}

		rt_customizer_output_css_vars($args);
	}
}

if (!function_exists('rt_customizer_output_spacing')) {
	function rt_customizer_output_spacing($args = [])
	{
		$args = wp_parse_args(
			$args,
			[
				'css' => null,
				'tablet_css' => null,
				'mobile_css' => null,

				'selector' => null,
				'property' => 'margin',

				'important' => false,
				'responsive' => true,

				'value' => null,
			]
		);

		$value = rt_customizer_expand_responsive_value($args['value']);

		$spacing_value = [
			'desktop' => rt_customizer_spacing_prepare_for_device($value['desktop']),
			'tablet' => rt_customizer_spacing_prepare_for_device($value['tablet']),
			'mobile' => rt_customizer_spacing_prepare_for_device($value['mobile']),
		];

		$args['value'] = $spacing_value;
		$args['variableName'] = $args['property'];

		if ($args['important']) {
			$args['value_suffix'] = ' !important';
		}

		rt_customizer_output_css_vars($args);
	}
}

if (!function_exists('rt_customizer_spacing_prepare_for_device')) {
	function rt_customizer_spacing_prepare_for_device($value)
	{
		$result = [];

		$is_value_compact = true;

		foreach ([
			$value['top'],
			$value['right'],
			$value['bottom'],
			$value['left']
		] as $val) {
			if ($val !== 'auto' && preg_match('/\\d/', $val) > 0) {
				$is_value_compact = false;
				break;
			}
		}

		if ($is_value_compact) {
			return 'CT_CSS_SKIP_RULE';
		}

		if (
			$value['top'] === 'auto'
			||
			preg_match('/\\d/', $value['top']) === 0
		) {
			$result[] = 0;
		} else {
			$result[] = $value['top'];
		}

		if (
			$value['right'] === 'auto'
			||
			preg_match('/\\d/', $value['right']) === 0
		) {
			$result[] = 0;
		} else {
			$result[] = $value['right'];
		}

		if (
			$value['bottom'] === 'auto'
			||
			preg_match('/\\d/', $value['bottom']) === 0
		) {
			$result[] = 0;
		} else {
			$result[] = $value['bottom'];
		}

		if (
			$value['left'] === 'auto'
			||
			preg_match('/\\d/', $value['left']) === 0
		) {
			$result[] = 0;
		} else {
			$result[] = $value['left'];
		}

		if (
			$result[0] === $result[1]
			&&
			$result[0] === $result[2]
			&&
			$result[0] === $result[3]
		) {
			return $result[0];
		}

		if (
			$result[0] === $result[2]
			&&
			$result[1] === $result[3]
		) {
			return $result[0] . ' ' . $result[3];
		}

		return implode(' ', $result);
	}
}

if (!function_exists('rt_customizer_spacing_value')) {
	function rt_customizer_spacing_value($args = [])
	{
		return wp_parse_args(
			$args,
			[
				'top' => '',
				'bottom' => '',
				'left' => '',
				'right' => '',
				'linked' => true
			]
		);
	}
}

function rt_customizer_maybe_append_important($value, $has_important = false)
{
	if (!$has_important) {
		return $value;
	}

	if (strpos($value, 'CT_CSS_SKIP_RULE') !== false) {
		return $value;
	}

	return $value . ' !important';
}


if (! function_exists('rt_customizer_get_page_title_source')) {
	function rt_customizer_get_page_title_source() {
		static $result = null;

		if (! is_null($result)) {
			if (! is_customize_preview()) {
				return $result;
			}
		}

		$prefix = rt_customizer_manager()->screen->get_prefix();

		if ($prefix === 'ct_content_block_single') {
			$result = false;
			return $result;
		}

		if (strpos($prefix, 'single') !== false || (
			function_exists('is_shop') && is_shop()
		) && ! is_search()) {
			$post_options = rt_customizer_get_post_options();

			$mode = rt_get_akv('has_hero_section', $post_options, 'default');

			if ($mode === 'disabled') {
				$result = false;
				return $result;
			}

			if ($mode === 'enabled')  {
				$result = [
					'strategy' => $post_options
				];
				return $result;
			}
		}

		$result = [
			'strategy' => 'customizer',
			'prefix' => $prefix
		];

		return $result;
	}
}
