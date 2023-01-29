<?php
/**
* Single Post Options.
*
* @package CutiePie
*/

$cutie_pie_default = cutie_pie_get_default_theme_options();

$wp_customize->add_section( 'single_post_setting',
	array(
	'title'      => esc_html__( 'Single Post Settings', 'cutie-pie' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


$wp_customize->add_setting(
    'cutie_pie_single_post_layout',
    array(
        'default'           => $cutie_pie_default['cutie_pie_single_post_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_single_post_layout'
    )
);
$wp_customize->add_control(
    new Cutie_Pie_Custom_Radio_Image_Control(
        $wp_customize,
        'cutie_pie_single_post_layout',
        array(
            'settings'      => 'cutie_pie_single_post_layout',
            'section'       => 'single_post_setting',
            'label'         => esc_html__( 'Appearance Layout', 'cutie-pie' ),
            'choices'       => array(
                'layout-1'  => get_template_directory_uri() . '/assets/images/single-layout-style-1.png',
                'layout-2'  => get_template_directory_uri() . '/assets/images/single-layout-style-2.png',
            )
        )
    )
);

$wp_customize->add_setting('ed_related_post',
    array(
        'default' => $cutie_pie_default['ed_related_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_related_post',
    array(
        'label' => esc_html__('Enable Related Posts', 'cutie-pie'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'related_post_title',
    array(
    'default'           => $cutie_pie_default['related_post_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'related_post_title',
    array(
    'label'    => esc_html__( 'Related Posts Section Title', 'cutie-pie' ),
    'section'  => 'single_post_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('twp_navigation_type',
    array(
        'default' => $cutie_pie_default['twp_navigation_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_single_pagination_layout',
    )
);
$wp_customize->add_control('twp_navigation_type',
    array(
        'label' => esc_html__('Single Post Navigation Type', 'cutie-pie'),
        'section' => 'single_post_setting',
        'type' => 'select',
        'choices' => array(
                'no-navigation' => esc_html__('Disable Navigation','cutie-pie' ),
                'norma-navigation' => esc_html__('Next Previous Navigation','cutie-pie' ),
                'ajax-next-post-load' => esc_html__('Ajax Load Next 3 Posts Contents','cutie-pie' )
            ),
    )
);