<?php
/**
 * Header Style 03
 * @package flynext
 * @since 1.0.0
 */

?>

<div class="header-style-03">
    <!-- support bar area end -->
    <nav class="navbar navbar-area navbar-expand-lg navigation-style-02">
        <div class="container custom-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <?php
                    $header_four_logo = cs_get_option('header_four_logo');
                    if (has_custom_logo() && empty($header_four_logo['id'])) {
                        the_custom_logo();
                    } elseif (!empty($header_four_logo['id'])) {
                        printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_four_logo['url'], $header_four_logo['alt']);
                    } else {
                        printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                    }
                    ?>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#flynext_main_menu"
                        aria-expanded="false" aria-label="<?php esc_attr__('Toggle navigation','flynext')?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class' => 'navbar-nav',
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'flynext_main_menu'
            ));
            ?>
            <div class="nav-right-content">
                <ul>
                    <li id="search">
                        <a href="#">
                            <span class="icon">
                                <i class="icomoon-Search"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="btn-wrap">
                    <a href="<?php echo esc_url(cs_get_option('header_four_navbar_url')) ?>"
                       class="boxed-btn"><i
                                class="icomoon-btn-icon-v2"></i><?php echo esc_html(cs_get_option('header_four_navbar_title')); ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>