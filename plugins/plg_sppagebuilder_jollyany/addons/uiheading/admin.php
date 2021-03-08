<?php

/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2015 - 2019 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('restricted aceess');

SpAddonsConfig::addonConfig(
	array(
		'type' => 'content',
		'addon_name' => 'uiheading',
		'title' => JText::_('UI Heading'),
		'desc' => JText::_('Define different styles for headings.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uiheading/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => '',
				),

				'title' => array(
					'type' => 'textarea',
					'title' => JText::_('Content'),
					'desc' => JText::_('Enter your desired text to use as the addon heading title.'),
					'std' =>  'Heading Primary',
				),
				'use_link' => array(
					'type' => 'checkbox',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_HEADING_USE_LINK'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_HEADING_USE_LINK_DESC'),
					'std' => 0,
				),

				'title_link' => array(
					'type' => 'media',
					'format' => 'attachment',
					'title' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
					'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_DESC'),
					'placeholder' => 'http://',
					'std' => '',
					'hide_preview' => true,
					'depends' => array('use_link' => 1),
				),

				'link_new_tab' => array(
					'type' => 'select',
					'title' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
					'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
					'values' => array(
						0 => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						1 => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),
					'std' => 0,
					'depends' => array('use_link' => 1),
				),
				'separator_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Style'),
				),
				'heading_font_family'=>array(
					'type'=>'fonts',
					'title'=>JText::_('Font Family'),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.tz-title { font-family: {{ VALUE }}; }',
					)
				),
				'heading_selector' => array(
					'type' => 'select',
					'title' => JText::_('HTML Element'),
					'desc' => JText::_('Choose one of the seven heading elements to fit your semantic structure.'),
					'values' => array(
						'h1' => JText::_('h1'),
						'h2' => JText::_('h2'),
						'h3' => JText::_('h3'),
						'h4' => JText::_('h4'),
						'h5' => JText::_('h5'),
						'h6' => JText::_('h6'),
						'div' => JText::_('div'),
					),
					'std' => 'h1',
				),
				'heading_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Heading styles differ in font-size but may also come with a predefined color, size and font'),
					'values' => array(
						'' => JText::_('None'),
						'heading-2xlarge' => JText::_('2XLarge'),
						'heading-xlarge' => JText::_('XLarge'),
						'heading-large' => JText::_('Large'),
						'heading-medium' => JText::_('Medium'),
						'heading-small' => JText::_('Small'),
						'h1' => JText::_('H1'),
						'h2' => JText::_('H2'),
						'h3' => JText::_('H3'),
						'h4' => JText::_('H4'),
						'h5' => JText::_('H5'),
						'h6' => JText::_('H6'),
					),
					'std' => '',
				),
				'heading_font_weight' => array(
					'type' => 'select',
					'title' => JText::_('Font weight'),
					'desc' => JText::_('Add one of the following classes to modify the font weight of your text.'),
					'values' => array(
					  '' => JText::_('Default'),
					  'light' => JText::_('Light'),
					  'normal' => JText::_('Normal'),
					  'bold' => JText::_('Bold'),
					  'lighter' => JText::_('Lighter'),
					  'bolder' => JText::_('Bolder'),
					),
				  ),
				'decoration' => array(
					'type' => 'select',
					'title' => JText::_('Decoration'),
					'desc' => JText::_('Decorate the heading with a divider, bullet or a line that is vertically centered to the heading'),
					'values' => array(
						'' => JText::_('None'),
						'uk-heading-divider' => JText::_('Divider'),
						'uk-heading-bullet' => JText::_('Bullet'),
						'uk-heading-line' => JText::_('Line'),
					),
					'std' => '',
				),
				'decoration_color' => array(
					'type' => 'color',
					'title' => JText::_('Decoration Color'),
					'depends' => array(array('decoration', '!=', '')),
				),
				'decoration_width' => array(
					'type' => 'slider',
					'min' => 1,
					'max' => 100,
					'std' => 1,
					'title' => JText::_('Decoration Width'),
					'depends' => array(array('decoration', '!=', '')),
				),
				'heading_color' => array(
					'type' => 'select',
					'title' => JText::_('Predefined Color'),
					'desc' => JText::_('Select the text color. If the Background option is selected, styles that don\'t apply a background image use the primary color instead.'),
					'values' => array(
						'' => JText::_('None'),
						'text-muted' => JText::_('Muted'),
						'text-emphasis' => JText::_('Emphasis'),
						'text-primary' => JText::_('Primary'),
						'text-secondary' => JText::_('Secondary'),
						'text-success' => JText::_('Success'),
						'text-warning' => JText::_('Warning'),
						'text-danger' => JText::_('Danger'),
						'text-background' => JText::_('Background'),
					),
					'std' => '',
					'depends' => array(array('title', '!=', '')),
				),
				'custom_heading_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Custom Color'),
					'depends' => array(
						array('title', '!=', ''),
						array('heading_color', '=', '')
					),
				),
				'text_transform' => array(
					'type' => 'select',
					'title' => JText::_('Transform'),
					'desc' => JText::_('The following options will transform text into uppercased, capitalized or lowercased characters.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uppercase' => JText::_('Uppercase'),
						'capitalize' => JText::_('Capitalize'),
						'lowercase' => JText::_('Lowercase'),
					),
					'std' => '',
				),
				'separator_heading_options' => array(
					'type' => 'separator',
					'title' => JText::_('General'),
				),
				'parallax_bg' => array(
					'type' => 'checkbox',
					'title' => JText::_('Background Image'),
					'desc' => JText::_('Upload a background image for this add-on with and add a parallax effect or fix the background with regard to the viewport while scrolling.'),
					'std' => 0,
				),
				'separator_parallax_bg_options' => array(
					'type' => 'separator',
					'title' => JText::_('Background Settings'),
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_image' => array(
					'type' => 'media',
					'title' => JText::_('Image'),
					'std' => '',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_image_size' => array(
					'type' => 'select',
					'title' => JText::_('Image Size'),
					'desc' => JText::_('Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with the background color.'),
					'values' => array(
						'' => JText::_('Auto'),
						'uk-background-cover' => JText::_('Cover'),
						'uk-background-contain' => JText::_('Contain'),
					),
					'std' => '',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_image_effect' => array(
					'type' => 'select',
					'title' => JText::_('Image Effect'),
					'desc' => JText::_('Add a parallax effect or fix the background with regard to the viewport while scrolling.'),
					'values' => array(
						'' => JText::_('None'),
						'parallax' => JText::_('Parallax'),
						'fixed' => JText::_('Fixed'),
					),
					'std' => 'parallax',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_horizontal_start' => array(
					'type' => 'slider',
					'title' => JText::_('Horizontal Start'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the horizontal position (translateX) in pixels.'),
					'depends' => array(
						array('parallax_bg', '=', 1),
						array('parallax_bg_image_effect', '=', 'parallax')
					),
				),
				'parallax_bg_horizontal_end' => array(
					'type' => 'slider',
					'title' => JText::_('Horizontal End'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the horizontal position (translateX) in pixels.'),
					'depends' => array(
						array('parallax_bg', '=', 1),
						array('parallax_bg_image_effect', '=', 'parallax')
					),
				),
				'parallax_bg_vertical_start' => array(
					'type' => 'slider',
					'title' => JText::_('Vertical Start'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the vertical position (translateY) in pixels.'),
					'depends' => array(
						array('parallax_bg', '=', 1),
						array('parallax_bg_image_effect', '=', 'parallax')
					),
				),
				'parallax_bg_vertical_end' => array(
					'type' => 'slider',
					'title' => JText::_('Vertical End'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the vertical position (translateY) in pixels.'),
					'depends' => array(
						array('parallax_bg', '=', 1),
						array('parallax_bg_image_effect', '=', 'parallax')
					),
				),
				'parallax_bg_easing' => array(
					'type' => 'slider',
					'title' => JText::_('Easing'),
					'min' => -200,
					'max' => 200,
					'desc' => JText::_('Set the animation easing. Zero transitions at an even speed, a positive value starts off quickly while a negative value starts off slowly.'),
					'depends' => array(
						array('parallax_bg', '=', 1),
						array('parallax_bg_image_effect', '=', 'parallax')
					),
				),
				'parallax_bg_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Parallax Breakpoint'),
					'desc' => JText::_('Display the parallax effect only on this device width and larger. It is useful to disable the parallax animation on small viewports.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone)'),
						'm' => JText::_('Medium (Tablet)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(
						array('parallax_bg', '=', 1),
						array('parallax_bg_image_effect', '=', 'parallax')
					),
				),
				'parallax_bg_position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Set the initial background position, relative to the section layer.'),
					'values' => array(
						'top-left' => JText::_('Top Left'),
						'top-center' => JText::_('Top Center'),
						'top-right' => JText::_('Top Right'),
						'center-left' => JText::_('Center Left'),
						'center-center' => JText::_('Center Center'),
						'center-right' => JText::_('Center Right'),
						'bottom-left' => JText::_('Bottom Left'),
						'bottom-center' => JText::_('Bottom Center'),
						'bottom-right' => JText::_('Bottom Right'),
					),
					'std' => 'center-center',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_maxwidth' => array(
					'type' => 'select',
					'title' => JText::_('Max Width'),
					'desc' => JText::_('Set the maximum content width.'),
					'values' => array(
						'' => JText::_('Default'),
						'xsmall' => JText::_('X-Small'),
						'small' => JText::_('Small'),
						'large' => JText::_('Large'),
						'expand' => JText::_('Expand'),
						'none' => JText::_('None'),
					),
					'std' => '',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_padding' => array(
					'type' => 'select',
					'title' => JText::_('Padding'),
					'desc' => JText::_('Set the vertical padding for content inside parallax background.'),
					'values' => array(
						'' => JText::_('Default'),
						'uk-section-xsmall' => JText::_('X-Small'),
						'uk-section-small' => JText::_('Small'),
						'uk-section-large' => JText::_('Large'),
						'uk-section-xlarge' => JText::_('X-Large'),
						'uk-padding-remove-vertical' => JText::_('None'),
					),
					'std' => 'uk-section-large',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_text_color' => array(
					'type' => 'select',
					'title' => JText::_('Text Color'),
					'desc' => JText::_('Set light or dark color mode for text, buttons and controls.'),
					'values' => array(
						'' => JText::_('None'),
						'uk-light' => JText::_('Light'),
						'uk-dark' => JText::_('Dark'),
					),
					'std' => '',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_color' => array(
					'type' => 'color',
					'title' => JText::_('Background Color'),
					'desc' => JText::_('Use the background color in combination with blend modes, a transparent image or to fill the area, if the image doesn\'t cover the whole section.'),
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_blend_modes' => array(
					'type' => 'select',
					'title' => JText::_('Blend mode'),
					'desc' => JText::_('Determine how the image will blend with the background color.'),
					'values' => array(
						'' => JText::_('Normal'),
						'multiply' => JText::_('Multiply'),
						'screen' => JText::_('Screen'),
						'overlay' => JText::_('Overlay'),
						'darken' => JText::_('Darken'),
						'lighten' => JText::_('Lighten'),
						'color-dodge' => JText::_('Color Dodge'),
						'color-burn' => JText::_('Color Burn'),
						'hard-light' => JText::_('Hard Light'),
						'soft-light' => JText::_('Soft Light'),
						'difference' => JText::_('Difference'),
						'exclusion' => JText::_('Exclusion'),
						'hue' => JText::_('Hue'),
						'saturation' => JText::_('Saturation'),
						'color' => JText::_('Color'),
						'luminosity' => JText::_('Luminosity'),
					),
					'std' => 'overlay',
					'depends' => array(
						array('parallax_bg', '=', 1),
					),
				),
				'parallax_bg_overlay_color' => array(
					'type' => 'color',
					'title' => JText::_('Overlay Color'),
					'desc' => JText::_('Set an additional transparent overlay to soften the image.'),
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'parallax_bg_image_visibility' => array(
					'type' => 'select',
					'title' => JText::_('Image Visibility'),
					'desc' => JText::_('Display the image only on this device width and larger.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'separator_general_info_options' => array(
					'type' => 'separator',
					'title' => JText::_('General Settings'),
					'depends' => array(array('parallax_bg', '=', 1)),
				),
				'addon_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'desc' => JText::_('Set the vertical margin. Note: The first element\'s top margin and the last element\'s bottom margin are always removed. Define those in the grid settings instead.'),
					'values' => array(
						'' => JText::_('Keep existing'),
						'small' => JText::_('Small'),
						'default' => JText::_('Default'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'remove-vertical' => JText::_('None'),
					),
					'std' => '',
				),
				'addon_max_width' => array(
					'type' => 'select',
					'title' => JText::_('Max Width'),
					'desc' => JText::_('Set the maximum content width.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'2xlarge' => JText::_('2X-Large'),
					),
					'std' => '',
				),
				'addon_max_width_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Max Width Breakpoint'),
					'desc' => JText::_('Define the device width from which the element\'s max-width will apply.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('addon_max_width', '!=', '')),
				),
				'block_align'=>array(
					'type'=>'select',
					'title'=>JText::_('Block Alignment'),
					'desc'=>JText::_('Define the alignment in case the container exceeds the element\'s max-width.'),
					'values'=>array(
						''=>JText::_('Left'),
						'center'=>JText::_('Center'),
						'right'=>JText::_('Right'),
					),
					'std'=>'',
					'depends'=>array(array('addon_max_width', '!=', '')),
				),
				'block_align_breakpoint'=>array(
					'type'=>'select',
					'title'=>JText::_('Block Alignment Breakpoint'),
					'desc'=>JText::_('Define the device width from which the alignment will apply.'),
					'values'=>array(
						''=>JText::_('Always'),
						's'=>JText::_('Small (Phone Landscape)'),
						'm'=>JText::_('Medium (Tablet Landscape)'),
						'l'=>JText::_('Large (Desktop)'),
						'xl'=>JText::_('X-Large (Large Screens)'),
					),
					'std'=>'',
					'depends'=>array(array('addon_max_width', '!=', '')),
				),
				'block_align_fallback'=>array(
					'type'=>'select',
					'title'=>JText::_('Block Alignment Fallback'),
					'desc'=>JText::_('Define the alignment in case the container exceeds the element\'s max-width.'),
					'values'=>array(
						''=>JText::_('Left'),
						'center'=>JText::_('Center'),
						'right'=>JText::_('Right'),
					),
					'std'=>'',
					'depends'=>array(
						array('addon_max_width', '!=', ''),
						array('block_align_breakpoint', '!=', '')
					),
				),
				'alignment' => array(
					'type' => 'select',
					'title' => JText::_('Text Alignment'),
					'desc' => JText::_('Center, left and right alignment.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uk-text-left' => JText::_('Left'),
						'uk-text-center' => JText::_('Center'),
						'uk-text-right' => JText::_('Right'),
						'uk-text-justify' => JText::_('Justify'),
					),
					'std' => '',
				),
				'text_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Text Alignment Breakpoint'),
					'desc' => JText::_('Display the text alignment only on this device width and larger'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('alignment', '!=', '')),
				),
				'text_alignment_fallback' => array(
					'type' => 'select',
					'title' => JText::_('Text Alignment Fallback'),
					'desc' => JText::_('Define an alignment fallback for device widths below the breakpoint'),
					'values' => array(
						'' => JText::_('Inherit'),
						'left' => JText::_('Left'),
						'center' => JText::_('Center'),
						'right' => JText::_('Right'),
						'justify' => JText::_('Justify'),
					),
					'std' => '',
					'depends' => array(
						array('text_breakpoint', '!=', ''),
						array('alignment', '!=', ''),
					),
				),
				'animation' => array(
					'type' => 'select',
					'title' => JText::_('Animation'),
					'desc' => JText::_('A collection of smooth animations to use within your page.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'fade' => JText::_('Fade'),
						'scale-up' => JText::_('Scale Up'),
						'scale-down' => JText::_('Scale Down'),
						'slide-top-small' => JText::_('Slide Top Small'),
						'slide-bottom-small' => JText::_('Slide Bottom Small'),
						'slide-left-small' => JText::_('Slide Left Small'),
						'slide-right-small' => JText::_('Slide Right Small'),
						'slide-top-medium' => JText::_('Slide Top Medium'),
						'slide-bottom-medium' => JText::_('Slide Bottom Medium'),
						'slide-left-medium' => JText::_('Slide Left Medium'),
						'slide-right-medium' => JText::_('Slide Right Medium'),
						'slide-top' => JText::_('Slide Top 100%'),
						'slide-bottom' => JText::_('Slide Bottom 100%'),
						'slide-left' => JText::_('Slide Left 100%'),
						'slide-right' => JText::_('Slide Right 100%'),
						'parallax' => JText::_('Parallax'),
					),
					'std' => '',
				),
				'animation_repeat' => array(
					'type' => 'checkbox',
					'title' => JText::_('Repeat Animation'),
					'desc' => JText::_('Applies the animation class every time the element is in view'),
					'std' => 0,
					'depends' => array(
						array('animation', '!=', ''),
						array('animation', '!=', 'parallax')
					),
				),

				'separator_parallax_options' => array(
					'type' => 'separator',
					'title' => JText::_('Customizing Parallax'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'horizontal_start' => array(
					'type' => 'slider',
					'title' => JText::_('Horizontal Start'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the horizontal position (translateX) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'horizontal_end' => array(
					'type' => 'slider',
					'title' => JText::_('Horizontal End'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the horizontal position (translateX) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'vertical_start' => array(
					'type' => 'slider',
					'title' => JText::_('Vertical Start'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the vertical position (translateY) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'vertical_end' => array(
					'type' => 'slider',
					'title' => JText::_('Vertical End'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the vertical position (translateY) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'scale_start' => array(
					'type' => 'slider',
					'title' => JText::_('Scale Start'),
					'min' => 50,
					'max' => 200,
					'desc' => JText::_('Animate the scaling. Min: 50, Max: 200 =>  100 means 100% scale, 200 means 200% scale, and 50 means 50% scale.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'scale_end' => array(
					'type' => 'slider',
					'title' => JText::_('Scale End'),
					'min' => 50,
					'max' => 200,
					'desc' => JText::_('Animate the scaling. Min: 50, Max: 200 =>  100 means 100% scale, 200 means 200% scale, and 50 means 50% scale.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'rotate_start' => array(
					'type' => 'slider',
					'title' => JText::_('Rotate Start'),
					'min' => 0,
					'max' => 360,
					'desc' => JText::_('Animate the rotation clockwise in degrees.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'rotate_end' => array(
					'type' => 'slider',
					'title' => JText::_('Rotate End'),
					'min' => 0,
					'max' => 360,
					'desc' => JText::_('Animate the rotation clockwise in degrees.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'opacity_start' => array(
					'type' => 'slider',
					'title' => JText::_('Opacity Start'),
					'min' => 0,
					'max' => 100,
					'desc' => JText::_('Animate the opacity. 100 means 100% opacity, and 0 means 0% opacity.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'opacity_end' => array(
					'type' => 'slider',
					'title' => JText::_('Opacity End'),
					'min' => 0,
					'max' => 100,
					'desc' => JText::_('Animate the opacity. 100 means 100% opacity, and 0 means 0% opacity.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'easing' => array(
					'type' => 'slider',
					'title' => JText::_('Easing'),
					'min' => -200,
					'max' => 200,
					'desc' => JText::_('Set the animation easing. A value below 100 is faster in the beginning and slower towards the end while a value above 100 behaves inversely.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'viewport' => array(
					'type' => 'slider',
					'title' => JText::_('Viewport'),
					'min' => 10,
					'max' => 100,
					'desc' => JText::_('Set the animation end point relative to viewport height, e.g. 50 for 50% of the viewport'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'parallax_target' => array(
					'type' => 'checkbox',
					'title' => JText::_('Target'),
					'desc' => JText::_('Animate the element as long as the section is visible.'),
					'std' => 0,
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'parallax_zindex' => array(
					'type' => 'checkbox',
					'title' => JText::_('Z Index'),
					'desc' => JText::_('Set a higher stacking order.'),
					'std' => 0,
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Breakpoint'),
					'desc' => JText::_('Display the parallax effect only on this device width and larger. It is useful to disable the parallax animation on small viewports.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone)'),
						'm' => JText::_('Medium (Tablet)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('animation', '=', 'parallax')),
				),

				'visibility' => array(
					'type' => 'select',
					'title' => JText::_('Visibility'),
					'desc' => JText::_('Display the element only on this device width and larger.'),
					'values' => array(
						'' => JText::_('Always'),
						'uk-visible@s' => JText::_('Small (Phone Landscape)'),
						'uk-visible@m' => JText::_('Medium (Tablet Landscape)'),
						'uk-visible@l' => JText::_('Large (Desktop)'),
						'uk-visible@xl' => JText::_('X-Large (Large Screens)'),
						'uk-hidden@s' => JText::_('Hidden Small (Phone Landscape)'),
						'uk-hidden@m' => JText::_('Hidden Medium (Tablet Landscape)'),
						'uk-hidden@l' => JText::_('Hidden Large (Desktop)'),
						'uk-hidden@xl' => JText::_('Hidden X-Large (Large Screens)'),
					),
					'std' => '',
				),
				'class' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std' => '',
				),
			),
		),
	)
);
