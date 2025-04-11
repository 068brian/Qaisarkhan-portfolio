<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'kerge-shortcodes' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'kerge-shortcodes' ),
		'wpautop' => false,
	),
    'description'    => array(
        'label' => esc_html__( 'Short Description', 'kerge-shortcodes' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'kerge-shortcodes' ),
        'type'  => 'text',
        'value' => '',
    ),
);
