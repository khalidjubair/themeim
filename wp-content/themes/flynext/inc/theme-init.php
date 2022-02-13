<?php
/**
 * Theme Init Functions
 * @package flynext
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('flynext_Init')) {

    class flynext_Init
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
            load_theme_textdomain('flynext', get_template_directory() . '/languages');

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
                'main-menu' => esc_html__('Primary Menu', 'flynext'),
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
            $GLOBALS['content_width'] = apply_filters('flynext_content_width', 740);

            //add image sizes
            add_image_size('flynext_classic', 750, 400, true);
            add_image_size('flynext_grid', 370, 270, true);
            add_image_size('flynext_medium', 550, 380, true);

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
                'name' => esc_html__('Sidebar', 'flynext'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Add widgets here.', 'flynext'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-headline style-01">',
                'after_title' => '</h4>',
            ));
            if (flynext()->is_flynext_core_active()) {
                register_sidebar(array(
                    'name' => esc_html__('Course Sidebar', 'flynext'),
                    'id' => 'tutor-sidebar',
                    'description' => esc_html__('Add widgets here.', 'flynext'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-headline style-01">',
                    'after_title' => '</h4>',
                ));
            }
            if (flynext()->is_flynext_core_active()) {
                register_sidebar(array(
                    'name' => esc_html__('Product Sidebar', 'flynext'),
                    'id' => 'product-sidebar',
                    'description' => esc_html__('Add widgets here.', 'flynext'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-headline style-01">',
                    'after_title' => '</h4>',
                ));
            }
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area', 'flynext'),
                'id' => 'footer-widget',
                'description' => esc_html__('Add widgets here.', 'flynext'),
                'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="widget footer-widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h4 class="widget-headline">',
                'after_title' => '</h4>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area Two', 'flynext'),
                'id' => 'footer-widget-two',
                'description' => esc_html__('Add widgets here.', 'flynext'),
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
        public function load_theme_css()
        {
            $theme_version = FLYNEXT_DEV ? time() : flynext()->get_theme_info('version');
            $css_ext = '.css';
            //load google fonts
            $enqueue_google_fonts = self::load_google_fonts();
            if (!empty($enqueue_google_fonts)) {
                wp_enqueue_style('flynext-google-fonts', esc_url(add_query_arg('family', urlencode(implode('|', $enqueue_google_fonts)), '//fonts.googleapis.com/css')), array(), null);
            }
            $all_css_files = array(
                array(
                    'handle' => 'animate',
                    'src' => FLYNEXT_CSS . '/animate.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'flaticon',
                    'src' => FLYNEXT_CSS . '/icomoon.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'bootstrap',
                    'src' => FLYNEXT_CSS . '/bootstrap.min.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'font-awesome',
                    'src' => FLYNEXT_CSS . '/font-awesome.min.css',
                    'deps' => array(),
                    'ver' => '5.12.0',
                    'media' => 'all',
                ),
                array(
                    'handle' => 'magnific-popup',
                    'src' => FLYNEXT_CSS . '/magnific-popup.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'flynext-default-style',
                    'src' => FLYNEXT_CSS . '/default-style' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'flynext-main-style',
                    'src' => FLYNEXT_CSS . '/main-style' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'flynext-responsive',
                    'src' => FLYNEXT_CSS . '/responsive' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
            );
            if (class_exists('WooCommerce')) {
                $all_css_files[] = array(
                    'handle' => 'flynext-woocommerce-style',
                    'src' => FLYNEXT_CSS . '/woocommerce-style' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                );
            }
            if (Flynext()->is_tutor_active()) {
                $all_css_files[] = array(
                    'handle' => 'flynext-tutor-style',
                    'src' => FLYNEXT_CSS . '/tutor-style' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                );
            }
            $all_css_files = apply_filters('flynext_theme_enqueue_style', $all_css_files);

            if (is_array($all_css_files) && !empty($all_css_files)) {
                foreach ($all_css_files as $css) {
                    call_user_func_array('wp_enqueue_style', $css);
                }
            }
            wp_enqueue_style('flynext-style', get_stylesheet_uri());

            if (flynext()->is_flynext_core_active()) {
                if (file_exists(FLYNEXT_DYNAMIC_STYLESHEETS . '/theme-inline-css-style.php')) {
                    require_once FLYNEXT_DYNAMIC_STYLESHEETS . '/theme-inline-css-style.php';
                    require_once FLYNEXT_DYNAMIC_STYLESHEETS . '/theme-option-css-style.php';
                    wp_add_inline_style('flynext-style', flynext()->minify_css_lines($GLOBALS['flynext_inline_css']));
                    wp_add_inline_style('flynext-style', flynext()->minify_css_lines($GLOBALS['theme_customize_css']));
                }

            }
        }

        /**
         * Load Theme js
         * @since 1.0.0
         */
        public function load_theme_js()
        {
            $theme_version = flynext()->get_theme_info('version');
            $js_ext = FLYNEXT_DEV ? '.js' : '.min.js';
            $all_js_files = array(
                array(
                    'handle' => 'bootstrap',
                    'src' => FLYNEXT_JS . '/bootstrap.min.js',
                    'deps' => array('jquery'),
                    'ver' => $theme_version,
                    'in_footer' => true,
                ),
                array(
                    'handle' => 'magnific-popup',
                    'src' => FLYNEXT_JS . '/jquery.magnific-popup.js',
                    'deps' => array('jquery'),
                    'ver' => $theme_version,
                    'in_footer' => true,
                ),
                array(
                    'handle' => 'flynext-main-script',
                    'src' => FLYNEXT_JS . '/main' . $js_ext,
                    'deps' => array('jquery'),
                    'ver' => $theme_version,
                    'in_footer' => true,
                ),
            );
            $all_js_files = apply_filters('flynext_theme_enqueue_script', $all_js_files);

            if (is_array($all_js_files) && !empty($all_js_files)) {
                foreach ($all_js_files as $js) {
                    call_user_func_array('wp_enqueue_script', $js);
                }
            }

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
                    'file-name' => 'activation',
                    'file-path' => FLYNEXT_TGMA
                ),
                array(
                    'file-name' => 'theme-breadcrumb',
                    'file-path' => FLYNEXT_INC
                ),
                array(
                    'file-name' => 'theme-excerpt',
                    'file-path' => FLYNEXT_INC
                ),
                array(
                    'file-name' => 'theme-hook-customize',
                    'file-path' => FLYNEXT_INC
                ),
                array(
                    'file-name' => 'theme-comments-modifications',
                    'file-path' => FLYNEXT_INC
                ),
                array(
                    'file-name' => 'customizer',
                    'file-path' => FLYNEXT_INC
                ),
                array(
                    'file-name' => 'theme-megamenu-walker',
                    'file-path' => FLYNEXT_INC
                ),
                array(
                    'file-name' => 'theme-group-fields-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-group-fields-value-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-metabox-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-userprofile-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-shortcode-option-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-customizer-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-option-cs',
                    'file-path' => FLYNEXT_THEME_SETTINGS
                ),
            );

                $includes_files[] = array(
                    'file-name' => 'theme-woocommerce-customize',
                    'file-path' => FLYNEXT_INC
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
    if (class_exists('flynext_Init')) {
        flynext_Init::getInstance();
    }
}
