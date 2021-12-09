<?php

if (!isset($sidebarId)) {
	$sidebarId = 'footer-one';
}

$options = [

	'widget' => [
		'type' => 'rt-widget-area',
		'sidebarId' => $sidebarId
	],

];
