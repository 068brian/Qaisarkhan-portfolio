<?php
/*
Plugin Name: Kerge Elementor
Plugin URI: http://lmpixels.com
Description: Kerge Theme Elementor Widgets
Author: LMPixels
Version: 1.1.0
*/

add_action( 'plugins_loaded', 'kerge_elementor_textdomain' );

function kerge_elementor_textdomain() {
    load_plugin_textdomain( 'kerge-elementor', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

$theme = wp_get_theme();
if ( 'Kerge' == $theme->name || 'Kerge' == $theme->parent_theme ) {
	include_once(plugin_dir_path( __FILE__ ) . 'shortcodes/kerge-core.php');
}

function kerge_action_theme_dequeue_fa_styles() {
	if( wp_style_is( 'font-awesome' ) ){
	    wp_dequeue_style('fw-option-type-icon-v2-pack-font-awesome');
	    wp_deregister_style('fw-option-type-icon-v2-pack-font-awesome');
	}
	if( wp_style_is( 'fw-option-type-icon-v2-pack-linear-icons' ) ){
	    wp_dequeue_style('elementor-icons-linearicons');
	    wp_deregister_style('elementor-icons-linearicons');
	}
}

add_action( 'wp_print_styles', 'kerge_action_theme_dequeue_fa_styles', 20 );
add_action( 'wp_head', 'kerge_action_theme_dequeue_fa_styles', 20 );
