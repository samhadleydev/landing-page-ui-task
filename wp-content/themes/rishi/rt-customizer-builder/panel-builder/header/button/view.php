<?php

$class = 'rt-header-cta';

$class = trim($class . ' ' . rt_customizer_visibility_classes(
	rt_get_akv('visibility', $atts, [
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	])
));

$type = rt_customizer_default_akg('header_button_type', $atts, 'type-1');
$size = rt_customizer_default_akg('header_button_size', $atts, 'small');
$link = rt_customizer_translate_dynamic(
	rt_customizer_default_akg('header_button_link', $atts, ''),
	'header:' . $section_id . ':button:header_button_link'
);

$visibility = rt_customizer_default_akg('visibility', $atts, [
	'tablet' => true,
	'mobile' => true,
]);

$target_output = '';

if (rt_customizer_default_akg('header_button_target', $atts, 'no') === 'yes') {
	$target_output = 'target="_blank" rel="noopener noreferrer"';
}

$class .= ' ' . rt_customizer_visibility_classes( $visibility );
$button_class = 'rt-button';

if ( $type === 'type-2' ) {
	$button_class = 'rt-button-ghost';
}

$text = rt_customizer_translate_dynamic(
	rt_customizer_default_akg('header_button_text', $atts, __('Download', 'rishi')),
	'header:' . $section_id . ':button:header_button_text'
);


//additional added
$header_button_ed_nofollow  = rt_customizer_default_akg('header_button_ed_nofollow', $atts, 'no' );
$header_button_ed_sponsored = rt_customizer_default_akg('header_button_ed_sponsored', $atts, 'no' );
$header_button_ed_download  = rt_customizer_default_akg('header_button_ed_download', $atts, 'no' );

$headerButtonFontColor  = rt_customizer_default_akg('headerButtonFontColor', $atts, [
	'default' => [
		'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
	],

	'hover' => [
		'color' => RT_CSS_Injector::get_skip_rule_keyword('DEFAULT'),
	],

	'default_2' => [
		'color' => 'var(--buttonInitialColor)',
	],

	'hover_2' => [
		'color' => '#ffffff',
	],
] );

if( $header_button_ed_nofollow == 'yes' ){
	$rel_nofollow = 'nofollow';
}else{
	$rel_nofollow = '';
}
if( $header_button_ed_sponsored == 'yes' ){
	$rel_sponsored = ' sponsored';
}else{
	$rel_sponsored = '';
}
if( $header_button_ed_download == 'yes' ){
	$rel_download = ' download ';
}else{
	$rel_download = "";
}


$button_visibility = ' ' . rt_customizer_visibility_classes(
	rt_customizer_default_akg('button_visibility', $atts, [
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	])
);


?>
<div class="<?php echo esc_attr( trim( $class ) ) ?>" <?php echo rt_customizer_attr_to_html( $attr ) ?>>
	<a href="<?php echo esc_url( $link ) ?>" class="<?php echo $button_class . $button_visibility ?>" data-size="<?php echo esc_attr( $size ) ?>" <?php echo wp_kses_post( $target_output ) ?> <?php echo esc_attr( $rel_download ); ?> rel="<?php echo $rel_nofollow . $rel_sponsored; ?>">
		<?php echo $text ?>
	</a>
</div>