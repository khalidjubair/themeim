<?php
/**
 * Footer Style 02
 * @package themeim
 * @since 1.0.0
 */

$call_to_action_text = !empty(cs_get_option('call_to_action_text')) ? cs_get_option('call_to_action_text') : esc_html__('Start Your Flight Training Today', 'themeim') . '<span>' . esc_html__('call us now!', 'themeim') . '</span>';
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text') : esc_html__('FlyNext Airlines. All rights reserved.', 'themeim') . '<a href="' . esc_url('https://themeforest.net/user/themeim') . '">' . esc_html__('ThemeIM', 'themeim') . '</a>';
$copyright_text = str_replace('{copy}', '&copy;', $copyright_text);
$copyright_text = str_replace('{year}', date('Y'), $copyright_text);
?>
<!-- footer area start -->
<div class="footer-style-02">
    <footer class="footer-wrap">
        <div class="call-to-action-area bg-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="call-to-action-inner">
                            <h2 class="title">
                                <?php
                                echo wp_kses($call_to_action_text, themeim()->kses_allowed_html(array('span')));
                                ?>
                            </h2>
                            <div class="btn-wrap">
                                <a href="<?php echo esc_url(cs_get_option('call_to_action_button_url')) ?>"
                                   class="boxed-btn"><?php echo esc_html(cs_get_option('call_to_action_button_title')); ?><i class="icomoon-btn-icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <?php dynamic_sidebar('footer-widget-two'); ?>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-wrap-inner">
                            <?php
                            echo wp_kses($copyright_text, themeim()->kses_allowed_html(array('a')));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- footer area end -->