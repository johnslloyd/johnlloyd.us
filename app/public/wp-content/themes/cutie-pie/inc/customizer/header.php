<?php
/**
* Header Options.
*
* @package CutiePie
*/

$cutie_pie_default = cutie_pie_get_default_theme_options();

// Header Advertise Area Section.
$wp_customize->add_section( 'main_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'cutie-pie' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Enable Disable Search.
$wp_customize->add_setting('ed_header_search',
    array(
        'default' => $cutie_pie_default['ed_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search',
    array(
        'label' => esc_html__('Enable Search', 'cutie-pie'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);
