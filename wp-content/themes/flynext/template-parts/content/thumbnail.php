<?php
/**
 * Post Thumbnail 
 * @package flynext
 * @since 1.0.0
 */
?>

 <div class="thumbnail">
    <?php
    if (has_post_thumbnail() && get_post_type() == 'post') {
        flynext()->post_thumbnail('post-thumbnail');
    }
    ?>
</div>
