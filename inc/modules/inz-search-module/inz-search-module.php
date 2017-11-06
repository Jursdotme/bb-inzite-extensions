<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class InziteSearchModule
 */
class InziteSearchModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Search filed icon', 'fl-builder'),
            'description'   => __('An basic example for coding new modules.', 'fl-builder'),
            'category'		=> __('Inzite', 'fl-builder'),
            'dir'           => INZ_BB_E_DIR . 'inc/modules/inz-search-module/',
            'url'           => INZ_BB_E_URL . 'inc/modules/inz-search-module/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('InziteSearchModule', array(
    'general'       => array( // Tab
        'title'         => __('Search icon', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Section Title', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'bg_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Background color', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ),
                    'icon_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Icon color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true,
                    ),
                    'height' => array(
                        'type'        => 'unit',
                        'label'       => 'Height',
                        'description' => 'px',
                    ),
                    'width' => array(
                        'type'        => 'unit',
                        'label'       => 'Width',
                        'description' => 'px',
                    ),
                    'search_type' => array(
                        'type'          => 'select',
                        'label'         => __( 'Search type', 'fl-builder' ),
                        'default'       => 'wp',
                        'options'       => array(
                            'wp'      => __( 'Site search', 'fl-builder' ),
                            'wc'      => __( 'WooCommerce product search', 'fl-builder' )
                        )
                    ),
                    'layout' => array(
                        'type' => 'select',
                        'label' => __( 'Layout', 'fl-builder' ),
                        'default'       => 'dropdown',
                        'options'       => array(
                            'dropdown'      => __( 'Dropdown', 'fl-builder' ),
                            'fullwidth'      => __( 'Full Width', 'fl-builder' )
                        )
                    )
                )
            )
        )
    )
));