<?php
/**
 * Theme Options
 * @package themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $allowed_html = themeim()->kses_allowed_html(array('mark'));
    $prefix = 'themeim';
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Theme Options', 'themeim'),
        'menu_slug' => 'themeim_theme_options',
        'menu_parent' => 'themeim_theme_options',
        'menu_type' => 'submenu',
        'footer_credit' => ' ',
        'menu_icon' => 'fa fa-filter',
        'show_footer' => false,
        'enqueue_webfont' => false,
        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_all_options' => false,
        'theme' => 'dark',
        'framework_title' => themeim()->get_theme_info('name')
    ));

    /*-------------------------------------------------------
        ** General  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'themeim'),
        'id' => 'general_options',
        'icon' => 'fas fa-cogs',
    ));
    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Preloader & SVG Enable', 'themeim'),
        'id' => 'theme_general_preloader_options',
        'icon' => 'fa fa-spinner',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Preloader Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'preloader_enable',
                'title' => esc_html__('Preloader', 'themeim'),
                'type' => 'switcher',  
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'preloader_bg_color',
                'title' => esc_html__('Background Color', 'themeim'),
                'type' => 'color',
                'default' => '#ffffff',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for preloader background image', 'themeim'), $allowed_html),
                'dependency' => array('preloader_enable', '==', 'true')
            ),
            array(
                'id' => 'enable_svg_upload',
                'type' => 'switcher',
                'title' => esc_html__('Enable Svg Upload ?', 'themeim'),
                'desc' => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'themeim'),
                'default' => false,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Typography  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'typography',
        'title' => esc_html__('Typography', 'themeim'),
        'icon' => 'fas fa-text-height',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body Font Options', 'themeim') . '</h3>',
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'themeim'),
                'id' => '_body_font',
                'default' => array(
                    'font-family' => 'Lato',
                    'font-size' => '16',
                    'line-height' => '26',
                    'unit' => 'px',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'body_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'themeim'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'themeim'),
                    '400' => esc_html__('Regular 400', 'themeim'),
                    '500' => esc_html__('Medium 500', 'themeim'),
                    '600' => esc_html__('Semi Bold 600', 'themeim'),
                    '700' => esc_html__('Bold 700', 'themeim'),
                    '800' => esc_html__('Extra Bold 800', 'themeim'),
                ),
                'default' => array('400', '500', '700')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading Font Options', 'themeim') . '</h3>',
            ),
            array(
                'type' => 'switcher',
                'id' => 'heading_font_enable',
                'title' => esc_html__('Heading Font', 'themeim'),
                'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'themeim'), $allowed_html),
                'default' => true
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'themeim'),
                'id' => 'heading_font',
                'default' => array(
                    'font-family' => 'Playfair Display',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'font_size' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6', 'themeim'), $allowed_html),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
            array(
                'id' => 'heading_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'themeim'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'themeim'),
                    '400' => esc_html__('Regular 400', 'themeim'),
                    '500' => esc_html__('Medium 500', 'themeim'),
                    '600' => esc_html__('Semi Bold 600', 'themeim'),
                    '700' => esc_html__('Bold 700', 'themeim'),
                    '800' => esc_html__('Extra Bold 800', 'themeim'),
                ),
                'default' => array('400', '500', '600', '700', '800'),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
        )
    ));

    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Back To Top', 'themeim'),
        'id' => 'theme_general_back_top_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Back Top', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'back_top_icon',
                'title' => esc_html__('Back Top Icon', 'themeim'),
                'type' => 'icon',
                'default' => 'fa fa-angle-up',
                'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'themeim'), $allowed_html),
                'dependency' => array('back_top_enable', '==', 'true')
            ),
        )
    ));

    /*----------------------------------
        Header & Footer Style
    -----------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Set Header & Footer Type', 'themeim'),
        'id' => 'header_footer_style_options',
        'icon' => 'eicon-banner',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Header Style', 'themeim'),
            ),
            array(
                'id' => 'navbar_type',
                'title' => esc_html__('Navbar Type', 'themeim'),
                'type' => 'image_select',
                'options' => array(
                    '' => THEMEIM_THEME_SETTINGS_IMAGES . '/header/01.png',
                    'style-01' => THEMEIM_THEME_SETTINGS_IMAGES . '/header/02.png',
                    'style-02' => THEMEIM_THEME_SETTINGS_IMAGES . '/header/03.png',
                    'style-03' => THEMEIM_THEME_SETTINGS_IMAGES . '/header/04.png'
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'themeim'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Footer Style', 'themeim'),
            ),
            array(
                'id' => 'footer_type',
                'title' => esc_html__('Footer Type', 'themeim'),
                'type' => 'image_select',
                'options' => array(
                    '' => THEMEIM_THEME_SETTINGS_IMAGES . '/footer/01.png',
                    'style-01' => THEMEIM_THEME_SETTINGS_IMAGES . '/footer/02.png',
                    'style-02' => THEMEIM_THEME_SETTINGS_IMAGES . '/footer/03.png'
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'themeim'), $allowed_html),
            ),
        )
    ));

    /*-------------------------------------------------------
       ** Entire Site Header  Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'headers_settings',
        'title' => esc_html__('Headers', 'themeim'),
        'icon' => 'fa fa-home'
    ));
    /* Header Style 01 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header One', 'themeim'),
        'id' => 'theme_header_one_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_one_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'header_navbar_button',
                'type' => 'switcher',
                'title' => esc_html__('Info Button', 'themeim'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'header_navbar_title',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'themeim'),
                'default' => esc_html__('Book Now', 'themeim'),
                'dependency' => array('header_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_navbar_url',
                'type' => 'text',
                'title' => esc_html__('Button URL', 'themeim'),
                'default' => '#',
                'dependency' => array('header_navbar_button', '==', 'true')
            ),
        )
    ));

    /* Header Style 02 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Two', 'themeim'),
        'id' => 'theme_header_two_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navbar Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_two_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Side Nav Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_two_plane_image',
                'type' => 'media',
                'title' => esc_html__('Plane Image', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'header_two_bg_image',
                'type' => 'media',
                'title' => esc_html__('Sidebar Background Image', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_social_icon',
                'type' => 'switcher',
                'title' => esc_html__('Social Icon', 'themeim'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_social_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Item Repeater', 'themeim'),
                'dependency' => array('sidebar_social_icon', '==', 'true'),
                'fields' => array(
                    array(
                        'id' => 'sidebar_social_icon_item_icon',
                        'type' => 'icon',
                        'title' => esc_html__('Social Item Icon', 'themeim'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'sidebar_social_icon_item_url',
                        'type' => 'text',
                        'title' => esc_html__('Social URL', 'themeim'),
                        'default' => '#'
                    ),
                )
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Right Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_two_top_right_info_bar_shortcode',
                'type' => 'textarea',
                'title' => esc_html__('Right Content Shortcode', 'themeim'),
                'shortcoder' => 'themeim_shortcodes'
            ),
            array(
                'id' => 'header_two_navbar_button',
                'type' => 'switcher',
                'title' => esc_html__('Info Button', 'themeim'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'header_two_navbar_title',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'themeim'),
                'default' => esc_html__('Book Now', 'themeim'),
                'dependency' => array('header_two_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_two_navbar_url',
                'type' => 'text',
                'title' => esc_html__('Button URL', 'themeim'),
                'default' => '#',
                'dependency' => array('header_two_navbar_button', '==', 'true')
            ),
        )
    ));
    /* Header Style 03 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Three', 'themeim'),
        'id' => 'theme_header_three_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navbar Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_three_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('info Bar Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_three_top_right_info_bar_shortcode',
                'type' => 'textarea',
                'title' => esc_html__('Right Content Shortcode', 'themeim'),
                'shortcoder' => 'themeim_shortcodes'
            ),
            array(
                'id' => 'header_three_navbar_button',
                'type' => 'switcher',
                'title' => esc_html__('Info Button', 'themeim'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'header_three_navbar_button_spacing',
                'title' => esc_html__('Booking BUtton Margin Right', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 40,
                'dependency' => array('header_three_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_three_navbar_title',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'themeim'),
                'default' => esc_html__('APPLY ONLINE', 'themeim'),
                'dependency' => array('header_three_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_three_navbar_url',
                'type' => 'text',
                'title' => esc_html__('Button URL', 'themeim'),
                'default' => '#',
                'dependency' => array('header_three_navbar_button', '==', 'true')
            ),
        )
    ));
    /* Header Style 03 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Four', 'themeim'),
        'id' => 'theme_header_four_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navbar Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_four_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('info Bar Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'header_four_navbar_button',
                'type' => 'switcher',
                'title' => esc_html__('Info Button', 'themeim'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'header_four_navbar_button_spacing',
                'title' => esc_html__('Booking BUtton Margin Right', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 40,
                'dependency' => array('header_four_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_four_navbar_title',
                'type' => 'text',
                'title' => esc_html__('Book Now', 'themeim'),
                'default' => esc_html__('APPLY ONLINE', 'themeim'),
                'dependency' => array('header_four_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_four_navbar_url',
                'type' => 'text',
                'title' => esc_html__('Button URL', 'themeim'),
                'default' => '#',
                'dependency' => array('header_four_navbar_button', '==', 'true')
            ),
        )
    ));
    /* Breadcrumb */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Breadcrumb', 'themeim'),
        'id' => 'breadcrumb_options',
        'icon' => ' eicon-product-breadcrumbs',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_enable',
                'title' => esc_html__('Breadcrumb', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb_bg',
                'title' => esc_html__('Background Image', 'themeim'),
                'type' => 'background',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'themeim'), $allowed_html),
                'default' => array(
                    'background-size' => 'cover',
                    'background-position' => 'center bottom',
                    'background-repeat' => 'no-repeat',
                ),
                'background_color' => false,
                'dependency' => array('breadcrumb_enable', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_bg_color',
                'title' => esc_html__('Breadcrumb Background Color', 'themeim'),
                'type' => 'color',
                'default' => 'rgba(0, 27, 97, 0.502)',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for Breadcrumb background image', 'themeim'), $allowed_html),
                'dependency' => array('breadcrumb_enable', '==', 'true')
            ),
        )
    ));


    /*-------------------------------------------------------
           ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'themeim'),
        'id' => 'footer_options',
        'icon' => ' eicon-footer',

    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Footer One', 'themeim'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings One', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'footer_spacing',
                'title' => esc_html__('Footer Spacing', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set footer spacing', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'footer_top_spacing',
                'title' => esc_html__('Footer Top Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer top', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 100,
                'dependency' => array('footer_spacing', '==', 'true')
            ),
            array(
                'id' => 'footer_bottom_spacing',
                'title' => esc_html__('Footer Bottom Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 65,
                'dependency' => array('footer_spacing', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'copyright_area_spacing',
                'title' => esc_html__('Copyright Area Spacing', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set copyright area spacing', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'themeim'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'themeim'), $allowed_html)
            ),
            array(
                'id' => 'copyright_area_top_spacing',
                'title' => esc_html__('Copyright Area Top Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area top', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 20,
                'dependency' => array('copyright_area_spacing', '==', 'true')
            ),
            array(
                'id' => 'copyright_area_bottom_spacing',
                'title' => esc_html__('Copyright Area Bottom Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 20,
                'dependency' => array('copyright_area_spacing', '==', 'true')
            )
        )
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_two_options',
        'title' => esc_html__('Footer Two', 'themeim'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top Settings', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'footer_two_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'themeim'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'footer_two_paragraph',
                'title' => esc_html__('Paragraph Area Text', 'themeim'),
                'type' => 'textarea',
                'desc' => wp_kses(__('Enter Your Footer Paragraph', 'themeim'), $allowed_html)
            ),
            array(
                'id' => 'footer_two_top_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Footer Top Widget Repeater', 'themeim'),
                'fields' => array(
                    array(
                        'id' => 'footer_two_top_item_title',
                        'type' => 'text',
                        'title' => esc_html__('Footer Top Widget Title', 'themeim'),
                        'default' => esc_html__('EUROPE', 'themeim'),
                    ),
                    array(
                        'id' => 'footer_social_icon_item_paragraph',
                        'type' => 'textarea',
                        'title' => esc_html__('Footer Top Widget Paragraph', 'themeim'),
                        'default' => esc_html__('Europe 45 Gloucester Road London DT1M 3BF +44 (0)20 3671 5709', 'themeim'),
                    ),
                )
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Two', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'footer_two_spacing',
                'title' => esc_html__('Footer Spacing', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set footer spacing', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'footer_two_top_spacing',
                'title' => esc_html__('Footer Top Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer top', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 100,
                'dependency' => array('footer_two_spacing', '==', 'true')
            ),
            array(
                'id' => 'footer_two_bottom_spacing',
                'title' => esc_html__('Footer Bottom Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 0,
                'dependency' => array('footer_two_spacing', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'copyright_two_area_spacing',
                'title' => esc_html__('Copyright Area Spacing', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set copyright area spacing', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'themeim'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'themeim'), $allowed_html)
            ),
            array(
                'id' => 'copyright_two_area_top_spacing',
                'title' => esc_html__('Copyright Area Top Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area top', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 60,
                'dependency' => array('copyright_two_area_spacing', '==', 'true')
            ),
            array(
                'id' => 'copyright_two_area_bottom_spacing',
                'title' => esc_html__('Copyright Area Bottom Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 60,
                'dependency' => array('copyright_two_area_spacing', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Background Image Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'footer_two_enable',
                'title' => esc_html__('Footer', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide footer', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'footer_two_bg_image',
                'title' => esc_html__('Background Image', 'themeim'),
                'type' => 'background',
                'desc' => wp_kses(__('you can set <mark>background</mark> for footer', 'themeim'), $allowed_html),
                'default' => array(
                    'background-size' => 'cover',
                    'background-position' => 'center bottom',
                    'background-repeat' => 'no-repeat',
                ),
                'background_color' => false,
                'dependency' => array('footer_two_enable', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer About Item Settings', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'footer_social_icon',
                'type' => 'switcher',
                'title' => esc_html__('Social Icon', 'themeim'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'themeim'), $allowed_html),
            ),
            array(
                'id' => 'footer_social_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Item Repeater', 'themeim'),
                'dependency' => array('footer_social_icon', '==', 'true'),
                'fields' => array(
                    array(
                        'id' => 'footer_social_icon_item_icon',
                        'type' => 'icon',
                        'title' => esc_html__('Social Item Icon', 'themeim'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'footer_social_icon_item_url',
                        'type' => 'text',
                        'title' => esc_html__('Social URL', 'themeim'),
                        'default' => '#'
                    ),
                )
            ),
        )
    ));

    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_three_general_options',
        'title' => esc_html__('Footer Three', 'themeim'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Call To Action Settings Three', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'call_to_action_enable',
                'title' => esc_html__('Call To Action Background Image', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide footer', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'call_to_action_text',
                'title' => esc_html__('Call To Action Area Text', 'themeim'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>Title</mark> Call To Action Text, use <mark>Span</mark> For strong tag, ', 'themeim'), $allowed_html)
            ),
            array(
                'id' => 'call_to_action_button_title',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'themeim'),
                'default' => esc_html__('APPLY ONLINE', 'themeim')
            ),
            array(
                'id' => 'call_to_action_button_url',
                'type' => 'text',
                'title' => esc_html__('Button URL', 'themeim'),
                'default' => '#'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Three', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'footer_three_bg_image',
                'title' => esc_html__('Background Image', 'themeim'),
                'type' => 'background',
                'desc' => wp_kses(__('you can set <mark>background</mark> for footer', 'themeim'), $allowed_html),
                'default' => array(
                    'background-size' => 'cover',
                    'background-position' => 'center bottom',
                    'background-repeat' => 'no-repeat',
                ),
                'background_gradient' => true
            ),
            array(
                'id' => 'footer_three_spacing',
                'title' => esc_html__('Footer Spacing', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set footer spacing', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'footer_three_top_spacing',
                'title' => esc_html__('Footer Top Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer top', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 100,
                'dependency' => array('footer_three_spacing', '==', 'true')
            ),
            array(
                'id' => 'footer_three_bottom_spacing',
                'title' => esc_html__('Footer Bottom Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 65,
                'dependency' => array('footer_three_spacing', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'themeim') . '</h3>'
            ),
            array(
                'id' => 'copyright_three_area_spacing',
                'title' => esc_html__('Copyright Area Spacing', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set copyright area spacing', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'copyright_three_text',
                'title' => esc_html__('Copyright Area Text', 'themeim'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'themeim'), $allowed_html)
            ),
            array(
                'id' => 'copyright_three_area_top_spacing',
                'title' => esc_html__('Copyright Area Top Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area top', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 20,
                'dependency' => array('copyright_three_area_spacing', '==', 'true')
            ),
            array(
                'id' => 'copyright_three_area_bottom_spacing',
                'title' => esc_html__('Copyright Area Bottom Spacing', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area bottom', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 20,
                'dependency' => array('copyright_three_area_spacing', '==', 'true')
            )
        )
    ));

    /*-------------------------------------------------------
          ** Blog  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_settings',
        'title' => esc_html__('Blog Settings', 'themeim'),
        'icon' => 'fa fa-book'
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_post_options',
        'title' => esc_html__('Blog Post', 'themeim'),
        'icon' => 'fa fa-list-ul',
        'fields' => themeim_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'themeim'))
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_single_post_options',
        'title' => esc_html__('Single Post', 'themeim'),
        'icon' => 'fa fa-list-alt',
        'fields' => themeim_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'themeim'))
    ));

    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'shop_settings',
        'title' => esc_html__('Shop Settings', 'themeim'),
        'icon' => 'fas fa-shopping-basket',
    ));
    /*  Product page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'product_shop_page',
        'title' => esc_html__('Product Page', 'themeim'),
        'parent' => 'shop_settings',
        'icon' => 'fas fa-shopping-basket',
        'fields' => themeim_Group_Fields::page_layout_options(esc_html__('Product Shop Page', 'themeim'), 'product_shop')
    ));
    /*  Product single page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'product_shop_single_page',
        'title' => esc_html__('Product Single Page', 'themeim'),
        'parent' => 'shop_settings',
        'icon' => 'fas fa-shopping-basket',
        'fields' => array(
            array(
                'id' => 'product_shop_single_page_bg_color',
                'type' => 'color',
                'title' => esc_html__('Page Background Color', 'themeim'),
                'default' => '#fff'
            ),
            array(
                'id' => 'product_shop_single_page_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
            array(
                'id' => 'product_shop_single_page_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 100,
            ),
        ),
    ));

    /*-------------------------------------------------------
          ** Pages & templates Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'pages_and_template',
        'title' => esc_html__('Pages Settings', 'themeim'),
        'icon' => 'fa fa-files-o'
    ));
    /*  404 page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => '404_page',
        'title' => esc_html__('404 Page', 'themeim'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-exclamation-triangle',
        'fields' => array(
            array(
                'id' => 'error_bg_switch',
                'title' => esc_html__('404 Image Enable', 'themeim'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'themeim'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'error_bg',
                'title' => esc_html__('404 Image', 'themeim'),
                'type' => 'media',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'themeim'), $allowed_html),
                'dependency' => array('error_bg_switch', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('404 Page Options', 'themeim') . '</h3>',
            ),
            array(
                'id' => '404_bg_color',
                'type' => 'color',
                'title' => esc_html__('Page Background Color', 'themeim'),
                'default' => '#ffffff'
            ),
            array(
                'id' => '404_title',
                'title' => esc_html__('Title', 'themeim'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>title</mark> of 404 page', 'themeim'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'themeim'))
            ),
            array(
                'id' => '404_paragraph',
                'title' => esc_html__('Paragraph', 'themeim'),
                'type' => 'textarea',
                'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'themeim'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'themeim'))
            ),
            array(
                'id' => '404_button_text',
                'title' => esc_html__('Button Text', 'themeim'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'themeim'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('back to home', 'themeim'))
            ),
            array(
                'id' => '404_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
            array(
                'id' => '404_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'themeim'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'themeim'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
        )
    ));

    /*  blog page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_page',
        'title' => esc_html__('Blog Page', 'themeim'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => themeim_Group_Fields::page_layout_options(esc_html__('Blog', 'themeim'), 'blog')
    ));
    /*  blog single page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_single_page',
        'title' => esc_html__('Blog Single Page', 'themeim'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => themeim_Group_Fields::page_layout_options(esc_html__('Blog Single', 'themeim'), 'blog_single')
    ));
    /*  archive page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'archive_page',
        'title' => esc_html__('Archive Page', 'themeim'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-archive',
        'fields' => themeim_Group_Fields::page_layout_options(esc_html__('Archive', 'themeim'), 'archive')
    ));
    /*  search page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'search_page',
        'title' => esc_html__('Search Page', 'themeim'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-search',
        'fields' => themeim_Group_Fields::page_layout_options(esc_html__('Search', 'themeim'), 'search')
    ));

    /*-------------------------------------------------------
           ** Backup  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'backup',
        'title' => esc_html__('Import / Export', 'themeim'),
        'icon' => 'eicon-export-kit',
        'fields' => array(
            array(
                'type' => 'notice',
                'style' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'themeim'),
            ),
            array(
                'type' => 'backup',
                'title' => esc_html__('Backup & Import', 'themeim')
            )
        )
    ));
}
