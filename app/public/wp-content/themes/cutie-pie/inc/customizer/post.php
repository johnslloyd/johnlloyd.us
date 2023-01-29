<?php
/**
* Posts Settings.
*
* @package CutiePie
*/

$cutie_pie_default = cutie_pie_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Post Archive Settings', 'cutie-pie' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_post_author',
    array(
        'default' => $cutie_pie_default['ed_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'cutie-pie'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_date',
    array(
        'default' => $cutie_pie_default['ed_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'cutie-pie'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_category',
    array(
        'default' => $cutie_pie_default['ed_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'cutie-pie'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_tags',
    array(
        'default' => $cutie_pie_default['ed_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'cutie-pie'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('ed_post_excerpt',
    array(
        'default' => $cutie_pie_default['ed_post_excerpt'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_excerpt',
    array(
        'label' => esc_html__('Enable Posts Excerpt', 'cutie-pie'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);