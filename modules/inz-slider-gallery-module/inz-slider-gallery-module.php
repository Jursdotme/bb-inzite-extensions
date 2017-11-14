<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class InziteGalleryModule
 */
class InziteSliderGalleryModule extends FLBuilderModule
{

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Slider gallery', 'fl-builder'),
            'description'   => __('Show images in a sliding gallery.', 'fl-builder'),
            'category'      => __('Inzite', 'fl-builder'),
            'dir'           => INZ_BB_E_DIR . 'modules/inz-slider-gallery-module/',
            'url'           => INZ_BB_E_URL . 'modules/inz-slider-gallery-module/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        $this->add_js( 'imagesloaded' );
        $this->add_js( 'lazy' );
        
        $this->add_js( 'slick' );
        $this->add_css( 'slick-core' );
        $this->add_css( 'slick-theme' );

        $this->add_js( 'jquery-magnificpopup' );
        $this->add_css( 'jquery-magnificpopup' );
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('InziteSliderGalleryModule', array(
    'general'       => array( // Tab
        'title'         => __('Gallery', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Section Title', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'photos'        => array(
                        'type'          => 'multiple-photos',
                        'label'         => __( 'Photos', 'fl-builder' ),
                        'connections'   => array( 'multiple-photos' ),
                    ),
                    'photo_size' => array(
                        'type'          => 'photo-sizes',
                        'label'         => __('Photo Size', 'fl-builder'),
                        'default'       => 'full'
                    ),
                    'fade_transition' => array(
                        'type'          => 'select',
                        'label'         => __( 'Transition Type', 'fl-builder' ),
                        'default'       => 'true',
                        'options'       => array(
                            'false'      => __( 'Scroll', 'fl-builder' ),
                            'true'      => __( 'Fade', 'fl-builder' )
                        )
                    ),
                    'autoplay' => array(
                        'type'          => 'select',
                        'label'         => __( 'Autoplay', 'fl-builder' ),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __( 'Enabled', 'fl-builder' ),
                            'false'      => __( 'Disabled', 'fl-builder' )
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'sections'      => array( 'autoplay' ),
                            )
                        )
                    ),
                    'use_lightbox' => array(
                        'type'          => 'select',
                        'label'         => __( 'Lightbox', 'fl-builder' ),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __( 'Show lightbox', 'fl-builder' ),
                            'false'      => __( 'No lightbox', 'fl-builder' ),
                        ),
                    ),
                    'show_arrows' => array(
                        'type'          => 'select',
                        'label'         => __( 'Arrows', 'fl-builder' ),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __( 'Show arrows', 'fl-builder' ),
                            'false'      => __( 'Hide arrows', 'fl-builder' ),
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'sections'      => array( 'arrows' ),
                            ),
                        )
                    ),
                    'navigation' => array(
                        'type'          => 'select',
                        'label'         => __( 'Navigation', 'fl-builder' ),
                        'default'       => 'thumbnails',
                        'options'       => array(
                            'thumbnails'      => __( 'Thumbnails', 'fl-builder' ),
                            'dots'      => __( 'Dots', 'fl-builder' ),
                            'none'      => __( 'Nothing', 'fl-builder' ),
                        ),
                        'toggle'        => array(
                            'thumbnails'      => array(
                                'sections'      => array( 'thumbnails' ),
                            ),
                        )
                    ),
                )
            ),
            'autoplay'       => array( // Section
                'title'         => __('Autoplay', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'autoplay_interval_speed' => array(
                        'type'        => 'unit',
                        'label'       => 'Slide interval',
                        'description' => 'ms',
                        'default' => '5000'
                    ),
                    'autoplay_transition_speed' => array(
                        'type'        => 'unit',
                        'label'       => 'Transition speed',
                        'description' => 'ms',
                        'default' => '300'
                    ),
                    'pause_on_hover' => array(
                        'type'          => 'select',
                        'label'         => __( 'Pause on hover', 'fl-builder' ),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __( 'Enabled', 'fl-builder' ),
                            'false'      => __( 'Disabled', 'fl-builder' )
                        ),
                    ),
                )
            ),
            'thumbnails'       => array( // Section
                'title'         => __('Thumbnails', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'thumbnail_size' => array(
                        'type'          => 'photo-sizes',
                        'label'         => __('Thumbnail Size', 'fl-builder'),
                        'default'       => 'thumbnail'
                    ),
                    'thumbnail_count' => array(
                        'type'        => 'unit',
                        'label'       => 'Thumbnail number',
                        'description' => '',
                        'default' => '3'
                    ),
                    'thumbnail_margin' => array(
                        'type'          => 'unit',
                        'label'         => __('Thumbnail margin', 'fl-builder'),
                        'default'       => '8',
                        'description' => 'px'
                    ),
                )
            ),
           
            'arrows'       => array( // Section
                'title'         => __('Thumbnails', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'arrow_size' => array(
                        'type'          => 'unit',
                        'label'         => __('Arrow size', 'fl-builder'),
                        'default'       => '40',
                        'description' => 'px'
                    ),
                    'arrow_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Arrow color', 'fl-builder' ),
                        'default'       => 'rgba(255,255,255,255)',
                        'show_reset'    => true,
                        'show_alpha'    => true
                    ),
                    'prev_arrow_icon' => array(
                        'type'          => 'icon',
                        'label'         => __( 'Previous arrow icon', 'fl-builder' ),
                        'default' => 'ua-icon ua-icon-chevron-left',
                        'show_remove'   => true
                    ),
                    'next_arrow_icon' => array(
                        'type'          => 'icon',
                        'label'         => __( 'Next arrow icon', 'fl-builder' ),
                        'default' => 'ua-icon ua-icon-chevron-right',
                        'show_remove'   => true
                    ),
                )
            )
        )
    )
));
