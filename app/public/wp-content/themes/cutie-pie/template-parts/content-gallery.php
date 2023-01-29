<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CutiePie
 * @since 1.0.0
 */
add_filter('booster_extension_filter_views_ed', function ( ) { return false; });
add_filter('booster_extension_filter_readtime_ed', function ( ) { return false;});
add_filter('booster_extension_filter_like_ed', function ( ) {return false;});
add_filter('booster_extension_filter_reaction_ed', function ( ) {return false;});
add_filter('booster_extension_filter_ab_ed', function ( ) {return false;});
add_filter('booster_extension_filter_ss_ed', function ( ) {return false;});
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post'); ?>>
    <div class="entry-wrapper">
        <div class="entry-content-media">
            <div class="twp-content-gallery">
        <?php
        if (has_block('core/gallery', get_the_content())) { ?>
            <div class="entry-gallery">

                <?php cutie_pie_print_first_instance_of_block('core/gallery', get_the_content()); ?>

            </div>
            <?php
        }elseif( get_post_gallery() ){
            echo '<div class="entry-gallery">';
            echo wp_kses_post( get_post_gallery() );
            echo '</div>';
        } else {
            if (has_post_thumbnail()) {
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>

                <?php
            }
        } ?>
            </div>
        </div>

        <div class="post-content">

            <div class="entry-meta theme-meta-categories">

                <?php cutie_pie_entry_footer( $cats = true, $tags = false, $edits = false ); ?>

            </div>

            <header class="entry-header">

                <h2 class="entry-title entry-title-medium">

                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>

                </h2>
            </header>

            <div class="entry-meta">

                <?php
                cutie_pie_posted_by();
                cutie_pie_posted_on();
                ?>

            </div>

            <?php cutie_pie_excerpt_content(); ?>
            <?php cutie_pie_read_more_render(); ?>

        </div>

    </div>
</article>