<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CutiePie
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>
<aside id="theme-secondary" class="widget-area">
    <div class="widget-area-wrapper">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>
