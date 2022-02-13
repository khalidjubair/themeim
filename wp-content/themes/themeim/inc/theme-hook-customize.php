<?php
/**
 * Theme Hooks Customize
 * @package themeim
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('themeim_Customize')) {

    class themeim_Customize
    {
        /**
         * $instance
         * @since 1.0.0
        */
        protected static $instance;

        public function __construct()
        {
            //excerpt more
            add_action('excerpt_more', array($this, 'excerpt_more'));
            //preloader
            add_action('themeim_after_body', array($this, 'preloader'));
            //search popup
            add_action('themeim_after_body', array($this, 'search_popup'));
            //breadcrumb
            add_action('themeim_before_page_content', array($this, 'breadcrumb'));
            //back top
            add_action('themeim_after_body', array($this, 'back_top'));
            //order comment form
            add_filter('comment_form_fields', array($this, 'comment_fields_reorder'));
            // contact form 7
            add_filter('wpcf7_autop_or_not', '__return_false');
        }

        /**
         * getInstance()
         * @since 1.0.0
        */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Excerpt More
         * @since 1.0.0
         */
        public function excerpt_more($more)
        {
            $more = cs_get_option('blog_post_excerpt_more');
            return $more;
        }

        /**
         * Breadcrumb
         * @since 1.0.0
         */
        public function breadcrumb()
        {
            $page_id = themeim()->page_id();
            $check_page = (!is_home() && !is_front_page() && is_singular()) || is_search() || is_author() || is_404() || is_archive() ? true : false;
            $check_home_page = themeim()->is_home_page();
            $page_header_meta = themeim_Group_Fields_Value::page_container('themeim', 'header_options');
            $header_variant_class = isset($page_header_meta['navbar_type']) ? 'navbar-' . $page_header_meta['navbar_type'] : 'navbar-default';
            $page_breadcrumb_enable = isset($page_header_meta['page_breadcrumb_enable']) && $page_header_meta['page_breadcrumb_enable'] ? $page_header_meta['page_breadcrumb_enable'] : false;
            $breadcrumb_enable = false;
            $header_variant_class .= !empty(cs_get_option('header_two_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-01' ? ' header-style-02-has-topbar ' : '';

            if (!empty(cs_get_option('header_four_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-03' && !empty(cs_get_option('header_four_top_bar_shortcode'))) {
                $header_variant_class .= ' header-style-04-has-topbar ';
            } elseif (!empty(cs_get_option('header_four_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-03' && empty(cs_get_option('header_four_top_bar_shortcode'))) {
                $header_variant_class .= ' header-style-04-no-topbar ';
            }

            if (!$check_home_page && !$check_page) {
                $breadcrumb_enable = true;
            } elseif (!$page_breadcrumb_enable && $check_page) {
                $breadcrumb_enable = true;
            }
            $breadcrumb_enable = !cs_get_switcher_option('breadcrumb_enable') ? false : $breadcrumb_enable;

            if (!$breadcrumb_enable) {
                return;
            }

            ?>
            <div class="breadcrumb-wrap <?php echo esc_attr($header_variant_class); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <?php
                                if (is_archive()) {
                                    if (class_exists('WooCommerce') && is_shop()) {
                                        printf('<h2 class="page-title">%1$s </h2>', str_replace("Archives: ", "", get_the_archive_title()));
                                    } else {
                                        the_archive_title('<h2 class="page-title">', '</h2>');
                                    }
                                } elseif (is_404()) {
                                    printf('<h2 class="page-title">%1$s</h2>', esc_html__('Error 404', 'themeim'));
                                } elseif (is_search()) {
                                    printf('<h2 class="page-title">%1$s %2$s</h2>', esc_html__('Search Results for:', 'themeim'), get_search_query());
                                } elseif (is_singular('post')) {
                                    printf('<h2 class="page-title">%1$s </h2>', get_the_title());
                                } elseif (is_singular('page')) {
                                    if ($page_header_meta['page_title']) {
                                        printf('<h2 class="page-title">%1$s </h2>', get_the_title());
                                    }
                                } else {
                                    printf('<h2 class="page-title">%1$s </h2>', get_the_title($page_id));
                                }
                                if ($page_header_meta['page_breadcrumb']) {
                                    themeim_breadcrumb();
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        /**
         * Preloader
         * @since 1.0.0
         */
        public function preloader()
        {
            $preloader_enable = cs_get_switcher_option('preloader_enable');
            if (!$preloader_enable) {
                return;
            }
            ?>
            <div class="preloader" id="preloader">
                <svg class="svg-calLoader" xmlns="http://www.w3.org/2000/svg" width="230" height="230">
                    <path class="cal-loader__path"
                          d="M86.429 40c63.616-20.04 101.511 25.08 107.265 61.93 6.487 41.54-18.593 76.99-50.6 87.643-59.46 19.791-101.262-23.577-107.142-62.616C29.398 83.441 59.945 48.343 86.43 40z"
                          fill="none" stroke="#0099cc" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                          stroke-dasharray="10 10 10 10 10 10 10 432" stroke-dashoffset="77"/>
                    <path
                            d="M141.493 37.93c-1.087-.927-2.942-2.002-4.32-2.501-2.259-.824-3.252-.955-9.293-1.172-4.017-.146-5.197-.23-5.47-.37-.766-.407-1.526-1.448-7.114-9.773-4.8-7.145-5.344-7.914-6.327-8.976-1.214-1.306-1.396-1.378-3.79-1.473-1.036-.04-2-.043-2.153-.002-.353.1-.87.586-1 .952-.139.399-.076.71.431 2.22.241.72 1.029 3.386 1.742 5.918 1.644 5.844 2.378 8.343 2.863 9.705.206.601.33 1.1.275 1.125-.24.097-10.56 1.066-11.014 1.032a3.532 3.532 0 0 1-1.002-.276l-.487-.246-2.044-2.613c-2.234-2.87-2.228-2.864-3.35-3.309-.717-.287-2.82-.386-3.276-.163-.457.237-.727.644-.737 1.152-.018.39.167.805 1.916 4.373 1.06 2.166 1.964 4.083 1.998 4.27.04.179.004.521-.076.75-.093.228-1.109 2.064-2.269 4.088-1.921 3.34-2.11 3.711-2.123 4.107-.008.25.061.557.168.725.328.512.72.644 1.966.676 1.32.029 2.352-.236 3.05-.762.222-.171 1.275-1.313 2.412-2.611 1.918-2.185 2.048-2.32 2.45-2.505.241-.111.601-.232.82-.271.267-.058 2.213.201 5.912.8 3.036.48 5.525.894 5.518.914 0 .026-.121.306-.27.638-.54 1.198-1.515 3.842-3.35 9.021-1.029 2.913-2.107 5.897-2.4 6.62-.703 1.748-.725 1.833-.594 2.286.137.46.45.833.872 1.012.41.177 3.823.24 4.37.085.852-.25 1.44-.688 2.312-1.724 1.166-1.39 3.169-3.948 6.771-8.661 5.8-7.583 6.561-8.49 7.387-8.702.233-.065 2.828-.056 5.784.011 5.827.138 6.64.09 8.62-.5 2.24-.67 4.035-1.65 5.517-3.016 1.136-1.054 1.135-1.014.207-1.962-.357-.38-.767-.777-.902-.893z"
                          class="cal-loader__plane" fill="#000033"/>
                </svg>
            </div>
            <?php
        }

        /**
         * Back top
         * @since 1.0.0
         */
        public function back_top()
        {
            $back_top_enable = cs_get_switcher_option('back_top_enable');
            $back_top_icon = cs_get_option('back_top_icon') ? cs_get_option('back_top_icon') : 'fas fa-angle-up';
            if (!$back_top_enable) {
                return;
            }
            ?>
            <div class="back-to-top">
                <span class="back-top"><i class="<?php echo esc_attr($back_top_icon); ?>"></i></span>
            </div>
            <?php
        }

        /**
         * Reorder comments form
         * @since 1.0.0
         */
        public function comment_fields_reorder($fileds)
        {
            $comment_filed = $fileds['comment'];
            unset($fileds['comment']);
            $fileds['comment'] = $comment_filed;

            if (isset($fileds['cookies'])) {
                $comment_cookies = $fileds['cookies'];
                unset($fileds['cookies']);
                $fileds['cookies'] = $comment_cookies;
            }

            return $fileds;
        }

        /**
         * @since 1.0.0
         * Search Popup
         */
        public function search_popup()
        {
            ?>
            <div class="body-overlay" id="body-overlay"></div>
            <div class="search-popup" id="search-popup">
                <form action="<?php echo esc_url(home_url('/')) ?>" class="search-form">
                    <div class="form-group">
                        <input type="text" name="s" class="form-control"
                               placeholder="<?php echo esc_attr__('Search....', 'themeim'); ?>">
                    </div>
                    <button class="close-btn border-none"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <?php
        }

    }//end class
    if (class_exists('themeim_Customize')) {
        themeim_Customize::getInstance();
    }
}
