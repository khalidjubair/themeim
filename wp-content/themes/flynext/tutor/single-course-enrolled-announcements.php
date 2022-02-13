<?php
/**
 * Template for displaying single course
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

get_header();

do_action('tutor_course/single/enrolled/before/wrap');
global $post, $authordata;
$profile_url = tutor_utils()->profile_url($authordata->ID);
$image_url = get_tutor_course_thumbnail('flynext-full', $url = true);
$course_single_meta_data = get_post_meta(get_the_ID(), 'flynext_courses_options', 'true');

?>

<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tutor-thumb">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr__('flynext-course-image','flynext') ?>">
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single-meta-item">
                    <div class="icon">
                        <i class="icomoon-Duration"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">
                            <?php echo esc_html__('Length','flynext') ?>
                        </h4>
                        <span>
                                        <?php echo get_tutor_course_duration_context(); ?>
                                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single-meta-item">
                    <div class="icon">
                        <i class="icomoon-Start_From_icone"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">
                            <?php echo esc_html__('Start From','flynext') ?>
                        </h4>
                        <span>
                                       <?php echo esc_html($course_single_meta_data['course_start_date_option']) ?>
                                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single-meta-item">
                    <div class="icon">
                        <i class="icomoon-Level_iconE"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">
                            <?php echo esc_html__('Level','flynext') ?>
                        </h4>
                        <span>
                                        <?php echo get_tutor_course_level(); ?>
                                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single-meta-item">
                    <div class="icon">
                        <i class="icomoon-Fees_icone"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">
                            <?php echo esc_html__('Fees/Sem','flynext') ?>
                        </h4>
                        <span>
                                          <?php flynext_core()->tutor_price(); ?>
                                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses-body">
            <div class="row">
                <div class="col-lg-8">
                    <?php do_action('tutor_course/single/enrolled/before/inner-wrap'); ?>
                    <?php tutor_course_enrolled_lead_info(); ?>
                    <?php do_action('tutor_course/single/enrolled/after/inner-wrap'); ?>
                </div>
                <div class="col-lg-4">
                    <div class="tutor-single-course-sidebar">
                        <?php
                        if (is_active_sidebar('tutor-sidebar')) {
                            dynamic_sidebar('tutor-sidebar');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php do_action('tutor_course/single/enrolled/after/wrap'); ?>

<?php
get_footer();
