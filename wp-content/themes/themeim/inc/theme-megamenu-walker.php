<?php
/**
 * Theme Megamenu Walker
 * Package themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

class themeim_Megamenu_Walker extends Walker_Nav_Menu{

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$description = $item->description;
		$permalink = $item->url;
		$megamenu = get_post_meta( $item->ID, 'menu-item-mega-menu', true );

		//If globally disable mega menu then remove
		if(!themeim_core_SELF_PATH)
		{
			$megamenu = '';
		}

		$all_li_classes = is_array($item->classes) ?  implode(" ", $item->classes) :   $item->classes;
		$output .= "<li class='" . $all_li_classes ;

		if($depth == 0 && !empty($megamenu))
		{
			$output .= "  themeim-megamenu ";
		}

		$output .= "'>";

		$output .= '<a href="'.esc_url($permalink).'">';
		$output .= $title;
		$output .= '</a>';

		if($depth == 0 && !empty($megamenu) && themeim_core_SELF_PATH)
		{
			if(!empty($megamenu) && defined("ELEMENTOR_VERSION"))
			{
				$output .= '<div class="elementor-megamenu-wrap themeim-megamenu-wapper"> '.themeim()->render_elementor_content($megamenu).'</div>';
			}
		}
	}
}