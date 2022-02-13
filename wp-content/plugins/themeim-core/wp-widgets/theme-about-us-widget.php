<?php
/**
 * Theme About Us Widget
 * @package Themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('themeim_about_widget', array(
        'title' => esc_html__('Themeim: About Us', 'themeim-core'),
        'classname' => 'themeim-widget-about',
        'description' => esc_html__('Display about us widget', 'themeim-core'),
        'fields' => array(
            array(
                'id' => 'logo-area',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'themeim-core'),
            ),
            array(
                'id' => 'description',
                'type' => 'textarea',
                'title' => esc_html__('Description', 'Themeim-core'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'themeim-core')
            ),

            array(
                'id' => 'themeim-footer-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'themeim-core'),
                'fields' => array(

                    array(
                        'id' => 'themeim-footer-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'themeim-core'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'themeim-footer-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Url', 'themeim-core'),
                        'default' => esc_html__('#', 'themeim-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('themeim_about_widget')) {
        function themeim_about_widget($args, $instance)
        {

            echo $args['before_widget'];

            // var_dump( $args ); // Widget arguments
            // var_dump( $instance ); // Saved values from database

            $instance['logo-area'];
            $logo = $instance['logo-area'];
            $img_id = $logo['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id,'full')[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            $paragraph = $instance['description'] ?? '';
            $socialIcon = is_array($instance['themeim-footer-social-icon-repeater']) && !empty($instance['themeim-footer-social-icon-repeater']) ? $instance['themeim-footer-social-icon-repeater'] : [];


            ?>
            <div class="footer-widget widget">
                <div class="about_us_widget style-01">
                    <a href="<?php echo get_home_url(); ?>" class="footer-logo"><?php
                        if (!empty($img_print)) {
                            printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                        }
                        ?></a>
                    <p> <?php echo $paragraph; ?></p>
                    <ul class="contact_info_list">
                        <?php
                        foreach ($socialIcon as $icon) {
                            echo '<li class="single-info-item">
                            <div class="icon"><a href="'.$icon['themeim-footer-social-text'].'">
                                <i class="' . $icon['themeim-footer-social-icon'] . '"></i></a>
                            </div>
                        </li>';
                        };
                        ?>
                    </ul>
                </div>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>