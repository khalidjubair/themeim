<?php
/**
 * Theme Social Share Widget
 * @package Themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('themeim_social_share_widget', array(
        'title' => esc_html__('Themeim: Social Share', 'themeim-core'),
        'classname' => 'themeim-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'themeim-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'themeim-core'),
                'default' => esc_html__('Never Miss News', 'themeim-core')
            ),
            array(
                'id' => 'themeim-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'themeim-core'),
                'fields' => array(
                    array(
                        'id' => 'themeim-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'themeim-core'),
                        'default' => 'fab fa-facebook'
                    ),
                    array(
                        'id' => 'themeim-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'themeim-core'),
                        'default' => '#'
                    ),
                ),
            ),
        )
    ));


    if (!function_exists('themeim_social_share_widget')) {
        function themeim_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];
            

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['themeim-social-icon-repeater']) && !empty($instance['themeim-social-icon-repeater']) ? $instance['themeim-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-icon style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['themeim-social-icon']), esc_url($icon['themeim-social-text']));
                    };
                    ?>
                </ul>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>