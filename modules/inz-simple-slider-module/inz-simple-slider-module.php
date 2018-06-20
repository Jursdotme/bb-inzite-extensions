<?php
class InziteSimpleSliderModuleClass extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Simpel Slider', 'fl-builder'),
            'description' => __('A simple slider with barebones styling', 'fl-builder'),
            'category' => __('Inzite', 'fl-builder'),
            'dir' => INZ_BB_E_DIR . 'inz-simple-slider-module/',
            'url' => INZ_BB_E_URL . 'inz-simple-slider-module/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }

    public function enqueue_scripts()
    {
        $this->add_css('slick-core', $this->url . 'css/slick.css');
        $this->add_css('slick-theme', $this->url . 'css/slick-theme.css');
        $this->add_js('slick-slider', $this->url . 'js/simple-slider.js', array('jquery', 'slick'), '', true);
        $this->add_js('slick', $this->url . 'js/slick.min.js', array('jquery'), '', true);
    }

}

FLBuilder::register_module('InziteSimpleSliderModuleClass', array(
    'slides-tab' => array(
        'title' => __('Slides', 'fl-builder'),
        'sections' => array(
            'slides-section' => array(
                'title' => __('Slides', 'fl-builder'),
                'fields' => array(
                    'form_field' => array(
                        'type' => 'form',
                        'label' => __('Form Field', 'fl-builder'),
                        'form' => 'inz_slide_settings_form', // ID from registered form below
                        'preview_text' => 'caption', // Name of a field to use for the preview text
                        'multiple' => true
                    )
                )
            )
        )
    ),
    'style-tab' => array(
        'title' => __('Styling', 'fl-builder'),
        'sections' => array(
            'style-section' => array(
                'title' => __('Slides', 'fl-builder'),
                'fields' => array(
                    'autoplay' => array(
                        'type' => 'select',
                        'label' => __('Autoplay', 'fl-builder'),
                        'default' => 'true',
                        'options' => array(
                            'true' => __('On', 'fl-builder'),
                            'false' => __('Off', 'fl-builder')
                        ),
                    ),
                    'fade' => array(
                        'type' => 'select',
                        'label' => __('Autoplay', 'fl-builder'),
                        'default' => 'true',
                        'options' => array(
                            'true' => __('Fade', 'fl-builder'),
                            'false' => __('Slide', 'fl-builder')
                        ),
                    ),
                    'autoplaySpeed' => array(
                        'type' => 'text',
                        'label' => __('Autoplay', 'fl-builder'),
                        'default' => '5000',
                        'help' => __('Amount of time between slides defined in milliseconds.', 'fl-builder')
                    ),
                    'speed' => array(
                        'type' => 'text',
                        'label' => __('Change speed', 'fl-builder'),
                        'default' => '1',
                        'help' => __('Amount of time a slide change takes defined in milliseconds.', 'fl-builder')
                    ),
                    'arrows' => array(
                        'type' => 'select',
                        'label' => __('Arrows', 'fl-builder'),
                        'default' => 'true',
                        'options' => array(
                            'true' => __('On', 'fl-builder'),
                            'false' => __('Off', 'fl-builder')
                        ),
                    ),
                    'dots' => array(
                        'type' => 'select',
                        'label' => __('Dots', 'fl-builder'),
                        'default' => 'true',
                        'options' => array(
                            'true' => __('On', 'fl-builder'),
                            'false' => __('Off', 'fl-builder')
                        ),
                    ),
                    'pauseOnHover' => array(
                        'type' => 'select',
                        'label' => __('Pause on hover', 'fl-builder'),
                        'default' => 'true',
                        'options' => array(
                            'true' => __('On', 'fl-builder'),
                            'false' => __('Off', 'fl-builder')
                        ),
                    ),
                    'slide_styling' => array(
                        'type' => 'code',
                        'editor' => 'css',
                        'rows' => '15',
                        'default' =>
                            '.inz-simple-slider__item {
                            min-height: 300px;
                            background-size: cover;
                            background-position: center;
                            display: flex;
                            align-items: flex-end;
                        }

                        .inz-simple-slider__caption {
                            color: #fff;
                            font-size: 3em;
                            width: 100%;
                            max-width: 1100px;
                            margin: 0 auto;
                        }'
                    ),
                )
            )
        )
    )
));


/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('inz_slide_settings_form', array(
    'title' => __('Slide settings', 'fl-builder'),
    'tabs' => array(
        'slides-tab' => array( // Tab
            'title' => __('Slides', 'fl-builder'), // Tab title
            'sections' => array( // Tab Sections
                'general' => array( // Section
                    'title' => '', // Section Title
                    'fields' => array( // Section Fields
                        'caption' => array(
                            'type' => 'text',
                            'label' => __('Caption', 'fl-builder'),
                            'default' => ''
                        ),
                        'background' => array(
                            'type' => 'photo',
                            'label' => __('Background', 'fl-builder'),
                            'show_remove' => false
                        ),
                    )
                )
            )
        )
    )
));
?>
