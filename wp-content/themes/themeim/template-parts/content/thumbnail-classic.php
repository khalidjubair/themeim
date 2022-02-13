<?php
/**
 * Post Thumbnail Functions
 * @package themeim
 * @since 1.0.0
 */

$themeim = themeim();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $themeim->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>