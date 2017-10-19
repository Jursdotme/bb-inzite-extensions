<?php
/**
 * Plugin Name: Inzite Custom Modules
 * Plugin URI: http://www.inzite.dk
 * Description: Custom modules for the Beaver Builder Plugin.
 * Version: 1.0
 * Author: Rasmus Jürs
 * Author URI: http://www.jurs.me
 */
define( 'INZ_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'INZ_MODULES_URL', plugins_url( '/', __FILE__ ) );


// Load custom modules
function inz_load_modules() {
    if ( class_exists( 'FLBuilder' ) ) {
        // Include your custom modules here.
        require_once 'inz-simple-slider-module/inz-simple-slider-module.php';
        require_once 'inz-divider-module/inz-divider-module.php';
    }
}
add_action( 'init', 'inz_load_modules' );


// Load custom functions
require_once 'inc/extended-row-margins.php';
require_once 'inc/sticky-columns.php';
require_once 'inc/column-box-shadows.php';



 ?>
