<?php
class InziteDividerModuleClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Divider', 'fl-builder' ),
            'description'     => __( 'Divide your sections with interesting shapes.', 'fl-builder' ),
            'category'        => __( 'Inzite', 'fl-builder' ),
            'dir'             => INZ_MODULES_DIR . 'inz-divider-module/',
            'url'             => INZ_MODULES_URL . 'inz-divider-module/',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'InziteDividerModuleClass', array(
    'slides-tab'      => array(
        'title'         => __( 'Slides', 'fl-builder' ),
        'sections'      => array(
            'slides-section'  => array(
                'title'         => __( 'Slides', 'fl-builder' ),
                'fields'        => array(
                    'form_field'     => array(
                        'type'          => 'form',
                        'label'         => __('Form Field', 'fl-builder'),
                        'form'          => 'inz_slide_settings_form', // ID from registered form below
                        'preview_text'  => 'caption', // Name of a field to use for the preview text
                        'multiple' => true
                    )
                )
            )
        )
    )
) );
 ?>
