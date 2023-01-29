<?php
/**
 * Custom Functions.
 *
 * @package CutiePie
 */

if( !function_exists( 'cutie_pie_header_image_section' ) ) :

    function cutie_pie_header_image_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_header_banner = get_theme_mod( 'ed_header_banner', $cutie_pie_default['ed_header_banner'] );

        if ($ed_header_banner) {
            $header_banner_title = get_theme_mod( 'header_banner_title',$cutie_pie_default['header_banner_title'] );
            $header_banner_sub_title = get_theme_mod( 'header_banner_sub_title',$cutie_pie_default['header_banner_sub_title'] );
            $header_banner_description = get_theme_mod( 'header_banner_description',$cutie_pie_default['header_banner_description'] );
            $header_banner_button_label = get_theme_mod( 'header_banner_button_label',$cutie_pie_default['header_banner_button_label'] );
            $header_banner_button_link = get_theme_mod( 'header_banner_button_link',$cutie_pie_default['header_banner_button_link'] );
            $ed_open_link_new_tab = get_theme_mod( 'ed_open_link_new_tab',$cutie_pie_default['ed_open_link_new_tab'] );
            $ed_header_banner_overlay = get_theme_mod( 'ed_header_banner_overlay',$cutie_pie_default['ed_header_banner_overlay'] );
            $header_image_url = get_header_image()
            ?>
            
            <div class="theme-block theme-block-large theme-block-banner <?php if($header_image_url){ echo 'data-bg'; }?>" data-background="<?php echo esc_url($header_image_url); ?>">
                <?php if ($ed_header_banner_overlay) { ?>
                    <div class="data-bg-overlay"></div>
                <?php } ?>
                <div class="wrapper">
                    <div class="theme-main-banner">
                        <div class="column-row">
                            <div class="column column-12 column-sm-12">
                                <div class="main-banner-details">
                                    <h2 class="theme-block-title-xlarge main-banner-title"><?php echo esc_html($header_banner_title); ?></h2>
                                    <h3 class="main-banner-subtitle"><?php echo esc_html($header_banner_sub_title); ?></h3>
                                    <div class="main-banner-description">
                                        <?php echo wp_kses_post($header_banner_description); ?>
                                    </div>

                                    <?php
                                    if ($header_banner_button_label) { ?>
                                        <div class="theme-block-link">
                                            <a href="<?php echo esc_url($header_banner_button_link); ?>" class="theme-button theme-button-radius theme-button-large" <?php if($ed_open_link_new_tab){ ?>target="_blank"<?php } ?>>
                                                <span><?php echo esc_html($header_banner_button_label); ?></span>
                                                <span><?php cutie_pie_the_theme_svg('arrow-right'); ?></span>
                                            </a>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }

endif;

if( !function_exists( 'cutie_pie_category_section' ) ) :

    function cutie_pie_category_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_category_section = get_theme_mod( 'ed_category_section', $cutie_pie_default['ed_category_section'] );
        if ($ed_category_section) { ?>
            <div class="theme-block theme-block-categories">
                <div class="wrapper">
                    <div class="theme-categories-panels">
                        <div class="column-row column-row-small">
                            <?php for ($i=1; $i <= 3; $i++) { 
                                $cutie_pie_get_cat_id = absint(get_theme_mod('select_category_for_cat_list_'.$i));
                                $twp_term_image = get_term_meta( $cutie_pie_get_cat_id, 'twp-term-featured-image', true );
                                $twp_cat_link = get_category_link($cutie_pie_get_cat_id);
                                $twp_cat_description = category_description($cutie_pie_get_cat_id);
                                ?>
                                    <div class="column column-4 column-xs-12">
                                        <div class="categories-panel">

                                            <div class="entry-thumbnail">
                                                <div class="category-panel-image <?php if ($twp_term_image){ echo 'data-bg data-bg-small';} ?>" data-background="<?php echo esc_url($twp_term_image); ?>"></div>

                                            </div>

                                            <div class="categories-panel-content">
                                                <h2 class="theme-block-title">
                                                    <a href="<?php echo esc_url($twp_cat_link); ?>">
                                                        <?php echo esc_html(get_cat_name( $cutie_pie_get_cat_id));?>
                                                    </a>
                                                </h2>
                                                <div class="theme-block-link">
                                                    <a href="<?php echo esc_url($twp_cat_link); ?>" class="theme-button theme-button-small">
                                                        <?php esc_html_e('More Posts', 'cutie-pie'); ?>
                                                    </a>
                                                </div>
                                            </div>

                                            <?php if ( get_theme_mod('ed_category_image_overlay') == 1) { ?>
                                                <div class="data-bg-overlay"></div>
                                            <?php } ?>

                                        </div>
                                    </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }

endif;


if( !function_exists( 'cutie_pie_cta_section' ) ) :

    function cutie_pie_cta_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_cta_section = get_theme_mod( 'ed_cta_section', $cutie_pie_default['ed_cta_section'] );
        $cta_block_layout = get_theme_mod( 'cta_block_layout',$cutie_pie_default['cta_block_layout'] );
        $ed_cta_post_excerpt = get_theme_mod( 'ed_cta_post_excerpt', $cutie_pie_default['ed_cta_post_excerpt'] );
        if ($ed_cta_section) {
        $cutie_pie_cta_page = esc_attr(get_theme_mod('select_page_for_cta'));
        if (!empty($cutie_pie_cta_page)) {
            $cutie_pie_cta_page_args = array(
                'post_type' => 'page',
                'page_id' => $cutie_pie_cta_page,
            );
        }
        $homepage_cta_button_text = get_theme_mod( 'homepage_cta_button_text',$cutie_pie_default['homepage_cta_button_text'] );
        $header_banner_button_link = get_theme_mod( 'header_banner_button_link',$cutie_pie_default['header_banner_button_link'] );
        $cta_link_tab = get_theme_mod( 'cta_link_tab',$cutie_pie_default['cta_link_tab'] );
        $ed_cta_image_overlay = get_theme_mod( 'ed_cta_image_overlay',$cutie_pie_default['ed_cta_image_overlay'] );
        if (!empty($cutie_pie_cta_page_args)) {
            $cutie_pie_cta_page_query = new WP_Query($cutie_pie_cta_page_args);
            while ($cutie_pie_cta_page_query->have_posts()): $cutie_pie_cta_page_query->the_post();
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $url = isset($thumb[0]) ? $thumb[0] : ''; ?>
                <div class="theme-block theme-block-cta">
                    <div class="<?php echo esc_attr($cta_block_layout); ?>">
                        <div class="theme-cta-panel <?php if ($url){ echo 'data-bg';} ?>" data-background="<?php echo esc_url($url); ?>">
                            <?php if($ed_cta_image_overlay){ ?>
                                <div class="data-bg-overlay"></div>
                            <?php } ?>
                            <div class="column-row column-row-center">
                                <div class="column column-8 column-sm-12">
                                    <div class="cta-panel">
                                         <div class="cta-panel-header">
                                             <h2 class="theme-block-title theme-block-title-large">
                                                 <?php the_title();?>
                                             </h2>
                                         </div>
                                         <?php if ($ed_cta_post_excerpt) { ?>
                                            <div class="cta-panel-content">
                                                <?php the_excerpt(); ?>
                                            </div>
                                         <?php } ?>
                                    </div>
                                </div>
                                 <div class="column column-4 column-sm-12">

                                    <?php
                                    if ($homepage_cta_button_text) { ?>
                                        <div class="theme-block-link">
                                            <a href="<?php echo esc_url($header_banner_button_link); ?>" class="theme-button" <?php if($cta_link_tab){ ?>target="_blank"<?php } ?>>
                                                <span><?php echo esc_html($homepage_cta_button_text); ?></span>
                                                <span><?php cutie_pie_the_theme_svg('arrow-right'); ?></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                 </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile;
            wp_reset_postdata();
        }
        }
    }

endif;


if( !function_exists( 'cutie_pie_testimonial_section' ) ) :

    function cutie_pie_testimonial_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_testimonial_section = get_theme_mod( 'ed_testimonial_section', $cutie_pie_default['ed_testimonial_section'] );
        $testimonial_bg_image = get_theme_mod( 'testimonial_bg_image');
        if ($ed_testimonial_section) {
        $number_of_testimonial = get_theme_mod( 'number_of_testimonial', $cutie_pie_default['number_of_testimonial'] );

            $cutie_pie_testimonial_page = array();
            for ($i = 1; $i <= $number_of_testimonial; $i++) {
                $cutie_pie_testimonial_page_list = get_theme_mod('select_page_for_testimonial_' . $i);
                if (!empty($cutie_pie_testimonial_page_list)) {
                    $cutie_pie_testimonial_page[] = $cutie_pie_testimonial_page_list;
                }
            }

            // Bail if no valid pages are selected.
            if (empty($cutie_pie_testimonial_page)) {
                return;
            }
            /*page query*/
            $cutie_pie_testimonial_args = array(
                'posts_per_page' => esc_attr($number_of_testimonial),
                'orderby' => 'post__in',
                'post_type' => 'page',
                'post__in' => $cutie_pie_testimonial_page,
            );
                $cutie_pie_testimonial_query = new WP_Query($cutie_pie_testimonial_args); ?>
                <div class="theme-block theme-block-testimonials <?php if ($testimonial_bg_image){echo 'data-bg';} ?>" <?php if ($testimonial_bg_image){ ?>data-background="<?php echo esc_url($testimonial_bg_image); ?>"<?php } ?>>
                    <div class="wrapper">
                        <h2 class="theme-block-title theme-block-title-large">
                            <?php echo wp_kses_post(get_theme_mod('testimonial_section_title')); ?>
                        </h2>
                        <div class="testimonial-slider">
                            <?php
                            if ($cutie_pie_testimonial_query->have_posts()) :
                                while ($cutie_pie_testimonial_query->have_posts()) : $cutie_pie_testimonial_query->the_post();
                                    if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                        $url = isset($thumb[0]) ? $thumb[0] : '';
                                    }?>

                                    <div class="testimonial-slides">
                                        <?php if (!empty($url)) { ?>
                                            <div class="testimonial-image">
                                                <img src="<?php echo esc_url($url); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                                            </div>
                                        <?php } ?>
                                        <div class="testimonial-content">
                                            <h3 class="testimonial-title ">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="testimonial-caption">
                                                <?php if (has_excerpt()) {
                                                    the_excerpt();
                                                    cutie_pie_read_more_page_render();
                                                } else {
                                                    the_excerpt();
                                                } ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                </div>
        <?php }
    }

