<?php
/**
 * Header Style 01
 * @package flynext
 * @since 1.0.0
 */

$shortcodes_right_content = cs_get_option('header_two_top_right_info_bar_shortcode');
?>
<div class="page-wrapper">
    <div class="header-section">
        <div class="header">
            <div class="header-bottom-area">
                <div class="container custom-container">
                    <div class="header-menu-content">
                        <div class="header-left">
                            <?php
                            $header_two_logo = cs_get_option('header_two_logo');
                            if (has_custom_logo() && empty($header_two_logo['id'])) {
                                the_custom_logo();
                            } elseif (!empty($header_two_logo['id'])) {
                                printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_two_logo['url'], $header_two_logo['alt']);
                            } else {
                                printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                            }
                            ?>
                            <div class="header-toggle-area">
                                <div class="toggle-wrapper">
                                    <div class="toggle-bar">
                                        <div class="toggle">
                                            <div class="element"></div>
                                        </div>
                                        <div class="toggle">
                                            <div class="text">M</div>
                                        </div>
                                        <div class="toggle">
                                            <div class="element"></div>
                                        </div>
                                    </div>
                                    <div class="toggle-bar">
                                        <div class="toggle">
                                            <div class="text">E</div>
                                        </div>
                                        <div class="toggle">
                                            <div class="element"></div>
                                        </div>
                                        <div class="toggle res">
                                            <div class="text">N</div>
                                        </div>
                                        <div class="toggle">
                                            <div class="text">U</div>
                                        </div>
                                    </div>
                                    <div class="toggle-bar">
                                        <div class="toggle">
                                            <div class="element"></div>
                                        </div>
                                        <div class="toggle pos">
                                            <div class="text">N</div>
                                        </div>
                                        <div class="toggle">
                                            <div class="element"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-right">
                            <?php echo do_shortcode($shortcodes_right_content); ?>
                            <div class="btn-wrap">
                                <a href="<?php echo esc_url(cs_get_option('header_two_navbar_url')) ?>"
                                   class="boxed-btn"><i
                                            class="icomoon-btn-icon"></i><?php echo esc_html(cs_get_option('header_two_navbar_title')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-menu-container">
        <div class="nav-menu-wrapper">
            <span class="nav-menu-close"><i class="fas fa-times"></i></span>
            <div class="menu-element-area">
                <div class="menu-element-one">
                    <?php
                    $header_two_bg_image = cs_get_option('header_two_bg_image');
                    if (!empty($header_two_bg_image['id'])) {
                        printf('<img src="%1$s" alt="%2$s"/>', $header_two_bg_image['url'], $header_two_bg_image['alt']);
                    }
                    ?>
                </div>
                <div class="menu-element-two wow scale" data-wow-duration="1s" data-wow-delay=".4s">
                    <?php
                    $header_two_plane_image = cs_get_option('header_two_plane_image');
                    if (!empty($header_two_plane_image['id'])) {
                        printf('<img src="%1$s" alt="%2$s"/>', $header_two_plane_image['url'], $header_two_plane_image['alt']);

                    }
                    ?>
                </div>
            </div>

            <div class="nav-menu-wrap">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'flynext-navbar-nav main-menu',
                    'container' => 'div',
                    'container_class' => 'menu-nav navbar-collapse'
                ));
                ?>
                <div class="header-action btn-wrap">
                    <a href="<?php echo esc_url(cs_get_option('header_two_navbar_url')) ?>"
                       class="boxed-btn"><i
                                class="las la-plane-departure"></i><?php echo esc_html(cs_get_option('header_two_navbar_title')); ?>
                    </a>
                </div>
                <div class="header-social-area">
                    <ul class="header-social">
                        <?php
                        $socialIcon = cs_get_option('sidebar_social_repeater');
                        if (!empty($socialIcon)) :
                            foreach ($socialIcon as $icon) :
                                echo '<li><a href=" ' . $icon['sidebar_social_icon_item_url'] . ' ">
                                                <i class="' . $icon['sidebar_social_icon_item_icon'] . '"></i></a></li>';
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>