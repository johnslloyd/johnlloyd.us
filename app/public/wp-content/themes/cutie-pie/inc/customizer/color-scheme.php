<?php
/**
* Color Settings.
*
* @package CutiePie
*/

$cutie_pie_default = cutie_pie_get_default_theme_options();

$wp_customize->add_section( 'color_scheme',
    array(
    'title'      => esc_html__( 'Color Scheme', 'cutie-pie' ),
    'priority'   => 60,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_colors_panel',
    )
);

// Color Scheme.
$wp_customize->add_setting(
    'cutie_pie_color_schema',
    array(
        'default' 			=> $cutie_pie_default['cutie_pie_color_schema'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_select'
    )
);
$wp_customize->add_control(
    new Cutie_Pie_Custom_Radio_Color_Schema( 
        $wp_customize,
        'cutie_pie_color_schema',
        array(
            'settings'      => 'cutie_pie_color_schema',
            'section'       => 'color_scheme',
            'label'         => esc_html__( 'Color Scheme', 'cutie-pie' ),
            'choices'       => array(
                'default'  => array(
                	'color' => array('#ffffff','#000','#FF4B2B','#000'),
                	'title' => esc_html__('Default','cutie-pie'),
                ),
                'fancy'  => array(
                	'color' => array('#faf7f2','#017eff','#fc9285','#455d58'),
                	'title' => esc_html__('Fancy','cutie-pie'),
                ),
                'dark'  => array(
                    'color' => array('#222222','#007CED','#fb7268','#ffffff'),
                    'title' => esc_html__('Dark','cutie-pie'),
                ),
            )
        )
    )
);

$wp_customize->add_setting( 'cutie_pie_primary_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_primary_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cutie_pie_primary_color', 
    array(
        'label'      => esc_html__( 'Primary Color', 'cutie-pie' ),
        'section'    => 'colors',
        'settings'   => 'cutie_pie_primary_color',
    ) ) 
);

$wp_customize->add_setting( 'cutie_pie_secondary_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_secondary_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cutie_pie_secondary_color', 
    array(
        'label'      => esc_html__( 'Secondary Color', 'cutie-pie' ),
        'section'    => 'colors',
        'settings'   => 'cutie_pie_secondary_color',
    ) ) 
);

$wp_customize->add_setting( 'cutie_pie_general_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_general_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cutie_pie_general_color', 
    array(
        'label'      => esc_html__( 'General Color', 'cutie-pie' ),
        'section'    => 'colors',
        'settings'   => 'cutie_pie_general_color',
    ) ) 
);

$wp_customize->add_setting(
    'cutie_pie_premium_notiece_color_schema',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Cutie_Pie_Premium_Notiece_Control( 
        $wp_customize,
        'cutie_pie_premium_notiece_color_schema',
        array(
            'label'      => esc_html__( 'Color Schemes', 'cutie-pie' ),
            'settings' => 'cutie_pie_premium_notiece_color_schema',
            'section'       => 'color_scheme',
        )
    )
);


$wp_customize->add_setting(
    'cutie_pie_premium_notiece_color',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Cutie_Pie_Premium_Notiece_Control( 
        $wp_customize,
        'cutie_pie_premium_notiece_color',
        array(
            'label'      => esc_html__( 'Color Options', 'cutie-pie' ),
            'settings' => 'cutie_pie_premium_notiece_color',
            'section'       => 'colors',
        )
    )
);