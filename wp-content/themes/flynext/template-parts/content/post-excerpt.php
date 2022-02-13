<?php
/**
 * Theme Post excerpt Template
 * @package flynext
 * @since 1.0.0
 */

$flynext = flynext();
$post_meta = flynext_Group_Fields_Value::post_meta('blog_post');
$excerpt_length = !empty($post_meta['excerpt_length']) ? $post_meta['excerpt_length'] : 55;
$readmore_text = !empty($post_meta['readmore_btn_text']) ? $post_meta['readmore_btn_text'] : esc_html__('Read More','flynext');


flynext_excerpt($excerpt_length);
?>
<div class="blog-bottom">
	<?php
	if($post_meta['readmore_btn']){
		printf('<div class="btn-wrap"><a href="%1$s" class="read-btn">%2$s<i class="icomoon-Group-2361"></i></a></div>',esc_url(get_the_permalink()),esc_html($readmore_text));
	}
	?>
</div>