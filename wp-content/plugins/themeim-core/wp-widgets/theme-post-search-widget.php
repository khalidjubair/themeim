<?php
/**
 * Theme Post Search Widget
 * @package Foodfly
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('foodfly_post_search_widget', array(
        'title' => esc_html__('Foodfly Post Search', 'themeim-core'),
        'classname' => 'widget_search',
        'description' => esc_html__('Display about me widget', 'themeim-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'flycore-core'),
            ),
        )
    ));


    if (!function_exists('foodfly_post_search_widget')) {
        function foodfly_post_search_widget($args, $instance)
        {

            echo $args['before_widget'];
            $title = $instance['title'] ?? '';

            ?>
                <h4 class="widget-headline"><?php echo esc_html($title); ?></h4>
                <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get"
                      class="search-form">
                    <div class="post-inside-wrapper">
                        <div class="form-group">
                            <input class="form-control" type="text" name="s" placeholder="<?php echo esc_html__('Search here','themeim-core')?>">
                            <input type="hidden" name="post_type" value="post">
                        </div>
                        <button type="submit" class="submit-btn">
                         <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

            <?php
            echo $args['after_widget'];
        }
    }
}
?>