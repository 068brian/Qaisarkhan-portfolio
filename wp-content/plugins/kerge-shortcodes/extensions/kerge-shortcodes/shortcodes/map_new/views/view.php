<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$address = $atts['address'];
$zoom = $atts['map_zoom'];
$height = $atts['map_height'];

printf(
	'<div class="lmpixels-map">
			<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near" title="%3$s" aria-label="%3$s" style="height: %4$spx;"></iframe>
	</div>',
	rawurlencode( $address ),
	absint( $zoom ),
	esc_attr( $address ),
	esc_attr( $height )
);
?>
