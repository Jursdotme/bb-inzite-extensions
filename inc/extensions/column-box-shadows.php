<?php

function inz_column_shadow_option( $form, $id ) {

	if ( 'col' == $id ) {
		// Modify the $form array for rows as needed.


		$form['tabs']['style']['sections']['boxshadow'] = array(
			'title'	=> __( 'Dropshadow', 'fl-builder' ),
		);

        $form['tabs']['style']['sections']['boxshadow']['fields']['shadow'] = array(
			'type'    => 'select',
			'label'   => __( 'Dropshadow', 'fl-builder' ),
			'help'    => __( 'Setting this to yes will activate box shadows for this column.', 'fl-builder' ),
			'default' => 'none',
			'options' => array(
				'no'     => __( 'none', 'fl-builder' ),
				'0dp'    => __( '0dp', 'fl-builder' ),
				'1dp'    => __( '1dp', 'fl-builder' ),
				'2dp'    => __( '2dp', 'fl-builder' ),
				'4dp'    => __( '4dp', 'fl-builder' ),
				'6dp'    => __( '6dp', 'fl-builder' ),
				'8dp'    => __( '8dp', 'fl-builder' ),
				'16dp'   => __( '16dp', 'fl-builder' ),
				'custom' => __( 'Custom', 'fl-builder' ),
			),
			'toggle' => array(
				'custom' => array(
					'fields' => array(
						'hshadow',
						'vshadow',
						'blur',
						'spread',
						'color',
					),
				),
			),
			'preview' => array(
				'type'   => 'none',
			),
		);

		$form['tabs']['style']['sections']['boxshadow']['fields']['hshadow'] = array(
			'type'  => 'text',
            'label' => __( 'Shadow horizontal position', 'fl-builder' ),
		);
		$form['tabs']['style']['sections']['boxshadow']['fields']['vshadow'] = array(
			'type'  => 'text',
            'label' => __( 'Shadow vertical position', 'fl-builder' ),
		);
		$form['tabs']['style']['sections']['boxshadow']['fields']['blur'] = array(
			'type'  => 'text',
            'label' => __( 'Shadow blur', 'fl-builder' ),
		);
		$form['tabs']['style']['sections']['boxshadow']['fields']['spread'] = array(
			'type'  => 'text',
            'label' => __( 'Shadow spread', 'fl-builder' ),
		);
		$form['tabs']['style']['sections']['boxshadow']['fields']['color'] = array(
			'type'  => 'color',
            'label' => __( 'Shadow color', 'fl-builder' ),
		);

		$form['tabs']['style']['sections']['boxshadow']['fields']['transition_shadow'] = array(
			'type'    => 'select',
			'label'   => __( 'Dropshadow hover', 'fl-builder' ),
			'help'    => __( 'Setting this to yes will activate box shadows for this column.', 'fl-builder' ),
			'default' => 'none',
			'options' => array(
				'no'     => __( 'none', 'fl-builder' ),
				'1dp'    => __( '1dp', 'fl-builder' ),
				'2dp'    => __( '2dp', 'fl-builder' ),
				'4dp'    => __( '4dp', 'fl-builder' ),
				'6dp'    => __( '6dp', 'fl-builder' ),
				'8dp'    => __( '8dp', 'fl-builder' ),
				'16dp'   => __( '16dp', 'fl-builder' ),
				//'custom' => __( 'Custom', 'fl-builder' ),
			),
			// 'toggle' => array(
			// 	'custom' => array(
			// 		'fields' => array(
			// 			'hshadow',
			// 			'vshadow',
			// 			'blur',
			// 			'spread',
			// 			'color',
			// 		),
			// 	),
			// ),
			'preview' => array(
				'type'   => 'none',
			),
		);

	}

	return $form;
}
add_filter( 'fl_builder_register_settings_form', 'inz_column_shadow_option', 10, 2 );


