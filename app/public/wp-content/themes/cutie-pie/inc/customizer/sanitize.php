<?php
/**
* Custom Functions.
*
* @package CutiePie
*/

if( !function_exists( 'cutie_pie_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function cutie_pie_sanitize_sidebar_option( $cutie_pie_input ){

        $cutie_pie_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $cutie_pie_input,$cutie_pie_metabox_options ) ){

            return $cutie_pie_input;

        }

        return;

    }

endif;

if( !function_exists( 'cutie_pie_sanitize_single_pagination_layout' ) ) :

    // Sidebar Option Sanitize.
    function cutie_pie_sanitize_single_pagination_layout( $cutie_pie_input ){

        $cutie_pie_single_pagination = array( 'no-navigation','norma-navigation','ajax-next-post-load' );
        if( in_array( $cutie_pie_input,$cutie_pie_single_pagination ) ){

            return $cutie_pie_input;

        }

        return;

    }

endif;



if( !function_exists( 'cutie_pie_sanitize_header_layout' ) ) :

    // Sidebar Option Sanitize.
    function cutie_pie_sanitize_header_layout( $cutie_pie_input ){

        $cutie_pie_header_options = array( 'layout-1','layout-2','layout-3' );
        if( in_array( $cutie_pie_input,$cutie_pie_header_options ) ){

            return $cutie_pie_input;

        }

        return;

    }

endif;

if( !function_exists( 'cutie_pie_sanitize_single_post_layout' ) ) :

    // Single Layout Option Sanitize.
    function cutie_pie_sanitize_single_post_layout( $cutie_pie_input ){

        $cutie_pie_single_layout = array( 'layout-1','layout-2' );
        if( in_array( $cutie_pie_input,$cutie_pie_single_layout ) ){

            return $cutie_pie_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'cutie_pie_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function cutie_pie_sanitize_checkbox( $cutie_pie_checked ) {

		return ( ( isset( $cutie_pie_checked ) && true === $cutie_pie_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'cutie_pie_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function cutie_pie_sanitize_select( $cutie_pie_input, $cutie_pie_setting ) {

        // Ensure input is a slug.
        $cutie_pie_input = sanitize_text_field( $cutie_pie_input );

        // Get list of choices from the control associated with the setting.
        $choices = $cutie_pie_setting->manager->get_control( $cutie_pie_setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $cutie_pie_input, $choices ) ? $cutie_pie_input : $cutie_pie_setting->default );

    }

endif;

if ( ! function_exists( 'cutie_pie_sanitize_repeater' ) ) :
    
    /**
    * Sanitise Repeater Field
    */
    function cutie_pie_sanitize_repeater($input){
        $input_decoded = json_decode( $input, true );
        
        if(!empty($input_decoded)) {

            foreach ($input_decoded as $boxes => $box ){

                foreach ($box as $key => $value){

                    if( $key == 'category_color' ){

                        $input_decoded[$boxes][$key] = sanitize_hex_color( $value );

                    }else{

                        $input_decoded[$boxes][$key] = sanitize_text_field( $value );

                    }
                    
                }

            }
           
            return json_encode($input_decoded);

        }

        return $input;
    }
endif;

if ( ! function_exists( 'cutie_pie_sanitize_dropdown_pages' ) ) :

    /**
     * Sanitize dropdown pages.
     *
     * @since 1.0.0
     *
     * @param int                  $page_id Page ID.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int|string Page ID if the page is published; otherwise, the setting default.
     */
    function cutie_pie_sanitize_dropdown_pages( $page_id, $setting ) {

        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );

        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );

    }

endif;


if ( ! function_exists( 'cutie_pie_sanitize_image' ) ) :

    /**
     * Sanitize image.
     *
     * @since 1.0.0
     *
     * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
     *
     * @param string               $image Image filename.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return string The image filename if the extension is allowed; otherwise, the setting default.
     */
    function cutie_pie_sanitize_image( $image, $setting ) {

        /**
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types().
        */
        $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon',
        );

        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );

        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );

    }

endif;

if ( ! function_exists( 'cutie_pie_sanitize_number_range' ) ) :

    /**
     * Sanitize number range.
     *
     * @since 1.0.0
     *
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     *
     * @param int                  $input Number to check within the numeric range defined by the setting.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
     */
    function cutie_pie_sanitize_number_range( $input, $setting ) {

        // Ensure input is an absolute integer.
        $input = absint( $input );

        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;

        // Get min.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

        // Get max.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

        // Get Step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

        // If the input is within the valid range, return it; otherwise, return the default.
        return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

    }

endif;


