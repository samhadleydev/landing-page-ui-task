<?php

if (!isset($prefix)) {
	$prefix         = '';
	$initial_prefix = '';
} else {
	$initial_prefix = $prefix;
	$prefix         = $prefix . '_';
}

$options = [
	$prefix . 'has_posts_reveal' => [
		'label' => __('Cards Reveal Effect', 'rishi'),
		'type'  => 'rara-switch',
		'value' => 'no',
	],
];
