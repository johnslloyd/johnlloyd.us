<?php
/**
 * Woocommerce Compatibility.
 *
 * @link https://woocommerce.com/
 *
 * @package CutiePie
 */

if ( class_exists('WooCommerce') ) {

    remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );

}

if( !function_exists('cutie_pie_woocommerce_setup') ):

    /**
     * Woocommerce support.
     */
    function cutie_pie_woocommerce_setup(){

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

    }

endif;

add_action('after_setup_theme', 'cutie_pie_woocommerce_setup');

if( !function_exists('cutie_pie_woocommerce_before_main_content') ):

    // Before Main Content woocommerce hook
    function cutie_pie_woocommerce_before_main_content(){

        echo '<div class="wrapper">';
        echo '<div class="theme-panelarea">';
        echo '<div id="site-contentarea" class="theme-panelarea-primary">';
    }

endif;

if( class_exists('WooCommerce') ){

    add_action('woocommerce_before_main_content', 'cutie_pie_woocommerce_before_main_content', 5);

}

if( !function_exists('cutie_pie_woocommerce_after_main_content') ):

    // After Main Content woocommerce hook
    function cutie_pie_woocommerce_after_main_content(){ ?>

        </div>

        <?php
        if( is_active_sidebar('cutie-pie-footer-widget-2') ){ ?>


                <aside id="secondary" class="widget-area">

                    <?php dynamic_sidebar('cutie-pie-woocommerce-widget'); ?>
                    
                </aside>

            
        <?php } ?>

        </div>
        </div>

    <?php
    }

endif;

if( class_exists('WooCommerce') ){

    add_action('woocommerce_after_main_content', 'cutie_pie_woocommerce_after_main_content', 15);

}