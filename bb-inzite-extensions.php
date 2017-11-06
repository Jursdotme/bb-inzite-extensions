<?php
/**
 * Plugin Name: Inzite Beaver Builder Extensions
 * Plugin URI: http://www.inzite.dk
 * Description: Custom modules and extensions for the Beaver Builder.
 * Version: 0.1.2
 * Author: Rasmus Jürs
 * Author URI: http://www.jurs.me
 * Required WP: 4.8.3
 * Tested WP: 4.8.3
 * Requires at least: 4.8.3
 * Tested up to: 4.8.3
 * Domain Path: /lang
 * Text Domain: bb-inz-e
 */

 /**
 * Create relative constants
 */
define( 'INZ_BB_E_DIR', plugin_dir_path( __FILE__ ) );
define( 'INZ_BB_E_URL', plugins_url( '/', __FILE__ ) );

/**
 * Initialize the language files
 */
function bb_inz_e_init_lang() {
    load_plugin_textdomain('bb-inz-e', false, dirname(plugin_basename(__FILE__)). '/lang/');
}
add_action('plugins_loaded', 'bb_inz_e_init_lang');

/**
 * Add update check
 */
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Jursdotme/bb-inzite-extensions/',
	__FILE__,
	'bb-inzite-extensions'
);

/**
 * Load custom modules
 */
function inz_load_modules() {
    if ( class_exists( 'FLBuilder' ) ) {
        // Include your custom modules here.
        // require_once 'inc/modules/inz-simple-slider-module/inz-simple-slider-module.php';
        require_once 'inc/modules/inz-description-list-module/inz-description-list-module.php';
        require_once 'inc/modules/inz-column-heading-module/inz-column-heading-module.php';
        require_once 'inc/modules/inz-search-module/inz-search-module.php';
    }
}
add_action( 'init', 'inz_load_modules' );

/**
 * Load custom functions
 */
require_once 'inc/extensions/extended-row-margins.php';
require_once 'inc/extensions/sticky-columns.php';
require_once 'inc/extensions/column-box-shadows.php';
require_once 'inc/extensions/gradient-background-row.php';
require_once 'inc/extensions/gradient-overlay-row.php';
require_once 'inc/extensions/gradient-background-column.php';
require_once 'inc/extensions/gradient-overlay-column.php';
require_once 'inc/extensions/column-border-radius.php';

 ?>
