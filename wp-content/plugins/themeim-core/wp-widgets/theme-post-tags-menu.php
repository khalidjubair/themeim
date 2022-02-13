<?php
/**
 * Theme Post Tags Widget
 * @package Themeim
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class Themeim_Tags_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'themeim_tags',
            esc_html__('Themeim: Tags', 'themeim-core'),
            array('description' => esc_html__('Display  categories', 'themeim-core'))
        );
    }

    public function widget($args, $instance)
    {

        $allowed_html = themeim()->kses_allowed_html('all');

        $title = isset($instance['title']) && !empty($instance['title']) ? $instance['title'] : '';
        $order = isset($instance['order']) && !empty($instance['order']) ? $instance['order'] : 'ASC';
        $post_type = isset($instance['post_type']) && !empty($instance['post_type']) ? $instance['post_type'] : 'post';
        $orderby = isset($instance['orderby']) && !empty($instance['orderby']) ? $instance['orderby'] : 'ID';
        echo wp_kses($args['before_widget'], $allowed_html);
        if (!empty($title)) {
            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
        }
        //WP_Query argument
        $all_tags = array(
            'type' => $post_type,
            'order' => $order,
            'orderby' => $orderby
        );
        $tags = get_tags($all_tags);
        //have to write code for displing query data
        if (!empty($tags)):?>
            <div class="wp-block-tag-cloud">

            <?php foreach ($tags as $tag) {
                printf('<a href="%1$s">%2$s</a>', $tag->slug, $tag->name);
            }
        else:
            esc_html__(' Oops, there are no tags.', 'themeim-core')
            ?>
        <?php endif; ?>
        </div>
        <?php
        echo wp_kses($args['after_widget'], $allowed_html);
    }

    public function form($instance)
    {

        //have to create form instance

        if (!empty($instance) && $instance['title']) {

            $title = apply_filters('widget_title', $instance['title']);

        } else {

            $title = esc_html__('Tags', 'themeim-core');

        }
        $order = !empty($instance) && $instance['order'] ? $instance['order'] : 'ASC';
        $orderby = !empty($instance) && $instance['orderby'] ? $instance['orderby'] : 'ID';
        $taxonomy = array(
            'tags' => esc_html__('Blog Tags', 'themeim-core'),
            'packages-cat' => esc_html__('Packages Tags', 'themeim-core'),
            'deals-cat' => esc_html__('Deals Tags', 'themeim-core'),
            'course-tags' => esc_html__('Courses Tags', 'themeim-core'),
            'service-cat' => esc_html__('Service Tags', 'themeim-core')
        );
        $order_arr = array(
            'ASC' => esc_html__('Acceding', 'themeim-core'),
            'DESC' => esc_html__('Descending', 'themeim-core')
        );
        $orderby_arr = array(
            'ID' => esc_html__('ID', 'themeim-core'),
            'title' => esc_html__('Title', 'themeim-core'),
            'date' => esc_html__('Date', 'themeim-core'),
            'rand' => esc_html__('Random', 'themeim-core')
        );

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('taxonomy')) ?>"><?php esc_html_e('Taxonomy', 'themeim-core'); ?></label>

            <select name="<?php echo esc_attr($this->get_field_name('taxonomy')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('taxonomy')) ?>">

                <?php

                foreach ($taxonomy as $key => $value) {

                    $checked = ($key == $order) ? 'selected' : '';

                    printf('<option value="%1$s" %3$s >%2$s</option>', $key, $value, $checked);

                }
                ?>
            </select>
        </p>
        <p>

            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'themeim-core'); ?></label>

            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   value="<?php echo esc_attr($title) ?>">

        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')) ?>"><?php esc_html_e('Order', 'themeim-core'); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('order')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('order')) ?>">
                <?php
                foreach ($order_arr as $key => $value) {
                    $checked = ($key == $order) ? 'selected' : '';
                    printf('<option value="%1$s" %3$s >%2$s</option>', $key, $value, $checked);
                }
                ?>
            </select>

        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('orderby')) ?>"><?php esc_html_e('OrderBy', 'themeim-core'); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('orderby')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('orderby')) ?>">
                <?php
                foreach ($orderby_arr as $key => $value) {
                    $checked = ($key == $orderby) ? 'selected' : '';
                    printf('<option value="%1$s" %3$s >%2$s</option>', $key, $value, $checked);
                }
                ?>
            </select>

        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['number'] = (!empty($new_instance['number']) ? sanitize_text_field($new_instance['number']) : '');
        $instance['title'] = (!empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '');
        $instance['taxonomy'] = (!empty($new_instance['taxonomy']) ? sanitize_text_field($new_instance['taxonomy']) : '');
        $instance['order'] = (!empty($new_instance['order']) ? sanitize_text_field($new_instance['order']) : '');
        $instance['orderby'] = (!empty($new_instance['orderby']) ? sanitize_text_field($new_instance['orderby']) : '');

        return $instance;
    }

} // end class

if (!function_exists('Themeim_Tags_Widget')) {
    function Themeim_Tags_Widget()
    {
        register_widget('Themeim_Tags_Widget');
    }

    add_action('widgets_init', 'Themeim_Tags_Widget');
}