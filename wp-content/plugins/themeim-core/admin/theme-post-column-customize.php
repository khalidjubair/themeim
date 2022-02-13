<?php
/**
 * Post Column Customize Custom Function
 * @package Themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

if (!class_exists('themeim_Post_Column_Customize')){
	class themeim_Post_Column_Customize{
		//$instance variable
		private static $instance;
		
		public function __construct() {
			//service admin add table value hook
			add_filter("manage_edit-service_columns", array($this, "edit_service_columns") );
			add_action('manage_service_posts_custom_column', array($this, 'add_thumbnail_columns'), 10,2);
            //service category icon
            add_filter("manage_edit-service-cat_columns", array($this, "edit_service_cat_columns") );
            add_filter('manage_service-cat_custom_column', array($this, 'add_service_category_columns'), 13, 3);
            //packages admin add table value hook
            add_filter("manage_edit-packages_columns", array($this, "edit_packages_columns") );
            add_action('manage_packages_posts_custom_column', array($this, 'add_packages_thumbnail_columns'), 10,2);
            //packages category icon
            add_filter("manage_edit-packages-cat_columns", array($this, "edit_packages_cat_columns") );
            add_filter('manage_packages-cat_custom_column', array($this, 'add_packages_category_columns'), 13, 3);
            //deals admin add table value hook
            add_filter("manage_edit-deals_columns", array($this, "edit_deals_columns") );
            add_action('manage_deals_posts_custom_column', array($this, 'add_deals_thumbnail_columns'), 20,4);
            //deals category icon
            add_filter("manage_edit-deals-cat_columns", array($this, "edit_deals_cat_columns") );
            add_filter('manage_deals-cat_custom_column', array($this, 'add_deals_category_columns'), 23, 4);
            //team admin add table value hook
            add_filter("manage_edit-team_columns", array($this, "edit_team_columns") );
            add_action('manage_team_posts_custom_column', array($this, 'add_team_thumbnail_columns'), 20,4);
            //team category icon
            add_filter("manage_edit-team-cat_columns", array($this, "edit_team_cat_columns") );
            add_filter('manage_team-cat_custom_column', array($this, 'add_team_category_columns'), 23, 4);
		}

		/**
		 * get Instance
		 * @since 1.0.0
		 */
		public static function getInstance(){
			if (null == self::$instance){
				self::$instance = new self();
			}
			return self::$instance;
		}


		/**
		 * Edit service
		 * @since 1.0.0
		 */
		public function edit_service_columns($columns){

			$order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
			$cat_title = $columns['taxonomy-service-cat'];
			unset($columns);
			$columns['cb'] = '<input type="checkbox" />';
			$columns['title'] = esc_html__('Title','themeim-core');
			$columns['thumbnail'] = '<a href="edit.php?post_type=service&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','themeim-core').'</a>';
			$columns['taxonomy-service-cat'] = '<a href="edit.php?post_type=service&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
			$columns['icon'] = esc_html__('Icon','themeim-core');
			$columns['date'] = esc_html__('Date','themeim-core');
			return $columns;
		}

		/**
		 * Add thumbnail
		 * @since 1.0.0
		 */
		public function add_thumbnail_columns($column,$post_id) {
			switch ( $column ) {
				case 'thumbnail' :
					echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
					break;
                case 'icon' :
                    $service_meta_option = get_post_meta($post_id ,'themeim_service_options', true);
                    $service_icon = $service_meta_option['service_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($service_icon));
                    break;
				default:
					break;
			}
		}

        /**
         * Service category column customize
         * @since 1.0.0
         */
        public function edit_service_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','themeim-core');
            return $columns;
        }

        /**
         * Service Category column add
         * @since 1.0.0
         */
        public function add_service_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'themeim_service_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

        /**
         * Edit packages
         * @since 1.0.0
         */
        public function edit_packages_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-packages-cat'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','themeim-core');
            $columns['thumbnail'] = '<a href="edit.php?post_type=packages&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','themeim-core').'</a>';
            $columns['taxonomy-packages-cat'] = '<a href="edit.php?post_type=packages&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','themeim-core');
            $columns['date'] = esc_html__('Date','themeim-core');
            return $columns;
        }

        /**
         * Add packages thumbnail
         * @since 1.0.0
         */
        public function add_packages_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $packages_meta_option = get_post_meta($post_id ,'themeim_packages_options', true);
                    $packages_icon = $packages_meta_option['packages_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($packages_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * Packages category column customize
         * @since 1.0.0
         */
        public function edit_packages_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','themeim-core');
            return $columns;
        }

        /**
         * Packages Category column add
         * @since 1.0.0
         */
        public function add_packages_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'themeim_packages_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

        /**
         * Edit deals
         * @since 1.0.0
         */
        public function edit_deals_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-deals-cat'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','themeim-core');
            $columns['thumbnail'] = '<a href="edit.php?post_type=deals&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','themeim-core').'</a>';
            $columns['taxonomy-deals-cat'] = '<a href="edit.php?post_type=deals&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','themeim-core');
            $columns['date'] = esc_html__('Date','themeim-core');
            return $columns;
        }

        /**
         * Add deals thumbnail
         * @since 1.0.0
         */
        public function add_deals_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $deals_meta_option = get_post_meta($post_id ,'themeim_deals_options', true);
                    $deals_icon = $deals_meta_option['deals_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($deals_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * Deals category column customize
         * @since 1.0.0
         */
        public function edit_deals_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','themeim-core');
            return $columns;
        }

        /**
         * Deals Category column add
         * @since 1.0.0
         */
        public function add_deals_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'themeim_deals_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

        /**
         * Edit team
         * @since 1.0.0
         */
        public function edit_team_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-team-cat'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','themeim-core');
            $columns['thumbnail'] = '<a href="edit.php?post_type=team&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','themeim-core').'</a>';
            $columns['taxonomy-team-cat'] = '<a href="edit.php?post_type=team&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','themeim-core');
            $columns['date'] = esc_html__('Date','themeim-core');
            return $columns;
        }

        /**
         * Add team thumbnail
         * @since 1.0.0
         */
        public function add_team_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $team_meta_option = get_post_meta($post_id ,'themeim_team_options', true);
                    $team_icon = $team_meta_option['team_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($team_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * Team category column customize
         * @since 1.0.0
         */
        public function edit_team_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','themeim-core');
            return $columns;
        }

        /**
         * Team Category column add
         * @since 1.0.0
         */
        public function add_team_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'themeim_team_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

	}//end class
	if ( class_exists('themeim_Post_Column_Customize')){
		themeim_Post_Column_Customize::getInstance();
	}
}