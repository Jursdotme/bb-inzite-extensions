<?php

function inz_gradient_background_row_option( $form, $id ) {

	if ( 'row' == $id ) {
		// Modify the $form array for rows as needed.
		$form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['gradient'] = _x( 'Gradient', 'Background type.', 'fl-builder' );

		$form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['gradient']['sections'] = array( 'bg_gradient' );
		
		$form['tabs']['style']['sections']['bg_gradient'] = array(
			'title'	=> __( 'Gradient background', 'fl-builder' ),
			'fields' => array(
				'start_color' => array(
					'type'          => 'color',
					'label'         => __( 'Color', 'fl-builder' ),
					'show_reset'    => true,
					'preview'         => array(
						'type'            => 'none',
					),
					'connections'	=> array( 'color' ),
				),
				'end_color' => array(
					'type'          => 'color',
					'label'         => __( 'Color', 'fl-builder' ),
					'show_reset'    => true,
					'preview'         => array(
						'type'            => 'none',
					),
					'connections'	=> array( 'color' ),
				),
				'deg' => array(
					'type'          => 'text',
					'label'         => __( 'Orientation', 'fl-builder' ),
					'default' => '45deg',
					'preview'         => array(
						'type'            => 'none',
					),
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
		//echo '<pre>' . var_dump($row) . '</pre>';
		if ('gradient' === $row->settings->bg_type) {
			$css .= '.fl-node-'.$row->node.' > .fl-row-content-wrap { background: #'.$row->settings->start_color.'; background: linear-gradient('.$row->settings->deg.', #'.$row->settings->start_color.', #'.$row->settings->end_color.'); }';
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_gradient_background_row_render_css', 10, 3 );

?>
