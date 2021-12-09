<?php

$class = 'rt-header-text';

if ($panel_type === 'header') {
	$search_visibility = rt_customizer_default_akg('visibility', $atts, [
		'tablet' => true,
		'mobile' => true,
	]);
} else {
	$search_visibility = rt_customizer_default_akg('footer_visibility', $atts, [
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	]);
}

$headerLinkUnderLine = rt_customizer_default_akg('headerLinkUnderLine', $atts ,'no' );

$class .= ' ' . rt_customizer_visibility_classes($search_visibility);

$text = do_shortcode(
	rt_customizer_translate_dynamic(
		rt_customizer_default_akg(
			'header_text',
			$atts,
			__('Sample text', 'rishi')
		)
	),
	'header:' . $section_id . ':text:header_text'
);

?>

<div class="<?php echo esc_attr($class) ?>" <?php echo rt_customizer_attr_to_html($attr) ?> data-header-style="<?php echo esc_attr( $headerLinkUnderLine ); ?>">
	<div class="entry-content">
		<?php echo $text ?>
	</div>
</div>