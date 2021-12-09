<?php

$class = trim('rt-footer-socials' . ' ' . rt_customizer_visibility_classes(rt_customizer_default_akg(
	'footer_socials_visibility',
	$atts,
	[
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	]
)));

$socialsColor = rt_customizer_default_akg('footerSocialsColor', $atts, 'custom');
$socialsType = rt_customizer_default_akg('socialsType', $atts, 'simple');

$socials = rt_customizer_default_akg(
	'footer_socials',
	$atts,
	[
		[
			'id' => 'facebook',
			'enabled' => true,
		],

		[
			'id' => 'twitter',
			'enabled' => true,
		],

		[
			'id' => 'instagram',
			'enabled' => true,
		],
	]
);

?>

<div class="<?php echo esc_attr($class) ?>" <?php echo rt_customizer_attr_to_html($attr) ?>>

	<?php echo rt_customizer_social_icons($socials, [
		'type' => $socialsType,
		'icons-color' => $socialsColor,
		'fill' => rt_customizer_default_akg(
			'socialsFillType',
			$atts,
			'solid'
		),
		'hide_labels' => !rt_customizer_some_device(rt_customizer_default_akg(
			'socialsLabelVisibility',
			$atts,
			[
				'desktop' => false,
				'tablet' => false,
				'mobile' => false,
			]
		))
	]) ?>
</div>