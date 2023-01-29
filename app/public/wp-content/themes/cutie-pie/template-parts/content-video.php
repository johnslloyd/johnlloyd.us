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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post'); ?>>

	<div class="entry-wrapper">

        <?php
        
    	add_filter('booster_extension_filter_like_ed', function ( ) {
            return false;
        });

        $content = apply_filters( 'the_content', get_the_content() );
        $video = false;

        // Only get video from the content if a playlist isn't present.
        if ( false === strpos( $content, 'wp-playlist-script' ) ) {

            $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

        }

        if ( ! empty( $video ) ) { 

            $twp_aspect_ratio = get_post_meta( get_the_ID(), 'twp_aspect_ratio', true );
            if( $twp_aspect_ratio == '' ){ $twp_aspect_ratio = 'default'; } ?>

        	<div class="entry-content-media">
                
	            <div class="twp-content-video">

            		<?php
                    foreach ( $video as $video_html ) { ?>

                        <div class="entry-video theme-ratio-<?php echo esc_attr( $twp_aspect_ratio ); ?>">
                            <div class="twp-video-control-buttons hide-no-js">
                                <button attr-id="video-id-<?php echo absint( get_the_ID() ); ?>" class="theme-video-control theme-action-control twp-pause-play pause">
                                    <span class="action-control-trigger">
                                        <span class="twp-video-control-action">
                                            <?php cutie_pie_the_theme_svg('pause'); ?>
                                        </span>

                                        <span class="screen-reader-text">
                                            <?php esc_html_e('Pause','cutie-pie'); ?>
                                        </span>
                                    </span>
                                </button>

                                <button attr-id="video-id-<?php echo absint( get_the_ID() ); ?>" class="theme-video-control theme-action-control twp-mute-unmute unmute">
                                    <span class="action-control-trigger">
                                        <span class="twp-video-control-action">
                                            <?php cutie_pie_the_theme_svg('mute'); ?>
                                        </span>

                                        <span class="screen-reader-text">
                                            <?php esc_html_e('Unmute','cutie-pie'); ?>
                                        </span>
                                    </span>
                                </button>

                            </div>
                            <div class="theme-video-panel video-main-wrapper" data-id="video-id-<?php echo absint( get_the_ID() ); ?>">
                                <?php echo cutie_pie_iframe_escape( $video_html ); ?>
                            </div>
                        </div>

                        <?php
                        break;

                    } ?>

	            </div>
	        </div>

	    <?php
        }else{

            if( has_post_thumbnail() ){
            	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );
                $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>

                <div class="entry-thumbnail">

                        <a href="<?php the_permalink(); ?>">

                    	<img src="<?php echo esc_url( $featured_image ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                    </a>

                </div>

            <?php
        	}

        } ?>

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