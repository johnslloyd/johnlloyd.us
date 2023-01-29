<?php
/**
* Body Classes.
*
* @package CutiePie
*/
 
 if (!function_exists('cutie_pie_body_classes')) :

    function cutie_pie_body_classes($classes) {

        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $cutie_pie_color_schema = get_theme_mod( 'cutie_pie_color_schema',$cutie_pie_default['cutie_pie_color_schema'] );

        global $post;

        
        if( is_singular('post') ){

            $cutie_pie_post_layout = get_post_meta( $post->ID, 'cutie_pie_post_layout', true );

            if( $cutie_pie_post_layout == '' || $cutie_pie_post_layout == 'global-layout' ){
                
                $cutie_pie_post_layout = get_theme_mod( 'cutie_pie_single_post_layout',$cutie_pie_default['cutie_pie_single_post_layout'] );

            }

            $classes[] = 'theme-single-'.esc_attr( $cutie_pie_post_layout );

            if( $cutie_pie_post_layout == 'layout-2' ){
                
                $cutie_pie_header_overlay = get_post_meta( $post->ID, 'cutie_pie_header_overlay', true );

                if( $cutie_pie_header_overlay == '' || $cutie_pie_header_overlay == 'global-layout' ){
                    $cutie_pie_post_layout2 = get_theme_mod( 'cutie_pie_single_post_layout',$cutie_pie_default['cutie_pie_single_post_layout'] );
                    if( $cutie_pie_post_layout2 == 'layout-2' ){
                        $cutie_pie_header_overlay = true;
                    }else{
                        $cutie_pie_header_overlay = false;
                    }
                }else{
                    $cutie_pie_header_overlay = true;
                }
                if( $cutie_pie_header_overlay ){
                    $classes[] = 'theme-single-header-overlay';
                }

            }

        }

        if( is_singular('page') ){

            $cutie_pie_page_layout = get_post_meta( $post->ID, 'cutie_pie_page_layout', true );

            if( $cutie_pie_page_layout == ''  ){
                
                $cutie_pie_page_layout = 'layout-1';

            }

            $classes[] = 'theme-single-'.esc_attr( $cutie_pie_page_layout );

            if( $cutie_pie_page_layout == 'layout-2' ){
                
                $cutie_pie_ed_header_overlay = get_post_meta( $post->ID, 'cutie_pie_ed_header_overlay', true );
                if( $cutie_pie_ed_header_overlay ){
                    $classes[] = 'theme-single-header-overlay';
                }

            }

        }
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        if ( ! is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = "no-sidebar";
        }
        $classes[] = 'color-scheme-'.esc_attr( $cutie_pie_color_schema );

        return $classes;
    }

endif;

add_filter('body_class', 'cutie_pie_body_classes');