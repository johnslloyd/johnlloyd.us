<?php
/**
* Layouts Settings.
*
* @package CutiePie
*/


$base_url = home_url();

$cutie_pie_panels_sections = array(

	'theme_general_settings' => array(

		'title' => esc_html__('General Settings','cutie-pie'),
		'sections' => array(

			array(
				'title' => esc_html__('Logo & Site Identity','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bcontrol%5D=custom_logo'),
				'icon'	=> 'dashicons-format-image',
			),
			array(
				'title' => esc_html__('Background Image','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=background_image'),
                'icon'	=> 'dashicons-desktop',
			),
			array(
				'title' => esc_html__('Menu Settings','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bpanel%5D=nav_menus'),
				'icon'	=> 'dashicons-menu',
			),

		),

	),
	'theme_colors_panel' => array(

		'title' => esc_html__('Color Settings','cutie-pie'),
		'sections' => array(

			array(
				'title' => esc_html__('Color Options','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=colors'),
                'icon'	=> 'dashicons-admin-customizer',
			),
			array(
				'title' => esc_html__('Color Scheme','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=color_scheme'),
                'icon'	=> 'dashicons-art',
			),
			array(
				'title' => esc_html__('Category Scheme','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=cutie_pie_category_color_section'),
                'icon'	=> 'dashicons-art',
			),

		),

	),
	'theme_option_panel' => array(

		'title' => esc_html__('Theme Options','cutie-pie'),
		'sections' => array(

			array(
				'title' => esc_html__('Header Settings','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=main_header_setting'),
                'icon'	=> 'dashicons-align-center',
			),
			array(
				'title' => esc_html__('Pagination Settings','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=cutie_pie_pagination_section'),
                'icon'	=> 'dashicons-ellipsis',
            ),
			array(
				'title' => esc_html__('Post Settings','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=posts_settings'),
                'icon'	=> 'dashicons-admin-settings',
			),
			array(
				'title' => esc_html__('Single Post Settings','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=single_post_setting'),
                'icon'	=> 'dashicons-welcome-write-blog',
			),
			array(
				'title' => esc_html__('Animation Settings','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=animation_settings'),
                'icon'	=> 'dashicons-layout',
			),
			array(
				'title' => esc_html__('Footer Setting','cutie-pie'),
				'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=footer_widget_area'),
                'icon'	=> 'dashicons-admin-generic',
			),

		),

	),

);

