<?php

$class = 'rt-footer-copyright';

$class = trim($class . ' ' . rt_customizer_visibility_classes(rt_customizer_default_akg(
	'footer_copyright_visibility',
	$atts,
	[
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	]
)));

$theme = rt_customizer_get_wp_theme();

$text = str_replace(
	'{current_year}',
	date("Y"),
	rt_customizer_translate_dynamic(rt_customizer_default_akg(
		'copyright_text',
		$atts,
		__(
			'Copyright &copy; {current_year} {site_title} - Powered by {theme_author}',
			'rishi'
		)
	), 'footer:' . $section_id . ':copyright:copyright_text')
);

$text = str_replace(
	'{site_title}',
	get_bloginfo('name'),
	$text
);

$text = str_replace(
	'{theme_author}',
	'<a href="https://rishitheme.com/" target="_blank" rel="nofollow noopener">'. esc_html__( 'Rishi Theme', 'rishi') .'</a>',
	$text
);

?>

<div class="<?php echo esc_attr($class) ?>" <?php echo rt_customizer_attr_to_html($attr) ?>>

	<?php echo $text ?>
</div>