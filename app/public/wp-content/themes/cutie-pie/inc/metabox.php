<?php
/**
* Sidebar Metabox.
*
* @package CutiePie
*/
 
add_action( 'add_meta_boxes', 'cutie_pie_metabox' );

if( ! function_exists( 'cutie_pie_metabox' ) ):


    function  cutie_pie_metabox() {
        
        add_meta_box(
            'cutie-pie-custom-metabox',
            esc_html__( 'Layout Settings', 'cutie-pie' ),
            'cutie_pie_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'cutie-pie-custom-metabox',
            esc_html__( 'Layout Settings', 'cutie-pie' ),
            'cutie_pie_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$cutie_pie_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'cutie-pie' ),
    'layout-2' => esc_html__( 'Banner Layout', 'cutie-pie' ),
);

$cutie_pie_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'cutie-pie' ),
    'layout-2' => esc_html__( 'Banner Layout', 'cutie-pie' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'cutie_pie_post_metafield_callback' ) ):
    
	function cutie_pie_post_metafield_callback() {
		global $post, $cutie_pie_post_layout_options, $cutie_pie_page_layout_options;
        $post_type = get_post_type($post->ID);
		wp_nonce_field( basename( __FILE__ ), 'cutie_pie_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'cutie-pie'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' ): ?>
                        <li>
                            <a id="metabox-navbar-appearance" href="javascript:void(0)">

                                <?php esc_html_e('Appearance Settings', 'cutie-pie'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'cutie-pie'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Navigation Setting','cutie-pie'); ?></h3>

                        <?php $twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Navigation Type','cutie-pie' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php esc_html_e('Global Layout','cutie-pie'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php esc_html_e('Disable Navigation','cutie-pie'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php esc_html_e('Next Previous Navigation','cutie-pie'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php esc_html_e('Ajax Load Next 3 Posts Contents','cutie-pie'); ?></option>

                            </select>

                        </div>
                    </div>

                </div>

                <?php if( $post_type == 'post' ): ?>

                    <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Feature Image Setting','cutie-pie'); ?></h3>

                                <?php
                                $cutie_pie_ed_feature_image = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_feature_image', true ) ); ?>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-feature-image" name="cutie_pie_ed_feature_image" value="1" <?php if( $cutie_pie_ed_feature_image ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-feature-image"><?php esc_html_e( 'Disable Feature Image','cutie-pie' ); ?></label>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Video Aspect Ration Setting','cutie-pie'); ?></h3>

                            <?php $twp_aspect_ratio = esc_attr( get_post_meta($post->ID, 'twp_aspect_ratio', true) ); ?>
                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label><b><?php esc_html_e( 'Video Aspect Ratio','cutie-pie' ); ?></b></label>

                                <select name="twp_aspect_ratio">

                                    <option <?php if( $twp_aspect_ratio == '' || $twp_aspect_ratio == 'default' ){ echo 'selected'; } ?> value="default"><?php esc_html_e('Default','cutie-pie'); ?></option>

                                    <option <?php if( $twp_aspect_ratio == 'square' ){ echo 'selected'; } ?> value="square"><?php esc_html_e('Square','cutie-pie'); ?></option>

                                    <option <?php if( $twp_aspect_ratio == 'portrait' ){ echo 'selected'; } ?> value="portrait"><?php esc_html_e('  Portrait','cutie-pie'); ?></option>

                                    <option <?php if( $twp_aspect_ratio == 'landscape' ){ echo 'selected'; } ?> value="landscape"><?php esc_html_e('Landscape','cutie-pie'); ?></option>

                                </select>

                            </div>

                        </div>

                        <?php if( $post_type == 'post' ): ?>
                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','cutie-pie'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $cutie_pie_post_layout = esc_html( get_post_meta( $post->ID, 'cutie_pie_post_layout', true ) ); 
                                if( $cutie_pie_post_layout == '' ){ $cutie_pie_post_layout = 'global-layout'; }

                                foreach ( $cutie_pie_post_layout_options as $key => $cutie_pie_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="cutie_pie_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $cutie_pie_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $cutie_pie_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>



                <?php if( $post_type == 'page' ): ?>

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','cutie-pie'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $cutie_pie_page_layout = esc_html( get_post_meta( $post->ID, 'cutie_pie_page_layout', true ) ); 
                            if( $cutie_pie_page_layout == '' ){ $cutie_pie_page_layout = 'layout-1'; }

                            foreach ( $cutie_pie_page_layout_options as $key => $cutie_pie_page_layout_option) { ?>

                                <label class="description">
                                    <input type="radio" name="cutie_pie_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $cutie_pie_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $cutie_pie_page_layout_option ); ?>
                                </label>

                            <?php } ?>

                        </div>

                    </div>

                <?php endif; ?>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $cutie_pie_ed_post_views = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_views', true ) );
                    $cutie_pie_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_read_time', true ) );
                    $cutie_pie_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_like_dislike', true ) );
                    $cutie_pie_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_author_box', true ) );
                    $cutie_pie_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_social_share', true ) );
                    $cutie_pie_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_reaction', true ) );
                    $cutie_pie_ed_post_rating = esc_html( get_post_meta( $post->ID, 'cutie_pie_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','cutie-pie'); ?></h3>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-views" name="cutie_pie_ed_post_views" value="1" <?php if( $cutie_pie_ed_post_views ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-views"><?php esc_html_e( 'Disable Post Views','cutie-pie' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-read-time" name="cutie_pie_ed_post_read_time" value="1" <?php if( $cutie_pie_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','cutie-pie' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-like-dislike" name="cutie_pie_ed_post_like_dislike" value="1" <?php if( $cutie_pie_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','cutie-pie' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-author-box" name="cutie_pie_ed_post_author_box" value="1" <?php if( $cutie_pie_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','cutie-pie' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-social-share" name="cutie_pie_ed_post_social_share" value="1" <?php if( $cutie_pie_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','cutie-pie' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-reaction" name="cutie_pie_ed_post_reaction" value="1" <?php if( $cutie_pie_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','cutie-pie' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap twp-checkbox-wrap">

                                <input type="checkbox" id="cutie-pie-ed-post-rating" name="cutie_pie_ed_post_rating" value="1" <?php if( $cutie_pie_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                <label for="cutie-pie-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','cutie-pie' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'cutie_pie_save_post_meta' );

if( ! function_exists( 'cutie_pie_save_post_meta' ) ):

    function cutie_pie_save_post_meta( $post_id ) {

        global $post, $cutie_pie_post_layout_options, $cutie_pie_page_layout_options;

        if( !isset( $_POST[ 'cutie_pie_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['cutie_pie_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if( isset(  $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }

        $twp_disable_ajax_load_next_post_old = sanitize_text_field( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 

        $twp_disable_ajax_load_next_post_new = '';

        if( isset( $_POST['twp_disable_ajax_load_next_post'] ) ){
            $twp_disable_ajax_load_next_post_new = cutie_pie_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) );
        }

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }

        $cutie_pie_ed_feature_image_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_feature_image', true ) );

        $cutie_pie_ed_feature_image_new = '';
        if( isset( $_POST['cutie_pie_ed_feature_image'] ) ){
            $cutie_pie_ed_feature_image_new = absint( wp_unslash( $_POST['cutie_pie_ed_feature_image'] ) );
        }

        if ( $cutie_pie_ed_feature_image_new && $cutie_pie_ed_feature_image_new != $cutie_pie_ed_feature_image_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_feature_image', $cutie_pie_ed_feature_image_new );

        }elseif( '' == $cutie_pie_ed_feature_image_new && $cutie_pie_ed_feature_image_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_feature_image', $cutie_pie_ed_feature_image_old );

        }

        foreach ( $cutie_pie_post_layout_options as $cutie_pie_post_layout_option ) {  
            
            $cutie_pie_post_layout_old = sanitize_text_field( get_post_meta( $post_id, 'cutie_pie_post_layout', true ) ); 
            $cutie_pie_post_layout_new = cutie_pie_sanitize_post_layout_option_meta( wp_unslash( $_POST['cutie_pie_post_layout'] ) );

            if ( $cutie_pie_post_layout_new && $cutie_pie_post_layout_new != $cutie_pie_post_layout_old ){

                update_post_meta ( $post_id, 'cutie_pie_post_layout', $cutie_pie_post_layout_new );

            }elseif( '' == $cutie_pie_post_layout_new && $cutie_pie_post_layout_old ) {

                delete_post_meta( $post_id,'cutie_pie_post_layout', $cutie_pie_post_layout_old );

            }
            
        }

        foreach ( $cutie_pie_page_layout_options as $cutie_pie_post_layout_option ) {  
            
            $cutie_pie_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'cutie_pie_page_layout', true ) ); 
            $cutie_pie_page_layout_new = cutie_pie_sanitize_post_layout_option_meta( wp_unslash( $_POST['cutie_pie_page_layout'] ) );

            if ( $cutie_pie_page_layout_new && $cutie_pie_page_layout_new != $cutie_pie_page_layout_old ){

                update_post_meta ( $post_id, 'cutie_pie_page_layout', $cutie_pie_page_layout_new );

            }elseif( '' == $cutie_pie_page_layout_new && $cutie_pie_page_layout_old ) {

                delete_post_meta( $post_id,'cutie_pie_page_layout', $cutie_pie_page_layout_old );

            }
            
        }

        $cutie_pie_ed_post_views_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_views', true ) );

        $cutie_pie_ed_post_views_new = '';
        if( isset( $_POST['cutie_pie_ed_post_views'] ) ){

            $cutie_pie_ed_post_views_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_views'] ) );

        }

        if( $cutie_pie_ed_post_views_new && $cutie_pie_ed_post_views_new != $cutie_pie_ed_post_views_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_views', $cutie_pie_ed_post_views_new );

        }elseif( '' == $cutie_pie_ed_post_views_new && $cutie_pie_ed_post_views_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_views', $cutie_pie_ed_post_views_old );

        }

        $cutie_pie_ed_post_read_time_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_read_time', true ) );

        $cutie_pie_ed_post_read_time_new = '';
        if( isset( $_POST['cutie_pie_ed_post_read_time'] ) ){

            $cutie_pie_ed_post_read_time_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_read_time'] ) );

        }

        if( $cutie_pie_ed_post_read_time_new && $cutie_pie_ed_post_read_time_new != $cutie_pie_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_read_time', $cutie_pie_ed_post_read_time_new );

        }elseif( '' == $cutie_pie_ed_post_read_time_new && $cutie_pie_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_read_time', $cutie_pie_ed_post_read_time_old );

        }

        $cutie_pie_ed_post_like_dislike_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_like_dislike', true ) );

        $cutie_pie_ed_post_like_dislike_new = '';
        if( isset( $_POST['cutie_pie_ed_post_like_dislike'] ) ){

            $cutie_pie_ed_post_like_dislike_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_like_dislike'] ) );

        }

        if( $cutie_pie_ed_post_like_dislike_new && $cutie_pie_ed_post_like_dislike_new != $cutie_pie_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_like_dislike', $cutie_pie_ed_post_like_dislike_new );

        }elseif( '' == $cutie_pie_ed_post_like_dislike_new && $cutie_pie_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_like_dislike', $cutie_pie_ed_post_like_dislike_old );

        }

        $cutie_pie_ed_post_author_box_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_author_box', true ) );

        $cutie_pie_ed_post_author_box_new = '';
        if( isset( $_POST['cutie_pie_ed_post_like_dislike'] ) ){

            $cutie_pie_ed_post_author_box_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_like_dislike'] ) );

        }

        if( $cutie_pie_ed_post_author_box_new && $cutie_pie_ed_post_author_box_new != $cutie_pie_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_author_box', $cutie_pie_ed_post_author_box_new );

        }elseif( '' == $cutie_pie_ed_post_author_box_new && $cutie_pie_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_author_box', $cutie_pie_ed_post_author_box_old );

        }

        $cutie_pie_ed_post_social_share_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_social_share', true ) );

        $cutie_pie_ed_post_social_share_new = '';
        if( isset( $_POST['cutie_pie_ed_post_social_share'] ) ){

            $cutie_pie_ed_post_social_share_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_social_share'] ) );

        }

        if( $cutie_pie_ed_post_social_share_new && $cutie_pie_ed_post_social_share_new != $cutie_pie_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_social_share', $cutie_pie_ed_post_social_share_new );

        }elseif( '' == $cutie_pie_ed_post_social_share_new && $cutie_pie_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_social_share', $cutie_pie_ed_post_social_share_old );

        }

        $cutie_pie_ed_post_reaction_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_reaction', true ) );

        $cutie_pie_ed_post_reaction_new = '';
        if( isset( $_POST['cutie_pie_ed_post_reaction'] ) ){

            $cutie_pie_ed_post_reaction_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_reaction'] ) );

        }

        if( $cutie_pie_ed_post_reaction_new && $cutie_pie_ed_post_reaction_new != $cutie_pie_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_reaction', $cutie_pie_ed_post_reaction_new );

        }elseif( '' == $cutie_pie_ed_post_reaction_new && $cutie_pie_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_reaction', $cutie_pie_ed_post_reaction_old );

        }

        $cutie_pie_ed_post_rating_old = absint( get_post_meta( $post_id, 'cutie_pie_ed_post_rating', true ) );

        $cutie_pie_ed_post_rating_new = '';
        if( isset( $_POST['cutie_pie_ed_post_rating'] ) ){

            $cutie_pie_ed_post_rating_new = absint( wp_unslash( $_POST['cutie_pie_ed_post_rating'] ) );

        }

        if ( $cutie_pie_ed_post_rating_new && $cutie_pie_ed_post_rating_new != $cutie_pie_ed_post_rating_old ){

            update_post_meta ( $post_id, 'cutie_pie_ed_post_rating', $cutie_pie_ed_post_rating_new );

        }elseif( '' == $cutie_pie_ed_post_rating_new && $cutie_pie_ed_post_rating_old ) {

            delete_post_meta( $post_id,'cutie_pie_ed_post_rating', $cutie_pie_ed_post_rating_old );

        }

        $twp_aspect_ratio_old = esc_attr( get_post_meta( $post_id, 'twp_aspect_ratio', true ) );

        $twp_aspect_ratio_new = '';
        if( isset( $_POST['twp_aspect_ratio'] ) ){

            $twp_aspect_ratio_new = esc_attr( wp_unslash( $_POST['twp_aspect_ratio'] ) );

        }

        if( $twp_aspect_ratio_new && $twp_aspect_ratio_new != $twp_aspect_ratio_old ){

            update_post_meta ( $post_id, 'twp_aspect_ratio', $twp_aspect_ratio_new );

        }elseif( '' == $twp_aspect_ratio_new && $twp_aspect_ratio_old ) {

            delete_post_meta( $post_id,'twp_aspect_ratio', $twp_aspect_ratio_old );

        }


    }

endif;   