<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CutiePie
 */

get_header();
?>

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
<?php
get_footer();
