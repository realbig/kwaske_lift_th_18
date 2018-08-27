<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

define( 'KWASKE_LIFT_VERSION', '0.1.1' );

require_once 'library/third-party.php';

add_action( 'do_meta_boxes', 'kwaske_lift_remove_mb_home' );
add_action( 'init', 'kwaske_lift_register_assets' );
add_action( 'wp_enqueue_scripts', 'kwaske_lift_enqueue_front_assets', 100 );

/**
 * Removes meta boxes for the Home Page.
 *
 * @since {{VERSION}}
 * @access private
 */
function kwaske_lift_remove_mb_home() {

	if ( kwaske_field_helpers() === false ) {
		return;
	}

	if ( get_the_ID() !== (int) get_option( 'page_on_front' ) ) {
		return;
	}

	remove_meta_box(
		'kwaske-home-about',
		'page',
		'advanced'
	);

	remove_meta_box(
		'kwaske-home-services',
		'page',
		'advanced'
	);
	
}

/**
 * Registers all theme assets.
 *
 * @since {{VERSION}}
 * @access private
 */
function kwaske_lift_register_assets() {

	wp_register_style(
		'kwaske-lift',
		get_stylesheet_directory_uri() . '/dist/assets/css/app.css',
		array( 'main-stylesheet' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : KWASKE_LIFT_VERSION
	);
}

/**
 * Enqueues all frontend theme scripts.
 *
 * @since {{VERSION}}
 * @access private
 */
function kwaske_lift_enqueue_front_assets() {

	wp_enqueue_style( 'kwaske-lift' );
}