<?php
/**
 * Default Values.
 *
 * @package CutiePie
 */

if ( ! function_exists( 'cutie_pie_get_default_theme_options' ) ) :

    /**
     * Get default theme options
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function cutie_pie_get_default_theme_options() {

        $cutie_pie_defaults = array();
        // header banner
        $cutie_pie_defaults['logo_width_range']                      = 200;
        $cutie_pie_defaults['ed_preloader']                         = 0;
        $cutie_pie_defaults['ed_header_banner']                      = 1;
        $cutie_pie_defaults['ed_header_banner_overlay']              = 0;
        $cutie_pie_defaults['header_banner_title']                   = esc_html__( 'Hello World', 'cutie-pie' );
        $cutie_pie_defaults['header_banner_sub_title']               = esc_html__( 'This is sub-title', 'cutie-pie' );
        $cutie_pie_defaults['header_banner_description']             = '';
        $cutie_pie_defaults['header_banner_button_label']            = esc_html__( 'Get Started', 'cutie-pie' );
        $cutie_pie_defaults['header_banner_button_link']             = '';
        $cutie_pie_defaults['ed_open_link_new_tab']                  = 1;
        $cutie_pie_defaults['cutie_pie_header_text_color']           = '#ffffff';

        // homepage cta
        $cutie_pie_defaults['ed_cta_section']                        = 0;
        $cutie_pie_defaults['cta_block_layout']                      = 'wrapper-fluid';
        $cutie_pie_defaults['ed_cta_image_overlay']                  = 0;
        $cutie_pie_defaults['ed_cta_post_excerpt']                   = 0;
        $cutie_pie_defaults['cta_link_tab']                          = 0;
        $cutie_pie_defaults['homepage_cta_button_text']              =  esc_html__( 'View More', 'cutie-pie' );
        $cutie_pie_defaults['homepage_cta_button_text_url']          = '';
        $cutie_pie_defaults['homepage_cta_text_color']               = '#000000';
        $cutie_pie_defaults['ed_category_image_overlay']             = 0;

        // homepage about
        $cutie_pie_defaults['ed_about_section']                      = 1;
        $cutie_pie_defaults['about_section_title']                   =  esc_html__( 'About', 'cutie-pie' );

        // homepage slider
        $cutie_pie_defaults['ed_slider_section']                     = 0;
        $cutie_pie_defaults['number_of_slider']                      = 3;
        $cutie_pie_defaults['ed_slider_overlay']                     = 1;
        $cutie_pie_defaults['ed_slider_post_excerpt']                = 1;
        $cutie_pie_defaults['ed_slider_control_dot']                 = 1;
        $cutie_pie_defaults['cutie_pie_slider_text_color']             = '#fff';

        // homepage category
        $cutie_pie_defaults['ed_category_section']                   = 0;
        $cutie_pie_defaults['category_title_text_color']             = '#000000';

        // homepage service
        $cutie_pie_defaults['ed_portfolio_section']                  = 0;
        $cutie_pie_defaults['select_category_for_portfolio']         = '';
        $cutie_pie_defaults['portfolio_section_title']               = esc_html__( 'Portfolio', 'cutie-pie' );
        $cutie_pie_defaults['portfolio_section_sub_title']           = esc_html__( 'Portfolio Description', 'cutie-pie' );

        // homepage testimonial
        $cutie_pie_defaults['ed_testimonial_section']                = 0;
        $cutie_pie_defaults['number_of_testimonial']                 = 3;
        $cutie_pie_defaults['testimonial_section_title']             = esc_html__( 'Customer Testimonials', 'cutie-pie' );
        $cutie_pie_defaults['cutie_pie_testimonial_bg_color']          = '#fff';


        // homepage contact 
        $cutie_pie_defaults['ed_contact_section']                    = 0;
        $cutie_pie_defaults['contact_section_title']                 = esc_html__( 'Contact US', 'cutie-pie' );
        $cutie_pie_defaults['contact_section_location']              = '';
        $cutie_pie_defaults['contact_section_email']                 = '';
        $cutie_pie_defaults['contact_section_number']                = '';
        $cutie_pie_defaults['cutie_pie_contact_text_color']           = '#000000';

        // Options.
        $cutie_pie_defaults['cutie_pie_pagination_layout']             = 'numeric';
        $cutie_pie_defaults['footer_column_layout']                  = 3;
        $cutie_pie_defaults['footer_copyright_text']                 = esc_html__( 'All rights reserved.', 'cutie-pie' );
        $cutie_pie_defaults['ed_header_search']                      = 1;
        $cutie_pie_defaults['ed_image_content_inverse']              = 0;
        $cutie_pie_defaults['cutie_pie_single_post_layout']            = 'layout-1';
        $cutie_pie_defaults['ed_related_post']                       = 1;
        $cutie_pie_defaults['related_post_title']                    = esc_html__('Related Post','cutie-pie');
        $cutie_pie_defaults['twp_navigation_type']                   = 'norma-navigation';
        $cutie_pie_defaults['ed_post_author']                        = 1;
        $cutie_pie_defaults['ed_post_date']                          = 1;
        $cutie_pie_defaults['ed_post_category']                      = 1;
        $cutie_pie_defaults['ed_post_tags']                          = 1;
        $cutie_pie_defaults['ed_footer_copyright']                   = 1;
        $cutie_pie_defaults['ed_footer_social_nav']                  = 1;

        // Default Color
        $cutie_pie_defaults['background_color']                      = 'ffffff';
        $cutie_pie_defaults['cutie_pie_primary_color']                 = '#000000';
        $cutie_pie_defaults['cutie_pie_secondary_color']               = '#FF4B2B';
        $cutie_pie_defaults['cutie_pie_general_color']                 = '#000000';

        // Simple Color
        $cutie_pie_defaults['cutie_pie_primary_color_dark']            = '#007CED';
        $cutie_pie_defaults['cutie_pie_secondary_color_dark']          = '#fb7268';
        $cutie_pie_defaults['cutie_pie_general_color_dark']            = '#ffffff';

        // Fancy Color
        $cutie_pie_defaults['cutie_pie_primary_color_fancy']          = '#017eff';
        $cutie_pie_defaults['cutie_pie_secondary_color_fancy']        = '#fc9285';
        $cutie_pie_defaults['cutie_pie_general_color_fancy']          = '#455d58';

        $cutie_pie_defaults['ed_open_link_new_tab']                 = 0;
        $cutie_pie_defaults['cutie_pie_color_schema']                 = 'default';
        $cutie_pie_defaults['ed_post_excerpt']                      = 0;

        // footer related post
        $cutie_pie_defaults['enable_footer_related_post']             = 0;
        $cutie_pie_defaults['footer_related_post_title']              = esc_html__('You May Like','cutie-pie');
        $cutie_pie_defaults['footer_related_post_sub_title']          = esc_html__('This is sub-title','cutie-pie');
        $cutie_pie_defaults['number_of_footer_related_post']          = 8;
        $cutie_pie_defaults['select_category_for_related_post']       = 0;
        $cutie_pie_defaults['footer_related_post_button']             = esc_html__('View Blog','cutie-pie');
        $cutie_pie_defaults['footer_related_post_button_url']         = '';

        $cutie_pie_defaults['home_section_arrange_vals_1']            =  'homepage_about_Section,homepage_slider_Section,homepage_category_Section,homepage_portfolio_Section,homepage_cta_Section,homepage_testimonial_Section,static_front_page,homepage_footer_recomend_section,homepage_contact_Section';

        // Pass through filter.
        $cutie_pie_defaults = apply_filters( 'cutie_pie_filter_default_theme_options', $cutie_pie_defaults );

        return $cutie_pie_defaults;

    }

endif;
