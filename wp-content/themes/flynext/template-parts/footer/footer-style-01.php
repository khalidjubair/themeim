<?php
/**
 * Footer Style 01
 * @package flynext
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text') : esc_html__('Fly Next Airlines. All rights reserved. ', 'flynext') . '<a href="' . esc_url('https://themeforest.net/user/themeim/portfolio') . '">' . esc_html__('Themeim', 'flynext') . '</a>';
$copyright_text = str_replace('{copy}', '&copy;', $copyright_text);
$copyright_text = str_replace('{year}', date('Y'), $copyright_text);
$socialIcon = cs_get_option('footer_social_repeater');
$footer_top_widget = cs_get_option('footer_two_top_repeater');

?>
<!-- footer area start -->
<div class="footer-style-01">
    <footer class="footer-wrap bg-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="about-us-widget">
                        <?php
                        $footer_two_logo = cs_get_option('footer_two_logo');
                        if (has_custom_logo() && empty($footer_two_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($footer_two_logo['id'])) {
                            printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $footer_two_logo['url'], $footer_two_logo['alt']);
                        } else {
                            printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                        ?>
                        <p><?php echo cs_get_option('footer_two_paragraph') ?> </p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-top-widget-wrap">
                        <?php
                        if (!empty($footer_top_widget)):
                            foreach ($footer_top_widget as $widget): ?>
                                <div class="footer-nav-widget">
                                    <h3 class="widget-headline">
                                        <?php echo esc_html($widget['footer_two_top_item_title']) ?>
                                    </h3>
                                    <?php
                                    $paragraph = explode("\n", $widget['footer_social_icon_item_paragraph']);
                                    foreach ($paragraph as $detail) {
                                        printf('<p >%1$s</p>', esc_html($detail));
                                    }
                                    ?>
                                </div>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <div class="container">
                <div class="footer-widget-wrap">
                    <div class="row">
                        <?php dynamic_sidebar('footer-widget'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-wrap-inner style-01">
                            <ul class="social_share">
                                <?php
                                if (!empty($socialIcon)) :
                                    foreach ($socialIcon as $icon) :
                                        echo '<li class="single-info-item"><a href=" ' . $icon['footer_social_icon_item_url'] . ' ">
                                                <i class="' . $icon['footer_social_icon_item_icon'] . '"></i></a></li>';
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                            <div class="copyright-text">
                                <?php
                                echo wp_kses($copyright_text, Flynext()->kses_allowed_html(array('a')));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- footer area end -->