<?php

// require get_template_directory() . '/rt-customizer-builder/admin/helpers/all.php';

/**
 * Admin Section initialization
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

add_action(
	'enqueue_block_editor_assets',
	function () {
		$theme = rt_customizer_get_wp_parent_theme();
		global $post;

		$m = new RT_Customizer_Fonts_Manager();
		$m->load_editor_fonts();

		$options = rt_customizer_get_options('meta/' . get_post_type($post));

		if (rt_customizer_manager()->post_types->is_supported_post_type()) {
			$options = rt_customizer_get_options('meta/default', [
				'post_type' => get_post_type_object(get_post_type($post))
			]);
		}

		$options = apply_filters(
			'rishi:editor:post_meta_options',
			$options,
			get_post_type($post)
		);

		// wp_enqueue_style(
		// 	'rt-main-editor-styles',
		// 	get_template_directory_uri() . '/js/build/editor.min.css',
		// 	[],
		// 	$theme->get('Version')
		// );

		if (is_rtl()) {
			wp_enqueue_style(
				'rt-main-editor-rtl-styles',
				get_template_directory_uri() . '/js/build/editor-rtl.min.css',
				['rt-main-editor-styles'],
				$theme->get('Version')
			);
		}

		wp_enqueue_script(
			'rt-main-editor-scripts',
			get_template_directory_uri() . '/js/build/editor.js',
			['wp-plugins', 'wp-element', 'rt-options-scripts'],
			$theme->get('Version'),
			true
		);

		// Add Translation support for editor JS 
		wp_set_script_translations( 'rt-main-editor-scripts', 'rishi' );

		$post_type = get_current_screen()->post_type;
		$maybe_cpt = rt_customizer_manager()
			->post_types
			->is_supported_post_type();

		if ($maybe_cpt) {
			$post_type = $maybe_cpt;
		}

		$prefix = rt_customizer_manager()->screen->get_admin_prefix($post_type);

		$page_structure = get_theme_mod(
			$post_type . '_sidebar_layout', 'right-sidebar'
		);

		$background_source = get_theme_mod(
			$prefix . '_background',
			rt_customizer_background_default_value([
				'backgroundColor' => [
					'default' => [
						'color' => RT_CSS_Injector::get_skip_rule_keyword()
					],
				],
			])
		);

		if (
			isset($background_source['background_type'])
			&&
			$background_source['background_type'] === 'color'
			&&
			isset($background_source['backgroundColor']['default']['color'])
			&&
			$background_source['backgroundColor']['default']['color'] === RT_CSS_Injector::get_skip_rule_keyword()
		) {
			$background_source = get_theme_mod(
				'site_background',
				rt_customizer_background_default_value([
					'backgroundColor' => [
						'default' => [
							'color' => '#f8f9fb'
						],
					],
				])
			);
		}

		$localize = [
			'post_options' => $options,
			'default_page_structure' => $page_structure,

			'default_background' => $background_source,
			'default_content_style' => get_theme_mod(
				$prefix . '_content_style'
			),

			'default_content_background' => get_theme_mod(
				$prefix . '_content_background',
				rt_customizer_background_default_value([
					'backgroundColor' => [
						'default' => [
							'color' => '#ffffff'
						],
					],
				])
			),

			'default_boxed_content_spacing' => get_theme_mod(
				$prefix . '_boxed_content_spacing',
				[
					'desktop' => rt_customizer_spacing_value([
						'linked' => true,
						'top' => '40px',
						'left' => '40px',
						'right' => '40px',
						'bottom' => '40px',
					]),
					'tablet' => rt_customizer_spacing_value([
						'linked' => true,
						'top' => '35px',
						'left' => '35px',
						'right' => '35px',
						'bottom' => '35px',
					]),
					'mobile'=> rt_customizer_spacing_value([
						'linked' => true,
						'top' => '20px',
						'left' => '20px',
						'right' => '20px',
						'bottom' => '20px',
					]),
				]
			),

			'default_content_boxed_radius' => get_theme_mod(
				$prefix . '_content_boxed_radius',
				rt_customizer_spacing_value([
					'linked' => true,
					'top' => '3px',
					'left' => '3px',
					'right' => '3px',
					'bottom' => '3px',
				])
			),

			'default_content_boxed_shadow' => get_theme_mod(
				$prefix . '_content_boxed_shadow',
				rt_customizer_box_shadow_value([
					'enable' => true,
					'h_offset' => 0,
					'v_offset' => 12,
					'blur' => 18,
					'spread' => -6,
					'inset' => false,
					'color' => [
						'color' => 'rgba(34, 56, 101, 0.04)',
					],
				])
			)
		];

		wp_localize_script(
			'rt-main-editor-scripts',
			'ct_editor_localizations',
			$localize
		);
	}
);

add_filter(
	'admin_body_class',
	function ($classes) {
		global $post;

		if ( ! isset( $post->ID ) ) {
			return $classes;
		}

		$current_screen = get_current_screen();

		if (!$current_screen->is_block_editor()) {
			return $classes;
		}

		$default_page_structure = rt_customizer_default_akg(
			'page_structure_type',
			rt_customizer_get_post_options($post->ID),
			'default'
		);

		$rishi_sidebar_layout = rt_customizer_default_akg(
			'_rishi_sidebar_layout',
			rt_customizer_get_post_options($post->ID),
			'default'
		);

		if ($default_page_structure === 'default') {
			$post_type = get_current_screen()->post_type;
			$maybe_cpt = rt_customizer_manager()
				->post_types
				->is_supported_post_type();

			if ($maybe_cpt) {
				$post_type = $maybe_cpt;
			}

			// $prefix = rt_customizer_manager()->screen->get_admin_prefix($post_type);

			$default_page_structure = get_theme_mod(
				$post_type . '_sidebar_layout',
				'right-sidebar'
			);
		}

		$class = 'narrow';

		if ($default_page_structure === 'type-4') {
			$class = 'normal';
		}

		$class = 'rt-structure-' . $class;

		if (get_post_type($post) === 'ct_content_block') {
			$atts = rt_customizer_get_post_options($post->ID);
			$template_type = get_post_meta($post->ID, 'template_type', true);

			if (rt_customizer_default_akg(
				'has_content_block_structure',
				$atts,
				$template_type === 'hook' ? 'no' : 'yes'
			)) {
				$page_structure = rt_customizer_default_akg(
					'content_block_structure',
					$atts,
					'type-4'
				);

				$class = 'narrow';

				if ($page_structure === 'type-4') {
					$class = 'normal';
				}

				$class = 'rt-structure-' . $class;
			} else {
				$class = '';
			}
		}

		if (get_post_type($post) === 'post' || get_post_type($post) === 'page') {

			$content_style_source = rt_customizer_default_akg(
	            'content_style_source',
	            rt_customizer_get_post_options($post->ID),
	            'inherit'
	        );

	        $post_content_area = rt_customizer_default_akg(
	            'content_style',
	            rt_customizer_get_post_options($post->ID),
	            'boxed'
	        );
		
			$classes .= ' ' . $post_content_area;
		}

		$classes .= ' ' . $class;

		return $classes;
	}
);

if (!function_exists('rt_customizer_get_jed_locale_data')) {
	function rt_customizer_get_jed_locale_data($domain)
	{
		$translations = get_translations_for_domain($domain);

		$locale = [
			'' => [
				'domain' => $domain,
				'lang' => is_admin() ? get_user_locale() : get_locale(),
			],
		];

		if (!empty($translations->headers['Plural-Forms'])) {
			$locale['']['plural_forms'] = $translations->headers['Plural-Forms'];
		}

		foreach ($translations->entries as $msgid => $entry) {
			$locale[$msgid] = $entry->translations;
		}

		return $locale;
	}
}

add_action(
	'admin_enqueue_scripts',
	function () {
		$theme = rt_customizer_get_wp_parent_theme();

		$current_screen = get_current_screen();

		if (
			$current_screen->id
			&&
			strpos($current_screen->id, 'forminator') !== false
		) {
			return;
		}

		wp_enqueue_media();

		$events_vars = require get_template_directory() . '/js/build/events.asset.php';
		wp_register_script(
			'rt-custom-events',
			get_template_directory_uri() . '/js/build/events.js',
			$events_vars['dependencies'],
			$events_vars['version'],
			true
		);

		global $wp_customize;

		if (!isset($wp_customize)) {
			wp_enqueue_editor();
			$options_vars = require get_template_directory() . '/js/build/options.asset.php';
			wp_enqueue_script(
				'rt-options-scripts',
				get_template_directory_uri() . '/js/build/options.js',
				$options_vars['dependencies'],
				$options_vars['version']
			);

			// Add Translation support for options JS 
			wp_set_script_translations( 'rt-options-scripts', 'rishi' );
		}

		$locale_data_ct = rt_customizer_get_jed_locale_data('rishi');

		wp_add_inline_script(
			'wp-i18n',
			'wp.i18n.setLocaleData( ' . wp_json_encode($locale_data_ct) . ', "rishi" );'
		);

		wp_enqueue_style(
			'rt-options-styles',
			get_template_directory_uri() . '/rt-customizer-builder/css/customizer/options.css',
			['wp-components'],
			$theme->get('Version')
		);

		if (is_rtl()) {
			wp_enqueue_style(
				'rt-options-rtl-styles',
				get_template_directory_uri() . '/rt-customizer-builder/css/customizer/options-rtl.css',
				['rt-options-styles'],
				$theme->get('Version')
			);
		}

		wp_localize_script(
			'rt-options-scripts',
			'rt_localizations',
			[
				'gradients'         => get_theme_support('editor-gradient-presets')[0],
				'is_dev_mode'       => !!(defined('RISHI_DEVELOPMENT_MODE') && RISHI_DEVELOPMENT_MODE),
				'nonce'             => wp_create_nonce('rt-ajax-nonce'),
				'public_url'        => get_template_directory_uri() . '/js/build/',
				'static_public_url' => get_template_directory_uri() . '/js/',
				'ajax_url'          => admin_url('admin-ajax.php'),
				'rest_url'          => get_rest_url(),
				'customizer_url'    => admin_url('/customize.php?autofocus'),
				'search_url' 		=> get_search_link('QUERY_STRING'),
			]
		);
	},
	50
);
