<?php
function inz_sticky_column_option( $form, $id ) {

	if ( 'col' == $id ) {
		// Modify the $form array for rows as needed.
        $form['tabs']['style']['sections']['general']['fields']['equal_height']['toggle']['no']['fields'] = array('sticky');

        $form['tabs']['style']['sections']['general']['fields']['sticky'] = array(
			'type'          => 'select',
			'label'         => __( 'Make column sticky', 'bb-inz-e' ),
			'help'        => __( 'Setting this to yes will make the column "stick" to the screen even when scrolling.', 'bb-inz-e' ),
			'default'       => 'no',
			'options'       => array(
				'no'          => __( 'No', 'bb-inz-e' ),
				'yes'         => __( 'Yes', 'bb-inz-e' ),
			),
			'preview'         => array(
				'type'            => 'none',
			),
		);
	}

	return $form;
}

add_filter( 'fl_builder_register_settings_form', 'inz_sticky_column_option', 10, 2 );

function my_builder_render_js( $js, $nodes, $global_settings ) {
    wp_enqueue_script( 'sticky-columns' );
    //$js .= 'console.log( "Hello World!" );';
    $js .= 'var sidebar = new StickySidebar(".fl-col-sticky", { topSpacing: 20, bottomSpacing: 20, innerWrapperSelector: ".fl-col-content", resizeSensor: true, minWidth: '.$global_settings->responsive_breakpoint.' });';
    return $js;
}
add_filter( 'fl_builder_render_js', 'my_builder_render_js', 10, 3 );



function inz_add_sticky_class( $attrs, $col ) {
    if ( isset( $col->settings->sticky ) && 'yes' == $col->settings->sticky ) {
		if ( ! in_array( 'fl-col-sticky', $attrs['class'] ) ) {
			$attrs['class'][] = 'fl-col-sticky';
		}
	}
    return $attrs;
}
add_filter('fl_builder_column_attributes', 'inz_add_sticky_class', 10, 3 );


function inz_include_sticky_scripts() {
    wp_enqueue_script( 'sticky-columns' );
}
//add_action( 'wp_enqueue_scripts', 'inz_include_sticky_scripts' );


?>
