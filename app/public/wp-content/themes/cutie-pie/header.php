<?php
/**
 * Header file for the CutiePie WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CutiePie
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
} ?>

<?php 
$cutie_pie_default = cutie_pie_get_default_theme_options();
$ed_preloader = get_theme_mod('ed_preloader', $cutie_pie_default['ed_preloader']);
if ($ed_preloader) { ?>
    <div class="preloader">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="inner">
            <figure class="animateFadeInUp">
                <div class="load-spinner"></div>
            </figure>
        </div>
    </div>

    <div class="transition-overlay">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
    </div>
<?php } ?>


<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#site-contentarea"><?php esc_html_e('Skip to the content', 'cutie-pie'); ?></a>
    <div class="theme-page-wrapper">
        <div class="theme-page-layout">


            <?php get_template_part('template-parts/header/header', 'content'); ?>


            <div id="content" class="site-content">
                <div class="site-content-wrapper">
                    <div id="theme-primary">

                <?php if (is_front_page()) { ?>
                    <?php cutie_pie_header_image_section(); ?>
                <?php } ?>


                <?php
                $cutie_pie_default = cutie_pie_get_default_theme_options();
                $cutie_pie_single_post_layout = get_theme_mod('cutie_pie_single_post_layout', $cutie_pie_default['cutie_pie_single_post_layout']);
                if (is_page()) {
                    $cutie_pie_single_post_layout = get_post_meta(get_the_ID(), 'cutie_pie_page_layout', true);
                } else {
                    $cutie_pie_single_post_layout = get_post_meta(get_the_ID(), 'cutie_pie_post_layout', true);

                }

                if (!is_front_page() && ($cutie_pie_single_post_layout != 'layout-2') && (!is_page())) { ?>
                    <div class="theme-block-header">
                        <div class="wrapper">
                            <?php cutie_pie_archive_title();
                            cutie_pie_breadcrumb();
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if (is_single() || is_page()) {
                ?>
                <?php if ($cutie_pie_single_post_layout == 'layout-2') { ?>
                <div class="single-featured-banner">
                    <?php

                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                    ?>
                    <div class="single-featured-background data-bg" data-background="<?php echo esc_url($featured_image); ?>">
                        <div class="data-bg-overlay"></div>
                        <div class="wrapper">
                            <div class="column-row">
                                <div class="column column-11">
                                    <div class="featured-banner-content">
                                        <?php if (!is_page()) {
                                            cutie_pie_breadcrumb(); ?>
                                            <div class="entry-meta theme-meta-categories">
                                                <?php cutie_pie_entry_footer($cats = true, $tags = false, $edits = false); ?>
                                            </div>
                                        <?php } ?>
                                        <header class="entry-header">
                                            <h1 class="entry-title entry-title-large">
                                                <?php the_title(); ?>
                                            </h1>
                                        </header>
                                        <?php if (!is_page()) { ?>
                                            <div class="entry-meta">
                                                <?php global $post;
                                                $author_id = $post->post_author; ?>
                                                <div class="entry-meta-item entry-meta-author">
                                                    <div class="entry-meta-wrapper">
                                                <span class="entry-meta-icon author-icon"> 
                                                <?php cutie_pie_the_theme_svg('user'); ?>
                                                </span>
                                                        <?php $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author_meta('nicename', $author_id)) . '</a></span>'; ?>
                                                        <span class="byline"> <?php echo wp_kses_post($byline); ?></span>
                                                    </div>
                                                </div>
                                                <?php
                                                cutie_pie_posted_on();
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ('post' === get_post_type() && class_exists('Booster_Extension_Class') && (empty($cutie_pie_ed_post_views) || empty($cutie_pie_ed_post_read_time))) { ?>

                        <div class="theme-page-vitals">

                            <?php
                            if (empty($cutie_pie_ed_post_read_time)) {
                                echo do_shortcode('[booster-extension-read-time]');
                            } ?>

                            <?php
                            if (empty($cutie_pie_ed_post_views)) {
                                echo do_shortcode('[booster-extension-visit-count container="true"]');
                            } ?>

                        </div>

                    <?php } ?>
                </div>
<?php }
}