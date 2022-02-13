<?php
/**
 * Post Thumbnail Video
 * @package themeim
 * @since 1.0.0
 */

$themeim = themeim();
$post_meta = get_post_meta(get_the_ID(),'themeim_post_video_options',true);
$video_url = isset($post_meta['video_url']) && $post_meta['video_url'] ? $post_meta['video_url'] : '';
$blog_single_options = themeim_Group_Fields_Value::post_meta('blog_single_post');
if(!empty($video_url)):
    ?>
    <div class="thumbnail">
        <?php $themeim->post_thumbnail('post-thumbnail'); ?>
        <?php if(!empty($video_url)): ?>
            <div class="hover">
                <a href="<?php echo esc_url($video_url);?>" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