endif;


if( !function_exists( 'cutie_pie_slider_section' ) ) :

    function cutie_pie_slider_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_slider_section = get_theme_mod( 'ed_slider_section', $cutie_pie_default['ed_slider_section'] );
        $ed_slider_control_dot = get_theme_mod( 'ed_slider_control_dot', $cutie_pie_default['ed_slider_control_dot'] );
        $ed_slider_post_excerpt = get_theme_mod( 'ed_slider_post_excerpt', $cutie_pie_default['ed_slider_post_excerpt'] );
        
        if ($ed_slider_section) {
            $number_of_slider = get_theme_mod( 'number_of_slider', $cutie_pie_default['number_of_slider'] );
            $ed_slider_overlay = get_theme_mod( 'ed_slider_overlay', $cutie_pie_default['ed_slider_overlay'] );

                    $cutie_pie_slider_page = array();
                    for ($i = 1; $i <= $number_of_slider; $i++) {
                        $cutie_pie_slider_page_list = get_theme_mod('select_page_for_slider_' . $i);
                        if (!empty($cutie_pie_slider_page_list)) {
                            $cutie_pie_slider_page[] = absint($cutie_pie_slider_page_list);
                        }
                    }
                    // Bail if no valid pages are selected.
                    if (empty($cutie_pie_slider_page)) {
                        return;
                    }
                    /*page query*/
                    $cutie_pie_slider_args = array(
                        'posts_per_page' => esc_attr($number_of_slider),
                        'orderby' => 'post__in',
                        'post_type' => 'page',
                        'post__in' => $cutie_pie_slider_page,
                    );
                $cutie_pie_slider_query = new WP_Query($cutie_pie_slider_args); 
                $data_slick_dot = 'false';
                if ($ed_slider_control_dot) {
                    $data_slick_dot = 'true';
                }
                ?>
                <div class="theme-block theme-block-sliders theme-block-nospace">

                        <div class="main-slider" data-slick='{"dots": <?php echo ($data_slick_dot); ?>}'>
                            <?php
                            if ($cutie_pie_slider_query->have_posts()) :
                                while ($cutie_pie_slider_query->have_posts()) : $cutie_pie_slider_query->the_post();
                                    ?>

                                    <div class="main-slides-item">
                                        <?php if (has_post_thumbnail()) {
                                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                            $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                                            <div class="theme-slider-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="data-bg data-bg-large" data-background="<?php echo esc_url($featured_image); ?>">
                                                        <?php if ($ed_slider_overlay) { ?>
                                                            <span class="data-bg-overlay"></span>
                                                        <?php } ?>
                                                    </span>
                                                </a>
                                            </div>
                                        <?php } ?>

                                        <div class="theme-slider-content">
                                            <div class="wrapper">
                                                <div class="theme-block-heading">
                                                    <h3 class="theme-block-title theme-block-title-xlarge">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                </div>
                                                <?php if ($ed_slider_post_excerpt) { ?>
                                                    <div class="post-content">
                                                        <?php if (has_excerpt()) {
                                                            the_excerpt();
                                                            cutie_pie_read_more_page_render();
                                                        } else {
                                                            the_excerpt();
                                                        } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                </div>
        <?php }
    }

