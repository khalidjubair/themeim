<?php
/**
 * Template part for displaying single deals post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themeim
 */

$themeim = Themeim();
$post_single_meta = Themeim_Group_Fields_Value::post_meta('deals_single_post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('deals-details-item'); ?>>
    <div class="row">
        <div class="col-lg-12">
            <div class="entry-content">
                <?php
                the_content();
                $themeim->link_pages();
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->