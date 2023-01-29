<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CutiePie
 * @since 1.0.0
 */ ?>
</div>
    <!-- sidbar -->
    <?php get_sidebar(); ?>
</div>

<div class="site-content-footer">
    <?php
    /**
     * Toogle Contents
     * @hooked cutie_pie_content_offcanvas - 30
     */

    do_action('cutie_pie_before_footer_content_action'); ?>

    <?php
    /**
     * Footer widget-area Content
     * @hooked cutie_pie_footer_content_widget - 10
     */

    do_action('cutie_pie_footer_widget_area_content_action'); ?>

    <footer id="site-footer" role="contentinfo">

        <?php
        /**
         * Footer Content
         * @hooked cutie_pie_footer_social_nav - 15
         * @hooked cutie_pie_footer_content_info - 20
         */

        do_action('cutie_pie_footer_content_action'); ?>

    </footer>
</div>

</div>


</div>


</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
