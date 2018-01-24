<?php

/**
 * @class InziteFeatureModuleClass
 */
class InziteFeatureModuleClass extends FLBuilderModule
{

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name' => __('Feature', 'fl-builder'),
			'description' => __('Display a title/page heading with settings specifically for column headings.', 'fl-builder'),
			'category' => __('Inzite', 'fl-builder'),
			'partial_refresh' => true,
			'icon' => 'text.svg',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('InziteFeatureModuleClass', array(
	'general' => array(
		'title' => __('General', 'fl-builder'),
		'sections' => array(
			'general' => array(
				'title' => 'General',
				'fields' => array(
					'background_image' => array(
						'type' => 'photo',
						'label' => __('Background Image', 'fl-builder'),
						'show_remove' => false,
					),

					'heading' => array(
						'type' => 'text',
						'label' => __('Heading', 'fl-builder'),
						'default' => '',
						'preview' => array(
							'type' => 'text',
							'selector' => '.fl-heading-text',
						),
						'connections' => array('string'),
					),
					'sub_heading' => array(
						'type' => 'text',
						'label' => __('Subheading', 'fl-builder'),
						'default' => '',
						'preview' => array(
							'type' => 'text',
							'selector' => '.fl-heading-text',
						),
						'connections' => array('string'),
					),
					'link' => array(
						'type' => 'link',
						'label' => __('Link', 'fl-builder')
					),
					'caption_background_color' => array(
						'type' => 'color',
						'label' => __('Caption background color', 'fl-builder'),
						'default' => 'rgba(10,10,10,0.8)',
						'show_reset' => true,
						'show_alpha' => true
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __('Text color', 'fl-builder'),
						'default' => 'ffffff',
						'show_reset' => true,
						'show_alpha' => false
					),
				),
			),
		),
	),
));
