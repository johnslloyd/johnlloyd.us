<?php
/**
 * Header Layout 1
 *
 * @package CutiePie
 */
$cutie_pie_default = cutie_pie_get_default_theme_options();
$header_transparent_logo_upload = get_theme_mod('header_transparent_logo_upload');
$home_url = home_url();
?>
<header id="site-header" class="header-layout" role="banner">
    <div class="site-header-components">
        <div class="site-header-items">
            <div class="header-individual-component branding-components">
                <div class="header-titles">
                    <?php
                    // Site title or logo.
                    cutie_pie_site_logo();
                    // Site description.
                    cutie_pie_site_description();
                    ?>
                </div>

                <button type="button" class="navbar-control theme-action-control navbar-control-offcanvas">
                    <span class="action-control-trigger" tabindex="-1"><?php cutie_pie_the_theme_svg('menu'); ?></span>
                </button>
            </div>


            <div class="header-individual-component color-switch-components">
                <button type="button" class="navbar-control theme-colormode-switcher">
                    <span class="navbar-control-trigger" tabindex="-1">
                        <span class="mode-icon-change"></span>
                        <span id="mode-icon-switch"></span>
                    </span>
                </button>
            </div>

            <div class="header-individual-component search-components">
                <?php get_search_form(); ?>
            </div>

            <div class="header-individual-component navigation-components hidden-sm-screen">
                <div class="offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('cutie-pie-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'cutie-pie-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="header-individual-component social-nav-components hidden-sm-screen  hide-no-js">
                <?php if (has_nav_menu('cutie-pie-social-menu')) { ?>
                    <div id="navbar-social-nav" class="theme-social-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'cutie-pie-social-menu',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                            'container' => 'div',
                            'container_class' => 'social-menu',
                            'depth' => 1,
                        )); ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</header>