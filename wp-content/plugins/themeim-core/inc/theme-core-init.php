<?php
/**
 * Theme Core Init
 * @package themeim
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Themeim_Core_Init')) {

	class Themeim_Core_Init
	{
	   /**
        * $instance
        * @since 1.0.0
        */
		protected static $instance;

		public function __construct()
		{
			//Load plugin assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
			//Load plugin admin assets
			add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
			//load plugin text domain
			add_action('init', array($this, 'load_textdomain'));
			//add custom icon to codester framework
			add_filter('csf_field_icon_add_icons', array($this, 'csf_custom_icon'));
			//load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
		}

	   /**
        * getInstance()
        * @since 1.0.0
        */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 */
		public function load_textdomain()
		{
			load_plugin_textdomain('themeim-core', false, THEMEIM_CORE_ROOT_PATH . '/languages');
		}

		/**
		 * Load plugin dependency files()
		 * @since 1.0.0
		 */
		public function load_plugin_dependency_files()
		{
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => THEMEIM_CORE_LIB . '/codestar-framework'
				),
				array(
					'file-name' => 'theme-menu-page',
					'folder-name' => THEMEIM_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-custom-post-type',
					'folder-name' => THEMEIM_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-post-column-customize',
					'folder-name' => THEMEIM_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-themeim-core-excerpt',
					'folder-name' => THEMEIM_CORE_INC
				),
				array(
					'file-name' => 'csf-taxonomy',
					'folder-name' => THEMEIM_CORE_INC
				),
				array(
					'file-name' => 'theme-core-shortcodes',
					'folder-name' => THEMEIM_CORE_INC
				),
                array(
                    'file-name' => 'theme-social-share-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-me-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-us-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-search-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-tags-menu',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-recent-post-widget',
					'folder-name' => THEMEIM_CORE_WP_WIDGETS
				),
				array(
					'file-name' => 'theme-contact-info-widget',
					'folder-name' => THEMEIM_CORE_WP_WIDGETS
				),
                array(
                    'file-name' => 'theme-service-category-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-request-form-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-category-widget',
                    'folder-name' => THEMEIM_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-demo-data-import',
					'folder-name' => THEMEIM_CORE_DEMO_IMPORT
				),
			);

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'theme-elementor-icon-manager',
                    'folder-name' => THEMEIM_CORE_INC
                );
            }
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as $file) {
					if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function plugin_assets()
		{
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

		/**
		 * Load plugin css files()
		 * @since 1.0.0
		 */
		public function load_plugin_css_files()
		{
			$plugin_version = THEMEIM_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'flaticon',
					'src' => THEMEIM_CORE_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
                array(
                    'handle' => 'nice-select',
                    'src' => THEMEIM_CORE_CSS . '/nice-select.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
                array(
                    'handle' => 'slick',
                    'src' => THEMEIM_CORE_CSS . '/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
					'handle' => 'fontawesome',
					'src' => THEMEIM_CORE_CSS . '/font-awesome.min.css',
					'deps' => array(),
					'ver' => '5.12.0',
					'media' => 'all'
				),
				array(
					'handle' => 'themeim-core-main-style',
					'src' => THEMEIM_CORE_CSS . '/main-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);
			
			if (!themeim_core()->is_themeim_active()) {
				$all_css_files[] = array(
					'handle' => 'animate',
					'src' => THEMEIM_CORE_CSS . '/animate.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'bootstrap',
					'src' => THEMEIM_CORE_CSS . '/bootstrap.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'magnific-popup',
					'src' => THEMEIM_CORE_CSS . '/magnific-popup.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'themeim-main-style',
					'src' => THEMEIM_CORE_CSS . '/theme-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'themeim-responsive',
					'src' => THEMEIM_CORE_CSS . '/theme-responsive.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
			}
			$all_css_files = apply_filters('themeim_core_css', $all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin js
		 * @since 1.0.0
		 */
		public function load_plugin_js_files()
		{
			$plugin_version = THEMEIM_CORE_VERSION;
			$all_js_files = array(
                array(
                    'handle' => 'wow',
                    'src' => THEMEIM_CORE_JS . '/wow.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'nice-select',
                    'src' => THEMEIM_CORE_JS . '/jquery.nice-select.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'waypoints',
					'src' => THEMEIM_CORE_JS . '/waypoints.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
				array(
					'handle' => 'counterup',
					'src' => THEMEIM_CORE_JS . '/jquery.counterup.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'slick',
                    'src' => THEMEIM_CORE_JS . '/slick.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'themeim-core-main-script',
					'src' => THEMEIM_CORE_JS . '/main.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			if (!themeim_core()->is_themeim_active()) {
				$all_js_files[] = array(
					'handle' => 'popper',
					'src' => THEMEIM_CORE_JS . '/popper.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'bootstrap',
					'src' => THEMEIM_CORE_JS . '/bootstrap.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'magnific-popup',
					'src' => THEMEIM_CORE_JS . '/jquery.magnific-popup.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
			}

			$all_js_files = apply_filters('themeim_core_frontend_script_enqueue', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function admin_assets()
		{
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * Load plugin admin css files()
		 * @since 1.0.0
		 */
		public function load_admin_css_files()
		{
			$plugin_version = THEMEIM_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'themeim-core-admin-style',
					'src' => THEMEIM_CORE_ADMIN_ASSETS . '/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'flaticon',
					'src' => THEMEIM_CORE_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
			);

			$all_css_files = apply_filters('themeim_admin_css', $all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin admin js
		 * @since 1.0.0
		 */
		public function load_admin_js_files()
		{
			$plugin_version = THEMEIM_CORE_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'themeim-core-widget',
					'src' => THEMEIM_CORE_ADMIN_ASSETS . '/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('themeim_admin_js', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Add Custom Icon To Codester Framework
		 * @since 1.0.0
		 */
		public function csf_custom_icon($icons)
		{
			//adding new icon
			$icons[]  = array(
				'title' => esc_html__('Flaticon', 'themeim-core'),
				'icons' => array(
					'flaticon-user',
					'flaticon-quotation-mark',
					'flaticon-calendar',
					'flaticon-repeat',
					'flaticon-flag',
					'flaticon-guide',
					'flaticon-user-1',
					'flaticon-photo-camera',
					'flaticon-presentation',
					'flaticon-volume',
					'flaticon-money',
					'flaticon-star',
					'flaticon-instagram',
					'flaticon-youtube',
					'flaticon-facebook',
					'flaticon-twitter',
					'flaticon-google-plus',
					'flaticon-phone',
					'flaticon-placeholder',
					'flaticon-add',
					'flaticon-close',
					'flaticon-email',
					'flaticon-send',
					'flaticon-pencil',
					'flaticon-clock',
					'flaticon-wifi',
					'flaticon-magnifying-glass',
					'flaticon-user-2',
					'flaticon-right-arrow',
					'flaticon-left-arrow',
					'flaticon-right-arrow-1',
					'flaticon-left-arrow-1',
					'flaticon-user-3',
					'flaticon-armchair',
					'flaticon-protection',
					'flaticon-globe',
					'flaticon-calendar-1',
					'flaticon-stewardess',
					'flaticon-plane',
					'flaticon-passport',
					'flaticon-money-1',
					'flaticon-success',
					'flaticon-like',
					'flaticon-hand-gesture',
					'flaticon-pilot',
					'flaticon-airplane',
					'flaticon-helicopter',
					'flaticon-air-ambulance',
					'flaticon-plane-1',
					'flaticon-shield',
					'flaticon-route',
					'flaticon-jet',
					'flaticon-travel',
					'flaticon-take-off',
					'flaticon-radar',
					'flaticon-plane-2',
					'flaticon-passenger',
					'flaticon-user-4',
					'flaticon-airplane-1',
					'flaticon-black-plane',
					'flaticon-light-bulb',
					'flaticon-lightbulb',
					'flaticon-light-bulb-1',
					'flaticon-video-call',
					'flaticon-video-player',
					'flaticon-play',
					'flaticon-youtube-1',
					'flaticon-video-camera',
					'flaticon-play-1',
					'flaticon-movie-player',
					'flaticon-video',
					'flaticon-blocks-with-angled-cuts',
					'flaticon-straight-quotes',
					'flaticon-calendar-2',
					'flaticon-star-1',
					'flaticon-book',
					'flaticon-favorite',
					'flaticon-star-2',
					'flaticon-right',
					'flaticon-right-arrow-2',
					'flaticon-right-arrow-3',
					'flaticon-left-arrow-2',
					'flaticon-left-arrow-3',
					'flaticon-left-arrow-4',
					'flaticon-left-arrow-5',
					'flaticon-location',
					'flaticon-pin',
					'flaticon-location-1',
					'flaticon-location-2',
					'flaticon-email-1',
					'flaticon-email-2',
					'flaticon-mail',
					'flaticon-mail-1',
					'flaticon-mail-2',
					'flaticon-split',
					'flaticon-road-sign',
					'flaticon-directions',
					'flaticon-direction',
					'flaticon-directions-1',
					'flaticon-speedometer',
					'flaticon-chat',
					'flaticon-camera',
					'flaticon-video-player-1',
					'flaticon-camera-1',
					'flaticon-experience'
				)
			);

			$icons = array_reverse($icons);

			return $icons;
		}
	} //end class
	if (class_exists('Themeim_Core_Init')) {
		Themeim_Core_Init::getInstance();
	}
}
