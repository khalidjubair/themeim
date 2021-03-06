<?php
/**
 * Theme Init Functions
 * @package themeim
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('themeim_Init')) {

    class themeim_Init
    {
       /**
        * $instance
        * @since 1.0.0
        */
        protected static $instance;

        public function __construct()
        {
            /*
             * theme setup
             */
            add_action('after_setup_theme', array($this, 'theme_setup'));
            /**
             * Widget Init
             */
            add_action('widgets_init', array($this, 'theme_widgets_init'));
            /**
             * Theme Assets
             */
            add_action('wp_enqueue_scripts', array($this, 'theme_assets'));
            /**
             * Registers an editor stylesheet for the theme.
             */
            add_action('admin_init', array($this, 'add_editor_styles'));
        }

        /**
         * getInstance()
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Theme Setup
         * @since 1.0.0
         */
        public function theme_setup()
        {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             */
            load_theme_textdomain('themeim', get_template_directory() . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(array(
                'main-menu' => esc_html__('Primary Menu', 'themeim'),
            ));

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));

            // Add theme support for selective wp block styles
            add_theme_support("wp-block-styles");
            // Add theme support for selective align wide
            add_theme_support("align-wide");
            // Add theme support for selective responsive embeds
            add_theme_support("responsive-embeds");

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');

            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support('custom-logo', array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            ));

            //woocommerce support
            add_theme_support('woocommerce');
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');


            //add theme support for post format
            add_theme_support('post-formats', array('image', 'video', 'gallery', 'link', 'quote'));

            // This variable is intended to be overruled from themes.
            $GLOBALS['content_width'] = apply_filters('themeim_content_width', 740);

            //add image sizes
            add_image_size('themeim_classic', 750, 400, true);
            add_image_size('themeim_grid', 370, 270, true);
            add_image_size('themeim_medium', 550, 380, true);

            self::load_theme_dependency_files();
        }

        /**
         * Theme Widget Init
         * @since 1.0.0
         * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
         */
        public function theme_widgets_init()
        {
            register_sidebar(array(
                'name' => esc_html__('Sidebar', 'themeim'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Add widgets here.', 'themeim'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-headline style-01">',
                'after_title' => '</h4>',
            ));

            if (themeim()->is_themeim_core_active()) {
                register_sidebar(array(
                    'name' => esc_html__('Product Sidebar', 'themeim'),
                    'id' => 'product-sidebar',
                    'description' => esc_html__('Add widgets here.', 'themeim'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-headline style-01">',
                    'after_title' => '</h4>',
                ));
            }
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area', 'themeim'),
                'id' => 'footer-widget',
                'description' => esc_html__('Add widgets here.', 'themeim'),
                'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="widget footer-widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h4 class="widget-headline">',
                'after_title' => '</h4>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area Two', 'themeim'),
                'id' => 'footer-widget-two',
                'description' => esc_html__('Add widgets here.', 'themeim'),
                'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="widget footer-widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h4 class="widget-headline">',
                'after_title' => '</h4>',
            ));
        }

        /**
         * Theme Assets
         * @since 1.0.0
         */
        public function theme_assets()
        {
            self::load_theme_css();
            self::load_theme_js();
        }

      /*
       * Load theme options google fonts css
       * @since 1.0.0
       */
        public static function load_google_fonts()
        {

            $enqueue_fonts = array();
            //body font enqueue
            $body_font = cs_get_option('_body_font') ? cs_get_option('_body_font') : false;
            $body_font_variant = cs_get_option('body_font_variant') ? cs_get_option('body_font_variant') : false;
            $body_font['family'] = (isset($body_font['font-family']) && !empty($body_font['font-family'])) ? $body_font['font-family'] : 'Lato';
            $body_font['font'] = (isset($body_font['type']) && !empty($body_font['type'])) ? $body_font['type'] : 'google';
            $body_font_variant = !empty($body_font_variant) ? $body_font_variant : array(400, 700, 600, 500);
            $google_fonts = array();

            if (!empty($body_font_variant)) {
                foreach ($body_font_variant as $variant) {
                    $google_fonts[] = array(
                        'family' => $body_font['family'],
                        'variant' => $variant,
                        'font' => $body_font['font']
                    );
                }
            }
            //heading font enqueue
            $heading_font_enable = false;
            if (null == cs_get_option('heading_font_enable')) {
                $heading_font_enable = false;
            } elseif ('0' == cs_get_option('heading_font_enable')) {
                $heading_font_enable = true;
            } elseif ('1' == cs_get_option('heading_font_enable')) {
                $heading_font_enable = false;
            }
            $heading_font = cs_get_option('heading_font') ? cs_get_option('heading_font') : false;
            $heading_font_variant = cs_get_option('heading_font_variant') ? cs_get_option('heading_font_variant') : false;
            $heading_font['family'] = (isset($heading_font['font-family']) && !empty($heading_font['font-family'])) ? $heading_font['font-family'] : 'Playfair Display';
            $heading_font['font'] = (isset($heading_font['type']) && !empty($heading_font['type'])) ? $heading_font['type'] : 'google';
            $heading_font_variant = !empty($heading_font_variant) ? $heading_font_variant : array(400, 500, 600, 700, 800);
            if (!empty($heading_font_variant) && !$heading_font_enable) {
                foreach ($heading_font_variant as $variant) {
                    $google_fonts[] = array(
                        'family' => $heading_font['family'],
                        'variant' => $variant,
                        'font' => $heading_font['font']
                    );
                }
            }

            if (!empty($google_fonts)) {
                foreach ($google_fonts as $font) {
                    if (!empty($font['font']) && $font['font'] == 'google') {
                        $variant = (!empty($font['variant']) && $font['variant'] !== 'regular') ? ':' . $font['variant'] : '';
                        if (!empty($font['family'])) {
                            $enqueue_fonts[] = $font['family'] . $variant;
                        }
                    }
                }
            }

            $enqueue_fonts = array_unique($enqueue_fonts);
            return $enqueue_fonts;
        }

        /**
         * Load Theme Css
         * @since 1.0.0
         */
        public function load_theme_css(){
            wp_enqueue_style('themeim-style', get_stylesheet_uri());
        }

        /**
         * Load Theme js
         * @since 1.0.0
         */
        public function load_theme_js(){
            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }

        /**
         * Load THeme Dependency Files
         * @since 1.0.0
         */
        public function load_theme_dependency_files()
        {
            $includes_files = array(
                array(
                    'file-name' => 'theme-hook-customize',
                    'file-path' => THEMEIM_INC
                ),
                array(
                    'file-name' => 'theme-comments-modifications',
                    'file-path' => THEMEIM_INC
                ),
                array(
                    'file-name' => 'customizer',
                    'file-path' => THEMEIM_INC
                ),
                array(
                    'file-name' => 'theme-megamenu-walker',
                    'file-path' => THEMEIM_INC
                ),
                array(
                    'file-name' => 'theme-group-fields-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-group-fields-value-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-metabox-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-userprofile-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-shortcode-option-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-customizer-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-option-cs',
                    'file-path' => THEMEIM_THEME_SETTINGS
                ),
            );

                $includes_files[] = array(
                    'file-name' => 'theme-woocommerce-customize',
                    'file-path' => THEMEIM_INC
                );
        
            if (is_array($includes_files) && !empty($includes_files)) {
                foreach ($includes_files as $file) {
                    if (file_exists($file['file-path'] . '/' . $file['file-name'] . '.php')) {
                        require_once $file['file-path'] . '/' . $file['file-name'] . '.php';
                    }
                }
            }


        }

        /**
         * Add editor style
         * @since 1.0.0
         */
        public function add_editor_styles()
        {
            add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');
        }

    }//end class
    if (class_exists('themeim_Init')) {
        themeim_Init::getInstance();
    }
}
