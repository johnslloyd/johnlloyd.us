<?php
/**
* Homepage Settings.
*
* @package CutiePie
*/

$cutie_pie_default = cutie_pie_get_default_theme_options();

// Homepage Category section settings.
$wp_customize->add_section( 'homepage_category_Section',
    array(
    'title'      => esc_html__( 'Category Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);

$wp_customize->add_setting('ed_category_section',
    array(
        'default' => $cutie_pie_default['ed_category_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_category_section',
    array(
        'label' => esc_html__('Enable Category Section', 'cutie-pie'),
        'section' => 'homepage_category_Section',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('ed_category_image_overlay',
    array(
        'default' => $cutie_pie_default['ed_category_image_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_category_image_overlay',
    array(
        'label' => esc_html__('Enable Category Image Overlay', 'cutie-pie'),
        'section' => 'homepage_category_Section',
        'type' => 'checkbox',
    )
);


for ( $cutie_pie_j=1; $cutie_pie_j <=  3 ; $cutie_pie_j++ ) {
    $wp_customize->add_setting('select_category_for_cat_list_'. $cutie_pie_j,
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(new Cutie_Pie_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_cat_list_'. $cutie_pie_j,
        array(
            'label'           => esc_html__('Category To List', 'cutie-pie') . ' - ' . $cutie_pie_j ,
            'section'         => 'homepage_category_Section',
            'type'            => 'dropdown-taxonomies',
            'taxonomy'        => 'category',

        )));
}

$wp_customize->add_setting( 'category_title_text_color',
    array(
    'default'           => $cutie_pie_default['category_title_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'category_title_text_color', 
    array(
        'label'      => esc_html__( 'Category Title Text Color', 'cutie-pie' ),
        'section'    => 'homepage_category_Section',
        'settings'   => 'category_title_text_color',
    ) ) 
);

// Homepage Slider section settings.
$wp_customize->add_section( 'homepage_slider_Section',
    array(
    'title'      => esc_html__( 'Slider Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);

$wp_customize->add_setting('ed_slider_section',
    array(
        'default' => $cutie_pie_default['ed_slider_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_slider_section',
    array(
        'label' => esc_html__('Enable Slider Section', 'cutie-pie'),
        'section' => 'homepage_slider_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'number_of_slider',
    array(
        'default'           => $cutie_pie_default['number_of_slider'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_select',
    )
);
$wp_customize->add_control( 'number_of_slider',
    array(
        'label'    => esc_html__( 'Select no of slider', 'cutie-pie' ),
        'description'     => esc_html__( 'Please refresh to get actual no of page field below', 'cutie-pie' ),
        'section'  => 'homepage_slider_Section',
        'choices'               => array(
            '1' => esc_html__( '1', 'cutie-pie' ),
            '2' => esc_html__( '2', 'cutie-pie' ),
            '3' => esc_html__( '3', 'cutie-pie' ),
            '4' => esc_html__( '4', 'cutie-pie' ),
            '5' => esc_html__( '5', 'cutie-pie' ),
            '6' => esc_html__( '6', 'cutie-pie' ),
            ),
        'type'     => 'select',
    )
);

$slider_number = get_theme_mod( 'number_of_slider', $cutie_pie_default['number_of_slider'] );
for ( $cutie_pie_i=1; $cutie_pie_i <=  $slider_number ; $cutie_pie_i++ ) {
    $wp_customize->add_setting( 'select_page_for_slider_'. $cutie_pie_i, array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( 'select_page_for_slider_'. $cutie_pie_i, array(
        'input_attrs'       => array(
            'style'           => 'width: 50px;'
            ),
        'label'             => __( 'Select Slider Page', 'cutie-pie' ) . ' - ' . $cutie_pie_i ,
        'section'           => 'homepage_slider_Section',
        'type'              => 'dropdown-pages',
        'allow_addition' => true,
        )
    );
}

$wp_customize->add_setting('ed_slider_overlay',
    array(
        'default' => $cutie_pie_default['ed_slider_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_slider_overlay',
    array(
        'label' => esc_html__('Enable Slider Overlay', 'cutie-pie'),
        'section' => 'homepage_slider_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_slider_post_excerpt',
    array(
        'default' => $cutie_pie_default['ed_slider_post_excerpt'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_slider_post_excerpt',
    array(
        'label' => esc_html__('Enable Slider Excerpt Content', 'cutie-pie'),
        'section' => 'homepage_slider_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_slider_control_dot',
    array(
        'default' => $cutie_pie_default['ed_slider_control_dot'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_slider_control_dot',
    array(
        'label' => esc_html__('Enable Dots', 'cutie-pie'),
        'section' => 'homepage_slider_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cutie_pie_slider_text_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_slider_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cutie_pie_slider_text_color', 
    array(
        'label'      => esc_html__( 'Slider Text Color', 'cutie-pie' ),
        'section'    => 'homepage_slider_Section',
        'settings'   => 'cutie_pie_slider_text_color',
    ) ) 
);
// Homepage About section settings.
$wp_customize->add_section( 'homepage_about_Section',
    array(
    'title'      => esc_html__( 'About Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);

$wp_customize->add_setting('ed_about_section',
    array(
        'default' => $cutie_pie_default['ed_about_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_about_section',
    array(
        'label' => esc_html__('Enable About Section', 'cutie-pie'),
        'section' => 'homepage_about_Section',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('about_section_title',
    array(
        'default'           => $cutie_pie_default['about_section_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('about_section_title',
    array(
        'label'       => esc_html__('About Section Title', 'cutie-pie'),
        'section'     => 'homepage_about_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting( 'select_page_for_about', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cutie_pie_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'select_page_for_about', array(
    'label'             => __( 'Select About Page', 'cutie-pie' ) ,
    'section'           => 'homepage_about_Section',
    'type'              => 'dropdown-pages',
    'allow_addition' => true,
    )
);

// Homepage testimonail section settings.
$wp_customize->add_section( 'homepage_testimonial_Section',
	array(
	'title'      => esc_html__( 'Testimonial Section Settings', 'cutie-pie' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'homepage_option_panel',
	)
);

$wp_customize->add_setting('ed_testimonial_section',
    array(
        'default' => $cutie_pie_default['ed_testimonial_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_testimonial_section',
    array(
        'label' => esc_html__('Enable Testimonial Section', 'cutie-pie'),
        'section' => 'homepage_testimonial_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('testimonial_bg_image',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'testimonial_bg_image',
        array(
            'label'       => esc_html__('Upload Section Background Image ', 'cutie-pie'),
            'section'     => 'homepage_testimonial_Section',
        )
    )
);

$wp_customize->add_setting('testimonial_section_title',
    array(
        'default'           => $cutie_pie_default['testimonial_section_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('testimonial_section_title',
    array(
        'label'       => esc_html__('Section Title', 'cutie-pie'),
        'section'     => 'homepage_testimonial_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting( 'number_of_testimonial',
    array(
        'default'           => $cutie_pie_default['number_of_testimonial'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_select',
    )
);
$wp_customize->add_control( 'number_of_testimonial',
    array(
        'label'    => esc_html__( 'Select no of slider', 'cutie-pie' ),
        'description'     => esc_html__( 'Please refresh to get actual no of page field below', 'cutie-pie' ),
        'section'  => 'homepage_testimonial_Section',
        'choices'               => array(
            '1' => esc_html__( '1', 'cutie-pie' ),
            '2' => esc_html__( '2', 'cutie-pie' ),
            '3' => esc_html__( '3', 'cutie-pie' ),
            '4' => esc_html__( '4', 'cutie-pie' ),
            '5' => esc_html__( '5', 'cutie-pie' ),
            '6' => esc_html__( '6', 'cutie-pie' ),
            ),
        'type'     => 'select',
    )
);

$testimonial_number = get_theme_mod( 'number_of_testimonial', $cutie_pie_default['number_of_testimonial'] );
for ( $cutie_pie_i=1; $cutie_pie_i <=  $testimonial_number ; $cutie_pie_i++ ) {
    $wp_customize->add_setting( 'select_page_for_testimonial_'. $cutie_pie_i, array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( 'select_page_for_testimonial_'. $cutie_pie_i, array(
        'input_attrs'       => array(
            'style'           => 'width: 50px;'
            ),
        'label'             => __( 'Select Testimonial Page', 'cutie-pie' ) . ' - ' . $cutie_pie_i ,
        'section'           => 'homepage_testimonial_Section',
        'type'              => 'dropdown-pages',
        'allow_addition' => true,
        )
    );
}

$wp_customize->add_setting( 'cutie_pie_testimonial_bg_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_testimonial_bg_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cutie_pie_testimonial_bg_color', 
    array(
        'label'      => esc_html__( 'Testimonial Background Color', 'cutie-pie' ),
        'section'    => 'homepage_testimonial_Section',
        'settings'   => 'cutie_pie_testimonial_bg_color',
    ) ) 
);

// Homepage CTA section settings.
$wp_customize->add_section( 'homepage_cta_Section',
    array(
    'title'      => esc_html__( 'CTA Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);

$wp_customize->add_setting('ed_cta_section',
    array(
        'default' => $cutie_pie_default['ed_cta_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_cta_section',
    array(
        'label' => esc_html__('Enable CTA Section', 'cutie-pie'),
        'section' => 'homepage_cta_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cta_block_layout',
    array(
        'default'           => $cutie_pie_default['cta_block_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_select',
    )
);
$wp_customize->add_control( 'cta_block_layout',
    array(
        'label'    => esc_html__( 'Select CTA Block Layout', 'cutie-pie' ),
        'section'  => 'homepage_cta_Section',
        'choices'               => array(
            'wrapper' => esc_html__( 'Block Layout', 'cutie-pie' ),
            'wrapper-fluid' => esc_html__( 'full-width Layout', 'cutie-pie' ),
            ),
        'type'     => 'select',
    )
);


$wp_customize->add_setting( 'select_page_for_cta', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cutie_pie_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'select_page_for_cta', array(
    'label'             => __( 'Select Call To Action Page', 'cutie-pie' ) ,
    'section'           => 'homepage_cta_Section',
    'type'              => 'dropdown-pages',
    'allow_addition' => true,
    )
);

$wp_customize->add_setting('ed_cta_image_overlay',
    array(
        'default' => $cutie_pie_default['ed_cta_image_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_cta_image_overlay',
    array(
        'label' => esc_html__('Enable Section Overlay', 'cutie-pie'),
        'section' => 'homepage_cta_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_cta_post_excerpt',
    array(
        'default' => $cutie_pie_default['ed_cta_post_excerpt'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_cta_post_excerpt',
    array(
        'label' => esc_html__('Enable CTA Excerpt Content', 'cutie-pie'),
        'section' => 'homepage_cta_Section',
        'type' => 'checkbox',
    )
);

/*Button Text*/
$wp_customize->add_setting('homepage_cta_button_text',
    array(
        'default'           => $cutie_pie_default['homepage_cta_button_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('homepage_cta_button_text',
    array(
        'label'       => esc_html__('Related Post Button Text', 'cutie-pie'),
        'description' => esc_html__('Removing text will disable read more on the related post', 'cutie-pie'),
        'section'     => 'homepage_cta_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('homepage_cta_button_text_url',
    array(
        'default'           => $cutie_pie_default['homepage_cta_button_text_url'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('homepage_cta_button_text_url',
    array(
        'label'       => esc_html__('Related Post Button URL', 'cutie-pie'),
        'section'     => 'homepage_cta_Section',
        'type'        => 'text',
    )
);
$wp_customize->add_setting('cta_link_tab',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);

$wp_customize->add_control('cta_link_tab',
    array(
        'label' => esc_html__('Open Link In New Tab', 'cutie-pie'),
        'section' => 'homepage_cta_Section',
        'type' => 'checkbox',
    )
 );

$wp_customize->add_setting( 'homepage_cta_text_color',
    array(
    'default'           => $cutie_pie_default['homepage_cta_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'homepage_cta_text_color', 
    array(
        'label'      => esc_html__( 'Section Text Color', 'cutie-pie' ),
        'section'    => 'homepage_cta_Section',
        'settings'   => 'homepage_cta_text_color',
    ) ) 
);

// Homepage Portfolio section settings.
$wp_customize->add_section( 'homepage_portfolio_Section',
    array(
    'title'      => esc_html__( 'Portfolio Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);

$wp_customize->add_setting('ed_portfolio_section',
    array(
        'default' => $cutie_pie_default['ed_portfolio_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_portfolio_section',
    array(
        'label' => esc_html__('Enable Portfolio Section', 'cutie-pie'),
        'section' => 'homepage_portfolio_Section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('portfolio_section_title',
    array(
        'default'           => $cutie_pie_default['portfolio_section_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('portfolio_section_title',
    array(
        'label'       => esc_html__('Section Title', 'cutie-pie'),
        'section'     => 'homepage_portfolio_Section',
        'type'        => 'text',
    )
);


$wp_customize->add_setting('portfolio_section_sub_title',
    array(
        'default'           => $cutie_pie_default['portfolio_section_sub_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('portfolio_section_sub_title',
    array(
        'label'       => esc_html__('Section Sub Title', 'cutie-pie'),
        'section'     => 'homepage_portfolio_Section',
        'type'        => 'text',
    )
);

// Setting - drop down category for service.
$wp_customize->add_setting('select_category_for_portfolio',
    array(
        'default'           => $cutie_pie_default['select_category_for_portfolio'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Cutie_Pie_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_portfolio',
    array(
        'label'           => esc_html__('Select Category for Portfolio', 'cutie-pie'),
        'section'         => 'homepage_portfolio_Section',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',

    )));

$wp_customize->add_section( 'homepage_footer_recomend_section',
    array(
    'title'      => esc_html__( 'Footer  Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);
// Setting - enable_footer_related_post.
$wp_customize->add_setting('enable_footer_related_post',
    array(
        'default'           => $cutie_pie_default['enable_footer_related_post'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_footer_related_post',
    array(
        'label'    => esc_html__('Enable Footer Related Post', 'cutie-pie'),
        'section'  => 'homepage_footer_recomend_section',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting('footer_related_post_title',
    array(
        'default'           => $cutie_pie_default['footer_related_post_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('footer_related_post_title',
    array(
        'label'       => esc_html__('Related Post Section Title', 'cutie-pie'),
        'section'     => 'homepage_footer_recomend_section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('footer_related_post_sub_title',
    array(
        'default'           => $cutie_pie_default['footer_related_post_sub_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('footer_related_post_sub_title',
    array(
        'label'       => esc_html__('Related Post Sub Title', 'cutie-pie'),
        'section'     => 'homepage_footer_recomend_section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('number_of_footer_related_post',
    array(
        'default'           => $cutie_pie_default['number_of_footer_related_post'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_select',
    )
);
$wp_customize->add_control('number_of_footer_related_post',
    array(
        'label'       => esc_html__('Select no of post', 'cutie-pie'),
        'section'     => 'homepage_footer_recomend_section',
        'choices'     => array(
            '1'          => esc_html__('1', 'cutie-pie'),
            '2'          => esc_html__('2', 'cutie-pie'),
            '3'          => esc_html__('3', 'cutie-pie'),
            '4'          => esc_html__('4', 'cutie-pie'),
            '5'          => esc_html__('5', 'cutie-pie'),
            '6'          => esc_html__('6', 'cutie-pie'),
            '7'          => esc_html__('7', 'cutie-pie'),
            '8'          => esc_html__('8', 'cutie-pie'),
            '9'          => esc_html__('9', 'cutie-pie'),
        ),
        'type'     => 'select',
    )
);


// Setting - drop down category for footer related post.
$wp_customize->add_setting('select_category_for_related_post',
    array(
        'default'           => $cutie_pie_default['select_category_for_related_post'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Cutie_Pie_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_related_post',
    array(
        'label'           => esc_html__('Category for related post', 'cutie-pie'),
        'section'         => 'homepage_footer_recomend_section',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',

    )));

/*Button Text*/
$wp_customize->add_setting('footer_related_post_button',
    array(
        'default'           => $cutie_pie_default['footer_related_post_button'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('footer_related_post_button',
    array(
        'label'       => esc_html__('Related Post Button Text', 'cutie-pie'),
        'description' => esc_html__('Removing text will disable read more on the related post', 'cutie-pie'),
        'section'     => 'homepage_footer_recomend_section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('footer_related_post_button_url',
    array(
        'default'           => $cutie_pie_default['footer_related_post_button_url'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('footer_related_post_button_url',
    array(
        'label'       => esc_html__('Related Post Button URL', 'cutie-pie'),
        'section'     => 'homepage_footer_recomend_section',
        'type'        => 'text',
    )
);



// Homepage Contact section settings.
$wp_customize->add_section( 'homepage_contact_Section',
    array(
    'title'      => esc_html__( 'Contact Section Settings', 'cutie-pie' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'homepage_option_panel',
    )
);

$wp_customize->add_setting('ed_contact_section',
    array(
        'default' => $cutie_pie_default['ed_contact_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_contact_section',
    array(
        'label' => esc_html__('Enable Contact Section', 'cutie-pie'),
        'section' => 'homepage_contact_Section',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('contact_section_title',
    array(
        'default'           => $cutie_pie_default['contact_section_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('contact_section_title',
    array(
        'label'       => esc_html__('Section Title', 'cutie-pie'),
        'section'     => 'homepage_contact_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('contact_section_location',
    array(
        'default'           => $cutie_pie_default['contact_section_location'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('contact_section_location',
    array(
        'label'       => esc_html__('Contact Location', 'cutie-pie'),
        'section'     => 'homepage_contact_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('contact_section_email',
    array(
        'default'           => $cutie_pie_default['contact_section_email'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('contact_section_email',
    array(
        'label'       => esc_html__('Contact Email', 'cutie-pie'),
        'section'     => 'homepage_contact_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('contact_section_number',
    array(
        'default'           => $cutie_pie_default['contact_section_number'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('contact_section_number',
    array(
        'label'       => esc_html__('Contact Number', 'cutie-pie'),
        'section'     => 'homepage_contact_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('contact_section_bg_image',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cutie_pie_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'contact_section_bg_image',
        array(
            'label'       => esc_html__('Upload Section Background Image ', 'cutie-pie'),
            'section'     => 'homepage_contact_Section',
        )
    )
);

$wp_customize->add_setting('contact_form_shortcode',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('contact_form_shortcode',
    array(
        'label' => esc_html__('Contact Form Shortcode', 'cutie-pie'),
        'section' => 'homepage_contact_Section',
        'type' => 'textarea',
    )
);


$wp_customize->add_setting( 'cutie_pie_contact_text_color',
    array(
    'default'           => $cutie_pie_default['cutie_pie_contact_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'cutie_pie_contact_text_color', 
    array(
        'label'      => esc_html__( 'Section Text Color', 'cutie-pie' ),
        'section'    => 'homepage_contact_Section',
        'settings'   => 'cutie_pie_contact_text_color',
    ) ) 
);
