<?php
/**
 * Template part for displaying single team post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flynext
 */

$flynext = Flynext();
$flynext_meta = get_post_meta(get_the_ID(), 'flynext_team_options', true);
$img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
$img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'full', false) : '';
$img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
$img_alt = $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';
$designation = isset($flynext_meta['designation']) && !empty($flynext_meta['designation']) ? $flynext_meta['designation'] : '';
$description = isset($flynext_meta['description']) && !empty($flynext_meta['description']) ? $flynext_meta['description'] : '';
$social_icons = isset($flynext_meta['social-icons']) && !empty($flynext_meta['social-icons']) ? $flynext_meta['social-icons'] : '';
$team_info = isset($flynext_meta['team-info']) && !empty($flynext_meta['team-info']) ? $flynext_meta['team-info'] : '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('flynext-details-content-area'); ?>>
    <div class="entry-content">
        <div class="top-content-area">
            <div class="img-wrapper" style="background-image: url(<?php echo esc_url($img_url); ?>)">
            </div>
            <div class="content">
                <h2 class="title"><?php echo the_title()?></h2>
                <span class="designation"><?php echo esc_html($designation)?></span>
                <p><?php echo esc_html($description)?></p>
                <ul class="team-contact-list">
                    <?php
                    if (!empty($team_info)) {
                        foreach ($team_info as $info) {
                            printf('<li><i class="%2$s"></i>%1$s</li>', $info['title'], $info['icon']);
                        }
                    }
                    ?>
                </ul>
                <div class="team-social-area">
                    <h3 class="subtitle"><?php echo esc_html__('Follow Me','flynext')?></h3>
                    <ul class="social-icon">
                        <?php
                        if (!empty($social_icons)) {
                            foreach ($social_icons as $item) {
                                printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        the_content();
        $flynext->link_pages();
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
