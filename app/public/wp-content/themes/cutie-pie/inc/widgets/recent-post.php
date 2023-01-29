<?php
/**
 * Recent Post Widgets.
 *
 * @package CutiePie
 */


if ( !function_exists('cutie_pie_recent_post_widgets') ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function cutie_pie_recent_post_widgets(){
        // Recent Post widget.
        register_widget('Cutie_Pie_Sidebar_Recent_Post_Widget');

    }

endif;
add_action('widgets_init', 'cutie_pie_recent_post_widgets');

// Recent Post widget
if ( !class_exists('Cutie_Pie_Sidebar_Recent_Post_Widget') ) :

    /**
     * Recent Post.
     *
     * @since 1.0.0
     */
    class Cutie_Pie_Sidebar_Recent_Post_Widget extends Cutie_Pie_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'cutie_pie_popular_post_widget',
                'description' => esc_html__('Displays post form selected category specific for popular post in sidebars.', 'cutie-pie'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'cutie-pie'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'cutie-pie'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'cutie-pie'),
                ),
                'enable_counter' => array(
                    'label' => esc_html__('Enable Counter:', 'cutie-pie'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'cutie-pie'),
                    'type' => 'number',
                    'default' => 4,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 9,
                ),
            );

            parent::__construct( 'cutie-pie-popular-sidebar-layout', esc_html__('CP: Recent Post Widget', 'cutie-pie'), $opts, array(), $fields );
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance )
        {

            $params = $this->get_params( $instance );

            echo $args['before_widget'];

            if ( !empty( $params['title'] ) ) {
                echo $args['before_title'] . $params['title'] . $args['after_title'];
            }

            $qargs = array(
                'posts_per_page' => esc_attr( $params['post_number'] ),
                'no_found_rows' => true,
            );
            if ( absint( $params['post_category'] ) > 0 ) {
                $qargs['cat'] = absint($params['post_category']);
            }

            $recent_posts_query = new WP_Query( $qargs );

            $count = 1;
            ?>
            <?php if ( $recent_posts_query->have_posts() ) : ?>
            <div class="twp-recent-widget">            

                <ul class="theme-widget-list recent-widget-list">

                <?php
                while ( $recent_posts_query->have_posts() ) :
                    $recent_posts_query->the_post(); ?>

                    <li>
                        <article class="article-list">
                            <div class="column-row column-row-small">

                                <div class="column column-4">
                                    <div class="entry-thumbnail">

                                        <?php
                                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                        $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>

                                        <a href="<?php the_permalink(); ?>" class="data-bg data-bg-thumbnail" data-background="<?php echo esc_url( $featured_image ); ?>"></a>

                                        <?php if ( true === $params['enable_counter'] ) { ?>
                                            <div class="trend-item">
                                                <span class="number"> <?php echo $count; ?></span>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>

                                <div class="column column-8">
                                    <div class="article-body">

                                        <div class="entry-meta">

                                            <?php
                                            cutie_pie_posted_on();
                                            ?>

                                        </div>

                                        <h3 class="entry-title entry-title-normal">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>

                                    </div>
                                </div>

                            </div>
                        </article>
                    </li>

                <?php 
                $count++;
                endwhile; ?>

                </ul>

            </div>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;