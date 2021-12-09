<?php

echo rt_customizer_render_view(
	get_template_directory() . '/rt-customizer-builder/panel-builder/header/menu/view.php',
	[
		'atts' => $atts,
		'attr' => $attr,
		'device' => $device,
		'class' => 'header-menu-2',
		'location' => 'menu_2'
	]
);
