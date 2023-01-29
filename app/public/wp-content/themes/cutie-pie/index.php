<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CutiePie
 * @since 1.0.0
 */
get_header();
 ?>

<?php if ( is_paged()) { ?>
    <!-- blog section -->
    <div class="theme-block theme-block-blog">
        <div class="wrapper">

            <div class="theme-panelarea theme-panelarea-blocks">

            <?php

                if (have_posts()):

                    $i = 1;
                    while (have_posts()) :
                        the_post();

                        ?>
                        <div class="theme-panel-blocks article-panel-blocks theme-article-post-main">

                        <?php

                        if( is_front_page() ){

                            if( $i == 1 ){

                                ?><div id="site-contentarea"></div><?php

                            }

                        }

                        get_template_part('template-parts/content', get_post_format());

                        ?></div><?php

                        $i++;
                    endwhile;

                else :

                    get_template_part('template-parts/content', 'none');

                endif; ?>

            </div>

            <?php do_action('cutie_pie_archive_pagination'); ?>

        </div>
    </div>
<?php } else {

    $cutie_pie_default = cutie_pie_get_default_theme_options();
    $home_section_arrange_valsue = get_theme_mod( 'home_section_arrange_vals_1', $cutie_pie_default['home_section_arrange_vals_1'] );
    $home_section_arrange_valsue = explode(",",$home_section_arrange_valsue );

    $paged_active = false;
    if ( !is_paged() ) {
        $paged_active = true;
    }

    foreach( $home_section_arrange_valsue as $home_section_reorder ){


        switch( $home_section_reorder ){

            case 'homepage_category_Section':

                if( $paged_active ){
                    cutie_pie_category_section();
                }

            break;

            case 'homepage_slider_Section':

                if( $paged_active ){
                    cutie_pie_slider_section();
                }

            break;

            case 'static_front_page':

                if( $paged_active ){ ?>
                    <!-- blog section -->
                    <div class="theme-block theme-block-blog">
                        <div class="wrapper">

                            <div class="theme-panelarea theme-panelarea-blocks">

                            <?php

                                if (have_posts()):

                                    $i = 1;
                                    while (have_posts()) :
                                        the_post();

                                        ?>
                                        <div class="theme-panel-blocks article-panel-blocks theme-article-post-main">

                                        <?php

                                        if( is_front_page() ){

                                            if( $i == 1 ){

                                                ?><div id="site-contentarea"></div><?php

                                            }

                                        }

                                        get_template_part('template-parts/content', get_post_format());

                                        ?></div><?php

                                        $i++;
                                    endwhile;

                                else :

                                    get_template_part('template-parts/content', 'none');

                                endif; ?>

                            </div>

                            <?php do_action('cutie_pie_archive_pagination'); ?>

                        </div>
                    </div>
                <?php }

            break;

            case 'homepage_about_Section':

                if( $paged_active ){
                    cutie_pie_about_section();
                }

            break;

            case 'homepage_testimonial_Section':

                if( $paged_active ){
                    cutie_pie_testimonial_section();
                }

            break;


            case 'homepage_cta_Section':

                if( $paged_active ){
                    cutie_pie_cta_section();
                }

            break;

            case 'homepage_portfolio_Section':

                if( $paged_active ){
                    cutie_pie_portfolio_section();
                }

            break;


            case 'homepage_footer_recomend_section':

                if( $paged_active ){
                    cutie_pie_footer_related_posts();
                }

            break;

            case 'homepage_contact_Section':

                if( $paged_active ){
                    cutie_pie_contact_section();
                }

            break;

        }

    } 
}?>
<?php get_footer();
