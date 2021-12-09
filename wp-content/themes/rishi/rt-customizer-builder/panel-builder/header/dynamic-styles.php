<?php

if (!function_exists('rt_customizer_assemble_selector')) {
	return;
}

if (isset($has_sticky_header) && $has_sticky_header) {
	$render = new Rishi_Header_Builder_Render();
	$header_height = $render->get_header_height($has_sticky_header);

	if (!in_array('desktop', $has_sticky_header['devices'])) {
		$header_height['desktop'] = 0;
	}

	if (!in_array('mobile', $has_sticky_header['devices'])) {
		$header_height['tablet'] = 0;
		$header_height['mobile'] = 0;
	}

	rt_customizer_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => rt_customizer_assemble_selector($root_selector),
		'variableName' => 'headerStickyHeight',
		'value' => $header_height
	]);
}
