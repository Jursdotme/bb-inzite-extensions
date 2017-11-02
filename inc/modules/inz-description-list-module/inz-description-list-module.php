<?php
class InziteDescriptionListModuleClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Description List', 'bb-inz-e' ),
            'description'     => __( 'List content in a table like layout.', 'bb-inz-e' ),
            'category'        => __( 'Inzite', 'bb-inz-e' ),
            'dir'             => INZ_BB_E_DIR . 'inc/modules/inz-description-list-module/',
            'url'             => INZ_BB_E_URL . 'inc/modules/inz-description-list-module/',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'InziteDescriptionListModuleClass', array(
    'items-tab'      => array(
        'title'         => __( 'Items', 'bb-inz-e' ),
        'sections'      => array(
            'items-section'  => array(
                'title'         => __( 'Items', 'bb-inz-e' ),
                'fields'        => array(
                    'list_items'     => array(
                        'type'          => 'form',
                        'label'         => __('List item', 'bb-inz-e'),
                        'form'          => 'inz_list_item_form', // ID from registered form below
                        'preview_text'  => 'term', // Name of a field to use for the preview text
                        'multiple' => true
                    )
                )
            )
        )
    ),
    'style-tab'      => array(
        'title'         => __( 'Styling', 'bb-inz-e' ),
        'sections'      => array(
            'style-section'  => array(
                'title'         => __( 'List style', 'bb-inz-e' ),
                'fields'        => array(
                    'layout_style' => array(
                        'type'          => 'select',
                        'label'         => __( 'Layout', 'bb-inz-e' ),
                        'default'       => 'stacked',
                        'options'       => array(
                            'stacked'      => __( 'Stacked', 'bb-inz-e' ),
                            'inline'      => __( 'Inline', 'bb-inz-e' )
                        ),
                        'toggle'        => array(
                            'inline'      => array(
                                'fields'        => array( 
                                    'term_float',
                                    'term_width'
                                ),
                            ),
                        ),
                    ),
                )
            ),
            'styling_section'  => array(
                'title'         => __( 'Styling', 'bb-inz-e' ),
                'fields'        => array(
                    'item_spacing' => array(
                        'type'          => 'unit',
                        'label'         => __( 'Item vertical spacing', 'bb-inz-e' ),
                        'description' => 'px',
                        'default'       => '20',
                        'responsive'  => true,
                    ),
                    'term_width' => array(
                        'type'          => 'unit',
                        'label'         => __( 'Term width', 'bb-inz-e' ),
                        'description' => 'px',
                        'default'       => '100',
                        'responsive'  => true,
                    ),
                    'term_float' => array(
                        'type'          => 'select',
                        'label'         => __( 'Layout', 'bb-inz-e' ),
                        'default'       => 'inline',
                        'options'       => array(
                            'left'      => __( 'Left', 'bb-inz-e' ),
                            'right'      => __( 'Right', 'bb-inz-e' )
                        ),
                    ),
                )
            )
        )
    )
) );


/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('inz_list_item_form', array(
    'title' => __('List Items', 'bb-inz-e'),
    'tabs'  => array(
        'items-tab'      => array( // Tab
            'title'         => __('', 'bb-inz-e'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'term'       => array(
                            'type'          => 'text',
                            'label'         => __('Term', 'bb-inz-e'),
                            'default'       => ''
                        ),
                        'description'       => array(
                            'type'          => 'text',
                            'label'         => __('Description', 'bb-inz-e'),
                            'default'       => ''
                        ),
                    )
                )
            )
        )
    )
));
 ?>
