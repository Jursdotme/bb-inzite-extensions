<?php
class InziteDescriptionListModuleClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Description List', 'fl-builder' ),
            'description'     => __( 'List content in a table like layout.', 'fl-builder' ),
            'category'        => __( 'Inzite', 'fl-builder' ),
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
        'title'         => __( 'Items', 'fl-builder' ),
        'sections'      => array(
            'items-section'  => array(
                'title'         => __( 'Items', 'fl-builder' ),
                'fields'        => array(
                    'list_items'     => array(
                        'type'          => 'form',
                        'label'         => __('List item', 'fl-builder'),
                        'form'          => 'inz_list_item_form', // ID from registered form below
                        'preview_text'  => 'term', // Name of a field to use for the preview text
                        'multiple' => true
                    )
                )
            )
        )
    ),
    'style-tab'      => array(
        'title'         => __( 'Styling', 'fl-builder' ),
        'sections'      => array(
            'style-section'  => array(
                'title'         => __( 'List style', 'fl-builder' ),
                'fields'        => array(
                    'layout_style' => array(
                        'type'          => 'select',
                        'label'         => __( 'Layout', 'fl-builder' ),
                        'default'       => 'stacked',
                        'options'       => array(
                            'stacked'      => __( 'Stacked', 'fl-builder' ),
                            'inline'      => __( 'Inline', 'fl-builder' )
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
                'title'         => __( 'Styling', 'fl-builder' ),
                'fields'        => array(
                    'item_spacing' => array(
                        'type'          => 'unit',
                        'label'         => __( 'Item vertical spacing', 'fl-builder' ),
                        'description' => 'px',
                        'default'       => '20',
                        'responsive'  => true,
                    ),
                    'term_width' => array(
                        'type'          => 'unit',
                        'label'         => __( 'Term width', 'fl-builder' ),
                        'description' => 'px',
                        'default'       => '100',
                        'responsive'  => true,
                    ),
                    'term_float' => array(
                        'type'          => 'select',
                        'label'         => __( 'Layout', 'fl-builder' ),
                        'default'       => 'inline',
                        'options'       => array(
                            'left'      => __( 'Left', 'fl-builder' ),
                            'right'      => __( 'Right', 'fl-builder' )
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
    'title' => __('List Items', 'fl-builder'),
    'tabs'  => array(
        'items-tab'      => array( // Tab
            'title'         => __('', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'term'       => array(
                            'type'          => 'text',
                            'label'         => __('Term', 'fl-builder'),
                            'default'       => ''
                        ),
                        'description'       => array(
                            'type'          => 'text',
                            'label'         => __('Description', 'fl-builder'),
                            'default'       => ''
                        ),
                    )
                )
            )
        )
    )
));
 ?>
