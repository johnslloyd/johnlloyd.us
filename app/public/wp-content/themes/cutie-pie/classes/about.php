<?php

/**
 * CutiePie About Page
 * @package CutiePie
 *
*/

if( !class_exists('Cutie_Pie_About_page') ):

	class Cutie_Pie_About_page{

		function __construct(){

			add_action('admin_menu', array($this, 'cutie_pie_backend_menu'),999);

		}

		// Add Backend Menu
        function cutie_pie_backend_menu(){

            add_theme_page(esc_html__( 'CutiePie','cutie-pie' ), esc_html__( 'CutiePie','cutie-pie' ), 'activate_plugins', 'cutie-pie-about', array($this, 'cutie_pie_main_page'),1);

        }

        // Settings Form
        function cutie_pie_main_page(){

            require get_template_directory() . '/classes/about-render.php';

        }

	}

	new Cutie_Pie_About_page();

endif;