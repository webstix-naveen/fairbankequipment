<?php
/**
 * Fairbankequipment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Theme Version
 */
if ( ! defined( 'FB_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'FB_VERSION', '1.0.0' );
}

if ( !defined( 'FB_THEME_DIR' ) ) {
	// theme directory
    define( 'FB_THEME_DIR',  esc_url( get_template_directory() ) );
}

if ( !defined( 'FB_ASSETS_DIR' ) ) {
	// theme assets directory path
    define( 'FB_ASSETS_DIR', esc_url( get_template_directory_uri().'/assets' ) );
}

/**
 * Theme Setup
 */
require_once get_theme_file_path( 'inc/theme-initial-setup.php' );

/**
 * Theme Customizer
 */
require_once get_theme_file_path( 'inc/theme-customizer.php' );

/**
 * Template Functions
 */
require_once get_theme_file_path( 'inc/template-functions.php' );

/**
 * Ajax implementation
 */
require_once get_theme_file_path( 'inc/localize-script.php' );

/**
 * SVG Support
 */
require_once get_theme_file_path( 'inc/allow-svg-webp.php' );

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require_once get_theme_file_path( 'inc/woocommerce.php' );
}