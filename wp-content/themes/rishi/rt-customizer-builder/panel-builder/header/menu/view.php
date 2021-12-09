<?php

if (!isset($location)) {
	$location = 'menu_1';
}

if (empty($class)) {
	$class = 'header-menu-1';
}
// @rt modified for dropdown
$responsive_output = 'data-responsive="yes"';

$stretch_output = '';

if (rt_customizer_default_akg('stretch_menu', $atts, 'no') === 'yes') {
	$stretch_output = 'data-stretch';
}

$menu_type = rt_customizer_default_akg('header_menu_type', $atts, 'type-1');

if ($menu_type === 'type-2') {
	$menu_type .= ':' . rt_customizer_default_akg('menu_indicator_effect', $atts, 'default');
}

$dropdown_animation = rt_customizer_default_akg('dropdown_animation', $atts, 'type-1');
$dropdown_items_type = rt_customizer_default_akg('dropdown_items_type', $atts, 'simple');

$dropdown_output = 'data-dropdown="' . $dropdown_animation . ':' . $dropdown_items_type . '"';

$menu_args = [];

$menu = rt_customizer_default_akg('menu', $atts, 'rt_customizer_location');

if ($menu === 'rt_customizer_location') {
} else {
	$menu_args['menu'] = $menu;
}

ob_start();

add_filter(
	'nav_menu_item_title',
	'rt_customizer_handle_nav_menu_item_title',
	10,
	4
);

wp_nav_menu($menu === 'rt_customizer_location' ? [
	'menu_class'                  => 'menu',
	'fallback_cb'                 => 'rt_customizer_main_menu_fallback',
	'rt_customizer_mega_menu'     => true,
	'rt_customizer_advanced_item' => true,
	'theme_location'              => $location
] : array_merge([
	'menu_class'                  => 'menu',
	'container'                   => 'ul',
	'fallback_cb'                 => 'rt_customizer_main_menu_fallback',
	'rt_customizer_mega_menu'     => true,
	'rt_customizer_advanced_item' => true,
	'theme_location'              => $location
], $menu_args));

remove_filter(
	'nav_menu_item_title',
	'rt_customizer_handle_nav_menu_item_title',
	10,
	4
);

$menu_content = ob_get_clean();

if (
	strpos($menu_content, 'ubermenu') !== false
	||
	!apply_filters('rishi:header:menu:has-responsive-desktop-menu', true)
) {
	$responsive_output = '';
}

?>
<nav 
	id="<?php echo esc_attr($class) ?>" 
	class="<?php echo esc_attr($class) ?>" 
	<?php echo rt_customizer_attr_to_html($attr) ?> 
	data-menu="<?php echo esc_attr($menu_type) ?>"
	<?php echo $dropdown_output ?> 
	<?php echo $stretch_output ?> 
	<?php echo wp_kses_post($responsive_output) ?> 
	<?php echo rt_customizer_schema_org_definitions('navigation') ?>>
	<?php echo $menu_content; ?>
</nav>

<?php
