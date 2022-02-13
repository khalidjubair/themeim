<?php
/**
 * Template part for displaying single package post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flynext
 */

$flynext = Flynext();
$post_single_meta = Flynext_Group_Fields_Value::post_meta('deals_single_post');
$packages_single_meta_data = get_post_meta(get_the_ID(), 'flynext_packages_options', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('deals-details-item'); ?>>

    <div class="entry-content">
        <?php
        if (has_post_thumbnail()) :
            get_template_part('template-parts/content/thumbnail-classic');
        endif;
        ?>
        <ul class="single-meta-item-wrap">
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Duration"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Duration:', 'flynext') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_duration_option'], 'flynext') ?></span>
                </div>
            </li>
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Start_From_icone"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Start From:', 'flynext') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_price_option'], 'flynext') ?></span>
                </div>
            </li>
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Date"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Date:', 'flynext') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_date_option'],'flynext')  ?></span>
                </div>
            </li>
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Person"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Person:', 'flynext') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_number_option'],'flynext') ?></span>
                </div>
            </li>
        </ul>
        <?php
        the_content();
        $flynext->link_pages();
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->