<?php
/**
 * CutiePie Theme Customizer
 *
 * @package CutiePie
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('cutie_pie_customize_register')) :

function cutie_pie_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/header.php';
	require get_template_directory() . '/inc/customizer/banner.php';
	require get_template_directory() . '/inc/customizer/homepage.php';
	require get_template_directory() . '/inc/customizer/pagination.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/single.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/color-scheme.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'static_front_page' )->panel = 'homepage_option_panel';
	$wp_customize->get_section( 'static_front_page' )->title = esc_html__('Homepage Page/Post Option','cutie-pie');
	$wp_customize->get_section( 'colors' )->panel = 'theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','cutie-pie');
	$wp_customize->get_section( 'title_tagline' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cutie_pie_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cutie_pie_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_setting('logo_width_range',
	    array(
	        'default'           => $cutie_pie_default['logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'cutie_pie_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('logo_width_range',
	    array(
	        'label'       => esc_html__('Logo With', 'cutie-pie'),
	        'description'       => esc_html__( 'Define logo size min-200 to max-700 (step-20)', 'cutie-pie' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
				           'min'   => 100,
				           'max'   => 300,
				           'step'   => 10,
			        	),
	    )
	);

	// Homepage Options Panel.
	$wp_customize->add_panel( 'homepage_option_panel',
		array(
			'title'      => esc_html__( 'HomePage Options', 'cutie-pie' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'cutie-pie' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'cutie-pie' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'cutie-pie' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'cutie-pie' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'theme_template_pannel',
		array(
			'title'      => esc_html__( 'Template Settings', 'cutie-pie' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	$cutie_pie_defaults = cutie_pie_get_default_theme_options();
	$home_section_arrange_vals_1 = get_theme_mod( 'home_section_arrange_vals_1', $cutie_pie_defaults['home_section_arrange_vals_1'] );
	$home_section_arrange_vals_1 = explode(",",$home_section_arrange_vals_1 );


	$j = 1;
	foreach( $home_section_arrange_vals_1 as $home_section_arrange ){
	    if ($j <= 5) {
	        $wp_customize->get_section( $home_section_arrange )->priority = $j;
	    }   
	    
	    $j ++;
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'Cutie_Pie_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Cutie_Pie_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'CutiePie Pro', 'cutie-pie' ),
				'pro_text' => esc_html__( 'Purchase', 'cutie-pie' ),
				'pro_url'  => esc_url('https://www.themeinwp.com/theme/cutie-pie-pro/'),
				'priority'  => 1,
			)
		)
	);

}

endif;
add_action( 'customize_register', 'cutie_pie_customize_register' );


add_action( 'wp_ajax_cutie_pie_arrange_home_section', 'cutie_pie_arrange_home_section' );
add_action('wp_ajax_nopriv_cutie_pie_arrange_home_section', 'cutie_pie_arrange_home_section');

function cutie_pie_arrange_home_section() {

	if ( isset( $_POST['sections'] ) ) {

		set_theme_mod( 'home_section_arrange_vals_1', wp_unslash( $_POST['sections'] ) );
		
	}
	wp_die(); // this is required to terminate immediately and return a proper response
}

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('cutie_pie_customizer_scripts')) :

    function cutie_pie_customizer_scripts(){   
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('cutie-pie-repeater', get_template_directory_uri() . '/assets/lib/custom/css/repeater.css');
    	wp_enqueue_style('cutie-pie-customizer-controll', get_template_directory_uri() . '/assets/lib/custom/css/customizer.css');
        wp_enqueue_script('cutie-pie-repeater', get_template_directory_uri() . '/assets/lib/custom/js/repeater.js', array('jquery','customize-controls'), '', 1);
        wp_enqueue_script('cutie-pie-customizer', get_template_directory_uri() . '/assets/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);
    	wp_enqueue_script('cutie-pie-re-customizer', get_template_directory_uri() . '/assets/lib/custom/js/re-customizer.js', array('jquery','customize-controls'), '', 1);

        $cutie_pie_post_category_list = cutie_pie_post_category_list();

	    $cat_option = '';

	    if( $cutie_pie_post_category_list ){
		    foreach( $cutie_pie_post_category_list as $key => $cats ){
		    	$cat_option .= "<option value='". esc_attr( $key )."'>". esc_html( $cats )."</option>";
		    }
		}

	    wp_localize_script( 
	        'cutie-pie-repeater', 
	        'cutie_pie_repeater',
	        array(
	           	'categories'   => $cat_option,
	            'upload_image'   =>  esc_html__('Choose Image','cutie-pie'),
	            'use_image'   =>  esc_html__('Select','cutie-pie'),
	         )
	    );

        $home_section_arrange_vals_1 = get_theme_mod( 'home_section_arrange_vals_1' );
        $home_section_arrange_vals_1 = explode(",",$home_section_arrange_vals_1 );
        $key_sidebar = '';
        $home_url = esc_url( home_url('/') );

        $ajax_nonce = wp_create_nonce('cutie_pie_ajax_nonce');
        wp_localize_script( 
		    'cutie-pie-re-customizer', 
		    'cutie_pie_re_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		        'key_sidebar' => $key_sidebar,
		        'home_url' => $home_url,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'cutie_pie_customizer_scripts');
add_action('customize_controls_init', 'cutie_pie_customizer_scripts');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('cutie_pie_customize_partial_blogname')) :

	function cutie_pie_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('cutie_pie_customize_partial_blogdescription')) :

	function cutie_pie_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

endif;


add_action('wp_ajax_cutie_pie_customizer_font_weight', 'cutie_pie_customizer_font_weight_callback');
add_action('wp_ajax_nopriv_cutie_pie_customizer_font_weight', 'cutie_pie_customizer_font_weight_callback');

// Recommendec Post Ajax Call Function.
function cutie_pie_customizer_font_weight_callback() {

    if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( wp_unslash( $_POST['_wpnonce'] ), 'cutie_pie_ajax_nonce' ) && isset( $_POST['currentfont'] ) && sanitize_text_field( wp_unslash( $_POST['currentfont'] ) ) ) {

       $currentfont = sanitize_text_field( wp_unslash( $_POST['currentfont'] ) );
       $headings_fonts_property = Cutie_Pie_Fonts::cutie_pie_get_fonts_property( $currentfont );

       foreach( $headings_fonts_property['weight'] as $key => $value ){
       		echo '<option value="'.esc_attr( $key ).'">'.esc_html( $value ).'</option>';
       }
    }
    wp_die();
}