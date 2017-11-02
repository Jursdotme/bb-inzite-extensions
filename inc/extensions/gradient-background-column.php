<?php

function inz_gradient_background_column_option( $form, $id ) {

	if ( 'col' == $id ) {
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
add_filter( 'fl_builder_register_settings_form', 'inz_gradient_background_column_option', 10, 2 );

function inz_gradient_background_column_render_css( $css, $nodes, $global_settings ) {
	foreach ( $nodes['columns'] as $col ) {
		if ('gradient' === $col->settings->bg_type) {
			$css .= '.fl-node-'.$col->node.' > .fl-col-content { background: #'.$col->settings->start_color.'; background: linear-gradient('.$col->settings->deg.'deg, #'.$col->settings->start_color.', #'.$col->settings->end_color.'); }';
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_gradient_background_column_render_css', 10, 3 );

?>
