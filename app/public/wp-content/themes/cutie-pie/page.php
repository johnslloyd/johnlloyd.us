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
    $cutie_pie_ed_post_rating = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_rating', true ) ); ?>

    <div class="wrapper">
        <main id="main" class="site-main <?php if ($cutie_pie_ed_post_rating) { echo 'cutie-pie-no-comment'; } ?>" role="main">

            <?php
            if (have_posts()): ?>

                <div class="article-wraper">


                    <?php while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', 'single');

                        /**
                         *  Output comments wrapper if it's a post, or if comments are open,
                         * or if there's a comment number – and check for password.
                         **/

                        if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) { ?>

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

<?php
get_footer();
