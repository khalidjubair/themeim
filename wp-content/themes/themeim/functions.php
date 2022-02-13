<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themeim
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package themeim
 * @since 1.0.0
 */

define('THEMEIM_THEME_ROOT',get_template_directory());
define('THEMEIM_THEME_ROOT_URL',get_template_directory_uri());
define('THEMEIM_INC',THEMEIM_THEME_ROOT .'/inc');
define('THEMEIM_THEME_SETTINGS',THEMEIM_INC.'/theme-settings');
define('THEMEIM_THEME_SETTINGS_IMAGES',THEMEIM_THEME_ROOT_URL.'/inc/theme-settings/images');
define('THEMEIM_TGMA',THEMEIM_INC.'/plugins/tgma');
define('THEMEIM_DYNAMIC_STYLESHEETS',THEMEIM_INC.'/theme-stylesheets');
define('THEMEIM_CSS',THEMEIM_THEME_ROOT_URL.'/assets/css');
define('THEMEIM_JS',THEMEIM_THEME_ROOT_URL.'/assets/js');
define('THEMEIM_ASSETS',THEMEIM_THEME_ROOT_URL.'/assets');
define('THEMEIM_DEV',true);


/**
 * Theme Initial File
 * @package themeim
 * @since 1.0.0
 */
if (file_exists(THEMEIM_INC .'/theme-init.php')){
	require_once THEMEIM_INC .'/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package themeim
 * @since 1.0.0
 */
if (file_exists(THEMEIM_INC .'/theme-cs-function.php')){
	require_once THEMEIM_INC .'/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package themeim
 * @since 1.0.0
 */
if (file_exists(THEMEIM_INC .'/theme-helper-functions.php')){

	require_once THEMEIM_INC .'/theme-helper-functions.php';
	if (!function_exists('themeim')){
		function themeim(){
			return class_exists('Themeim_Helper_Functions') ? new Themeim_Helper_Functions() : false;
		}
	}
}
