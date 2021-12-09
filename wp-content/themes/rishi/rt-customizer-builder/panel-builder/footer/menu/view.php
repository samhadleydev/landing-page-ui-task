<?php

if (!isset($location)) {
	$location = 'footer';
}

if (empty($class)) {
	$class = 'footer-menu';
}

$class .= ' ' . rt_customizer_visibility_classes(rt_customizer_default_akg(
	'footer_menu_visibility',
	$atts,
	[
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	]
));

$stretch_output = '';

if (rt_customizer_default_akg('stretch_menu', $atts, 'no') === 'yes') {
	$stretch_output = 'data-stretch';
}

$menu_args = [
	'container' => false,
	'menu_class' => 'menu',
	'depth' => 1,
	'fallback_cb' => 'rt_customizer_main_menu_fallback',
	'rt_customizer_advanced_item' => true,
	'theme_location' => $location
];

$menu = rt_customizer_default_akg('menu', $atts, 'rt_customizer_location');

if ($menu === 'rt_customizer_location') {
} else {
	$menu_args['menu'] = $menu;
}

ob_start();
wp_nav_menu($menu === 'rt_customizer_location' ? [
	'container' => false,
	'menu_class' => 'menu',
	'depth' => 1,
	'fallback_cb' => 'rt_customizer_main_menu_fallback',
	'rt_customizer_advanced_item' => true,
	'theme_location' => $location
] : array_merge([
	'container' => false,
	'menu_class' => 'menu',
	'depth' => 1,
	'fallback_cb' => 'rt_customizer_main_menu_fallback',
	'rt_customizer_advanced_item' => true,
], $menu_args));
$menu_content = ob_get_clean();

?>

<nav id="<?php echo esc_attr($class) ?>" class="<?php echo esc_attr($class) ?>" <?php echo rt_customizer_attr_to_html($attr) ?> <?php echo $stretch_output ?> <?php echo rt_customizer_schema_org_definitions('navigation') ?>>

	<?php echo $menu_content; ?>
</nav>