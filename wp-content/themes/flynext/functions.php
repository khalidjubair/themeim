<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flynext
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package flynext
 * @since 1.0.0
 */

define('FLYNEXT_THEME_ROOT',get_template_directory());
define('FLYNEXT_THEME_ROOT_URL',get_template_directory_uri());
define('FLYNEXT_INC',FLYNEXT_THEME_ROOT .'/inc');
define('FLYNEXT_THEME_SETTINGS',FLYNEXT_INC.'/theme-settings');
define('FLYNEXT_THEME_SETTINGS_IMAGES',FLYNEXT_THEME_ROOT_URL.'/inc/theme-settings/images');
define('FLYNEXT_TGMA',FLYNEXT_INC.'/plugins/tgma');
define('FLYNEXT_DYNAMIC_STYLESHEETS',FLYNEXT_INC.'/theme-stylesheets');
define('FLYNEXT_CSS',FLYNEXT_THEME_ROOT_URL.'/assets/css');
define('FLYNEXT_JS',FLYNEXT_THEME_ROOT_URL.'/assets/js');
define('FLYNEXT_ASSETS',FLYNEXT_THEME_ROOT_URL.'/assets');
define('FLYNEXT_DEV',true);


/**
 * Theme Initial File
 * @package flynext
 * @since 1.0.0
 */
if (file_exists(FLYNEXT_INC .'/theme-init.php')){
	require_once FLYNEXT_INC .'/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package flynext
 * @since 1.0.0
 */
if (file_exists(FLYNEXT_INC .'/theme-cs-function.php')){
	require_once FLYNEXT_INC .'/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package flynext
 * @since 1.0.0
 */
if (file_exists(FLYNEXT_INC .'/theme-helper-functions.php')){

	require_once FLYNEXT_INC .'/theme-helper-functions.php';
	if (!function_exists('flynext')){
		function flynext(){
			return class_exists('Flynext_Helper_Functions') ? new Flynext_Helper_Functions() : false;
		}
	}
}
