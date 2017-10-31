<?php
/**
 * Plugin Name: Inzite Beaver Builder Extensions
 * Plugin URI: http://www.inzite.dk
 * Description: Custom modules and extensions for the Beaver Builder.
 * Version: 0.0.1
 * Author: Rasmus Jürs
 * Author URI: http://www.jurs.me
 */

/**
 * Add update check
 */
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/user-name/repo-name/',
	__FILE__,
	'unique-plugin-or-theme-slug'
);

/**
 * Create relative constants
 */
define( 'INZ_BB_E_DIR', plugin_dir_path( __FILE__ ) );
define( 'INZ_BB_E_URL', plugins_url( '/', __FILE__ ) );


/**
 * Load custom modules
 */
function inz_load_modules() {
    if ( class_exists( 'FLBuilder' ) ) {
        // Include your custom modules here.
        require_once 'inz-simple-slider-module/inz-simple-slider-module.php';
        require_once 'inz-definition-list-module/inz-definition-list-module.php';
        //require_once 'inz-divider-module/inz-divider-module.php';
    }
}
add_action( 'init', 'inz_load_modules' );

/**
 * Load custom functions
 */
require_once 'inc/extended-row-margins.php';
require_once 'inc/sticky-columns.php';
require_once 'inc/column-box-shadows.php';
require_once 'inc/gradient-background-row.php';
require_once 'inc/gradient-overlay-row.php';
require_once 'inc/gradient-background-column.php';
require_once 'inc/gradient-overlay-column.php';


 ?>
