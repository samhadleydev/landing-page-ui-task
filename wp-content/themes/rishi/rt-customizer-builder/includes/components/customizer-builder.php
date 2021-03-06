<?php

require_once dirname(__FILE__) . '/builder/builder-renderer.php';

require_once dirname(__FILE__) . '/builder/header-logic.php';
require_once dirname(__FILE__) . '/builder/header-elements.php';
require_once dirname(__FILE__) . '/builder/builder-header-renderer.php';
require_once dirname(__FILE__) . '/builder/header/header-value-patcher.php';

require_once dirname(__FILE__) . '/builder/footer-logic.php';
require_once dirname(__FILE__) . '/builder/builder-footer-renderer.php';

class Rishi_Customizer_Builder
{
	private $items_cache = null;

	public function __construct()
	{
		$this->items_cache = [
			'header' => null,
			'footer' => null
		];
	}

	public function patch_header_value_for($processed_terms)
	{
		rt_customizer_manager()->header_builder->patch_value_for($processed_terms);
	}

	public function translation_keys()
	{
		return array_merge(
			rt_customizer_manager()->header_builder->translation_keys(),
			rt_customizer_manager()->footer_builder->translation_keys()
		);
	}

	public function typography_keys()
	{
		return array_merge(
			rt_customizer_manager()->header_builder->typography_keys(),
			rt_customizer_manager()->footer_builder->typography_keys()
		);
	}

	public function dynamic_css($panel_type = 'header', $args = [])
	{
		if (!rt_customizer_dynamic_styles_should_call($args)) {
			return;
		}

		if ($panel_type === 'header') {
			$panel_logic = rt_customizer_manager()->header_builder;
		} else {
			$panel_logic = rt_customizer_manager()->footer_builder;
		}

		if ($args['context'] === 'inline') {
			$this->load_dynamic_css_for_section([
				'panel_type' => $panel_type,
				'section_id' => $panel_logic->get_current_section_id()
			], $args);

			return;
		}

		$sections_to_load_css_for = apply_filters(
			'rishi:' . $panel_type . ':sections-for-dynamic-css',
			[$panel_logic->get_section_value()['sections'][0]],
			$panel_logic->get_section_value()
		);

		foreach ($sections_to_load_css_for as $single_section) {
			$this->load_dynamic_css_for_section([
				'panel_type' => $panel_type,
				'section_id' => $single_section['id']
			], $args);
		}
	}

	public function load_dynamic_css_for_section($args = [], $css_args = [])
	{
		$args = wp_parse_args($args, [
			'panel_type' => 'header',
			'section_id' => null
		]);

		if ($args['panel_type'] === 'header') {
			$render = new Rishi_Header_Builder_Render([
				'current_section_id' => $args['section_id']
			]);
		} else {
			$render = new Rishi_Footer_Builder_Render([
				'current_section_id' => $args['section_id']
			]);
		}

		$all_items = $this->get_registered_items_by($args['panel_type']);
		$current_section = $render->get_current_section();

		foreach ($current_section['items'] as $item) {
			if ($render->is_custom_id($item['id'])) {
				$new_item = [];

				foreach ($this->get_registered_items_by($args['panel_type']) as $nested_item) {
					if ($nested_item['id'] === $render->get_original_id($item['id'])) {
						$new_item = $nested_item;
						$new_item['id'] = $item['id'];
					}
				}

				$all_items[] = $new_item;
			}
		}

		foreach ($all_items as $item) {
			if (!$render->contains_item($item['id'], $item['is_primary'])) {
				continue;
			}

			if (!file_exists($item['path'] . '/dynamic-styles.php')) {
				continue;
			}

			$css_args['atts'] = $render->get_item_data_for($item['id']);
			$css_args['item'] = $item;

			if (isset($item['is_primary']) && $item['is_primary']) {
				$css_args['primary_item'] = $render->get_primary_item($item['id']);
			}

			rt_customizer_theme_get_dynamic_styles(apply_filters(
				'rishi:' . $args['panel_type'] . ':dynamic-styles-args',
				array_merge([
					'section_id' => $args['section_id'],
					'path' => $item['path'] . '/dynamic-styles.php',
					'root_selector' => $render->get_root_selector($item),
					'column_selector' => $render->get_column_selector($item)
				], $css_args)
			));
		}

		$path = apply_filters(
			'rishi:' . $args['panel_type'] . ':dynamic-styles-path',
			get_template_directory() . '/rt-customizer-builder/panel-builder/' . $args['panel_type'] . '/dynamic-styles.php'
		);

		$section = $render->get_current_section();

		if (!isset($section['settings'])) {
			$section['settings'] = [];
		}

		$css_args['atts'] = $section['settings'];

		if (file_exists($path)) {
			rt_customizer_theme_get_dynamic_styles(
				apply_filters(
					'rishi:' . $args['panel_type'] . ':dynamic-styles-args',
					array_merge([
						'section_id' => $args['section_id'],
						'path' => $path,
						'root_selector' => $render->get_root_selector()
					], $css_args)
				)
			);
		}
	}

