<?php
$output = $el_class = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'section' => '',
    'full_width' => '',
    'background' => '',
    'img' => '',
    'parallax' => '',
    'parallax_speed' => '',
    'parallax_reverse' => '',
), $atts));

//wp_enqueue_style( 'js_composer_front' );
//wp_enqueue_script( 'wpb_composer_front_js' );
//wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'g-cols'.$el_class, $this->settings['base']);

if ($section == 'yes') {
	$parallax_params = '';
	if ($parallax == 'yes' and $img != '') {
		$parallax_speeds = array (
			'slow' => 0.2,
			'normal' => 0.4,
			'fast' => 0.6,
		);
		$parallax_speed = (isset($parallax_speeds[$parallax_speed]))?$parallax_speeds[$parallax_speed]:0.4;
		if ($parallax_reverse == 'yes') {
			$parallax_speed = -$parallax_speed;
		}
		$parallax_params = ' parallax="1" parallax_speed="'.$parallax_speed.'"';
	}
	$full_width_params = '';
	if ($full_width == 'yes') {
		$full_width_params = ' full_width="1"';
	}
	$output .= '[section background="'.$background.'" img="'.$img.'"'.$full_width_params.$parallax_params.']';
}

$output .= '<div class="'.$css_class.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$this->endBlockComment('row');

if ($section == 'yes') {
	$output .= '[/section]';
}
echo $output;