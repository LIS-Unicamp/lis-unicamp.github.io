<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    'animate' => '',
), $atts));

$el_class = $this->getExtraClass($el_class);
switch ($width) {
	case '1/2': $width_class = 'one-half';
		break;
	case '1/3': $width_class = 'one-third';
		break;
	case '2/3': $width_class = 'two-thirds';
		break;
	case '1/4': $width_class = 'one-quarter';
		break;
	case '3/4': $width_class = 'three-quarters';
		break;
	default: $width_class = 'full-width';
}

$animate_class = ($animate != '')?' animate_'.$animate:'';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class.$el_class.$animate_class, $this->settings['base']);
//$output .= "\n\t".'<div class="'.$css_class.'">';
//$output .= "\n\t\t".'<div class="wpb_wrapper">';
//$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
//$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
//$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

$output = '<div class="'.$css_class.'">'.do_shortcode($content).'</div>';

echo $output;