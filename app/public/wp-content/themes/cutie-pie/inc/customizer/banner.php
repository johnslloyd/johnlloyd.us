<?php
/**
* Header banner
*
* @package CutiePie
*/
$cutie_pie_defaults = cutie_pie_get_default_theme_options();

$wp_customize->add_setting( 'ed_header_banner',
    array(
    'default'           => $cutie_pie_default['ed_header_banner'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'ed_header_banner',
    array(
    'label'       => esc_html__( 'Enable Banner', 'cutie-pie' ),
    'section'     => 'header_image',
    'type'        => 'checkbox',
    'priority'   => 0,
    )
);


$wp_customize->add_setting('ed_header_banner_overlay',
    array(
        'default' => $cutie_pie_default['ed_header_banner_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_banner_overlay',
    array(
        'label' => esc_html__('Enable Dark Overlay', 'cutie-pie'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting( 'header_banner_title',
    array(
    'default'           => $cutie_pie_default['header_banner_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'header_banner_title',
    array(
    'label'       => esc_html__( 'Banner Title', 'cutie-pie' ),
    'section'     => 'header_image',
    'type'        => 'text',
    )
);

$wp_customize->add_setting( 'header_banner_sub_title',
    array(
    'default'           => $cutie_pie_default['header_banner_sub_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'header_banner_sub_title',
    array(
    'label'       => esc_html__( 'Banner Sub Title', 'cutie-pie' ),
    'section'     => 'header_image',
    'type'        => 'text',
    )
);

$wp_customize->add_setting( 'header_banner_description',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'header_banner_description',
    array(
    'label'       => esc_html__( 'Banner Description', 'cutie-pie' ),
    'section'     => 'header_image',
    'type'        => 'textarea',
    )
);

$wp_customize->add_setting( 'header_banner_button_label',
    array(
    'default'           => $cutie_pie_default['header_banner_button_label'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'header_banner_button_label',
    array(
    'label'       => esc_html__( 'Banner Button Text', 'cutie-pie' ),
    'section'     => 'header_image',
    'type'        => 'text',
    )
);

$wp_customize->add_setting( 'header_banner_button_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'header_banner_button_link',
    array(
    'label'       => esc_html__( 'Banner Button Link', 'cutie-pie' ),
    'section'     => 'header_image',
    'type'        => 'text',
    )
);

$wp_customize->add_setting('ed_open_link_new_tab',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_open_link_new_tab',
    array(
        'label' => esc_html__('Open In New Tab', 'cutie-pie'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
 );

$wp_customize->add_setting( 'cutie_pie_header_text_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_header_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cutie_pie_header_text_color', 
    array(
        'label'      => esc_html__( 'Text Color', 'cutie-pie' ),
        'section'    => 'header_image',
        'settings'   => 'cutie_pie_header_text_color',
    ) ) 
);
