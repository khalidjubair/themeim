<?php
/**
 * Theme Custom Post Type(CPTs)
 * @package Themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('Themeim_Custom_Post_Type')) {
    class Themeim_Custom_Post_Type
    {

        //$instance variable
        private static $instance;

        public function __construct()
        {
            //register post type
            // add_action('init', array($this, 'register_custom_post_type'));
        }

        /**
         * get Instance
         * @since  2.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Register Custom Post Type
         * @since  2.0.0
         */
        public function register_custom_post_type()
        {

            $all_post_type = array(
                [
                    'post_type' => 'service',
                    'args' => array(
                        'label' => esc_html__('Service', 'themeim-core'),
                        'description' => esc_html__('Service', 'themeim-core'),
                        'labels' => array(
                            'name' => esc_html_x('Service', 'Post Type General Name', 'themeim-core'),
                            'singular_name' => esc_html_x('Service', 'Post Type Singular Name', 'themeim-core'),
                            'menu_name' => esc_html__('Service', 'themeim-core'),
                            'all_items' => esc_html__('Services', 'themeim-core'),
                            'view_item' => esc_html__('View Service', 'themeim-core'),
                            'add_new_item' => esc_html__('Add New Service', 'themeim-core'),
                            'add_new' => esc_html__('Add New Service', 'themeim-core'),
                            'edit_item' => esc_html__('Edit Service', 'themeim-core'),
                            'update_item' => esc_html__('Update Service', 'themeim-core'),
                            'search_items' => esc_html__('Search Service', 'themeim-core'),
                            'not_found' => esc_html__('Not Found', 'themeim-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'themeim-core'),
                            'featured_image' => esc_html__('Service Image', 'themeim-core'),
                            'remove_featured_image' => esc_html__('Remove Service Image', 'themeim-core'),
                            'set_featured_image' => esc_html__('Set Service Image', 'themeim-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'taxonomies' => array( 'post_tag'), // this is IMPORTANT
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'themeim_theme_options',
                        "rewrite" => array('slug' => 'all-services', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ]
            );

            if (!empty($all_post_type) && is_array($all_post_type)) {

                foreach ($all_post_type as $post_type) {
                    call_user_func_array('register_post_type', $post_type);
                }
            }


            /**
             * Custom Taxonomy Register
             * @since 1.0.0
            */

            $all_custom_taxonmy = array(
                array(
                    'taxonomy' => 'service-cat',
                    'object_type' => 'service',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Service Category", 'themeim-core'),
                            "singular_name" => esc_html__("Service Category", 'themeim-core'),
                            "menu_name" => esc_html__("Service Category", 'themeim-core'),
                            "all_items" => esc_html__("All Service Category", 'themeim-core'),
                            "add_new_item" => esc_html__("Add New Service Category", 'themeim-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'service-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'packages-cat',
                    'object_type' => 'packages',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Packages Category", 'themeim-core'),
                            "singular_name" => esc_html__("Packages Category", 'themeim-core'),
                            "menu_name" => esc_html__("Packages Category", 'themeim-core'),
                            "all_items" => esc_html__("All Packages Category", 'themeim-core'),
                            "add_new_item" => esc_html__("Add New Packages Category", 'themeim-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'packages-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'deals-cat',
                    'object_type' => 'deals',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Deals Category", 'themeim-core'),
                            "singular_name" => esc_html__("Deals Category", 'themeim-core'),
                            "menu_name" => esc_html__("Deals Category", 'themeim-core'),
                            "all_items" => esc_html__("All Deals Category", 'themeim-core'),
                            "add_new_item" => esc_html__("Add New Deals Category", 'themeim-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'deals-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'team-cat',
                    'object_type' => 'team',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Team Category", 'themeim-core'),
                            "singular_name" => esc_html__("Team Category", 'themeim-core'),
                            "menu_name" => esc_html__("Team Category", 'themeim-core'),
                            "all_items" => esc_html__("All Team Category", 'themeim-core'),
                            "add_new_item" => esc_html__("Add New Team Category", 'themeim-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'team-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                )
            );

            if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
                foreach ($all_custom_taxonmy as $taxonomy) {
                    call_user_func_array('register_taxonomy', $taxonomy);
                }
            }

            flush_rewrite_rules();
        }

    }//end class

    if (class_exists('Themeim_Custom_Post_Type')) {
        Themeim_Custom_Post_Type::getInstance();
    }
}