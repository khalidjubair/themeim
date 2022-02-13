<?php
/**
 * Post Thumbnail Functions
 * @package flynext
 * @since 1.0.0
 */

$flynext = flynext();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $flynext->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>