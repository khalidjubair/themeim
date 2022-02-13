<?php
/**
 * Post Meta Functions
 * @package flynext
 * @since 1.0.0
 */

$flynext = flynext();
$post_meta = flynext_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
            <li><?php $flynext->posted_by(); ?></li>
        <?php endif; ?>
        <li>
            <?php
            $flynext->posted_on();
            ?>
        </li>
        <li>
            <?php
            $flynext->comment_count();
            ?>
        </li>
    </ul>
    <?php

    if (shortcode_exists('flynext_post_share') && $post_meta['posted_share']) {
        echo do_shortcode('[flynext_post_share]');
    }
    ?>
</div>