endif;


if( !function_exists( 'cutie_pie_about_section' ) ) :

    function cutie_pie_about_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_about_section = get_theme_mod( 'ed_about_section', $cutie_pie_default['ed_about_section'] );
        $homepage_about_title = get_theme_mod( 'about_section_title',$cutie_pie_default['about_section_title'] );
        if ($ed_about_section) {
        $cutie_pie_about_page = esc_attr(get_theme_mod('select_page_for_about'));
        if (!empty($cutie_pie_about_page)) {
            $cutie_pie_about_page_args = array(
                'post_type' => 'page',
                'page_id' => $cutie_pie_about_page,
            );
        }
        if (!empty($cutie_pie_about_page_args)) {
            $cutie_pie_about_page_query = new WP_Query($cutie_pie_about_page_args);
            while ($cutie_pie_about_page_query->have_posts()): $cutie_pie_about_page_query->the_post();
                if (has_post_thumbnail()) { 
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    $url = $thumb['0'];
                }
                ?>

                <div class="theme-block theme-block-about">
                    <div class="wrapper">
                        <div class="column-row column-row-center">
                            <div class="column column-1 column-sm-12">
                                <div class="theme-section-heading">
                                    <h2 class="theme-section-title">
                                        <?php echo esc_html($homepage_about_title); ?>
                                    </h2>
                                </div>
                            </div>


                            <?php if (has_post_thumbnail()) {
                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                                <div class="column column-6 column-sm-12">
                                    <div class="entry-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="data-bg data-bg-large" data-background="<?php echo esc_url($featured_image); ?>"></span>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="column column-5 column-sm-12">
                                <div class="about-section-content">
                                    <div class="theme-block-heading">
                                        <h3 class="theme-block-title theme-block-title-big">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="post-content">
                                        <?php if (has_excerpt()) {
                                            the_excerpt();
                                            cutie_pie_read_more_page_render();
                                        } else {
                                            the_excerpt();
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata();
        }
        }
    }

endif;


if (!function_exists('cutie_pie_portfolio_section')) :

    function cutie_pie_portfolio_section()
    {
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_portfolio_section = get_theme_mod('ed_portfolio_section', $cutie_pie_default['ed_portfolio_section']);

        if ($ed_portfolio_section) {
            $select_category_for_portfolio = get_theme_mod('select_category_for_portfolio', $cutie_pie_default['select_category_for_portfolio']);
            $portfolio_section_title = get_theme_mod('portfolio_section_title', $cutie_pie_default['portfolio_section_title']);
            $portfolio_section_sub_title = get_theme_mod('portfolio_section_sub_title', $cutie_pie_default['portfolio_section_sub_title']);

            $qargs = new WP_Query(
                array(
                    'posts_per_page' => 11,
                    'orderby' => 'post__in',
                    'post_type' => 'post',
                    'cat' => $select_category_for_portfolio,
                )
            );
            $i = 0;
            $j = 1;
            $d = 1;
            $image_url = ''; ?>
            <div class="theme-block theme-block-portfolio">
                <div class="wrapper">
                    <div class="column-row column-row-collapse">
                        <?php while ($qargs->have_posts()): $qargs->the_post();
                            if (has_post_thumbnail()) {
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium_large');
                                $image_url = isset($image[0]) ? $image[0] : '';
                            }
                            $cutie_pie_portfolio = '';
                            if ($i % 3 == 0) { ?>
                                <div class="column column-6 column-xs-12 <?php if ($i % 2 == 0) { echo 'class-left'; } else{ echo 'class-right'; } ?> ">

                                <div class="theme-portfolio-panel">

                            <?php $d = 1; } $cutie_pie_portfolio = "block-".$d++;  ?>
                            <article class="theme-portfolio-article theme-block-article <?php echo $cutie_pie_portfolio;?>" data-aos="flip-up">
                                <div class="entry-wrapper">
                                    <div class="entry-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="data-bg data-bg-adaptable" data-background="<?php echo esc_url($image_url); ?>"></span>
                                        </a>
                                    </div>

                                    <div class="post-content post-content-overlay">

                                        <div class="theme-overlay-icon">

                                            <?php cutie_pie_the_theme_svg('arrow-up-right'); ?>
                                        </div>
                                        <div class="portfolio-caption">
                                            <header class="entry-header">
                                                <h2 class="entry-title entry-title-small">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                            </header>

                                            <footer class="entry-footer">
                                                <div class="entry-meta">
                                                    <?php
                                                    cutie_pie_posted_on();
                                                    ?>
                                                </div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <?php if (($j % 3 == 0) || (($qargs->current_post + 1) == ($qargs->post_count))) { ?>
                                </div></div>
                            <?php } ?>
                            <?php
                            $i++;
                            $j++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>


            <?php
        }
    }

endif;


if( !function_exists( 'cutie_pie_contact_section' ) ) :

    function cutie_pie_contact_section(){
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_contact_section = get_theme_mod( 'ed_contact_section', $cutie_pie_default['ed_contact_section'] );
        $contact_section_title = get_theme_mod( 'contact_section_title', $cutie_pie_default['contact_section_title'] );
        $contact_section_location = get_theme_mod( 'contact_section_location', $cutie_pie_default['contact_section_location'] );
        $contact_section_email = get_theme_mod( 'contact_section_email', $cutie_pie_default['contact_section_email'] );
        $contact_section_number = get_theme_mod( 'contact_section_number', $cutie_pie_default['contact_section_number'] );
        $contact_form_shortcode = get_theme_mod( 'contact_form_shortcode' );
        $contact_section_bg_image = get_theme_mod( 'contact_section_bg_image');
        if ($ed_contact_section) { ?>


            <div class="theme-block theme-block-contact">
                <?php if ($contact_section_bg_image) { ?>
                    <div class="block-contact-background data-bg" data-background="<?php echo esc_url($contact_section_bg_image); ?>">
                        <div class="data-bg-overlay"></div>
                    </div>
                <?php } ?>

                <div class="wrapper">
                    <div class="column-row column-row-center">
                        <div class="column column-1 column-sm-12">
                            <div class="theme-section-heading">
                                <h2 class="theme-section-title"><?php echo esc_html($contact_section_title); ?></h2>
                            </div>
                        </div>
                        <div class="column column-5 column-sm-12">
                            <ul class="theme-contact-list">
                                <?php if ($contact_section_location) { ?>
                                    <li class="theme-contact-list-group">
                                        <div class="theme-contact-list-title">
                                            <?php echo esc_html__('Location:', 'cutie-pie') ?>
                                        </div>
                                        <div class="theme-contact-list-content">
                                            <?php echo esc_html($contact_section_location); ?>
                                        </div>
                                    </li>
                                <?php } ?>

                                <li class="theme-contact-list-group">
                                    <?php if (!empty($contact_section_number) || !empty($contact_section_email)) { ?>
                                        <div class="theme-contact-list-title">
                                            <?php echo esc_html__('Contact:', 'cutie-pie') ?>
                                        </div>
                                    <?php } ?>
                                    <div class="theme-contact-list-content">
                                        <?php if ($contact_section_number) { ?>
                                            <div class="contact-list-content-phone">
                                                <div class="contact-list-content-icon">

                                                </div>
                                                <div class="contact-list-content-detail">
                                                    <a href="tel:<?php echo absint($contact_section_number); ?>">
                                                        <?php echo absint($contact_section_number); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($contact_section_email) { ?>
                                            <div class="contact-list-content-email">
                                                <div class="contact-list-content-icon">

                                                </div>
                                                <div class="contact-list-content-detail">
                                                    <a href="mailto:<?php echo sanitize_email($contact_section_email); ?>">
                                                        <?php echo sanitize_email($contact_section_email); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </li>

                                <?php if (has_nav_menu('cutie-pie-social-menu')) { ?>
                                    <li class="theme-contact-list-group">
                                        <div class="theme-contact-list-title">
                                            <?php echo esc_html__('Follow Us On:', 'cutie-pie') ?>
                                        </div>

                                        <div class="theme-social-navigation theme-contact-list-content">
                                            <?php wp_nav_menu(array(
                                                'theme_location' => 'cutie-pie-social-menu',
                                                'link_before' => '<span class="screen-reader-text">',
                                                'link_after' => '</span>',
                                                'container' => 'div',
                                                'container_class' => 'social-menu',
                                                'depth' => 1,
                                            )); ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="column column-6 column-sm-12">
                            <div class="theme-block-heading">
                                <h3 class="theme-block-title theme-block-title-medium">
                                    <?php echo esc_html__('Send Us A Message','cutie-pie') ?>
                                </h3>
                                <div class="post-content">
                                    <?php echo do_shortcode( $contact_form_shortcode ); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        <?php }
    }

endif;



if( !function_exists( 'cutie_pie_fonts_url' ) ) :

    //Google Fonts URL
    function cutie_pie_fonts_url(){

        $font_families = array(
            'Inter:wght@300;400;500;600;700',
            'Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700'
        );

        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($fonts_url);

    }

endif;

if( !function_exists('cutie_pie_read_more_render') ):

    function cutie_pie_read_more_render(){ 
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_post_excerpt = get_theme_mod( 'ed_post_excerpt',$cutie_pie_default['ed_post_excerpt'] );
        if( $ed_post_excerpt ){ ?>

        <div class="mp-read-more">
            <a class="mp-read-more-src" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','cutie-pie'); ?></a>
        </div>

    <?php }
    }

endif;

if( !function_exists('cutie_pie_read_more_page_render') ):

    function cutie_pie_read_more_page_render(){ ?>

        <div class="mp-read-more">
            <a class="mp-read-more-src theme-button theme-button-small" href="<?php the_permalink(); ?>"><?php esc_html_e('Continue reading','cutie-pie'); ?></a>
        </div>

    <?php }
endif;


if( !function_exists( 'cutie_pie_social_menu_icon' ) ) :

    function cutie_pie_social_menu_icon( $item_output, $item, $depth, $args ) {

        // Add Icon
        if ( 'cutie-pie-social-menu' === $args->theme_location ) {

            $svg = Cutie_Pie_SVG_Icons::get_theme_svg_name( $item->url );

            if ( empty( $svg ) ) {
                $svg = cutie_pie_the_theme_svg( 'link',$return = true );
            }

            $item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
        }

        return $item_output;
    }
    
endif;

add_filter( 'walker_nav_menu_start_el', 'cutie_pie_social_menu_icon', 10, 4 );

if( !function_exists( 'cutie_pie_add_sub_toggles_to_main_menu' ) ) :

    function cutie_pie_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

        // Add sub menu toggles to the Expanded Menu with toggles.
        if( isset( $args->show_toggles ) && $args->show_toggles ){

            // Wrap the menu item link contents in a div, used for positioning.
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children.
            if( in_array( 'menu-item-has-children', $item->classes, true ) ){

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';
                // Add the sub menu toggle.
                $args->after .= '<button class="toggle submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'cutie-pie' ) . '</span>'.'<span class="submenu-dropdown-icon"></span>'. '</span></button>';

            }

            // Close the wrapper.
            $args->after .= '</div><!-- .submenu-wrapper -->';

            // Add sub menu icons to the primary menu without toggles.
        }elseif( 'cutie-pie-primary-menu' === $args->theme_location ){

            if( in_array( 'menu-item-has-children', $item->classes, true ) ){

                $args->after = '<span class="icon">'.cutie_pie_the_theme_svg('chevron-down',true).'</span>';

            }else{

                $args->after = '';

            }
        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'cutie_pie_add_sub_toggles_to_main_menu', 10, 3 );

if( !function_exists( 'cutie_pie_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function cutie_pie_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'cutie_pie_page_lists' ) ) :

    // Page List.
    function cutie_pie_page_lists(){

        $page_lists = array();
        $page_lists[''] = esc_html__( '-- Select Page --','cutie-pie' );
        $pages = get_pages();
        foreach( $pages as $page ){

            $page_lists[$page->ID] = $page->post_title;

        }
        return $page_lists;
    }

endif;

if( !function_exists( 'cutie_pie_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function cutie_pie_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

if( !function_exists( 'cutie_pie_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function cutie_pie_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

/**
 * CutiePie SVG Icon helper functions
 *
 * @package CutiePie
 * @since 1.0.0
 */
if ( ! function_exists( 'cutie_pie_the_theme_svg' ) ):
    /**
     * Output and Get Theme SVG.
     * Output and get the SVG markup for an icon in the Cutie_Pie_SVG_Icons class.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function cutie_pie_the_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return cutie_pie_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in cutie_pie_get_theme_svg();.

        }else{

            echo cutie_pie_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in cutie_pie_get_theme_svg();.
            
        }
    }

endif;

if ( ! function_exists( 'cutie_pie_get_theme_svg' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function cutie_pie_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Cutie_Pie_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;


if( !function_exists( 'cutie_pie_post_category_list' ) ) :

    // Post Category List.
    function cutie_pie_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','cutie-pie' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists('cutie_pie_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function cutie_pie_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists('cutie_pie_disable_post_views') ):

    /** Disable Post Views **/
    function cutie_pie_disable_post_views() {

        add_filter('booster_extension_filter_views_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('cutie_pie_disable_post_read_time') ):

    /** Disable Read Time **/
    function cutie_pie_disable_post_read_time() {

        add_filter('booster_extension_filter_readtime_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('cutie_pie_disable_post_like_dislike') ):

    /** Disable Like Dislike **/
    function cutie_pie_disable_post_like_dislike() {

        add_filter('booster_extension_filter_like_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('cutie_pie_disable_post_author_box') ):

    /** Disable Author Box **/
    function cutie_pie_disable_post_author_box() {

        add_filter('booster_extension_filter_ab_ed', function ( ) {
            return false;
        });

    }

endif;


add_filter('booster_extension_filter_ss_ed', function ( ) {
    return false;
});

if( !function_exists('cutie_pie_disable_post_reaction') ):

    /** Disable Reaction **/
    function cutie_pie_disable_post_reaction() {

        add_filter('booster_extension_filter_reaction_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('cutie_pie_single_post_navigation') ):

    function cutie_pie_single_post_navigation(){

        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        global $post;
        if( $twp_navigation_type == '' || $twp_navigation_type == 'global-layout' ){
            $twp_navigation_type = get_theme_mod('twp_navigation_type', $cutie_pie_default['twp_navigation_type']);
        }


        if( $twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $twp_navigation_type == 'norma-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . cutie_pie_the_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . __('Previous post:', 'cutie-pie') . '</span><h4 class="entry-title entry-title-medium">%title</h4>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . cutie_pie_the_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . __('Next post:', 'cutie-pie') . '</span><h4 class="entry-title entry-title-medium">%title</h4>',
                    )); ?>
                </div>
                <?php

            }else{

                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){

                    $next_post_id = $next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'cutie_pie_navigation_action','cutie_pie_single_post_navigation',30 );


if( !function_exists('cutie_pie_content_offcanvas') ):

    // Offcanvas Contents
    function cutie_pie_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">

                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">

                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>

                        <button type="button" class="button-offcanvas-close">
                            <?php cutie_pie_the_theme_svg('close'); ?>
                        </button>

                    </div>
                </div>

                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'cutie-pie'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">

                            <?php
                            if( has_nav_menu('cutie-pie-primary-menu') ){
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'cutie-pie-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }?>

                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>

                <?php if( has_nav_menu('cutie-pie-social-menu') ){ ?>
                    <div id="social-nav-offcanvas" class="offcanvas-item theme-social-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'cutie-pie-social-menu',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                            'container' => 'div',
                            'container_class' => 'social-menu',
                            'depth' => 1,
                        )); ?>

                    </div>

                <?php } ?>

                <a href="javascript:void(0)" class="skip-link-menu-end"></a>

            </div>
        </div>

    <?php
    }

endif;

add_action( 'cutie_pie_before_footer_content_action','cutie_pie_content_offcanvas',30 );

if( !function_exists('cutie_pie_footer_content_widget') ):

    function cutie_pie_footer_content_widget(){

        $cutie_pie_default = cutie_pie_get_default_theme_options();
        if( is_active_sidebar('cutie-pie-footer-widget-0') || 
            is_active_sidebar('cutie-pie-footer-widget-1') || 
            is_active_sidebar('cutie-pie-footer-widget-2') ):

            $x = 1;
            $footer_sidebar = 0;
            do {
                if ($x == 3 && is_active_sidebar('cutie-pie-footer-widget-2')) {
                    $footer_sidebar++;
                }
                if ($x == 2 && is_active_sidebar('cutie-pie-footer-widget-1')) {
                    $footer_sidebar++;
                }
                if ($x == 1 && is_active_sidebar('cutie-pie-footer-widget-0')) {
                    $footer_sidebar++;
                }
                $x++;
            } while ($x <= 3);
            if ($footer_sidebar == 1) {
                $footer_sidebar_class = 12;
            } elseif ($footer_sidebar == 2) {
                $footer_sidebar_class = 6;
            } else {
                $footer_sidebar_class = 4;
            }
            $footer_column_layout = absint(get_theme_mod('footer_column_layout', $cutie_pie_default['footer_column_layout'])); ?>

            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">

                        <?php if (is_active_sidebar('cutie-pie-footer-widget-0')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-12">
                                <?php dynamic_sidebar('cutie-pie-footer-widget-0'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('cutie-pie-footer-widget-1')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-12">
                                <?php dynamic_sidebar('cutie-pie-footer-widget-1'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('cutie-pie-footer-widget-2')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-12">
                                <?php dynamic_sidebar('cutie-pie-footer-widget-2'); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        <?php
        endif;

    }

endif;

add_action( 'cutie_pie_footer_widget_area_content_action','cutie_pie_footer_content_widget',10 );


if (!function_exists('cutie_pie_footer_logo_section')):

    function cutie_pie_footer_logo_section()
    {
        $footer_logo_upload = esc_url(get_theme_mod('footer_logo_upload'));
        if ($footer_logo_upload) { ?>
            <div class="theme-footer-logo">
                <a href="<?php echo esc_url(get_site_url());?>">
                    <img src="<?php echo esc_url($footer_logo_upload);?>">
                </a>
            </div>
        <?php }
    }

endif;

add_action( 'cutie_pie_footer_content_action','cutie_pie_footer_logo_section',12 );



if (!function_exists('cutie_pie_footer_social_nav')):

    function cutie_pie_footer_social_nav()
    {
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_footer_social_nav = get_theme_mod('ed_footer_social_nav', $cutie_pie_default['ed_footer_social_nav']);

        if (has_nav_menu('cutie-pie-social-menu') && ($ed_footer_social_nav)) { ?>
            <div id="footer-social-nav" class="theme-social-navigation footer-social-navigation">
                <div class="theme-block-heading">
                    <h2 class="theme-block-title theme-block-title-xlarge">
                        <?php esc_html_e('follow us', 'cutie-pie'); ?>
                    </h2>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'cutie-pie-social-menu',
                    'link_before' => '<span class="screen-reader-text">',
                    'link_after' => '</span>',
                    'container' => 'div',
                    'container_class' => 'social-menu',
                    'depth' => 1,
                )); ?>
            </div>
        <?php } ?>
        <?php
    }

endif;

add_action( 'cutie_pie_footer_content_action','cutie_pie_footer_social_nav',15 );



if( !function_exists('cutie_pie_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function cutie_pie_footer_content_info(){

        $cutie_pie_default = cutie_pie_get_default_theme_options(); ?>

        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <div class="footer-credits">

                            <div class="footer-copyright">

                                <?php
                                $ed_footer_copyright = wp_kses_post(get_theme_mod('ed_footer_copyright', $cutie_pie_default['ed_footer_copyright']));
                                $footer_copyright_text = wp_kses_post(get_theme_mod('footer_copyright_text', $cutie_pie_default['footer_copyright_text']));

                                echo esc_html__('Copyright ', 'cutie-pie') . '&copy ' . absint(date('Y')) . ' <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" ><span>' . esc_html(get_bloginfo('name', 'display')) . '. </span></a> ' . esc_html($footer_copyright_text);

                                if ($ed_footer_copyright) {

                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'cutie-pie') . 'CutiePie ' . esc_html__('By ', 'cutie-pie') . '<a href="' . esc_url('https://www.themeinwp.com/theme/cutie-pie') . '"  title="' . esc_attr__('Themeinwp', 'cutie-pie') . '" target="_blank" rel="author"><span>' . esc_html__('Themeinwp. ', 'cutie-pie') . '</span></a>';

                                    echo esc_html__('Powered by ', 'cutie-pie') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'cutie-pie') . '" target="_blank"><span>' . esc_html__('WordPress.', 'cutie-pie') . '</span></a>';

                                } ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'cutie_pie_footer_content_action','cutie_pie_footer_content_info',20 );


if( !function_exists('cutie_pie_footer_go_to_top') ):

    // Scroll to Top render content
    function cutie_pie_footer_go_to_top(){ ?>

        <button type="button" class="scroll-up">
                <span class="scroll-up-icon">
                    <?php cutie_pie_the_theme_svg('chevron-up'); ?>
                </span>
        </button>
    
    <?php
    }

endif;

add_action( 'cutie_pie_footer_content_action','cutie_pie_footer_go_to_top',30 );

if( !function_exists('cutie_pie_color_schema_color') ):

    function cutie_pie_color_schema_color( $current_color ){

        $cutie_pie_default = cutie_pie_get_default_theme_options();

        $colors_schema = array(

            'default' => array(

                'background_color' => '#ffffff',
                'cutie_pie_primary_color' => $cutie_pie_default['cutie_pie_primary_color'],
                'cutie_pie_secondary_color' => $cutie_pie_default['cutie_pie_secondary_color'],
                'cutie_pie_general_color' => $cutie_pie_default['cutie_pie_general_color'],

            ),

            'dark' => array(

                'background_color' => '#222222',
                'cutie_pie_primary_color' => $cutie_pie_default['cutie_pie_primary_color_dark'],
                'cutie_pie_secondary_color' => $cutie_pie_default['cutie_pie_secondary_color_dark'],
                'cutie_pie_general_color' => $cutie_pie_default['cutie_pie_general_color_dark'],

            ),

            'fancy' => array(

                'background_color' => '#faf7f2',
                'cutie_pie_primary_color' => $cutie_pie_default['cutie_pie_primary_color_fancy'],
                'cutie_pie_secondary_color' => $cutie_pie_default['cutie_pie_secondary_color_fancy'],
                'cutie_pie_general_color' => $cutie_pie_default['cutie_pie_general_color_fancy'],

            ),

        );

        if( isset( $colors_schema[$current_color] ) ){
            
            return $colors_schema[$current_color];

        }

        return;

    }

endif;



if ( ! function_exists( 'cutie_pie_color_schema_color_action' ) ) :
    
    function cutie_pie_color_schema_color_action() {

        if( isset( $_POST['currentColor'] ) && sanitize_text_field( wp_unslash( $_POST['currentColor'] ) ) ){
         
            $current_color = sanitize_text_field( wp_unslash( $_POST['currentColor'] ) );

            $color_schemes = cutie_pie_color_schema_color( $current_color );

            if ( $color_schemes ) {
                echo json_encode( $color_schemes );
            }
        }
    
        wp_die();

    }

endif;

add_action( 'wp_ajax_nopriv_cutie_pie_color_schema_color', 'cutie_pie_color_schema_color_action' );
add_action( 'wp_ajax_cutie_pie_color_schema_color', 'cutie_pie_color_schema_color_action' );

if( ! function_exists( 'cutie_pie_iframe_escape' ) ):
    
    /** Escape Iframe **/
    function cutie_pie_iframe_escape( $input ){

        $all_tags = array(
            'iframe'=>array(
                'width'=>array(),
                'height'=>array(),
                'src'=>array(),
                'frameborder'=>array(),
                'allow'=>array(),
                'allowfullscreen'=>array(),
            ),
            'video'=>array(
                'width'=>array(),
                'height'=>array(),
                'src'=>array(),
                'style'=>array(),
                'controls'=>array(),
            )
        );

        return wp_kses($input,$all_tags);
        
    }

endif;

if( class_exists( 'Booster_Extension_Class' ) ){

    add_filter('booster_extemsion_content_after_filter','cutie_pie_after_content_pagination');

}

if( !function_exists('cutie_pie_after_content_pagination') ):

    function cutie_pie_after_content_pagination($after_content){

        $pagination_single = wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cutie-pie' ),
                    'after'  => '</div>',
                    'echo' => false
                ) );

        $after_content =  $pagination_single.$after_content;

        return $after_content;

    }

endif;

if( !function_exists('cutie_pie_excerpt_content') ):

    function cutie_pie_excerpt_content(){ 

        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $ed_post_excerpt = get_theme_mod( 'ed_post_excerpt',$cutie_pie_default['ed_post_excerpt'] );

        if( $ed_post_excerpt ){ ?>
                    
            <div class="entry-content">

                <?php
                if( has_excerpt() ){

                    the_excerpt();

                }else{

                    echo esc_html( wp_trim_words( get_the_content(), 25, '...' ) );

                } ?>

            </div>

        <?php }
    }

endif;


if( !function_exists('cutie_pie_footer_related_posts') ):

    // Footer Posts Related Posts.
    function cutie_pie_footer_related_posts(){
        
        $cutie_pie_default = cutie_pie_get_default_theme_options();
        $enable_footer_related_post = esc_html(get_theme_mod('enable_footer_related_post', $cutie_pie_default['enable_footer_related_post']));
        if ($enable_footer_related_post) {
            $footer_related_posts_query = new WP_Query(
                    array(
                    'post_type' => 'post',
                    'posts_per_page' => absint( get_theme_mod( 'number_of_footer_related_post')),
                    'cat' => esc_attr(get_theme_mod( 'select_category_for_related_post')),
                    )
            );

            if( $footer_related_posts_query->have_posts() ): ?>
                <div class="theme-block theme-block-recommended">
                    <div class="wrapper">


                                <div class="theme-block-heading">
                                <?php
                                $footer_recent_post_title = esc_html(get_theme_mod('footer_related_post_title', $cutie_pie_default['footer_related_post_title']));
                                $footer_related_post_sub_title = esc_html(get_theme_mod('footer_related_post_sub_title', $cutie_pie_default['footer_related_post_sub_title']));

                                if ($footer_recent_post_title) { ?>

                                    <h2 class="theme-block-title theme-block-title-large">

                                        <?php echo esc_html($footer_recent_post_title); ?>

                                    </h2>

                                    <?php } ?>

                                    <?php if ($footer_related_post_sub_title) { ?>
                                        <h3 class="theme-block-subtitle theme-block-title-medium">
                                            <?php echo esc_html($footer_related_post_sub_title); ?>
                                        </h3>
                                    <?php } ?>
                                </div>


                                <div class="theme-recommended-panel">
                                    <div class="column-row">
                                        <?php
                                        while ($footer_related_posts_query->have_posts()):
                                            $footer_related_posts_query->the_post(); ?>
                                            <div class="column column-6 column-xs-12">
                                                <article <?php post_class('theme-recommended-article'); ?>>
                                                    <div class="entry-wrapper">

                                                        <?php if (has_post_thumbnail()) {
                                                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                                            $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>

                                                            <div class="entry-thumbnail">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <span class="data-bg data-bg-medium-large"
                                                                          data-background="<?php echo esc_url($featured_image); ?>"></span>
                                                                </a>
                                                            </div>

                                                        <?php } ?>

                                                        <div class="post-content">
                                                            <div class="entry-meta theme-meta-categories">
                                                                <?php cutie_pie_entry_footer($cats = true, $tags = false, $edits = false); ?>
                                                            </div>

                                                            <header class="entry-header">
                                                                <h3 class="entry-title entry-title-medium">
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h3>
                                                            </header>

                                                            <div class="entry-meta">

                                                                <?php
                                                                cutie_pie_posted_by();
                                                                cutie_pie_posted_on();
                                                                ?>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                                <?php

                                $footer_recent_post_button_text = esc_html(get_theme_mod('footer_related_post_button', $cutie_pie_default['footer_related_post_button']));
                                $footer_recent_post_button_url = esc_html(get_theme_mod('footer_related_post_button_url', $cutie_pie_default['footer_related_post_button_url']));

                                if ($footer_recent_post_button_text) { ?>
                                    <div class="theme-block-link">
                                        <a href="<?php echo esc_url($footer_recent_post_button_url); ?>" class="theme-button-hashed">
                                            <?php echo esc_html($footer_recent_post_button_text); ?>
                                        </a>
                                    </div>
                                <?php } ?>


                    </div>
                </div>
            <?php endif;
        }

    }

endif;



function cutie_pie_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<div class="theme-link-more"><a href="%1$s" class="theme-more-link">%2$s '.cutie_pie_the_theme_svg('arrow-right',true).'</a></div>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Post title. */
        sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cutie-pie' ), get_the_title( get_the_ID() ) )
    );
    return $link;
}
add_filter( 'excerpt_more', 'cutie_pie_excerpt_more' );

/**
 * Print the first instance of a block in the content, and then break away.
 *
 * @since CutiePie 1.0.2
 *
 * @param string      $block_name The full block type name, or a partial match.
 *                                Example: `core/image`, `core-embed/*`.
 * @param string|null $content    The content to search in. Use null for get_the_content().
 * @param int         $instances  How many instances of the block will be printed (max). Default  1.
 * @return bool Returns true if a block was located & printed, otherwise false.
 */
function cutie_pie_print_first_instance_of_block( $block_name, $content = null, $instances = 1 ) {
    $instances_count = 0;
    $blocks_content  = '';

    if ( ! $content ) {
        $content = get_the_content();
    }

    // Parse blocks in the content.
    $blocks = parse_blocks( $content );

    // Loop blocks.
    foreach ( $blocks as $block ) {

        // Sanity check.
        if ( ! isset( $block['blockName'] ) ) {
            continue;
        }

        // Check if this the block matches the $block_name.
        $is_matching_block = false;

        // If the block ends with *, try to match the first portion.
        if ( '*' === $block_name[-1] ) {
            $is_matching_block = 0 === strpos( $block['blockName'], rtrim( $block_name, '*' ) );
        } else {
            $is_matching_block = $block_name === $block['blockName'];
        }

        if ( $is_matching_block ) {
            // Increment count.
            $instances_count++;

            // Add the block HTML.
            $blocks_content .= render_block( $block );

            // Break the loop if the $instances count was reached.
            if ( $instances_count >= $instances ) {
                break;
            }
        }
    }

    if ( $blocks_content ) {
        /** This filter is documented in wp-includes/post-template.php */
        echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput
        return true;
    }

    return false;
}
