<?php
/**
 * Template for displaying lead info
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.5
 */

if (!defined('ABSPATH')) {
    exit;
}
global $wp_query;
$flynext_meta = get_post_meta(get_the_ID(), 'flynext_courses_options', true);
$study_option_meta = isset($flynext_meta['study-option']) && !empty($flynext_meta['study-option']) ? $flynext_meta['study-option'] : '';
?>
<div class="tutor-single-course-segment tutor-single-course-lead-info">

    <?php do_action('tutor_course/single/title/after'); ?>
    <?php do_action('tutor_course/single/lead_meta/before'); ?>

    <div class="tutor-course-summery">
        <h4 class="tutor-segment-title"><?php esc_html__('About Commercial Pilot License Course', 'flynext') ?></h4>
        <?php the_content(); ?>
    </div>
    <?php tutor_course_benefits_html(); ?>

    <div class="study-option-table-wrap">
        <table class="table study-option-table">
            <tr>
                <th><?php echo esc_html__('Qualification','flynext') ?></th>
                <th><?php echo esc_html__('Length','flynext') ?></th>
                <th><?php echo esc_html__('Code','flynext') ?></th>
            </tr>
            <?php
            if (!empty($study_option_meta)) {
                foreach ($study_option_meta as $item) {
                    printf('<tr><td>%1$s</td><td>%2$s</td><td><span>%3$s</span></td></tr>', $item['qualification'], $item['length'], $item['code']);
                }
            }
            ?>
        </table>
    </div>
    <?php tutor_course_requirements_html(); ?>
    <div class="module-download-area">
        <div class="content">
            <div class="icon">
                <i class="far fa-file-pdf"></i>
            </div>
            <h4 class="title">
                <?php echo esc_html($flynext_meta['course_module_option']) ?>
            </h4>
        </div>
        <div class="btn-wrap"><a href="<?php echo esc_url($flynext_meta['course_module_button_url']) ?>" class="read-btn"> <?php echo esc_html($flynext_meta['course_module_button_title']) ?><i class="icomoon-Group-2361"></i></a></div>
    </div>
    <div class="tab-pane" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="tab-inner">
            <?php tutor_course_target_reviews_html(); ?>
            <?php tutor_course_target_review_form_html(); ?>
        </div>
    </div>
    <?php do_action('tutor_course/single/lead_meta/after'); ?>
    <?php do_action('tutor_course/single/excerpt/before'); ?>

    <?php do_action('tutor_course/single/excerpt/after'); ?>


</div>