function inz_add_box_shadow( $attrs, $col ) {
	if ( isset( $col->settings->shadow ) && '0dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-0dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-0dp';
		}
	}
    if ( isset( $col->settings->shadow ) && '1dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-1dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-1dp';
		}
	}
	if ( isset( $col->settings->shadow ) && '2dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-2dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-2dp';
		}
	}
	if ( isset( $col->settings->shadow ) && '4dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-4dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-4dp';
		}
	}
	if ( isset( $col->settings->shadow ) && '6dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-6dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-6dp';
		}
	}
	if ( isset( $col->settings->shadow ) && '8dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-8dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-8dp';
		}
	}
	if ( isset( $col->settings->shadow ) && '16dp' == $col->settings->shadow ) {
		if ( ! in_array( 'fl-col-shadow-16dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-16dp';
		}
	}

	// Hover shadows
	if ( isset( $col->settings->transition_shadow ) && 'no' != $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover';
		}
	}

	if ( isset( $col->settings->transition_shadow ) && '1dp' == $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover-1dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover-1dp';
		}
	}
	if ( isset( $col->settings->transition_shadow ) && '2dp' == $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover-2dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover-2dp';
		}
	}
	if ( isset( $col->settings->transition_shadow ) && '4dp' == $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover-4dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover-4dp';
		}
	}
	if ( isset( $col->settings->transition_shadow ) && '6dp' == $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover-6dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover-6dp';
		}
	}
	if ( isset( $col->settings->transition_shadow ) && '8dp' == $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover-8dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover-8dp';
		}
	}
	if ( isset( $col->settings->transition_shadow ) && '16dp' == $col->settings->transition_shadow ) {
		if ( ! in_array( 'fl-col-shadow-hover-16dp', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-shadow-hover-16dp';
		}
	}
    return $attrs;
}
add_filter('fl_builder_column_attributes', 'inz_add_box_shadow', 10, 3 );

function inz_box_shadow_render_css( $css, $nodes, $global_settings ) {
	foreach ( $nodes['columns'] as $col ) {
		if ('0dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-0dp .fl-col-content { position: relative; box-shadow: 0 0 0 0 rgba(0,0,0,0), 0 0 0 0 rgba(0,0,0,0), 0 0 0 0 rgba(0,0,0,0);}';
		}
		if ('1dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-1dp .fl-col-content { position: relative; box-shadow: 0 0 2px 0 rgba(0,0,0,0.14), 0 2px 2px 0 rgba(0,0,0,0.12), 0 1px 3px 0 rgba(0,0,0,0.20);}';
		}
		if ('2dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-2dp .fl-col-content { position: relative; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.14), 0 3px 4px 0 rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.20);}';
		}
		if ('4dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-4dp .fl-col-content { position: relative; box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px 0 rgba(0,0,0,0.20);}';
		}
		if ('6dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-6dp .fl-col-content { position: relative; box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px 0 rgba(0,0,0,0.20);}';
		}
		if ('8dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-8dp .fl-col-content { position: relative; box-shadow: 0 8px 10px 1px rgba(0,0,0,0.14), 0 3px 14px 3px rgba(0,0,0,0.12), 0 4px 5px 0 rgba(0,0,0,0.20);}';
		}
		if ('16dp' === $col->settings->shadow) {
			$css .= '.fl-col-shadow-16dp .fl-col-content { position: relative; box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 6px 30px 5px rgba(0,0,0,0.12), 0 8px 10px 0 rgba(0,0,0,0.20);}';
		}
		if ('custom' === $col->settings->shadow) {
			$css .= '.fl-node-'.$col->node.' .fl-col-content {box-shadow: '.$col->settings->hshadow . ' ' . $col->settings->vshadow . ' ' . $col->settings->blur . ' ' . $col->settings->spread . ' #' . $col->settings->color . ';}';
		}

		// hover shadows
		if ('no' !== $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover .fl-col-content {transition: box-shadow .3s ease-out;}';
		}
		if ('1dp' === $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover-1dp:hover .fl-col-content { position: relative; box-shadow: 0 0 2px 0 rgba(0,0,0,0.14), 0 2px 2px 0 rgba(0,0,0,0.12), 0 1px 3px 0 rgba(0,0,0,0.20);}';
		}
		if ('2dp' === $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover-2dp:hover .fl-col-content { position: relative; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.14), 0 3px 4px 0 rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.20);}';
		}
		if ('4dp' === $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover-4dp:hover .fl-col-content { position: relative; box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px 0 rgba(0,0,0,0.20);}';
		}
		if ('6dp' === $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover-6dp:hover .fl-col-content { position: relative; box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px 0 rgba(0,0,0,0.20);}';
		}
		if ('8dp' === $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover-8dp:hover .fl-col-content { position: relative; box-shadow: 0 8px 10px 1px rgba(0,0,0,0.14), 0 3px 14px 3px rgba(0,0,0,0.12), 0 4px 5px 0 rgba(0,0,0,0.20);}';
		}
		if ('16dp' === $col->settings->transition_shadow) {
			$css .= '.fl-col-shadow-hover-16dp:hover .fl-col-content { position: relative; box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 6px 30px 5px rgba(0,0,0,0.12), 0 8px 10px 0 rgba(0,0,0,0.20);}';
		}
	}

    return $css;
}
add_filter( 'fl_builder_render_css', 'inz_box_shadow_render_css', 10, 3 );

?>
