<?php
/**
 * Theme Metabox Options
 * @package themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = themeim()->kses_allowed_html(array('mark'));

    $prefix = 'themeim';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'themeim'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'themeim'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'themeim'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'themeim'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'themeim'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'themeim'), $allowed_html)
            )
        )
    ));
 
    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'themeim'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'themeim'),
        'icon' => 'fa fa-columns',
        'fields' => themeim_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'themeim'),
        'icon' => 'fa fa-header',
        'fields' => themeim_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'themeim'),
        'icon' => 'fa fa-file-o',
        'fields' => themeim_Group_Fields::Page_Container_Options('container_options')
    ));

    //	Product Meta Box
    CSF::createMetabox($prefix . '_product_options', array(
        'title' => esc_html__('Product Options', 'themeim'),
        'post_type' => 'product',
    ));
    CSF::createSection($prefix . '_product_options', array(
        'fields' => array(
            array( 
                'id' => 'product_icon',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'themeim'),
                'desc' => wp_kses(__('Select Your Icon', 'themeim'), $allowed_html)
            )
        )
    ));

    
    //	Pricing Meta Box
    CSF::createMetabox($prefix . '_pricing_options', array(
        'title' => esc_html__('Pricing Options', 'themeim'),
        'post_type' => 'pricing',
    ));
    CSF::createSection($prefix . '_pricing_options', array(
        'fields' => array(
            array( 
                'id' => 'pricing_icon',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'themeim'),
                'desc' => wp_kses(__('Select Your Icon', 'themeim'), $allowed_html)
            )
        )
    ));

}//endif