<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'HTML Block', 'kerge-shortcodes' ),
	'description' => esc_html__( 'Add HTML, custom shortcode or script', 'kerge-shortcodes' ),
	'tab'         => esc_html__( 'Kerge Elements', 'kerge-shortcodes' ),
    'title_template' => '{{- title }}: {{- o.description }}',
);
