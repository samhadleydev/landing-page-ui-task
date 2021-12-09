<?php

/**
 * Customizer Builder initializations.
 * 
 * @package Rara_Themes_Customizer_Builder
 */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * RT_Customizer_Builder Main class.
 * 
 */
final class RT_Customizer_Builder
{
	/**
	 * Track instance of the RT_Customizer_Builder class.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	private static $instance = null;

	/**
	 * Current Builder version.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	var $version = '1.0.0';

	/**
	 * Fire up the engines.
	 *
	 * @since 1.0.0
	 */
	public function __construct()
	{
	}

	/**
	 * Main RT_Customizer_Builder Instance
	 *
	 * Ensures only one instance of RT_Customizer_Builder is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return RT_Customizer_Builder - Main instance
	 */
	public static function instance()
	{
		if (!isset(self::$instance) && !(self::$instance instanceof RT_Customizer_Builder)) {
			self::$instance = new RT_Customizer_Builder();

			self::$instance->includes();
			self::$instance->init_hooks();
		}

		return self::$instance;
	}

	/**
	 * Init Hooks.
	 *
	 * @return void
	 */
	public function init_hooks()
	{
		add_action('customize_controls_print_footer_scripts', array('_WP_Editors', 'force_uncompressed_tinymce'), 1);
		add_action('customize_controls_print_footer_scripts', array('_WP_Editors', 'print_default_editor_scripts'), 45);

		//Customizer Hoooks.
		add_action('customize_register', [$this, 'customizer_register']);
		add_action('customize_save', [$this, 'customizer_save']);
		add_action('customize_preview_init', [$this, 'customize_preview_init']);
		add_action('customize_controls_enqueue_scripts', [$this, 'enqueue_customizer_scripts']);

		// Footer Hook
		add_action('wp_footer', [$this, 'customizer_footer_cache'], 3000, 0);
		add_action('wp_footer', [$this, 'add_customizer_footer_cache']);

	}

	/**
	 * Include file dependencies.
	 *
	 * @since 1.0.0
	 */
	public function includes()
	{
		require get_template_directory() . '/rt-customizer-builder/includes/helpers.php';

		require get_template_directory() . '/rt-customizer-builder/includes/menus.php';
		require get_template_directory() . '/rt-customizer-builder/includes/schema-org.php';

		// Classes.
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-dynamic-css.php';
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-translations-manager.php';
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-screen-manager.php';
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-blocks-parser.php';
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-css-injector.php';
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-attributes-parser.php';

		global $wp_customize;

		if (isset($wp_customize)) {
			require get_template_directory() . '/rt-customizer-builder/includes/validator.php';
			require get_template_directory() . '/rt-customizer-builder/includes/sync.php';
			require get_template_directory() . '/rt-customizer-builder/includes/rt-register-customizer-options.php';
		}

		require_once get_template_directory() . '/rt-customizer-builder/admin/dashboard/rt-plugin-manager.php';

		if (is_admin() && defined('DOING_AJAX') && DOING_AJAX) {
			require_once get_template_directory() . '/rt-customizer-builder/admin/dashboard/rt-plugin-manager.php';
		}

		/**
		 * CSS Helpers 
		 */
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/fundamentals.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/colors.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/selectors.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/helpers.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/box-shadow-option.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/typography.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/backgrounds.php';
		require get_template_directory() . '/rt-customizer-builder/includes/css-helpers/visibility.php';

		/**
		 * Initialize customizer builder. 
		 */
		require get_template_directory() . '/rt-customizer-builder/includes/components/customizer-builder.php';
		require get_template_directory() . '/rt-customizer-builder/includes/components/post-meta.php';
		require get_template_directory() . '/rt-customizer-builder/includes/components/social-box.php';
		require get_template_directory() . '/rt-customizer-builder/includes/components/images.php';
		require get_template_directory() . '/rt-customizer-builder/includes/components/pagination.php';

		require get_template_directory() . '/rt-customizer-builder/includes/integrations/custom-post-types.php';
		require get_template_directory() . '/rt-customizer-builder/includes/integrations/theme-builders.php';

		require get_template_directory() . '/rt-customizer-builder/admin/helpers/all.php';


		/**
		 * Manager
		 */
		require get_template_directory() . '/rt-customizer-builder/includes/manager.php';



		if (is_admin()) {
			require get_template_directory() . '/rt-customizer-builder/admin/init.php';
		}
	}

