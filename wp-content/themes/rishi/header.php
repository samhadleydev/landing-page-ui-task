<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rishi
 */
/**
 * Doctype Hook
 * 
 * @hooked rishi_doctype
 */
do_action('rishi_doctype');
?>

<head <?php rishi_microdata('head'); ?>>
    <?php
    /**
     * Before wp_head
     * 
     * @hooked rishi_head
     */
    do_action('rishi_before_wp_head');

    wp_head(); ?>
</head>

<body <?php body_class();
        rishi_microdata('body');
        if (function_exists('rt_customizer_body_attr')) {
            echo rt_customizer_body_attr();
        }
        ?>>
    <?php

    wp_body_open();


    /**
     * Before Header
     * 
     * @hooked rishi_page_start - 20 
     */
    do_action('rishi_before_header');

    /**
     * Header
     * 
     * @hooked rt_customizer_output_header - 20     
    */
    do_action( 'rishi_header' );

    /**
     * After Header
    */
    do_action( 'rishi_after_header' );

    /**
     * Content
     * 
     * @hooked rishi_content_start
     */
    do_action('rishi_content');