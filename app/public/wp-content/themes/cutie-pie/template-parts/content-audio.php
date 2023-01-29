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
        
    <?php if ( function_exists('has_block') && has_block( 'audio', get_the_content() ) ) {

        ?>
        <div class="entry-wrapper">

            <?php
            if( has_post_thumbnail() ){

                $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );
                $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>

                <div class="entry-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url( $featured_image ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                    </a>
                </div>

            <?php } ?>

            <div class="twp-content-audio">
                
                <?php
                $post_blocks = parse_blocks( get_the_content() );

                if( $post_blocks ){

                    foreach( $post_blocks as $post_block ){

                        if( isset( $post_block['blockName'] ) &&
                            isset( $post_block['innerHTML'] ) &&
                            $post_block['blockName'] == 'core/audio' ){

                            echo '<div class="entry-audio">';
                            echo wp_kses_post( $post_block['innerHTML'] );
                            echo '</div>';
                            break;

                        }

                    }

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
        }else{
            ?><div class="entry-content-media"></div><?php
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

</article>