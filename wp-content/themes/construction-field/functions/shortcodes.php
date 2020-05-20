<?php
function layer_shortcode( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class' => ''
	), $atts));

	return '<div class="'.$class.'">'.$content.'</div>';
}
add_shortcode('layer', 'layer_shortcode');

?>