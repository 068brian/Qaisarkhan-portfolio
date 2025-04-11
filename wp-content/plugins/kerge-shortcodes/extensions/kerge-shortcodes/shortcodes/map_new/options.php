<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'address' => array(
		'label'   => esc_html__('Location', 'kerge-shortcodes'),
		'desc'    => esc_html__('Write your location. Example: San Francisco, S601 Townsend Street, California, USA', 'kerge-shortcodes'),
		'type'    => 'text',
		'value' => esc_html__( 'San Francisco, S601 Townsend Street, California, USA', 'kerge-shortcodes' ),
	),
	'map_zoom' => array(
	    'label' => esc_html__( 'Map Zoom', 'kerge-shortcodes' ),
	    'desc'  => esc_html__( 'Set map zoom level', 'kerge-shortcodes' ),
	    'type'  => 'slider',
	    'properties' => array(
	        'min' => 1,
	        'max' => 32,
	    ),
	    'value' => 16,
	),
	'map_height' => array(
		'label' => esc_html__( 'Map Height', 'kerge-shortcodes' ),
        'type' => 'short-text',
        'value' => '150',
        'desc'  => esc_html__( 'Set map height. In pixels.', 'kerge-shortcodes' ),
	),
);