<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Portfolio', 'fw' );
$manifest['description'] = __(
	'This extension will add a fully fledged portfolio module that will let you display your projects'
	.' using the built in portfolio pages.',
	'fw'
);
$manifest['display'] = true;
$manifest['standalone'] = true;

$manifest['version'] = '1.0.0';
$manifest['author'] = 'LMPixels';
$manifest['author_uri'] = 'https://themeforest.net/user/lmpixels';