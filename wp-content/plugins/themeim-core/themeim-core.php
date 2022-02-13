<?php
/*
Plugin Name: Themeim Core
Plugin URI: https://themeforest.net/user/themeim/portfolio
Description: Plugin to contain short codes and custom post types of the Themeim theme.
Author: Themeim
Author URI: https://themeim.com/
Version: 1.0.0
Text Domain: themeim-core
*/


/**
 * If this file is called directly, abort.
 * @package themeim
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Plugin directory path
 * @package themeim
 * @since 1.0.0
 */
define( 'THEMEIM_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'THEMEIM_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'THEMEIM_CORE_SELF_PATH', 'themeim-core/themeim-core.php' );
define( 'THEMEIM_CORE_VERSION', '1.0.0' );
define( 'THEMEIM_CORE_INC', THEMEIM_CORE_ROOT_PATH .'/inc');
define( 'THEMEIM_CORE_LIB', THEMEIM_CORE_ROOT_PATH .'/lib');
define( 'THEMEIM_CORE_DEMO_IMPORT', THEMEIM_CORE_ROOT_PATH .'/demo-import');
define( 'THEMEIM_CORE_ADMIN', THEMEIM_CORE_ROOT_PATH .'/admin');
define( 'THEMEIM_CORE_ADMIN_ASSETS', THEMEIM_CORE_ROOT_URL .'admin/assets');
define( 'THEMEIM_CORE_WP_WIDGETS', THEMEIM_CORE_ROOT_PATH .'/wp-widgets');
define( 'THEMEIM_CORE_ASSETS', THEMEIM_CORE_ROOT_URL .'assets/');
define( 'THEMEIM_CORE_CSS', THEMEIM_CORE_ASSETS .'css');
define( 'THEMEIM_CORE_JS', THEMEIM_CORE_ASSETS .'js');
define( 'THEMEIM_CORE_IMG', THEMEIM_CORE_ASSETS .'img');


/**
 * Load additional helpers functions
 * @package themeim
 * @since 1.0.0
 */
if (!function_exists('themeim_core')){
	require_once THEMEIM_CORE_INC .'/theme-core-helper-functions.php';
	if (!function_exists('themeim_core')){
		function themeim_core(){
			return class_exists('Themeim_Core_Helper_Functions') ? new Themeim_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


/**
 * Load Codestar Framework Functions
 * @package themeim
 * @since 1.0.0
 */
if ( !themeim_core()->is_themeim_active()) {
	if ( file_exists( THEMEIM_CORE_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once THEMEIM_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}



/**
 * Core Plugin Init
 * @package themeim
 * @since 1.0.0
 */
if ( file_exists( THEMEIM_CORE_ROOT_PATH . '/inc/theme-core-init.php' ) ) {
	require_once THEMEIM_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}
