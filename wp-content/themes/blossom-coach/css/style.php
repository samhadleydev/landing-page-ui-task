<?php
/**
 * Blossom Coach Dynamic Styles
 * 
 * @package Blossom_Coach
*/

function blossom_coach_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'Nunito Sans' );
    $primary_fonts   = blossom_coach_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Nunito' );
    $secondary_fonts = blossom_coach_get_fonts( $secondary_font, 'regular' );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Nunito', 'variant'=>'700' ) );
    $site_title_fonts     = blossom_coach_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 45 );
    
    $custom_css = '';
    $custom_css .= '

    :root {
        --primary-font: ' . esc_html( $primary_fonts['font'] ) . ';
        --secondary-font: ' . esc_html( $secondary_fonts['font'] ) . ';
    }
    
    .site-title, 
    .site-title-wrap .site-title{
        font-size   : ' .  absint( $site_title_font_size ) . 'px;
        font-family : ' .  esc_html( $site_title_fonts['font'] ) . ';
        font-weight : ' .  esc_html( $site_title_fonts['weight'] ) . ';
        font-style  : ' .  esc_html( $site_title_fonts['style'] ) . ';
    }';    

    wp_add_inline_style( 'blossom-coach', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'blossom_coach_dynamic_css', 99 );