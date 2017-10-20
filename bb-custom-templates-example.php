<?php
/**
 * Plugin Name: Inzite Custom Templates for BB
 * Plugin URI: http://www.inzite.dk
 * Description: Adds a bunch of templates to the pagebuilder.
 * Version: 1.0
 * Author: Inzite Media
 * Author URI: http://www.inzite.dk
 */
define( 'INZ_TEMPLATES_DIR', plugin_dir_path( __FILE__ ) );
define( 'INZ_TEMPLATES_URL', plugins_url( '/', __FILE__ ) );

function fl_templates_example_load() {

	/**
	 * Return if the builder isn't installed or if the current
	 * version doesn't support registering templates.
	 */
	if ( ! class_exists( 'FLBuilder' ) || ! method_exists( 'FLBuilder', 'register_templates' ) ) {
		return;
	}

	/**
	 * Register the path to your templates.dat file.
	 */
	FLBuilder::register_templates( INZ_TEMPLATES_DIR . 'data/templates.dat' );
}

add_action( 'plugins_loaded', 'fl_templates_example_load' );
