<?php
/**
 * CutiePie Dynamic Styles
 *
 * @package CutiePie
 */

function cutie_pie_dynamic_css()
{

    $cutie_pie_default = cutie_pie_get_default_theme_options();
    $background_color = get_theme_mod('background_color', $cutie_pie_default['background_color']);

    $background_color = '#' . str_replace("#", "", $background_color);

    $cutie_pie_header_text_color = get_theme_mod('cutie_pie_header_text_color', $cutie_pie_default['cutie_pie_header_text_color']);

    $cutie_pie_slider_text_color = get_theme_mod('cutie_pie_slider_text_color', $cutie_pie_default['cutie_pie_slider_text_color']);
    
    $cutie_pie_testimonial_bg_color = get_theme_mod('cutie_pie_testimonial_bg_color', $cutie_pie_default['cutie_pie_testimonial_bg_color']);
    $logo_width_range = get_theme_mod('logo_width_range', $cutie_pie_default['logo_width_range']);

    $homepage_cta_text_color = get_theme_mod('homepage_cta_text_color', $cutie_pie_default['homepage_cta_text_color']);
    $category_title_text_color = get_theme_mod('category_title_text_color', $cutie_pie_default['category_title_text_color']);

    $cutie_pie_primary_color = get_theme_mod('cutie_pie_primary_color', $cutie_pie_default['cutie_pie_primary_color']);
    $cutie_pie_secondary_color = get_theme_mod('cutie_pie_secondary_color', $cutie_pie_default['cutie_pie_secondary_color']);
    $cutie_pie_general_color = get_theme_mod('cutie_pie_general_color', $cutie_pie_default['cutie_pie_general_color']);

    $cutie_pie_contact_text_color = get_theme_mod('cutie_pie_contact_text_color', $cutie_pie_default['cutie_pie_contact_text_color']);

    echo "<style type='text/css' media='all'>"; ?>

    .site-logo .custom-logo{
    max-width:  <?php echo esc_attr($logo_width_range); ?>px;
    }

    body.theme-color-schema,
    .theme-preloader,
    .floating-post-navigation .floating-navigation-label,
    .offcanvas-wraper{
    background-color: <?php echo esc_attr($background_color); ?>;
    }
    body.theme-color-schema,
    body, input, select, optgroup, textarea,
    .floating-post-navigation .floating-navigation-label,
    .offcanvas-wraper{
    color: <?php echo esc_attr($cutie_pie_general_color); ?>;
    }

    .theme-preloader .loader-circles span{
    background: <?php echo esc_attr($cutie_pie_general_color); ?>;
    }

    .theme-main-banner{
    color: <?php echo esc_attr($cutie_pie_header_text_color); ?>;
    }

    .theme-main-banner .theme-button{
    color: <?php echo esc_attr($cutie_pie_header_text_color); ?>;
    }

    .theme-block-sliders,
    .theme-block-sliders .theme-block-title a:not(:hover):not(:focus){
    color: <?php echo esc_attr($cutie_pie_slider_text_color); ?>;
    }

    .categories-panel .theme-block-title{
    color: <?php echo esc_attr($category_title_text_color); ?>;
    }

    .theme-block-cta .cta-panel{
    color: <?php echo esc_attr($homepage_cta_text_color); ?>;
    }

    a{
    color: <?php echo esc_attr($cutie_pie_primary_color); ?>;
    }

    body .entry-thumbnail .trend-item,
    body .category-widget-header .post-count,
    body .theme-meta-categories a:hover,
    body .theme-meta-categories a:focus{
    background: <?php echo esc_attr($cutie_pie_secondary_color); ?>;
    }

    body a:hover,
    body a:focus,
    body .footer-credits a:hover,
    body .footer-credits a:focus,
    body .widget a:hover,
    body .widget a:focus {
    color: <?php echo esc_attr($cutie_pie_secondary_color); ?>;
    }
    body input[type="text"]:hover,
    body input[type="text"]:focus,
    body input[type="password"]:hover,
    body input[type="password"]:focus,
    body input[type="email"]:hover,
    body input[type="email"]:focus,
    body input[type="url"]:hover,
    body input[type="url"]:focus,
    body input[type="date"]:hover,
    body input[type="date"]:focus,
    body input[type="month"]:hover,
    body input[type="month"]:focus,
    body input[type="time"]:hover,
    body input[type="time"]:focus,
    body input[type="datetime"]:hover,
    body input[type="datetime"]:focus,
    body input[type="datetime-local"]:hover,
    body input[type="datetime-local"]:focus,
    body input[type="week"]:hover,
    body input[type="week"]:focus,
    body input[type="number"]:hover,
    body input[type="number"]:focus,
    body input[type="search"]:hover,
    body input[type="search"]:focus,
    body input[type="tel"]:hover,
    body input[type="tel"]:focus,
    body input[type="color"]:hover,
    body input[type="color"]:focus,
    body textarea:hover,
    body textarea:focus,
    button:focus,
    body .button:focus,
    body .wp-block-button__link:focus,
    body .wp-block-file__button:focus,
    body input[type="button"]:focus,
    body input[type="reset"]:focus,
    body input[type="submit"]:focus,
    body .theme-meta-categories a:hover,
    body .theme-meta-categories a:focus{
    border-color:  <?php echo esc_attr($cutie_pie_secondary_color); ?>;
    }
    body .theme-page-vitals:after {
    border-right-color:  <?php echo esc_attr($cutie_pie_secondary_color); ?>;
    }
    body a:focus,
    body .theme-action-control:focus > .action-control-trigger,
    body .submenu-toggle:focus > .btn__content{
    outline-color:  <?php echo esc_attr($cutie_pie_secondary_color); ?>;
    }

    .theme-block-testimonials{
        background-color: <?php echo esc_attr($cutie_pie_testimonial_bg_color); ?>;
    }

    .theme-block-contact .theme-section-heading,
    .theme-block-contact .theme-contact-list,
    .theme-block-contact .theme-contact-list a:not(:hover):not(:focus){
        color: <?php echo esc_attr($cutie_pie_contact_text_color); ?>;
    }
    <?php echo "</style>";
}

add_action('wp_head', 'cutie_pie_dynamic_css', 100);

/**
 * Sanitizing Hex color function.
 */
function cutie_pie_sanitize_hex_color($color)
{

    if ('' === $color)
        return '';
    if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color))
        return $color;

}