	/**
	 * Register customizer options main function.
	 *
	 * @return void
	 */
	public function customizer_register($wp_customize)
	{
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-group-title.php';
		require get_template_directory() . '/rt-customizer-builder/classes/class-rt-note-control.php';

        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('background_image');
        $wp_customize->remove_section('header_image');

		$wp_customize->get_setting('blogname')->transport = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

		$wp_customize->selective_refresh->remove_partial('custom_logo');
		$wp_customize->get_setting('custom_logo')->transport = 'postMessage';

		$wp_customize->remove_control('custom_logo');
		$wp_customize->remove_control('blogname');
		$wp_customize->remove_control('blogdescription');

		if (function_exists('is_shop')) {
			$wp_customize->remove_section('header_image');
			
			$wp_customize->remove_section('woocommerce_product_catalog');
			$wp_customize->remove_control('woocommerce_single_image_width');
			$wp_customize->remove_control('woocommerce_thumbnail_image_width');
			$wp_customize->remove_control('woocommerce_thumbnail_cropping');
			$wp_customize->remove_control('woocommerce_demo_store_notice');
			$wp_customize->remove_control('woocommerce_demo_store');

			$wp_customize->add_setting('rt_customizer_has_checkout_coupon', [
				'default'    => false,
				'capability' => 'edit_theme_options',

				// This is only a default function.
				// Real check comes from rt_customizer_include_sanitizer()
				// above.
				'sanitize_callback' => function ($input, $setting) {
					return $input;
				}
			]);

			$wp_customize->add_control('rt_customizer_has_checkout_coupon', array(
				'label'    => __('Display Coupon Form', 'rishi'),
				'section'  => 'woocommerce_checkout',
				'settings' => 'rt_customizer_has_checkout_coupon',
				'type'     => 'checkbox',
				'std'      => '1'
			));
		}

		$wp_customize->add_section(
			new Rishi_Group_Title(
				$wp_customize,
				'core',
				[
					'title'    => esc_html__('WordPress Defaults', 'rishi'),
					'priority' => 15,
				]
			)
		);

		$wp_customize->add_setting(
			'rt_customizer_site_logo_navigator',
			array(
				'sanitize_callback' => 'wp_kses_post'
			)
		);
	
		$wp_customize->add_control(
			new Rishi_Note_Control( 
				$wp_customize,
				'rt_customizer_site_logo_navigator',
				array(
					'section' => 'title_tagline',
					'priority' => 61,
					'description' => sprintf(
						__('Configure Site Logo from %shere%s.', 'rishi'),
						sprintf(
							'<a href="%s" data-trigger-section="header:builder_panel_logo">',
							admin_url('/customize.php?autofocus[section]=header&rt_autofocus=header:builder_panel_logo')
						),
						'</a>'
					),
				)
			)
		);

		rt_customizer_customizer_register_options($wp_customize, rt_customizer_get_options('init'));
	}

	/**
	 * Customize Save function
	 *
	 * @param [type] $obj
	 * @return void
	 */
	public function customizer_save($obj)
	{
		$header_placements = $obj->get_setting('header_placements');

		if ($header_placements) {
			$current_value = $header_placements->post_value();
			unset($current_value['__forced_static_header__']);
			$header_placements->manager->set_post_value('header_placements', $current_value);
		}

		$footer_placements = $obj->get_setting('footer_placements');

		if ($footer_placements) {
			$current_value = $footer_placements->post_value();
			unset($current_value['__forced_static_footer__']);
			$footer_placements->manager->set_post_value('footer_placements', $current_value);
		}
	}
	/**
	 * Add custimizer footer cache
	 *
	 * @return void
	 */
	public function add_customizer_footer_cache() {
	
		$default_footer_elements = [];

		$elements = new Rishi_Header_Builder_Elements();

		ob_start();
		// $elements->render_search_modal();
		$default_footer_elements[] = ob_get_clean();

		$default_footer_elements[] = $elements->render_cart_offcanvas();
		$default_footer_elements[] = $elements->render_offcanvas();

		$footer_elements = apply_filters(
			'rt:footer:offcanvas-drawer',
			$default_footer_elements
		);

		if (! empty($footer_elements)) {
			echo '<div class="rt-drawer-canvas">';

			foreach ($footer_elements as $footer_el) {
				echo $footer_el;
			}

			echo '</div>';
		}

		if (is_customize_preview()) {
			rt_customizer_add_customizer_preview_cache(
				function () {
					return rt_customizer_html_tag(
						'div',
						['data-id' => 'socials-general-cache'],
						'<section>' . rt_customizer_social_icons(null, [
							'type' => 'simple-small'
						]) . '</section>'
					);
				}
			);
		}
	}

	/**
	 * Customizer footer cache.
	 *
	 * @return void
	 */
	public function customizer_footer_cache()
	{
		if (!is_customize_preview()) {
			return;
		}

		ob_start();

		echo '<div class="rara-customizer-preview-cache">';
		do_action('rt_customizer_customizer_preview_cache');
		echo '</div>';

		$html = ob_get_clean();

		/**
		 * Note to code reviewers: This line doesn't need to be escaped.
		 * The string used here escapes the value properly.
		 */
		echo '<input type="hidden" value="' . htmlspecialchars($html) . '" class="rara-customizer-preview-cache-container">';
	}

