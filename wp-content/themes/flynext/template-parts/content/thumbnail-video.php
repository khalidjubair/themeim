<?php
/**
 * Post Thumbnail Video
 * @package flynext
 * @since 1.0.0
 */

$flynext = flynext();
$post_meta = get_post_meta(get_the_ID(),'flynext_post_video_options',true);
$video_url = isset($post_meta['video_url']) && $post_meta['video_url'] ? $post_meta['video_url'] : '';
$blog_single_options = flynext_Group_Fields_Value::post_meta('blog_single_post');
if(!empty($video_url)):
    ?>
    <div class="thumbnail">
        <?php $flynext->post_thumbnail('post-thumbnail'); ?>
        <?php if(!empty($video_url)): ?>
            <div class="hover">
                <a href="<?php echo esc_url($video_url);?>" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
