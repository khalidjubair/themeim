<?php
/**
 * Theme Excerpt Class
 * @package themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
	exit(); //exit if access it directly
}

if (!class_exists('Themeim_Core_excerpt')):
class Themeim_Core_excerpt {

    public static $length = 55;

    public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100,
      'promo'=>15
    );

    public static $more = true;

    /**
     * Sets the length for the excerpt
     * @package themeim
     */ 
    public static function length($new_length = 55, $more = true) {
        Themeim_Core_excerpt::$length = $new_length;
        Themeim_Core_excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Themeim_Core_excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'Themeim_Core_excerpt::new_length');

        Themeim_Core_excerpt::output();
    }

    public static function new_length() {
        if( isset(Themeim_Core_excerpt::$types[Themeim_Core_excerpt::$length]) )
            return Themeim_Core_excerpt::$types[Themeim_Core_excerpt::$length];
        else
            return Themeim_Core_excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<span class="readmore"><a href="'.get_permalink().'">'.esc_html__('Read More','themeim-core').'</a></span>';
    }

    public static function auto_excerpt_more( ) {
        if (Themeim_Core_excerpt::$more) :
            return ' ';
        else :
            return ' ';
        endif;
    }

} //end class
endif;

if (!function_exists('themeim_core_excerpt')){

	function Themeim_Core_excerpt($length = 55, $more=true) {
		Themeim_Core_excerpt::length($length, $more);
	}

}


?>