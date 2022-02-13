<?php
/**
 * Theme Excerpt
 * @package flynext
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
    exit(); //exit if access it directly
}

if (!class_exists('flynext_excerpt')):
class flynext_excerpt {

    public static $length = 55;
    public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100,
      'promo'=>15
    );

    public static $more = true;

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = true) {
        flynext_excerpt::$length = $new_length;
        flynext_excerpt::$more = $more;

        add_filter( 'excerpt_more', 'flynext_excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'flynext_excerpt::new_length');

        flynext_excerpt::output();
    }

    public static function new_length() {
        if( isset(flynext_excerpt::$types[flynext_excerpt::$length]) )
            return flynext_excerpt::$types[flynext_excerpt::$length];
        else
            return flynext_excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<span class="readmore"><a href="'.esc_url(get_permalink()).'">'.esc_html__('Read More','flynext').'</a></span>';
    }

    public static function auto_excerpt_more( ) {
        if (flynext_excerpt::$more) :
            return ' ';
        else :
            return ' ';
        endif;
    }

} //end class
endif;

if (!function_exists('flynext_excerpt')){

	function flynext_excerpt($length = 55, $more=true) {
		flynext_excerpt::length($length, $more);
	}

}


?>