<?php
/**
 * Megla Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Megla Lite
 */

if ( ! defined( 'MEGLA_LITE_VERSION' ) ) {
	$megla_lite_theme = wp_get_theme();
	define( 'MEGLA_LITE_VERSION', $megla_lite_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function megla_lite_scripts() {
    wp_enqueue_style( 'megla-lite-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','megla-default-block','megla-style'), '', 'all');
    wp_enqueue_style( 'megla-lite-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), MEGLA_LITE_VERSION, 'all');

    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.min.js',array('jquery'), MEGLA_LITE_VERSION, true );
    wp_enqueue_script( 'megla-lite-main-js', get_stylesheet_directory_uri() . '/assets/js/megla-lite-main.js',array('jquery','megla-script'), MEGLA_LITE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'megla_lite_scripts' );