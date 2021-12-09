<?php 
/**
 * Rishi Admin Notices
 *
 * @package Rishi
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( ! class_exists( 'Rishi_Admin_Notices' ) ) :

    /**
    * Rishi Admin Notices
    */
    class Rishi_Admin_Notices {
        /**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
        public function __construct() {
			add_action( 'admin_notices', array( $this, 'output_companion_notice' ), 99 );

			add_action( 'wp_ajax_rt_customizer_notice_button_click', array( $this, 'notice_button_click_handler' ) );
        }
		
		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		function notice_button_click_handler() {
			if (! current_user_can('activate_plugins') ) return;

			$manager = new Rishi_Plugin_Manager();
			$status_descriptor = $manager->get_companion_status();

			if ($status_descriptor['status'] === 'active') {
				wp_send_json_success([
					'status' => 'active',
					'pluginUrl' => admin_url('admin.php?page=rt-dashboard')
				]);
			}

			if ($status_descriptor['status'] === 'uninstalled') {
				$manager->download_and_install($status_descriptor['slug']);
				$manager->plugin_activation($status_descriptor['slug']);

				wp_send_json_success([
					'status' => 'active',
					'pluginUrl' => admin_url('admin.php?page=rishi-dashboard')
				]);
			}

			if ($status_descriptor['status'] === 'installed') {
				$manager->plugin_activation($status_descriptor['slug']);

				wp_send_json_success([
					'status' => 'active',
					'pluginUrl' => admin_url('admin.php?page=rt-dashboard')
				]);
			}

		}

		function output_companion_notice() {
			if (! apply_filters(
				'rishi:admin:display-companion-plugin-notice',
				true
			)) {
				return;
			}
		
			if (! current_user_can('activate_plugins') ) return;
			if (get_option('dismissed-rishi_plugin_notice', false)) return;
		
			$manager = new Rishi_Plugin_Manager();
			$status = $manager->get_companion_status()['status'];

			// $status = 'inactive';
		
			if ($status === 'active') return;
		
			$url = admin_url('themes.php?page=rishi-dashboard');
			$plugin_url = admin_url('admin.php?page=rishi-dashboard');
			$plugin_link = 'https://rishitheme.com/rishi-companion/';
		
			echo '<div class="notice notice-rishi-plugin">';
			echo '<div class="notice-rishi-plugin-root" data-url="' . esc_attr($url) . '" data-plugin-url="' . esc_attr($plugin_url) . '" data-plugin-status="' . esc_attr($status) . '" data-link="' . esc_attr($plugin_link) . '">';
		
			?>
		
			<div class="ct-rishi-plugin-inner">
				<span class="ct-notification-icon">
					<svg width="55" height="55" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 55" role="img" aria-hidden="true" focusable="false"><defs><linearGradient id="linear-gradient" x1="1.267" y1="-1.25" x2="-0.263" y2="0.648" gradientUnits="objectBoundingBox"><stop offset="0.509" stop-color="#fff"></stop><stop offset="1" stop-color="#1c64d1"></stop></linearGradient></defs><g id="Group_2" data-name="Group 2" transform="translate(-839 -851)"><g id="Ellipse_1" data-name="Ellipse 1" transform="translate(839 851)" fill="#1c64d1" stroke="#1c64d1" stroke-width="1"><circle cx="27.5" cy="27.5" r="27.5" stroke="none"></circle><circle cx="27.5" cy="27.5" r="27" fill="none"></circle></g><g id="site_logo" data-name="site logo" transform="translate(854 864)"><path id="Path_6" data-name="Path 6" d="M18.1,21.629,0,0V29.393H24.594Z" fill="#fff"></path><path id="Path_7" data-name="Path 7" d="M24.494,11.11a11.141,11.141,0,0,1-6.469,10.118L0,0H13.5a10.968,10.968,0,0,1,7.764,3.264A11.2,11.2,0,0,1,24.494,11.11Z" fill="#fff"></path><g id="Group_1" data-name="Group 1" opacity="0.7"><path id="Path_8" data-name="Path 8" d="M18.112,21.63h0L.014,0V22.64H13.569q.211,0,.422-.008-.211.008-.423.008H.013v6.752H24.607Z" transform="translate(-0.002 0)" fill="#fff" fill-rule="evenodd"></path><path id="Path_9" data-name="Path 9" d="M24.482,11.112a11.144,11.144,0,0,1-3.227,7.849,11.072,11.072,0,0,1-3.239,2.271L0,0H13.494a10.959,10.959,0,0,1,7.76,3.264A11.209,11.209,0,0,1,24.482,11.112Z" fill="url(#linear-gradient)"></path></g></g></g></svg>
				</span>
		
				<div class="ct-notification-content">
					<h2><?php esc_html_e( 'Thank you for installing Rishi!', 'rishi' ); ?></h2>
					<p>
						<?php esc_html_e( 'We strongly recommend you to activate ', 'rishi' ); ?>
						<b><?php esc_html_e( 'Rishi Companion', 'rishi' ); ?></b> 
						<br>
						<?php esc_html_e( 'plugin to get access to features like extensions, demo starter templates and many other essential features.', 'rishi' ); ?>.
					</p>
				</div>
			</div>
			<?php
		
			echo '</div>';
			echo '</div>';
		}

    }
    

endif;

return new Rishi_Admin_Notices();
