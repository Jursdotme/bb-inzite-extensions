<?php

function inz_gradient_overlay_option( $form, $id ) {

	if ( 'row' == $id ) {
		// Modify the $form array for rows as needed.

		$form['tabs']['style']['sections']['bg_overlay']['fields']['overlay_type'] = array(
			'type'          => 'select',
			'label'         => __( 'Overlay type', 'fl-builder' ),
			'default'       => 'color',
			'options'       => array(
				'color'             => __( 'Color', 'fl-builder' ),
				'gradient'             => _x( 'Gradient', 'Speed.', 'fl-builder' ),
			),
			'preview'         => array(
				'type'            => 'none',
			),
			'toggle'        => array(
				'gradient'      => array(
					'fields'        => array( 
						'second_color',
						'deg',
					),
				),
			),
		);
		
		$form['tabs']['style']['sections']['bg_overlay']['fields']['second_overlay_color'] = array(
			'type'          => 'color',
			'label'         => __( 'Second color', 'fl-builder' ),
			'show_reset'    => true,
			'preview'         => array(
				'type'            => 'none',
			),
			'connections'	=> array( 'color' ),
		);
				
		$form['tabs']['style']['sections']['bg_overlay']['fields']['overlay_deg'] = array(
			'type'          => 'text',
			'label'         => __( 'Orientation', 'fl-builder' ),
			'default' => '45deg',
			'preview'         => array(
				'type'            => 'none',
			),
		);
	}

	return $form;
}
add_filter( 'fl_builder_register_settings_form', 'inz_gradient_overlay_option', 10, 2 );


function inz_add_gradient_overlay( $attrs, $col ) {

    return $attrs;
}
add_filter('fl_builder_column_attributes', 'inz_add_gradient_overlay', 10, 3 );

function inz_gradient_overlay_render_css( $css, $nodes, $global_settings ) {
	foreach ( $nodes['rows'] as $row ) {
		//echo '<pre>' . var_dump($row) . '</pre>';
		if ( 'gradient' === $row->settings->overlay_type && 'photo' === $row->settings->bg_type ) {
			$css .= '.fl-node-'.$row->node.' > .fl-row-content-wrap:after {'.
				'background: #'.$row->settings->bg_overlay_color.';'.
				'background: linear-gradient('.$row->settings->overlay_deg.','.
				'rgba('. implode( ',', FLBuilderColor::hex_to_rgb( $row->settings->bg_overlay_color ) ). ','. $row->settings->bg_overlay_opacity / 100 .'),'.
				'rgba('. implode( ',', FLBuilderColor::hex_to_rgb( $row->settings->second_overlay_color ) ). ',' .$row->settings->bg_overlay_opacity / 100 .'));}';
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_gradient_overlay_render_css', 10, 3 );

?>
