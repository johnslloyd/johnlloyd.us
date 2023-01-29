<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CutiePie
 */

get_header();
?>

    <div class="wrapper">


        	<div id="site-contentarea" class="theme-panelarea-primary">
            	<main id="main" class="site-main" role="main">
                    <div class="theme-block error-block error-block-heading">
                        <header class="entry-header">
                            <h1 class="entry-title entry-title-large">
                                <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'cutie-pie'); ?>
                            </h1>
                        </header>

                    </div>
                    <div class="theme-block error-block error-block-search">

                            <div class="column-row">
                                <div class="column column-8">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>

                    </div>
                    <div class="theme-block error-block error-block-top">

                        <div class="column-row">
                            <div class="column column-12">
                                <h2><?php esc_html_e('Maybe it’s out there, somewhere...', 'cutie-pie'); ?></h2>
                                <p><?php esc_html_e('You can always find insightful stories on our', 'cutie-pie'); ?>
                                <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Homepage','cutie-pie'); ?></a></p>
                            </div>
                        </div>

                    </div>
                    <div class="theme-block error-block error-block-middle">

                        <div class="column-row">
                            <div class="column column-12">
                                <h2><?php esc_html_e('Still feeling lost? You’re not alone.', 'cutie-pie'); ?></h2>
                                <p><?php esc_html_e('Enjoy these stories about getting lost, losing things, and finding what you never knew you were looking for.', 'cutie-pie'); ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="theme-block error-block error-block-bottom">
                        <?php cutie_pie_related_posts(); ?>
                    </div>
            	</main>
            </div>


    </div>

<?php
get_footer();
