<?php

class Rishi_Manager
{
	public static $instance = null;

	public $builder = null;

	public $header_builder = null;
	public $footer_builder = null;

	public $post_types = null;

	public $screen = null;

	public $dynamic_css = null;
	private $scripts_enqueued = null;

	public static function instance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct()
	{
		$this->early_init();
	}

	private function early_init()
	{
		$this->builder = new Rishi_Customizer_Builder();

		$this->header_builder = new Rishi_Header_Builder();
		$this->footer_builder = new Rishi_Footer_Builder();

		$this->post_types = new Rishi_Custom_Post_Types();
		$this->screen = new RT_Screen_Manager();

		$this->dynamic_css = new RT_Dynamic_CSS();

		add_filter('block_parser_class', function () {
			return 'RT_WP_Block_Parser';
		});

		add_filter( 'rt:builder:main:script:vars', [$this, 'load_gt_dynamic_js_chunks'] );

		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'], 50);
	}

	/**
	 * Enqueue Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		if ($this->scripts_enqueued) {
			return;
		}

		$this->scripts_enqueued = true;

		$theme = rt_customizer_get_wp_parent_theme();

		$events_vars = require get_template_directory() . '/js/build/events.asset.php';
		wp_register_script(
			'rt-custom-events',
			get_template_directory_uri() . '/js/build/events.js',
			$events_vars['dependencies'],
			$events_vars['version'],
			true
		);
	}

	public function load_gt_dynamic_js_chunks( $local_vars) {

		if ( ! empty( $local_vars ) && is_array( $local_vars ) ) {
			$local_vars['dynamic_js_chunks'] = $this->get_dynamic_js_chunks();
		}

		return $local_vars;
	}

	public function get_dynamic_js_chunks() {
		$all_chunks = apply_filters(
			'rt:frontend:dynamic-js-chunks',
			[]
		);

		global $wp_scripts;

		foreach ($all_chunks as $index => $chunk) {
			if (! isset($chunk['deps'])) {
				continue;
			}

			$deps_data = [];

			foreach ($chunk['deps'] as $dep_id) {
				if (isset($wp_scripts->registered[$dep_id])) {
					if (strpos(
						$wp_scripts->registered[$dep_id]->src,
						site_url()
					) === false) {
						$deps_data[$dep_id] = site_url();
					} else {
						$deps_data[$dep_id] = '';
					}

					$deps_data[$dep_id] .= $wp_scripts->registered[$dep_id]->src;
				}
			}

			$all_chunks[$index]['deps_data'] = $deps_data;
		}

		return $all_chunks;
	}

}

function rt_customizer_manager()
{
	return Rishi_Manager::instance();
}
