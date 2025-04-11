<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-certificate',
    plugin_dir_url( __FILE__ ) . 'static/css/styles.css'
);

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
if( $theme_style == 'dark' ) {
    wp_enqueue_style(
        'fw-shortcode-certificate-dark',
        plugin_dir_url( __FILE__ ) . 'static/css/dark-styles.css'
    );
}

if ( is_rtl() ) {
    wp_enqueue_style(
        'fw-shortcode-certificate-rtl',
        plugin_dir_url( __FILE__ ) . 'static/css/rtl-styles.css'
    );
}
