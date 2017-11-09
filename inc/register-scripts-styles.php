<?php 

$css_url = plugins_url( '/css/', trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'bb-inzite-extensions.php' );
$js_url  = plugins_url( '/js/', trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'bb-inzite-extensions.php' );


/**
 * Register third party scripts
 */
wp_register_script( 'slick',  $js_url . 'slick.min.js', array( 'jquery' ), '1.8.0', true );
wp_register_script( 'lazy',  $js_url . 'jquery.lazy.min.js', array( 'jquery' ), '1.8.0', true );
wp_register_script( 'sticky-columns',  $js_url . 'sticky-columns.js', array(), INZ_BB_E_VERSION, false );
wp_register_script( 'fancybox-3',  $js_url . 'jquery.fancybox.min.js', array( 'jquery' ), '3.0.2', true );


/**
 * Register third party styles
 */
wp_register_style( 'slick-core',  $css_url . 'slick.css', array(), '1.8.0', 'all' );
wp_register_style( 'slick-theme',  $css_url . 'slick-theme.css', array( 'slick-core' ), '1.8.0', 'all' );
wp_register_style( 'fancybox-3',  $css_url . 'jquery.fancybox.min.css', array(), '3.0.2', 'all' );

?>