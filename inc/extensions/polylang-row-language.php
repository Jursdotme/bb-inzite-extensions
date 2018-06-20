<?php
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'polylang/polylang.php' ) ) {
    add_filter( 'fl_builder_register_settings_form', 'inz_polylang_row_option', 10, 2 );
    add_filter( 'fl_builder_is_node_visible', 'inz_polylang_visibility_check', 10, 2 );
}

function inz_polylang_row_option( $form, $id )
{

    $language_names        = pll_languages_list( array( 'fields' => 'name' ) );
    $language_slugs        = pll_languages_list();
    $language_array        = array_combine( $language_slugs, $language_names );
    $language_array['all'] = 'All';

    if ( 'row' == $id ) {
        // Modify the $form array for rows as needed.

        $form['tabs']['advanced']['sections']['visibility']['fields']['polylang'] = array(
            'type'    => 'select',
            'label'   => __( 'Row language', 'fl-builder' ),
            'default' => 'all',
            'options' => $language_array,
        );
    }

    return $form;
}

function inz_polylang_visibility_check( $is_visible, $node )
{
    if ( 'row' == $node->type ) {

        if ( $node->settings->polylang !== pll_get_post_language( get_the_ID() ) ) {
            $is_visible = false;
        }
        if ( $node->settings->polylang == 'all' ) {
            $is_visible = true;
        }

    }

    return $is_visible;

}
