<?php

if (!isset($class)) {
	$class = 'footer-one';
}

if (!isset($sidebar)) {
	$sidebar = 'footer-one';
}

dynamic_sidebar($sidebar);
