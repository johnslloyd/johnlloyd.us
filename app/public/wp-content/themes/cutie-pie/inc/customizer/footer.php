<?php
/**
* Footer Settings.
*
* @package CutiePie
*/

$cutie_pie_default = cutie_pie_get_default_theme_options();

$wp_customize->add_section( 'footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'cutie-pie' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $cutie_pie_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cutie_pie_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Top Footer Column Layout', 'cutie-pie' ),
	'section'     => 'footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'cutie-pie' ),
		'2' => esc_html__( 'Two Column', 'cutie-pie' ),
		'3' => esc_html__( 'Three Column', 'cutie-pie' ),
	    ),
	)
);


$wp_customize->add_setting('footer_logo_upload',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'footer_logo_upload',
        array(
            'label'       => esc_html__('Upload Footer Logo ', 'cutie-pie'),
            'section'     => 'footer_widget_area',
        )
    )
);

$wp_customize->add_setting('ed_footer_social_nav',
    array(
        'default' => $cutie_pie_default['ed_footer_social_nav'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_footer_social_nav',
    array(
        'label' => esc_html__('Enable Footer Social Nav', 'cutie-pie'),
        'section' => 'footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $cutie_pie_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'cutie-pie' ),
	'section'  => 'footer_widget_area',
	'type'     => 'text',
	)
);
