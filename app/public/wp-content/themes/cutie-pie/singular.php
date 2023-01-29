<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CutiePie
 * @since 1.0.0
 */
get_header();
    global $post;
    $cutie_pie_ed_post_rating = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_rating', true ) ); 
    $cutie_pie_default = cutie_pie_get_default_theme_options();
    $cutie_pie_post_sidebar = get_post_meta( $post->ID, 'cutie_pie_post_sidebar_option', true );
    $twp_navigation_type = get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true );
    if( $twp_navigation_type == '' || $twp_navigation_type == 'global-layout' ){
        $twp_navigation_type = get_theme_mod('twp_navigation_type', $cutie_pie_default['twp_navigation_type']);
    }
    $cutie_pie_post_layout = get_post_meta( $post->ID, 'cutie_pie_post_layout', true );
    if( $cutie_pie_post_layout == '' || $cutie_pie_post_layout == 'global-layout' ){
        
        $cutie_pie_post_layout = get_theme_mod( 'cutie_pie_single_post_layout');
    }
    if( $cutie_pie_post_layout == 'layout-2' ){
        $single_layout_class = ' single-layout-banner';
    } 
    ?>

    <div class="wrapper">


            <div id="site-contentarea">
                <main id="main" class="site-main <?php if( $cutie_pie_ed_post_rating ){ echo 'cutie-pie-no-comment'; } ?>" role="main">

                    <?php
                    if( have_posts() ): ?>

                        <div class="article-wraper">


                            <?php while (have_posts()) :
                                the_post();

                                get_template_part('template-parts/content', 'single');

                                /**
                                 *  Output comments wrapper if it's a post, or if comments are open,
                                 * or if there's a comment number – and check for password.
                                **/

                                if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                    <div class="comments-wrapper">
                                        <?php comments_template(); ?>
                                    </div><!-- .comments-wrapper -->

                                <?php
                                }

                            endwhile; ?>

                        </div>

                    <?php
                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;

                    /**
                     * Navigation
                     *
                     * @hooked cutie_pie_post_floating_nav - 10
                     * @hooked cutie_pie_related_posts - 20
                     * @hooked cutie_pie_single_post_navigation - 30
                    */

                    do_action('cutie_pie_navigation_action'); ?>

                </main>
            </div>




    </div>

<?php
get_footer();
