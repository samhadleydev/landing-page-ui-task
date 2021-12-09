<?php

echo rt_customizer_render_view(
	get_template_directory() . '/rt-customizer-builder/panel-builder/footer/widget-area-1/view.php',
	[
		'atts'    => $atts,
		'attr'    => $attr,
		'class'   => 'footer-six',
		'sidebar' => 'footer-six'
	]
);
