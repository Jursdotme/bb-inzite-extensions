<?php

function inz_gradient_overlay_column_option( $form, $id ) {

	if ( 'col' == $id ) {
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
						'second_overlay_color',
						'overlay_deg',
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
add_filter( 'fl_builder_register_settings_form', 'inz_gradient_overlay_column_option', 10, 2 );

function inz_gradient_overlay_column_render_css( $css, $nodes, $global_settings ) {
//	echo '<pre>'.$nodes.'</pre>';
	foreach ( $nodes['columns'] as $column ) {
		if ( 'gradient' === $column->settings->overlay_type ) {
			if	( 'photo' === $column->settings->bg_type || 'video' === $column->settings->bg_type || 'slideshow' === $column->settings->bg_type ) {
				$css .= '.fl-node-'.$column->node.' > .fl-col-content:after {'.
					'background: #'.$column->settings->bg_overlay_color.';'.
					'background: linear-gradient('.$column->settings->overlay_deg.','.
					'rgba('. implode( ',', FLBuilderColor::hex_to_rgb( $column->settings->bg_overlay_color ) ). ','. $column->settings->bg_overlay_opacity / 100 .'),'.
					'rgba('. implode( ',', FLBuilderColor::hex_to_rgb( $column->settings->second_overlay_color ) ). ',' .$column->settings->bg_overlay_opacity / 100 .'));}';
			}
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_gradient_overlay_column_render_css', 10, 3 );

?>