	public function get_data_for_customizer()
	{
		$result = [];

		$result['header'] = $this->get_registered_items_by('header', [
			'require_options' => true
		]);

		$result['footer'] = $this->get_registered_items_by('footer', [
			'require_options' => true
		]);

		$result['footer_data'] = [
			'footer_options' => rt_customizer_get_options(
				get_template_directory() . '/rt-customizer-builder/panel-builder/footer/options.php',
				[],
				false
			)
		];

		$result['header_data'] = [
			'header_options' => rt_customizer_get_options(
				apply_filters(
					'rishi:header:general-options-path',
					get_template_directory() . '/rt-customizer-builder/panel-builder/header/options.php'
				),
				[],
				false
			)
		];

		$result['secondary_items'] = [
			'header' => $this->get_registered_items_by('header', [
				'include' => 'secondary'
			]),

			'footer' => $this->get_registered_items_by('footer', [
				'include' => 'secondary'
			]),
		];

		return $result;
	}

	public function get_option_id_for($panel_type = 'header', $item = [])
	{
		return $panel_type . '_item_' . str_replace('-', '_', $item['id']);
	}

	public function get_registered_items_by($panel_type = 'header', $args = [])
	{
		$args = wp_parse_args($args, [
			// all | primary | secondary
			'include' => 'all',
			'require_options' => false
		]);

		$should_do_caching = $args['include'] === 'all' && !$args['require_options'];

		if ($should_do_caching) {
			if ($this->items_cache[$panel_type]) {
				return $this->items_cache[$panel_type];
			}
		}

		$paths_to_look_for_items = apply_filters(
			'rishi:' . $panel_type . ':items-paths',
			[
				get_template_directory() . '/rt-customizer-builder/panel-builder/' . $panel_type
			],
			$panel_type
		);

		$items = [];

		$primary_items = [
			'top-row',
			'middle-row',
			'bottom-row',
			'offcanvas'
		];

		$all_items = [];

		foreach ($paths_to_look_for_items as $single_path) {
			$temporary_items = glob($single_path . '/*', GLOB_ONLYDIR);

			foreach ($temporary_items as $single_item_path) {
				$all_items[] = $single_item_path;
			}
		}

		foreach (apply_filters(
			'rishi:' . $panel_type . ':items-root-paths',
			$all_items
		) as $single_item) {
			$id = str_replace('_', '-', basename($single_item));

			if (in_array($id, $primary_items)) {
				if ($args['include'] === 'secondary') {
					continue;
				}
			} else {
				if ($args['include'] === 'primary') {
					continue;
				}
			}

			$future_data = [
				'id' => $id,

				'config' => apply_filters(
					'rishi:' . $panel_type . ':items-config',
					$this->read_config_for($single_item),
					$id
				),

				'path' => $single_item,
				'is_primary' => in_array($id, $primary_items)
			];

			if ($args['require_options']) {
				$future_data['options'] = $this->get_options_for(
					$panel_type,
					$future_data
				);
			}

			$items[] = $future_data;
		}

		if ($should_do_caching) {
			$this->items_cache[$panel_type] = $items;
		}

		return $items;
	}

	private function read_config_for($file_path)
	{
		$name = explode('-', basename($file_path));
		$name = array_map('ucfirst', $name);
		$name = implode(' ', $name);

		$_extract_variables = ['config' => []];

		if (is_readable($file_path . '/config.php')) {
			require $file_path . '/config.php';

			foreach ($_extract_variables as $variable_name => $default_value) {
				if (isset($$variable_name)) {
					$_extract_variables[$variable_name] = $$variable_name;
				}
			}
		}

		$_extract_variables['config'] = array_merge(
			[
				'name' => $name,
				'description' => '',
				'typography_keys' => [],
				'translation_keys' => [],
				'devices' => ['desktop', 'mobile'],
				'selective_refresh' => [],
				'allowed_in' => [],
				'excluded_from' => [],
				'clone' => false,

				// border | drop
				'shortcut_style' => 'drop',
				'enabled' => true
			],
			$_extract_variables['config']
		);

		return $_extract_variables['config'];
	}

	public function get_options_for($panel_type = 'header', $item = [])
	{
		if (!is_array($item)) {
			return [];
		}

		if (!isset($item['path'])) {
			return [];
		}

		return rt_customizer_get_options($item['path'] . '/options.php', [
			'panel_type' => $panel_type,
			'prefix' => $this->get_option_id_for($panel_type, $item) . '_'
		], false);
	}
}
