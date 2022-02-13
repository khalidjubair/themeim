<?php
/**
 * Template part for displaying single package post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themeim
 */

$themeim = Themeim();
$post_single_meta = Themeim_Group_Fields_Value::post_meta('deals_single_post');
$packages_single_meta_data = get_post_meta(get_the_ID(), 'themeim_packages_options', true);
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
                    <h5 class="title"><?php echo esc_html__('Duration:', 'themeim') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_duration_option'], 'themeim') ?></span>
                </div>
            </li>
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Start_From_icone"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Start From:', 'themeim') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_price_option'], 'themeim') ?></span>
                </div>
            </li>
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Date"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Date:', 'themeim') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_date_option'],'themeim')  ?></span>
                </div>
            </li>
            <li class="single-meta-item">
                <div class="icon">
                    <i class="icomoon-Person"></i>
                </div>
                <div class="content">
                    <h5 class="title"><?php echo esc_html__('Person:', 'themeim') ?></h5>
                    <span class="post-date"><?php echo esc_html__($packages_single_meta_data['packages_number_option'],'themeim') ?></span>
                </div>
            </li>
        </ul>
        <?php
        the_content();
        $themeim->link_pages();
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->