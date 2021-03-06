<?php

function inz_gradient_background_row_option( $form, $id ) {

	if ( 'row' == $id ) {
		// Modify the $form array for rows as needed.
		$form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['gradient'] = _x( 'Gradient', 'Background type.', 'bb-inz-e' );

		$form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['gradient']['sections'] = array( 'bg_gradient' );
		
		$form['tabs']['style']['sections']['bg_gradient'] = array(
			'title'	=> __( 'Gradient background', 'bb-inz-e' ),
			'fields' => array(
				'start_color' => array(
					'type'          => 'color',
					'label'         => __( 'Color', 'bb-inz-e' ),
					'show_reset'    => true,
					'connections'	=> array( 'color' ),
				),
				'end_color' => array(
					'type'          => 'color',
					'label'         => __( 'Color', 'bb-inz-e' ),
					'show_reset'    => true,
					'connections'	=> array( 'color' ),
				),
				'deg' => array(
					'type'          => 'unit',
					'label'         => __( 'Orientation', 'bb-inz-e' ),
					'default' => '45',
					'description' => __('degrees', 'bb-inz-e'),
				),
			),
		);
	}

	return $form;
}
add_filter( 'fl_builder_register_settings_form', 'inz_gradient_background_row_option', 10, 2 );


function inz_add_gradient_background_row( $attrs, $col ) {

    return $attrs;
}
add_filter('fl_builder_column_attributes', 'inz_add_gradient_background_row', 10, 3 );

function inz_gradient_background_row_render_css( $css, $nodes, $global_settings ) {
	foreach ( $nodes['rows'] as $row ) {
		if ('gradient' === $row->settings->bg_type) {
			$css .= '.fl-node-'.$row->node.' > .fl-row-content-wrap { background: #'.$row->settings->end_color.'; background: linear-gradient('.$row->settings->deg.'deg, #'.$row->settings->end_color.', #'.$row->settings->start_color.'); }';
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_gradient_background_row_render_css', 10, 3 );

?>
