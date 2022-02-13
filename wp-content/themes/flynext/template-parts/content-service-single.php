<?php
/**
 * Template part for displaying single service post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flynext
 */

$flynext = Flynext();
$post_single_meta = Flynext_Group_Fields_Value::post_meta('service_single_post');
$post_categories = get_the_terms(get_the_ID(), 'service-cat');
$next_post_navigation = cs_get_option('service_details_next_post_navigation_enable');
$get_related_post = cs_get_option('service_details_get_related_post_enable');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('service-details-item'); ?>>
    <div class="entry-content">
        <div class="row">
            <div class="col-lg-12">
                <?php
                the_content();
                $flynext->link_pages();
                ?>
            </div>
        </div>
    </div>
    <?php
    if ($next_post_navigation) {
        echo wp_kses($flynext->post_navigation_with_img(), $flynext->kses_allowed_html('all'));
    }
    if ($get_related_post) {
        $flynext->get_related_post([
            'post_type' => 'service',
            'taxonomy' => 'service-cat',
            'exclude_id' => get_the_ID(),
            'posts_per_page' => 3
        ]);
    }
    ?>
</article><!-- #post-<?php the_ID(); ?> -->