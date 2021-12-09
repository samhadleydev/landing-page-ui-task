<?php

$class = 'rt-header-search';

$item_visibility = rt_customizer_default_akg('header_search_visibility', $atts, [
	'tablet' => true,
	'mobile' => true,
]);

$class .= ' ' . rt_customizer_visibility_classes($item_visibility);


$label_class = 'rt-label';

$label_class .= ' ' . rt_customizer_visibility_classes(rt_get_akv(
	'search_label_visibility',
	$atts,
	[
		'desktop' => false,
		'tablet' => false,
		'mobile' => false,
	]
));

$search_label = rt_get_akv('search_label', $atts, __('Search', 'rishi'));
$search_label_position = rt_customizer_expand_responsive_value(
	rt_get_akv('search_label_position', $atts, 'left')
);

$render = new Rishi_Header_Builder_Render();

if (!$render->contains_item('search')) {
	return;
}

$atts = $render->get_item_data_for('search');

$search_through = rt_get_akv('search_through', $atts, [
	'post' => true,
	'page' => true,
	'product' => true
]);

foreach (rt_customizer_manager()->post_types->get_supported_post_types() as $single_cpt) {
	if (!isset($search_through[$single_cpt])) {
		$search_through[$single_cpt] = true;
	}
}

$post_type = [];

foreach ($search_through as $single_post_type => $enabled) {
	if (!$enabled) {
		continue;
	}

	$post_type[] = $single_post_type;
}

?>

<div class="search-form-section">
	<a href="#search-modal" data-id="search" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" aria-expanded="true" data-set-focus=".search-modal .search-field" class="<?php echo esc_attr($class) ?> header-search-btn" aria-label="<?php echo __('Search', 'rishi') ?>" data-label="<?php echo $search_label_position[$device] ?>" <?php echo rt_customizer_attr_to_html($attr) ?>>

		<span class="<?php echo $label_class ?>"><?php echo $search_label; ?></span>

		<svg class="rt-icon" width="15" height="15" viewBox="0 0 15 15">
			<path d="M14.6 13L12 10.5c.7-.8 1.3-2.5 1.3-3.8 0-3.6-3-6.6-6.6-6.6C3 0 0 3.1 0 6.7c0 3.6 3 6.6 6.6 6.6 1.4 0 2.7-.6 3.8-1.2l2.5 2.3c.7.7 1.2.7 1.7.2.5-.5.5-1 0-1.6zm-8-1.4c-2.7 0-4.9-2.2-4.9-4.9s2.2-4.9 4.9-4.9 4.9 2.2 4.9 4.9c0 2.6-2.2 4.9-4.9 4.9z" />
		</svg>
	</a>
	<div class="search-toggle-form search-modal cover-modal" data-modal-target-string=".search-modal">
		<?php 
			get_search_form(['rt_post_type' => $post_type]); 
		?>
		<button class="btn-form-close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".search-modal"></button>
	</div>
</div>