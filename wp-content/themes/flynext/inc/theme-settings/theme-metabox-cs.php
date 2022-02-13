<?php
/**
 * Theme Metabox Options
 * @package flynext
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = flynext()->kses_allowed_html(array('mark'));

    $prefix = 'flynext';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'flynext'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'flynext'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'flynext'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'flynext'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'flynext'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'flynext'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'flynext'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'flynext'),
        'icon' => 'fa fa-columns',
        'fields' => flynext_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'flynext'),
        'icon' => 'fa fa-header',
        'fields' => flynext_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'flynext'),
        'icon' => 'fa fa-file-o',
        'fields' => flynext_Group_Fields::Page_Container_Options('container_options')
    ));
    //	Service Meta Box
    CSF::createMetabox($prefix . '_service_options', array(
        'title' => esc_html__('Service Options', 'flynext'),
        'post_type' => 'service',
    ));
    CSF::createSection($prefix . '_service_options', array(
        'fields' => array(
            array(
                'id' => 'service_icon',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'flynext'),
                'desc' => wp_kses(__('Select Your Icon', 'flynext'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
     Team Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'flynext'),
        'post_type' => array('team'),
        'priority' => 'high'
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Icon', 'flynext'),
        'id' => 'flynext-team-icon',
        'fields' => array(
            array(
                'id' => 'team_icon',
                'type' => 'icon',
                'desc' => wp_kses(__('Select Your Icon', 'flynext'), $allowed_html)
            )
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Info', 'flynext'),
        'id' => 'flynext-info',
        'fields' => array(
            array(
                'id' => 'designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'flynext'),
            ),
            array(
                'id' => 'description',
                'type' => 'text',
                'title' => esc_html__('Description', 'flynext'),
            ),
            array(
                'id' => 'team-info',
                'type' => 'repeater',
                'title' => esc_html__('Team Info', 'flynext'),
                'fields' => array(

                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'flynext')
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'flynext')
                    ),

                ),
            ),
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Social Info', 'flynext'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'social-icons',
                'type' => 'repeater',
                'title' => esc_html__('Social Info', 'flynext'),
                'fields' => array(

                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'flynext')
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'flynext')
                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('URL', 'flynext')
                    ),

                ),
            ),
        )
    ));

    //	Deals Meta Box
    CSF::createMetabox($prefix . '_deals_options', array(
        'title' => esc_html__('Deals Options', 'flynext'),
        'post_type' => 'deals',
    ));

    CSF::createSection($prefix . '_deals_options', array(
        'fields' => array(
            array(
                'id' => 'deals_icon',
                'default' => 'icomoon-safety-icon',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'flynext'),
                'desc' => wp_kses(__('Select Your Icon', 'flynext'), $allowed_html)
            ),
            array(
                'id' => 'deals_subtitle',
                'type' => 'text',
                'title' => esc_html__('Deals Subtitle', 'flynext'),
                'default' => esc_html__('Embraer P-300E Specification ', 'flynext'),
            ),

            array(
                'id' => 'deals_jet_models_option',
                'type' => 'text',
                'title' => esc_html__('Deals Jet Models', 'flynext'),
                'default' => esc_html__('Legacy 600', 'flynext'),
            ),
            array(
                'id' => 'deals_jet_seats_option',
                'type' => 'text',
                'title' => esc_html__('Jet Seats', 'flynext'),
                'default' => esc_html__('8 - 14 Seats', 'flynext'),
            ),
            array(
                'id' => 'deals_price_option',
                'type' => 'text',
                'title' => esc_html__('Deals Price', 'flynext'),
                'default' => esc_html__('$9,000/ hr ', 'flynext'),
            )
        )
    ));

    //	Packages Meta Box
    CSF::createMetabox($prefix . '_packages_options', array(
        'title' => esc_html__('Packages Options', 'flynext'),
        'post_type' => 'packages',
    ));
    CSF::createSection($prefix . '_packages_options', array(
        'fields' => array(
            array(
                'id' => 'packages_icon',
                'default' => 'icomoon-safety-icon',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'flynext'),
                'desc' => wp_kses(__('Select Your Icon', 'flynext'), $allowed_html)
            ),
            array(
                'id' => 'packages_duration_option',
                'type' => 'text',
                'title' => esc_html__('Packages Duration', 'flynext'),
                'default' => esc_html__('2 hours 25 min', 'flynext'),
            ),
            array(
                'id' => 'packages_price_option',
                'type' => 'text',
                'title' => esc_html__('Packages Price', 'flynext'),
                'default' => esc_html__('$115.00', 'flynext'),
            ),
            array(
                'id' => 'packages_date_option',
                'type' => 'text',
                'title' => esc_html__('Packages Date', 'flynext'),
                'default' => esc_html__('Thursday, Nov 4, 2021', 'flynext'),
            ),
            array(
                'id' => 'packages_number_option',
                'type' => 'text',
                'title' => esc_html__('Packages Person Number', 'flynext'),
            ),
            array(
                'id' => 'packages_video_link',
                'type' => 'text',
                'title' => esc_html__('Packages Video Link', 'flynext'),
            )
        )
    ));

    //	Courses Meta Box
    CSF::createMetabox($prefix . '_courses_options', array(
        'title' => esc_html__('Courses Options', 'flynext'),
        'post_type' => 'courses',
    ));

    CSF::createSection($prefix . '_courses_options', array(
        'title' => esc_html__('Social Info', 'flynext'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'course_start_date_option',
                'type' => 'text',
                'title' => esc_html__('Start From', 'flynext'),
                'default' => esc_html__('Thursday, Nov 4, 2022', 'flynext'),
            ),
            array(
                'id' => 'study-option',
                'type' => 'repeater',
                'title' => esc_html__('Study Options', 'flynext'),
                'fields' => array(

                    array(
                        'id' => 'qualification',
                        'type' => 'text',
                        'title' => esc_html__('Qualification', 'flynext'),
                        'default' => esc_html__('Bachelor of Aviation (Hons)', 'flynext'),
                    ),
                    array(
                        'id' => 'length',
                        'type' => 'text',
                        'title' => esc_html__('Length', 'flynext'),
                        'default' => esc_html__('9 months full time', 'flynext'),
                    ),
                    array(
                        'id' => 'code',
                        'type' => 'text',
                        'title' => esc_html__('Code', 'flynext'),
                        'default' => esc_html__('ba1x', 'flynext'),
                    ),
                ),
            ),
            array(
                'id' => 'course_module_option',
                'type' => 'text',
                'title' => esc_html__('Course Module Title', 'flynext'),
                'default' => esc_html__('Download full course Module', 'flynext'),
            ),
            array(
                'id' => 'course_module_button_title',
                'type' => 'text',
                'title' => esc_html__('Course Module Button Title', 'flynext'),
                'default' => esc_html__('Download', 'flynext'),
            ),
            array(
                'id' => 'course_module_button_url',
                'type' => 'text',
                'title' => esc_html__('Course Module Button URL', 'flynext'),
                'default' => esc_html__('#', 'flynext'),
            ),
        )
    ));
}//endif