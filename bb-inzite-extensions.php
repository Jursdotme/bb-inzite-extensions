<?php

/**
 * Plugin Name: Inzite Beaver Builder Extensions
 * Plugin URI: http://www.inzite.dk
 * Description: Custom modules and extensions for the Beaver Builder.
 * Version: 0.2.0
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
define( 'INZ_BB_E_VERSION', '0.1.6' );

/**
 * Initialize the language files
 */
function bb_inz_e_init_lang()
{
    load_plugin_textdomain( 'bb-inz-e', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'bb_inz_e_init_lang' );

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
 * Register third party scripts and styles
 */
require_once 'inc/register-scripts-styles.php';

/**
 * Include custom fields
 */

function inz_custom_builder_fields( $fields )
{
    $fields['inz-select-field']    = INZ_BB_E_DIR . 'inc/fields/post-select-field.php';
    $fields['inz-date-time-field'] = INZ_BB_E_DIR . 'inc/fields/date-time-field.php';
    return $fields;

}
add_filter( 'fl_builder_custom_fields', 'inz_custom_builder_fields' );

function inz_custom_field_assets()
{
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'inz-custom-fields', INZ_BB_E_URL . 'css/custom-fields.css', array(), '' );
        wp_enqueue_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css', array(), '' );
        wp_enqueue_script( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'inz_custom_field_assets' );

/**
 * Load custom modules
 */
function inz_load_modules()
{
    if ( class_exists( 'FLBuilder' ) ) {
        // Include your custom modules here.
        require_once 'modules/inz-description-list-module/inz-description-list-module.php';
        require_once 'modules/inz-column-heading-module/inz-column-heading-module.php';
        require_once 'modules/inz-search-module/inz-search-module.php';
        require_once 'modules/inz-slider-gallery-module/inz-slider-gallery-module.php';
        require_once 'modules/inz-feature-module/inz-feature-module.php';
        require_once 'modules/inz-blank-slider-module/inz-blank-slider-module.php';
        require_once 'modules/inz-posts-module/inz-posts-module.php';
    }
}
add_action( 'init', 'inz_load_modules' );

/**
 * Load custom functions
 */
require_once 'inc/extensions/extended-row-margins.php';
// require_once 'inc/extensions/sticky-columns.php';
// require_once 'inc/extensions/column-box-shadows.php'; Obsolete as of UABB 1.6.8
// require_once 'inc/extensions/gradient-background-row.php'; Obsolete as of UABB 1.6.8
require_once 'inc/extensions/gradient-overlay-row.php';
// require_once 'inc/extensions/gradient-background-column.php'; Obsolete as of UABB 1.6.8
require_once 'inc/extensions/gradient-overlay-column.php';
require_once 'inc/extensions/column-border-radius.php';
require_once 'inc/extensions/polylang-row-language.php';
require_once 'inc/extensions/timed-row.php';
