<?php

/*
 * Theme Customize Options
 * @package flynext
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {
    $prefix = 'flynext';

    CSF::createCustomizeOptions($prefix . '_customize_options');
    /*-------------------------------------
        ** Theme Main panel
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('Flynext Options', 'flynext'),
        'id' => 'flynext_main_panel',
        'priority' => 11,
    ));


    /*-------------------------------------
        ** Theme Main Color
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('01. Main Color', 'flynext'),
        'priority' => 10,
        'parent' => 'flynext_main_panel',
        'fields' => array(
            array(
                'id' => 'main_color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color One', 'flynext'),
                'default' => '#DCBB87',
                'desc' => esc_html__('This is theme primary color one, means it will affect most of elements that have default color of our theme primary color', 'flynext')
            ),
            array(
                'id' => 'main_color_two',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color Two', 'flynext'),
                'default' => '#a37D3D',
                'desc' => esc_html__('This is theme primary color two, means it\'ll affect most of elements that have default color of our theme primary color', 'flynext')
            ),
            array(
                'id' => 'secondary_color',
                'type' => 'color',
                'title' => esc_html__('Theme Secondary Color', 'flynext'),
                'default' => '#19232D',
                'desc' => esc_html__('This is theme secondary color, means it\'ll affect most of elements that have default color of our theme secondary color', 'flynext')
            ),
            array(
                'id' => 'heading_color',
                'type' => 'color',
                'title' => esc_html__('Theme Heading Color', 'flynext'),
                'default' => '#19232D',
                'desc' => esc_html__('This is theme heading color, means it\'ll affect all of heading tag like, h1,h2,h3,h4,h5,h6', 'flynext')
            ),
            array(
                'id' => 'paragraph_color',
                'type' => 'color',
                'title' => esc_html__('Theme Paragraph Color', 'flynext'),
                'default' => '#585858',
                'desc' => esc_html__('This is theme paragraph color, means it\'ll affect all of body/paragraph tag like, p,li,a etc', 'flynext')
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Header Options
    -------------------------------------*/

    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('02. Header One Options', 'flynext'),
        'parent' => 'flynext_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Nav Bar Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_01_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_01_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_01_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_01_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_01_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_01_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_01_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_01_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'flynext'),
                'default' => '#19232d'
            ),
        )
    ));
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('03. Header Two Options', 'flynext'),
        'parent' => 'flynext_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Option', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_02_top_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Menu Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_02_top_bar_text_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_02_top_bar_icon_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Icon Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'header_02_top_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Hover Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_02_top_bar_btn_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Background Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'id' => 'header_02_top_bar_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Color', 'flynext'),
                'default' => '#1F2E3C'
            ),
            array(
                'id' => 'header_02_top_bar_btn_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_02_top_bar_hover_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Side Nav Bar Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_02_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_02_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_02_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Dropdown Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_02_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'id' => 'header_02_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_02_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Social Icon', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_02_sidebar_social_bg_color',
                'type' => 'color',
                'title' => esc_html__('Menu Bar Icon Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_02_sidebar_social_color',
                'type' => 'color',
                'title' => esc_html__('Menu Bar Icon Text Color', 'flynext'),
                'default' => '#F8B65D'
            ),
            array(
                'id' => 'header_02_sidebar_social_hover_color',
                'type' => 'color',
                'title' => esc_html__('Menu Bar Icon Hover Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_02_sidebar_social_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Menu Bar Icon Text Hover Color', 'flynext'),
                'default' => '#C49868'
            ),
        )
    ));
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('02. Header Three Options', 'flynext'),
        'parent' => 'flynext_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Nav Bar Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_03_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_03_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_03_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_03_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_03_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_03_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'id' => 'header_03_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_03_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button Right Icon', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_03_top_bar_text_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Text Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_03_top_bar_icon_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Icon Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_03_top_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Hover Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_03_menu_btn_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Background Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'header_03_menu_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_03_menu_btn_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_03_menu_hover_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Color', 'flynext'),
                'default' => '#19232D'
            ),
        )
    ));
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('02. Header Four Options', 'flynext'),
        'parent' => 'flynext_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Nav Bar Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_04_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_04_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'header_04_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_04_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_04_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_04_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_04_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'header_04_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button Right Icon', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_04_top_bar_icon_color',
                'type' => 'color',
                'title' => esc_html__('Menu Search Icon Color', 'flynext'),
                'default' => '#757575'
            ),
            array(
                'id' => 'header_04_top_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Menu Search Hover Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'header_04_menu_btn_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Background Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'header_04_menu_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'header_04_menu_btn_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_04_menu_hover_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Color', 'flynext'),
                'default' => '#fff'
            ),
        )
    ));
    /*-------------------------------------
          ** Theme Sidebar Options
      -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('05. Sidebar', 'flynext'),
        'priority' => 13,
        'parent' => 'flynext_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'sidebar_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Title Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'sidebar_widget_title_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Border Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'sidebar_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Text Color', 'flynext'),
                'default' => '#585858'
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Footer One Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer One', 'flynext'),
        'priority' => 14,
        'parent' => 'flynext_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'flynext'),
                'default' => '#19232D',
            ),
            array(
                'id' => 'footer_area_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Border Color', 'flynext'),
                'default' => 'rgba(114, 108, 148, 0.2)',
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Title Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'footer_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'footer_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Tag Cloud Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_tag_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'footer_widget_tag_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Background Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'id' => 'footer_widget_tag_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Border Color', 'flynext'),
                'default' => '#19232d'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'copyright_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Background Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'copyright_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'flynext'),
                'default' => '#fff'
            ),
        )
    ));

    /*-------------------------------------
     ** Theme Footer Two Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer Two', 'flynext'),
        'priority' => 14,
        'parent' => 'flynext_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_two_menu_contact_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Top Menu Title Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'footer_two_menu_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Top Menu Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_area_two_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'flynext'),
                'default' => '#19232D',
            ),
            array(
                'id' => 'footer_area_two_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Border Color', 'flynext'),
                'default' => 'rgba(114, 108, 148, 0.2)',
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_two_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Title Color', 'flynext'),
                'default' => 'rgba(255, 255, 255, 0.9)'
            ),
            array(
                'id' => 'footer_two_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'flynext'),
                'default' => 'rgba(255,255,255,0.8)'
            ),
            array(
                'id' => 'footer_two_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Tag Cloud Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_two_tag_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'footer_widget_two_tag_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'footer_widget_two_tag_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Border Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'copyright_two_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'copyright_two_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'flynext'),
                'default' => 'rgba(255,255,255,0.8)'
            ),
        )
    ));

    /*-------------------------------------
    ** Theme Footer Three Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer Three', 'flynext'),
        'priority' => 14,
        'parent' => 'flynext_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top Call To Action Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_three_call_text_color',
                'type' => 'color',
                'title' => esc_html__('Call To Action Title Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'footer_three_call_btn_bg_color',
                'type' => 'color',
                'title' => esc_html__('Call To Action Button Background Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'id' => 'footer_three_call_btn_color',
                'type' => 'color',
                'title' => esc_html__('Call To Action Button Color', 'flynext'),
                'default' => '#1F2E3C'
            ),
            array(
                'id' => 'footer_three_call_btn_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Call To Action Button Hover Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'footer_three_call_hover_btn_color',
                'type' => 'color',
                'title' => esc_html__('Call To Action Button Hover Color', 'flynext'),
                'default' => '#dcbb87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_area_three_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'flynext'),
            ),
            array(
                'id' => 'footer_area_three_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Border Color', 'flynext'),
                'default' => 'rgba(114, 108, 148, 0.2)',
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_three_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Title Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'id' => 'footer_three_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'flynext'),
                'default' => '#19232D'
            ),
            array(
                'id' => 'footer_three_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'flynext'),
                'default' => '#DCBB87'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Tag Cloud Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_three_tag_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Text Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'id' => 'footer_widget_three_tag_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'footer_widget_three_tag_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Border Color', 'flynext'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'flynext') . '</h3>'
            ),
            array(
                'id' => 'copyright_three_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Background Color', 'flynext'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'copyright_three_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'flynext'),
                'default' => '#757575'
            ),
        )
    ));


}//endif