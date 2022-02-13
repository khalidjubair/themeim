<?php
/**
 * Post Meta Functions
 * @package themeim
 * @since 1.0.0
 */

$themeim = themeim();
$post_meta = themeim_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
            <li><?php $themeim->posted_by(); ?></li>
        <?php endif; ?>
        <li>
            <?php
            $themeim->posted_on();
            ?>
        </li>
        <li>
            <?php
            $themeim->comment_count();
            ?>
        </li>
    </ul>
    <?php

    if (shortcode_exists('themeim_post_share') && $post_meta['posted_share']) {
        echo do_shortcode('[themeim_post_share]');
    }
    ?>
</div>