<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'title' => array(
		'label'   => esc_html__('Title', 'kerge-shortcodes'),
		'desc'    => esc_html__('Write some text.', 'kerge-shortcodes'),
		'type'    => 'text',
	),
    'membership' => array(
        'label'   => esc_html__('Membership ID', 'kerge-shortcodes'),
        'desc'    => esc_html__('Write the ID number of the certificate.', 'kerge-shortcodes'),
        'type'    => 'text',
    ),
    'cert_link' => array(
        'label'   => esc_html__('Certificate Link', 'kerge-shortcodes'),
        'desc'    => esc_html__('Specify a link to an external resource that contains your certificate. This link will be used instead of opening the certificate image.', 'kerge-shortcodes'),
        'type'    => 'text',
    ),
    'date'    => array(
        'label' => esc_html__( 'Short Description', 'kerge-shortcodes' ),
        'desc'  => esc_html__( 'Date of receipt of the certificate.', 'kerge-shortcodes' ),
        'type'  => 'text',
        'value' => '',
    ),
    'logo'  => array(
        'label' => esc_html__( 'Logo', 'kerge-shortcodes' ),
        'desc'  => esc_html__( 'Upload a logo image. Logo of the company issuing the certificate.', 'kerge-shortcodes' ),
        'type'  => 'upload'
    ),
    'image'  => array(
        'label' => esc_html__( 'Image', 'kerge-shortcodes' ),
        'desc'  => esc_html__( 'Optional field. Upload a certificate image. The image of the certificate that will be displayed after clicking on the block with the description of the certificate.', 'kerge-shortcodes' ),
        'type'  => 'upload'
    ),
);