	/**
	 * Customizer preview init assets.
	 *
	 * @return void
	 */
	public function customize_preview_init()
	{
		$events_vars = require get_template_directory() . '/js/build/events.asset.php';
		wp_register_script(
			'rt-custom-events',
			get_template_directory_uri() . '/js/build/events.js',
			$events_vars['dependencies'],
			$events_vars['version'],
			true
		);

		$sync_vars = require get_template_directory() . '/js/build/sync.asset.php';
		wp_enqueue_script(
			'rara-customizer-sync',
			get_template_directory_uri() . '/js/build/sync.js',
			['customize-preview', 'wp-date', 'rt-custom-events'],
			$sync_vars['version'],
			true
		);

		wp_localize_script(
			'rara-customizer-sync',
			'rt_customizer_localizations',
			[
				'static_public_url' => get_template_directory_uri() . '/rt-customizer-builder/src/',
				'header_builder_data' => Rishi_Manager::instance()->builder->get_data_for_customizer(),
				'has_new_widgets' => !! get_theme_support('widgets-block-editor'),
				'customizer_sync' => $this->customizer_sync_data()
			]
		);

		wp_enqueue_media();
	}

	/**
	 * Customizer scripts.
	 *
	 * @return void
	 */
	public function enqueue_customizer_scripts()
	{
		$theme = rt_customizer_get_wp_parent_theme();

		wp_enqueue_editor();

		wp_enqueue_style(
			'rara-customizer-controls-styles',
			get_template_directory_uri() . '/rt-customizer-builder/css/customizer/customizer-controls.css',
			[],
			$theme->get('Version')
		);

		if (is_rtl()) {
			wp_enqueue_style(
				'rara-customizer-controls-rtl-styles',
				get_template_directory_uri() . '/rt-customizer-builder/css/customizer/customizer-controls-rtl.css',
				['rara-customizer-controls-styles'],
				$theme->get('Version')
			);
		}

		$events_vars = require get_template_directory() . '/js/build/events.asset.php';
		wp_register_script(
			'rt-custom-events',
			get_template_directory_uri() . '/js/build/events.js',
			$events_vars['dependencies'],
			$events_vars['version'],
			true
		);

		wp_enqueue_style(
			'rt-options-styles',
			get_template_directory_uri() . '/rt-customizer-builder/css/customizer/options.css',
			['wp-components'],
			$theme->get('Version')
		);

		$locale_data_ct = rt_customizer_get_jed_locale_data('rishi');

		wp_add_inline_script(
			'wp-i18n',
			'wp.i18n.setLocaleData( ' . wp_json_encode($locale_data_ct) . ', "rishi" );'
		);

		$customizerControls_vars = require get_template_directory() . '/js/build/customizerControls.asset.php';
		wp_enqueue_script(
			'rara-customizer-controls',
			get_template_directory_uri() . '/js/build/customizerControls.js',
			$customizerControls_vars['dependencies'],
			$customizerControls_vars['version'],
			true
		);

		// Add Translation support for customizer JS 
		wp_set_script_translations( 'rara-customizer-controls', 'rishi' );

		$has_child_theme = false;

		foreach (wp_get_themes() as $id => $theme) {
			if (!$theme->parent()) {
				continue;
			}

			if ($theme->parent()->get_stylesheet() === 'rishi') {
				$has_child_theme = true;
			}
		}

		wp_localize_script(
			'rara-customizer-controls',
			'rt_customizer_localizations',
			[
				'customizer_reset_none' => wp_create_nonce('rara-customizer-reset'),
				'static_public_url' => get_template_directory_uri() . '/rt-customizer-builder/src/',
				'header_builder_data' => Rishi_Manager::instance()->builder->get_data_for_customizer(),
				'all_mods' => get_theme_mods(),
				'gradients' => get_theme_support('editor-gradient-presets')[0],
				'has_new_widgets' => !! get_theme_support('widgets-block-editor'),
				'has_child_theme' => $has_child_theme,
				'is_parent_theme' => !wp_get_theme()->parent()
			]
		);
	}

	/**
	 * Customizer Sync Data.
	 *
	 * @return void
	 */
	function customizer_sync_data()
	{
		$location = null;

		if (is_front_page()) {
			$location = 'home';
		}

		if (is_page()) {
			$location = 'page';
		}

		if (get_post_type() === 'post' && is_single()) {
			$location = 'post';
		}

		if (
			function_exists('is_woocommerce')
			&&
			is_woocommerce()
		) {
			if (is_single()) {
				$location = 'product';
			}

			if (is_shop() || is_product_category()) {
				$location = 'product_archives';
			}
		}

		$theme = rt_customizer_get_wp_theme();

		return [
			'future_location' => $location,
			'svg_patterns'    => rt_customizer_get_patterns_svgs_list(),
			'site_title'      => get_bloginfo('name'),
			'theme_author'    => $theme->get('Author'),
		];
	}

}


/**
 * Returns the main instance of RT_Customizer_Builder.
 *
 * @since  1.0.0
 * @return RT_Customizer_Builder
 */
function init_rt_customizer_builder()
{
	return RT_Customizer_Builder::instance();
}
// Initialize builder
init_rt_customizer_builder();
