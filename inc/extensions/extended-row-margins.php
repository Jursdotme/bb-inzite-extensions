<?php
function inz_extend_margin_content_width_option( $form, $id ) {

	if ( 'row' == $id ) {
		// Modify the $form array for rows as needed.
        $form['tabs']['style']['sections']['general']['fields']['content_width']['options']['extend'] = __( 'Extended margins', 'bb-inz-e' );
	}

	return $form;
}

add_filter( 'fl_builder_register_settings_form', 'inz_extend_margin_content_width_option', 10, 2 );


function inz_extend_margin_render_css( $css, $nodes, $global_settings ) {
    $css .= '.fl-row-extend-width .fl-col:first-child .fl-col-content { padding-left: calc((100vw - '.$global_settings->row_width.'px) / 2); }';
    $css .= '.fl-row-extend-width .fl-col:last-of-type .fl-col-content { padding-right: calc((100vw - '.$global_settings->row_width.'px) / 2); }';
    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_extend_margin_render_css', 10, 3 );
 ?>
