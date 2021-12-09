<?php

$trigger_type = rt_customizer_default_akg('mobile_menu_trigger_type', $atts, 'type-1');
$trigger_design = rt_customizer_default_akg('trigger_design', $atts, 'simple');
$has_label = rt_customizer_default_akg('has_trigger_label', $atts, 'no') === 'yes';

$design = $trigger_design;

if ($has_label) {
	$trigger_label_alignment = rt_customizer_default_akg('trigger_label_alignment', $atts, 'right');
	$design .= ':' . $trigger_label_alignment;
}

$has_label_output = '';

if (!$has_label) {
	$has_label_output = 'hidden';
}

$trigger_label = rt_customizer_default_akg('trigger_label', $atts, __('Menu', 'rishi'))

?>

<a href="#offcanvas" class="rt-header-trigger" data-design="<?php echo $design ?>" aria-label="<?php echo $trigger_label ?>" <?php echo rt_customizer_attr_to_html($attr) ?>>

	<span class="rt-trigger" data-type="<?php echo esc_attr($trigger_type) ?>">
		<span></span>
	</span>

	<span class="rt-label" <?php echo $has_label_output ?>>
		<?php echo $trigger_label ?>
	</span>
</a>