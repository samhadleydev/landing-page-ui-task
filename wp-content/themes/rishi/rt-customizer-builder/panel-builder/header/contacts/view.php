<?php

$class = 'ct-contact-info ct-header-contact-info';

$contact_items = rt_customizer_default_akg(
	'contact_items',
	$atts,
	[
		[
			'id' => 'email',
			'enabled' => true,
			'title' => __('Email:', 'rishi'),
			'content' => 'contact@yourwebsite.com',
			'link' => 'mailto:contact@yourwebsite.com',
		],

		[
			'id' => 'phone',
			'enabled' => true,
			'title' => __('Phone:', 'rishi'),
			'content' => '123-456-7890',
			'link' => 'tel:123-456-7890',
		],
	]
);

echo rt_customizer_html_tag(
	'div',
	array_merge([
		'class' => $class,
	], $attr),
	rishi_get_contacts_output([
		'data' => $contact_items,
		'link_target' => rt_customizer_default_akg('link_target', $atts, 'no'),
		'type' => rt_get_akv('contacts_icon_shape', $atts, 'rounded'),
		'fill' => rt_get_akv('contacts_icon_fill_type', $atts, 'solid')
	])
);
