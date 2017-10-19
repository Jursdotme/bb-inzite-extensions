<?php

function inz_column_shadow_option( $form, $id ) {

	if ( 'col' == $id ) {
		

	}

	return $form;
}
add_filter( 'fl_builder_register_settings_form', 'inz_column_shadow_option', 10, 2 );


function inz_add_box_shadow( $attrs, $col ) {

    return $attrs;
}
add_filter('fl_builder_column_attributes', 'inz_add_box_shadow', 10, 3 );

function inz_box_shadow_render_css( $css, $nodes, $global_settings ) {
	 return $css;
}
add_filter( 'fl_builder_render_css', 'inz_box_shadow_render_css', 10, 3 );

?>
