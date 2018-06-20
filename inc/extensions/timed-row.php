<?php

add_filter( 'fl_builder_register_settings_form', 'inz_timed_row_option', 10, 2 );
add_filter( 'fl_builder_is_node_visible', 'inz_timed_row_visibility_check', 10, 2 );

function inz_timed_row_option( $form, $id )
{
    if ( 'row' == $id ) {
        // Modify the $form array for rows as needed.
        $form['tabs']['advanced']['sections']['visibility']['fields']['inz_timed_mode'] = array(
            'type'    => 'select',
            'label'   => __( 'Timed interval', 'fl-builder' ),
            'default' => 'none',
            'options' => array(
                'none' => __( 'No interval', 'fl-builder' ),
                'show' => __( 'Show in interval', 'fl-builder' ),
                'hide' => __( 'Hide in interval', 'fl-builder' ),
            ),
            'toggle'  => array(
                'show' => array(
                    'fields' => array( 'inz_timed_start_date', 'inz_timed_end_date' ),
                ),
                'hide' => array(
                    'fields' => array( 'inz_timed_start_date', 'inz_timed_end_date' ),
                ),
            ),
        );

        $form['tabs']['advanced']['sections']['visibility']['fields']['inz_timed_start_date'] = array(
            'type'  => 'inz-date-time-field',
            'label' => __( 'From', 'fl-builder' ),
        );

        $form['tabs']['advanced']['sections']['visibility']['fields']['inz_timed_end_date'] = array(
            'type'  => 'inz-date-time-field',
            'label' => __( 'To', 'fl-builder' ),
        );
    }

    return $form;
}

function inz_timed_row_visibility_check( $is_visible, $node )
{
    // echo '<pre>';
    // var_dump( $node->settings->inz_timed_start_date );
    // echo '</pre>';

    if ( 'row' == $node->type ) {
        if ( $node->settings->inz_timed_mode == 'show' || $node->settings->inz_timed_mode == 'hide' ) {
            $s_minutes = $node->settings->inz_timed_start_date['minutes'];
            $s_hours   = $node->settings->inz_timed_start_date['hours'];
            $s_day     = $node->settings->inz_timed_start_date['day'];
            $s_month   = $node->settings->inz_timed_start_date['month'];
            $s_year    = $node->settings->inz_timed_start_date['year'];
            $s_time    = $s_year . '-' . $s_month . '-' . $s_day . ' ' . $s_hours . ':' . $s_minutes . ':00';

            $e_minutes = $node->settings->inz_timed_end_date['minutes'];
            $e_hours   = $node->settings->inz_timed_end_date['hours'];
            $e_day     = $node->settings->inz_timed_end_date['day'];
            $e_month   = $node->settings->inz_timed_end_date['month'];
            $e_year    = $node->settings->inz_timed_end_date['year'];
            $e_time    = $e_year . '-' . $e_month . '-' . $e_day . ' ' . $e_hours . ':' . $e_minutes . ':00';

            $c_time = current_time( 'mysql' );
            $date1  = DateTime::createFromFormat( 'Y-m-d H:i:s', $c_time );
            $date2  = DateTime::createFromFormat( 'Y-m-d H:i:s', $s_time );
            $date3  = DateTime::createFromFormat( 'Y-m-d H:i:s', $e_time );

            // echo '<pre>';
            // var_dump( $node->settings->inz_timed_mode );
            // echo '</pre>';

            if ( $node->settings->inz_timed_mode == 'hide' && $date1 > $date2 && $date1 < $date3 ) {
                $is_visible = false;
                //print_r( 'hidden' );
            }
            if ( $node->settings->inz_timed_mode == 'show' && ( $date1 < $date2 || $date1 > $date3 ) ) {
                $is_visible = false;
                //print_r( 'hidden' );
            } else {
                //print_r( 'visible' );
            }
        }
    }

    return $is_visible;

}
