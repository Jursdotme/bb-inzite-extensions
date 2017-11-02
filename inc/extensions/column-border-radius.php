<?php

function inz_border_radius_option( $form, $id ) {

	if ( 'col' == $id ) {
		// Modify the $form array for rows as needed.

		$form['tabs']['style']['sections']['border']['fields']['borderradius_toggle'] = array(
			'type'    => 'select',
			'label'   => __( 'Border radius', 'bb-inz-e' ),
			'help'    => __( 'Add rounded corners to this column.', 'bb-inz-e' ),
			'default' => 'disabled',
			'options' => array(
				'disabled'     => __( 'Disabled', 'bb-inz-e' ),
				'enabled'     => __( 'Enabled', 'bb-inz-e' ),
			),
			'toggle' => array(
				'enabled' => array(
					'fields' => array(
						'round_corners',
					),
				),
			),
			'preview' => array(
				'type'   => 'none',
			),
		);

		$form['tabs']['style']['sections']['border']['fields']['round_corners'] = array(
			'type'              => 'dimension',
			'label'             => __('Round Corners', 'bb-inz-e'),
			'description'       => 'px',
		);
	}

	return $form;
}
add_filter( 'fl_builder_register_settings_form', 'inz_border_radius_option', 10, 2 );

function inz_border_radius_render_css( $css, $nodes, $global_settings ) {
	foreach ( $nodes['columns'] as $col ) {
		if ('enabled' === $col->settings->borderradius_toggle) {
			ob_start();
			?>
				.fl-node-<?php echo $col->node; ?> .fl-col-content {
						<?php if ( $col->settings->round_corners_top > 0 ) { ?>
						border-top-left-radius: <?php echo $col->settings->round_corners_top; ?>px;
						<?php } ?>
						<?php if ( $col->settings->round_corners_right > 0 ) { ?>
						border-top-right-radius: <?php echo $col->settings->round_corners_right; ?>px;
						<?php } ?>
						<?php if ( $col->settings->round_corners_bottom > 0 ) { ?>
						border-bottom-left-radius: <?php echo $col->settings->round_corners_bottom; ?>px;
						<?php } ?>
						<?php if ( $col->settings->round_corners_left > 0 ) { ?>
						border-bottom-right-radius: <?php echo $col->settings->round_corners_left; ?>px;
						<?php } ?>
				}
		
			<?php $css .= ob_get_clean();
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_border_radius_render_css', 10, 3 );

?>
