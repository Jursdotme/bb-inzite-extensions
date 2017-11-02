<?php

function inz_gradient_overlay_column_option( $form, $id ) {

	if ( 'col' == $id ) {
		// Modify the $form array for rows as needed.

		$form['tabs']['style']['sections']['bg_overlay']['fields']['overlay_type'] = array(
			'type'          => 'select',
			'label'         => __( 'Overlay type', 'bb-inz-e' ),
			'default'       => 'color',
			'options'       => array(
				'color'             => __( 'Color', 'bb-inz-e' ),
				'gradient'             => _x( 'Gradient', 'Speed.', 'bb-inz-e' ),
			),
			'toggle'        => array(
				'gradient'      => array(
					'fields'        => array( 
						'overlay_start_color',
						'overlay_end_color',
						'overlay_deg',
					),
				),
				'color' => array(
					'fields'        => array( 
						'bg_overlay_color',
					),
				),
			),
		);

		$form['tabs']['style']['sections']['bg_overlay']['fields']['overlay_start_color'] = array(
			'type'          => 'color',
			'label'         => __( 'Start color', 'bb-inz-e' ),
			'show_reset'    => true,
			'connections'	=> array( 'color' ),

		);
		$form['tabs']['style']['sections']['bg_overlay']['fields']['overlay_end_color'] = array(
			'type'          => 'color',
			'label'         => __( 'End color', 'bb-inz-e' ),
			'show_reset'    => true,
			'connections'	=> array( 'color' ),
		);
		$form['tabs']['style']['sections']['bg_overlay']['fields']['overlay_deg'] = array(
			'type'          => 'unit',
			'label'         => __( 'Orientation', 'bb-inz-e' ),
			'default' => '45',
			'description' => __('degrees', 'bb-inz-e'),
		);
	}

	return $form;
}
add_filter( 'fl_builder_register_settings_form', 'inz_gradient_overlay_column_option', 10, 2 );

function inz_gradient_overlay_column_render_css( $css, $nodes, $global_settings ) {

	foreach ( $nodes['columns'] as $column ) {
		if ( 'gradient' === $column->settings->overlay_type ) {
			if	( 'photo' === $column->settings->bg_type || 'video' === $column->settings->bg_type || 'slideshow' === $column->settings->bg_type ) {
				$css .= '.fl-node-'.$column->node.' > .fl-col-content:after {'.
					'background: #'.$column->settings->overlay_color.';'.
					'background: linear-gradient('.$column->settings->overlay_deg.'deg,'.
					'rgba('. implode( ',', FLBuilderColor::hex_to_rgb( $column->settings->overlay_start_color ) ). ','. $column->settings->bg_overlay_opacity / 100 .'),'.
					'rgba('. implode( ',', FLBuilderColor::hex_to_rgb( $column->settings->overlay_end_color ) ). ',' .$column->settings->bg_overlay_opacity / 100 .'));}';
			}
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_gradient_overlay_column_render_css', 10, 3 );

?>
