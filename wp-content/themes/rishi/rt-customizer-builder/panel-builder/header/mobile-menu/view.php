<?php

$attr['data-type'] = rt_customizer_default_akg('mobile_menu_type', $atts, 'type-1');

ob_start();

$menu_args = [];

$menu = rt_customizer_default_akg('menu', $atts, 'rt_customizer_location');

if ($menu === 'rt_customizer_location') {
} else {
	$menu_args['menu'] = $menu;
}

add_filter(
	'nav_menu_item_title',
	'rt_customizer_handle_nav_menu_item_title',
	10,
	4
);

wp_nav_menu($menu === 'rt_customizer_location' ? [
	'container' => false,
	'menu_class' => false,
	'fallback_cb' => 'rt_customizer_main_menu_fallback',
	'rt_customizer_advanced_item' => true,
	'theme_location' => 'menu_mobile'
] : array_merge([
	'container' => false,
	'menu_class' => false,
	'fallback_cb' => 'rt_customizer_main_menu_fallback',
	'rt_customizer_advanced_item' => true
], $menu_args));

remove_filter(
	'nav_menu_item_title',
	'rt_customizer_handle_nav_menu_item_title',
	10,
	4
);

$menu_output = ob_get_clean();

$class = 'mobile-menu';

if (strpos($menu_output, 'sub-menu')) {
	$class .= ' has-submenu';
}

?>

<nav class="<?php echo $class ?>" <?php echo rt_customizer_attr_to_html($attr) ?>>
	<?php echo $menu_output ?>
</nav>