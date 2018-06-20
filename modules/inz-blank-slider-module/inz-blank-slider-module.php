<?php
class InziteBlankSliderModuleClass extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Blank Slider', 'fl-builder'),
            'description' => __('A simple slider with barebones styling', 'fl-builder'),
            'category' => __('Inzite', 'fl-builder'),
            'dir' => INZ_BB_E_DIR . 'modules/inz-blank-slider-module/',
            'url' => INZ_BB_E_URL . 'modules/inz-blank-slider-module/',
        ));
        $this->add_css('jquery-bxslider');
        $this->add_js('jquery-bxslider');
    }
}

FLBuilder::register_module('InziteBlankSliderModuleClass', array(
    'slides-tab' => array(
        'title' => __('Slides', 'fl-builder'),
        'sections' => array(
            'slides-section' => array(
                'title' => __('Slides', 'fl-builder'),
                'fields' => array(
                    'post_type' => array(
                        'type' => 'post-type',
                        'label' => __('Post Type', 'fl-builder'),
                        'default' => 'post'
                    ),
                    'source' => array(
                        'type' => 'select',
                        'label' => __('Source', 'fl-builder'),
                        'default' => 'option-1',
                        'options' => array(
                            'acf_related' => __('ACF Related field', 'fl-builder'),

                        ),
                        'toggle' => array(
                            'acf_related' => array(
                                'fields' => array('acf_related'),
                            ),
                        )
                    ),
                    'acf_related' => array(
                        'type' => 'text',
                        'label' => __('Relationship field slug', 'fl-builder'),
                        'default' => '',
                        'help' => __('Relation field slug is found in the ACF group.', 'fl-builder')
                    ),
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
                    'slide_mode' => array(
                        'type' => 'select',
                        'label' => __('Mode', 'fl-builder'),
                        'default' => 'horizontal',
                        'options' => array(
                            'fade' => __('Fade', 'fl-builder'),
                            'horizontal' => __('Slide', 'fl-builder')
                        ),
                    ),
                    'autoplaySpeed' => array(
                        'type' => 'text',
                        'label' => __('Autoplay', 'fl-builder'),
                        'default' => '4000',
                        'help' => __('Amount of time between slides defined in milliseconds.', 'fl-builder')
                    ),
                    'speed' => array(
                        'type' => 'text',
                        'label' => __('Change speed', 'fl-builder'),
                        'default' => '1000',
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
                    'pagination' => array(
                        'type' => 'select',
                        'label' => __('Pagination', 'fl-builder'),
                        'default' => 'full',
                        'options' => array(
                            'none' => __('none', 'fl-builder'),
                            'short' => __('Numbers', 'fl-builder'),
                            'full' => __('Dots', 'fl-builder')
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
                    'min_slides' => array(
                        'type' => 'select',
                        'label' => __('Minimum slides', 'fl-builder'),
                        'default' => '1',
                        'options' => array(
                            '1' => __('1', 'fl-builder'),
                            '2' => __('2', 'fl-builder'),
                            '3' => __('3', 'fl-builder'),
                            '4' => __('4', 'fl-builder')
                        ),
                    ),
                    'max_slides' => array(
                        'type' => 'select',
                        'label' => __('Maximum slides', 'fl-builder'),
                        'default' => '3',
                        'options' => array(
                            '1' => __('1', 'fl-builder'),
                            '2' => __('2', 'fl-builder'),
                            '3' => __('3', 'fl-builder'),
                            '4' => __('4', 'fl-builder')
                        ),
                    ),
                    'slide_width' => array(
                        'type' => 'text',
                        'label' => __('Slide width', 'fl-builder'),
                        'default' => '320',
                        'help' => __('Amount of space betweem each slide in pixels.', 'fl-builder')
                    ),
                    'slide_margin' => array(
                        'type' => 'text',
                        'label' => __('Slide margin', 'fl-builder'),
                        'default' => '32',
                        'help' => __('Amount of space betweem each slide in pixels.', 'fl-builder')
                    ),
                )
            )
        )
    ),
    'markup' => array(
        'title' => __('HTML', 'fl-builder'),
        'sections' => array(
            'markup-section' => array(
                'title' => __('Markup', 'fl-builder'),
                'fields' => array(
                    'slide_markup' => array(
                        'type' => 'code',
                        'editor' => 'html',
                        'rows' => '18',
                        'connections' => array('string'),
                    ),
                ),
            )
        )
    ),
    'stylesheet' => array(
        'title' => __('CSS', 'fl-builder'),
        'sections' => array(
            'css-section' => array(
                'title' => __('CSS styles', 'fl-builder'),
                'fields' => array(
                    'slide_css' => array(
                        'type' => 'code',
                        'editor' => 'css',
                        'rows' => '18'
                    ),
                ),
            )
        )
    ),
));

?>