//Free vs Pro
$cutie_pie_panel_compare = array(
    array(
        'title' => __('Supports One Click Demo Import', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Logo and SiteTitle Option', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Header Image', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Fixed Header Image', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Background Image', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Light/Dark Mode', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Basic Color Option', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Advance Color Option', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Typography Style Option', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Custom Widgets', 'cutie-pie'),
        'free' => __('less', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('CP: Category Widget', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('CP: Recent Post Widget', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('CP: Sidebar Author Widget', 'cutie-pie'),
        'free' => __('3 Layout', 'cutie-pie'),
        'pro' => __('5 Layout', 'cutie-pie'),
    ),
    array(
        'title' => __('CP: Social Widget', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('CP: Tab Posts Widget', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Footer Widgets Area', 'cutie-pie'),
        'free' => __('3', 'cutie-pie'),
        'pro' => __('4', 'cutie-pie'),
    ),
    array(
        'title' => __('Main Advertisement Area', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Table of Contents', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Coming Soon - Maintenance mode', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Onsite Popup Messages', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Social Nav Options', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Pagination Options', 'cutie-pie'),
        'free' => __('4', 'cutie-pie'),
        'pro' => __('4', 'cutie-pie'),
    ),
    array(
        'title' => __('Archive Options', 'cutie-pie'),
        'free' => __('Limited', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Multiple Post Layouts', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Article Meta Options', 'cutie-pie'),
        'free' => __('Limited', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Single Post Options', 'cutie-pie'),
        'free' => __('Limited', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Multiple single Post Layouts', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Copyright Text Edit Option', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Pre-loader Animations', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Instagram Feed Integration', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Twitter Feed Integration', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Facebook Fanpage widget', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Homepage Section Repeater', 'cutie-pie'),
        'free' => __('no', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Homepage Section Reorder', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Multiple single Post Layouts', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Theme Support', 'cutie-pie'),
        'free' => __('Normal', 'cutie-pie'),
        'pro' => __('High Priority', 'cutie-pie'),
    ),
    array(
        'title' => __('Responsive Layout', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('Translations Ready', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),
    array(
        'title' => __('SEO Optimized', 'cutie-pie'),
        'free' => __('yes', 'cutie-pie'),
        'pro' => __('yes', 'cutie-pie'),
    ),

);

include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
$rec_plugins = Cutie_Pie_Getting_started::cutie_pie_recommended_plugins();
$theme_version = wp_get_theme()->get('Version');
$theme_info = wp_get_theme();
$theme_name = $theme_info->__get('Name');
$pro_theme_name = $theme_name . ' Pro';
$free_theme_url = 'https://www.themeinwp.com/theme/cutie-pie';
$pro_theme_url = 'https://www.themeinwp.com/theme/cutie-pie-pro';
?>
<div class="twp-about-main">

	<div class="about-page-header">
		<div class="about-wrapper">
            <div class="about-column-row">
                <div class="about-header-left">
                    <h1 class="about-theme-title">
                        <a href="<?php echo esc_url($free_theme_url); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri().'/assets/images/cutie-pie-logo.png' ); ?>" class="about-theme-logo">
                            <span class="theme-version"><?php echo esc_html( $theme_version ); ?></span>
                        </a>
                    </h1>
                </div>
                <div class="about-header-right">
                    <div class="about-header-navigation">
                        <a target="_blank" class="about-header-links header-links-home" href="<?php echo esc_url($free_theme_url); ?>">
                            <?php esc_html_e('Theme Details', 'cutie-pie'); ?>
                        </a>
                        <a target="_blank" class="about-header-links header-links-preview" href="<?php echo esc_url('https://preview.themeinwp.com/cutie-pie/'); ?>">
                            <?php esc_html_e('View Demo', 'cutie-pie'); ?>
                        </a>
                        <a target="_blank" class="about-header-links header-links-review" href="<?php echo esc_url('https://wordpress.org/support/theme/cutie-pie/reviews/?filter=5'); ?>">
                            <?php esc_html_e('Rate This Theme', 'cutie-pie'); ?>
                        </a>
                    </div>
                </div>
            </div>
		</div>
	</div>

    <div class="about-tab-navbar">
        <div class="about-wrapper">
            <ul class="tab-navbar-list">
                <li><a class="active" href="#about-panel-1"><?php esc_html_e('Getting started', 'cutie-pie'); ?></a></li>
                <li><a href="#about-panel-2"><?php esc_html_e('Free vs Pro', 'cutie-pie'); ?></a></li>
                <li><a href="#about-panel-3"><?php esc_html_e('Changelog', 'cutie-pie'); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="about-page-content">
	    <div class="about-wrapper">
            <div class="about-column-row">

                <div class="about-content-left">

                    <div class="about-tab-content">
                        <div id="about-panel-1" class="about-panel-item about-panel-general about-panel-item-active">

                            <?php
                            foreach( $cutie_pie_panels_sections as $panels ){ ?>

                            <div class="about-content-panel">

                                    <?php if( isset( $panels['title'] ) && $panels['title'] ){ ?>

                                        <h2 class="about-panel-title"><?php echo esc_html( $panels['title'] );  ?></h2>

                                    <?php } ?>
                                    <div class="about-panel-items about-panel-2-columns">
                                    <?php

                                    if( isset( $panels['sections'] ) && $panels['sections'] ){

                                        foreach( $panels['sections'] as $section ){ ?>


                                            <div class="about-items-wrap">
                                                <?php if( isset( $section['icon'] ) && $section['icon'] ){ ?>
                                                    <span class="about-items-icon dashicons <?php echo esc_attr( $section['icon'] ); ?>"></span>
                                                <?php } ?>

                                                <?php if( isset( $section['title'] ) && $section['title'] && isset( $section['url'] ) && $section['url'] ){ ?>
                                                    <span class="about-items-title">
                                                        <a href="<?php echo esc_url( $section['url'] ); ?>"><?php echo esc_html( $section['title'] ); ?></a>
                                                    </span>
                                                <?php } ?>
                                            </div>


                                    <?php }

                                    } ?>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="about-content-panel">

                                <h2 class="about-panel-title"><?php esc_html_e('Recommended Plugins','cutie-pie'); ?></h2>

                                <div class="about-panel-items about-panel-1-columns">

                                    <?php foreach ($rec_plugins as $key => $plugin) {

                                        $plugin_info = plugins_api(
                                            'plugin_information',
                                            array(
                                                'slug' => sanitize_key(wp_unslash($key)),
                                                'fields' => array(
                                                    'sections' => false,
                                                ),
                                            )
                                        );

                                        $plugin_status = Cutie_Pie_Getting_started::cutie_pie_plugin_status($plugin['class'], $key, $plugin['PluginFile']); ?>

                                        <div id="<?php echo 'cutie-pie-' . esc_attr($key); ?>" class="about-items-wrap">
                                            <div class="theme-recommended-plugin <?php if ($plugin_status['status'] == 'active') { echo 'recommended-plugin-active'; } ?>">

                                                <?php if (isset($plugin_info->name)) { ?>
                                                    <a href="javascript:void(0)"><?php echo esc_html($plugin_info->name); ?></a>
                                                <?php } ?>

                                                <?php if (isset($plugin_status['status']) && isset($plugin_status['string'])) { ?>

                                                    <a class="recommended-plugin-status <?php echo 'twp-plugin-' . esc_attr($plugin_status['status']); ?>"
                                                       plugin-status="<?php echo esc_attr($plugin_status['status']); ?>"
                                                       plugin-file="<?php echo esc_attr($plugin['PluginFile']); ?>"
                                                       plugin-folder="<?php echo esc_attr($key); ?>"
                                                       plugin-slug="<?php echo esc_attr($key); ?>"
                                                       plugin-class="<?php echo esc_attr($plugin['class']); ?>"
                                                       href="javascript:void(0)"><?php echo esc_html($plugin_status['string']); ?></a>

                                                <?php } ?>

                                            </div>

                                        </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                        <div id="about-panel-2" class="about-panel-item about-panel-compare">
                            <?php

                            $free_pro = $cutie_pie_panel_compare;
                            if (!empty($free_pro)) {
                                $defaults = array(
                                    'title' => '',
                                    'desc' => '',
                                    'free' => '',
                                    'pro' => '',
                                );

                                if (!empty($free_pro) && is_array($free_pro)) {
                                    echo '<div id="free_pro" class="theme-info-tab-pane theme-info-fre-pro">';
                                    echo '<table class="free-pro-table">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th></th>';
                                    echo '<th>' . $theme_name . '</th>';
                                    echo '<th>' . $pro_theme_name . '</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    foreach ($free_pro as $feature) {

                                        $instance = wp_parse_args((array)$feature, $defaults);

                                        /*allowed 7 value in array */
                                        $title = $instance['title'];
                                        $desc = $instance['desc'];
                                        $free = $instance['free'];
                                        $pro = $instance['pro'];

                                        echo '<tr>';
                                        if (!empty($title) || !empty($desc)) {
                                            echo '<td>';
                                            if (!empty($title)) {
                                                echo '<h3 class="compare-tabel-title">' . wp_kses_post($title) . '</h3>';
                                            }
                                            if (!empty($desc)) {
                                                echo '<p>' . wp_kses_post($desc) . '</p>';
                                            }
                                            echo '</td>';
                                        }

                                        if (!empty($free)) {
                                            if ('yes' === $free) {
                                                echo '<td class="theme-feature-check"><span class="dashicons-before dashicons-yes"></span></td>';
                                            } elseif ('no' === $free) {
                                                echo '<td class="theme-feature-cross"><span class="dashicons-before dashicons-no-alt"></span></td>';
                                            } else {
                                                echo '<td class="theme-feature-check">' . esc_html($free) . '</td>';
                                            }

                                        }
                                        if (!empty($pro)) {
                                            if ('yes' === $pro) {
                                                echo '<td class="theme-feature-check"><span class="dashicons-before dashicons-yes"></span></td>';
                                            } elseif ('no' === $pro) {
                                                echo '<td class="theme-feature-cross"><span class="dashicons-before dashicons-no-alt"></span></td>';
                                            } else {
                                                echo '<td class="theme-feature-check">' . esc_html($pro) . '</td>';
                                            }
                                        }
                                        echo '</tr>';
                                    }



                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div>';

                                }
                            } ?>
                        </div>

                        <div id="about-panel-3" class="about-panel-item about-panel-changelog">
                            <?php
                            WP_Filesystem();
                            global $wp_filesystem;
                            if (is_child_theme()) {
                                $changelog = $wp_filesystem->get_contents(get_stylesheet_directory() . '/classes/changelog.txt');
                            } else {
                                $changelog = $wp_filesystem->get_contents(get_template_directory() . '/classes/changelog.txt');
                            }
                            if (is_wp_error($changelog)) {
                                $changelog = '';
                            }

                            if (!empty($changelog)) {
                                echo '<div class="featured-section changelog">';
                                echo "<pre class='changelog'>";
                                echo $changelog;
                                echo "</pre>";
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>

                </div>

                <div class="about-content-right">

                    <div class="about-content-panel">
                        <h2 class="about-panel-title"><span class="dashicons dashicons-sos"></span> <?php esc_html_e('Looking for help?','cutie-pie'); ?></h2>
                        <div class="about-content-info">
                            <p><?php esc_html_e('We have some resources available to help you in the right direction.','cutie-pie'); ?></p>
                            <ul>
                                <li>
                                    <a href="https://www.themeinwp.com/support/" target="_blank" rel="noopener"><?php esc_html_e('Create a Ticket','cutie-pie'); ?> &#187;</a>
                                </li>
                                <li>
                                    <a href="https://www.themeinwp.com/knowledgebase/" target="_blank" rel="noopener"><?php esc_html_e('Knowledge Base','cutie-pie'); ?> &#187;</a>
                                </li>
                                <li>
                                    <a href="https://docs.themeinwp.com/docs/cutie-pie" target="_blank" rel="noopener"><?php esc_html_e('Theme Documentation','cutie-pie'); ?> &#187;</a>
                                </li>
                            </ul>
                            <p><?php esc_html_e('Behind every single customer support question stands a real person ready to fix the problem in real-time and guide you through.','cutie-pie'); ?></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="about-wrapper">
            <div class="about-column-row">
                <div class="about-content-full">
                    <div class="about-wrapper-footer">
                        <h2 class="about-panel-title"><?php printf( __( 'Unlock all the Features with %1$s Pro', 'cutie-pie' ), esc_html( $theme_name ) ); ?></h2>
                        <div class="about-footer-leftside">
                            <ul>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('Color Options','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('800+ Font Families','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('More Custom Widgets','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('More Customizer controls','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('More page/post meta options','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('Webmaster Tools','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('Remove Footer Attribution (copyright)','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-yes"></span><?php esc_html_e('VIP priority Support','cutie-pie'); ?></li>
                                <li><span class="dashicons dashicons-plus"></span><?php esc_html_e('much more stuff...','cutie-pie'); ?></li>
                            </ul>
                        </div>
                        <div class="about-footer-rightside">
                            <div class="about-footer-upgrade">
                                <h3 class="footer-upgrade-title">
                                    <?php esc_html_e('Upgrade to Pro','cutie-pie'); ?>
                                </h3>
                                <div class="footer-upgrade-price">
                                    <sup><?php esc_html_e('$','cutie-pie'); ?></sup>
                                    <span><?php esc_html_e('49','cutie-pie'); ?></span>
                                </div>
                                <div class="footer-upgrade-link">
                                    <a target="_blank" class="button button-primary button-primary-upgrade" href="<?php echo esc_url($pro_theme_url); ?>"><?php esc_html_e('Upgrade to Pro','cutie-pie'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>