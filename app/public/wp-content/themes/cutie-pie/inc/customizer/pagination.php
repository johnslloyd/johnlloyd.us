<?php
/**
 * Pagination Settings
 *
 * @package CutiePie
 */

$cutie_pie_default = cutie_pie_get_default_theme_options();


// Pre Loader Section.
$wp_customize->add_section( 'cutie_pie_preloader_section',
	array(
	'title'      => esc_html__( 'Pre-Loader Settings', 'cutie-pie' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);

// Pre Loader Layout Settings

$wp_customize->add_setting('ed_preloader',
    array(
        'default' => $cutie_pie_default['ed_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_preloader',
    array(
        'label' => esc_html__('Enable Pre-Loader', 'cutie-pie'),
        'section' => 'cutie_pie_preloader_section',
        'type' => 'checkbox',
    )
);

// Pagination Section.
$wp_customize->add_section( 'cutie_pie_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'cutie-pie' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'cutie_pie_pagination_layout',
	array(
	'default'           => $cutie_pie_default['cutie_pie_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'cutie_pie_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'cutie-pie' ),
	'section'     => 'cutie_pie_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','cutie-pie'),
		'numeric' => esc_html__('Numeric Method','cutie-pie'),
		'load-more' => esc_html__('Ajax Load More Button','cutie-pie'),
		'auto-load' => esc_html__('Ajax Auto Load','cutie-pie'),
	),
	)
);