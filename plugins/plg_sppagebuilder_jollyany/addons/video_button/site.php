<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2019 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('Restricted access');

class SppagebuilderAddonVideo_Button extends SppagebuilderAddons {

	public function render() {
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$alignment = (isset($settings->alignment) && $settings->alignment) ? $settings->alignment : '';
		$video_url = (isset($settings->video_url) && $settings->video_url) ? $settings->video_url : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$doc = JFactory::getDocument();
		$doc->addStyleSheet('libraries/jollyany/framework/assets/js/vendor/jquery.fancybox.min.css');
		$doc->addScript('libraries/jollyany/framework/assets/js/vendor/jquery.fancybox.min.js');

		$output  = '<div class="sppb-addon sppb-addon-video-button ' . $alignment . ' ' . $class . '">';

		if($title) {
			$output .= '<'.$heading_selector.' class="sppb-addon-title">' . $title . '</'.$heading_selector.'>';
		}

		$output .= '<div class="sppb-addon-content"><a class="video-button" data-fancybox="" href="'.$video_url.'"><i class="fas fa-play"></i></a></div>';
		$output  .= '</div>';

		return $output;
	}

	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$video_fontsize = (isset($this->addon->settings->video_fontsize) && $this->addon->settings->video_fontsize) ? $this->addon->settings->video_fontsize : '';
		$border_color = (isset($this->addon->settings->border_color) && $this->addon->settings->use_border) ? $this->addon->settings->border_color : '';
		$border_width = (isset($this->addon->settings->border_width) && $this->addon->settings->border_width) ? $this->addon->settings->border_width : 1;
		$border_radius = (isset($this->addon->settings->border_radius) && $this->addon->settings->border_radius) ? $this->addon->settings->border_radius : 1;
		$padding = (isset($this->addon->settings->padding) && $this->addon->settings->padding) ? $this->addon->settings->padding : '30px';
		$background_color = (isset($this->addon->settings->background_color) && $this->addon->settings->background_color) ? $this->addon->settings->background_color : '';
		$color = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '';
		$use_border = (isset($this->addon->settings->use_border) && $this->addon->settings->use_border) ? $this->addon->settings->use_border : 0;

		$css = '';
		if($video_fontsize){
			$css .= $addon_id .' .video-button {';
			$css .= 'font-size:'.$video_fontsize.'px;';
			$css .= 'display: inline-flex;';
			$css .= '}';
			$css .= $addon_id .' .video-button i {';
			$css .= 'width:'.$video_fontsize.'px;';
			$css .= 'height:'.$video_fontsize.'px;';
			$css .= '}';
		}
		if ($color) {
            $css .= $addon_id .' .video-button {';
            $css .= 'color:'.$color.';';
            $css .= 'transition: all 0.3s linear 0s;';
            $css .= '-moz-transition: all 0.3s linear 0s;';
            $css .= '-webkit-transition: all 0.3s linear 0s;';
            $css .= '-o-transition: all 0.3s linear 0s;';
            $css .= '}';
        }
		if ($use_border) {
			$css .= $addon_id .' .video-button {';
			$css .= 'border-style: solid;';
			if ($border_color) {
				$css .= 'border-color: '.$border_color.';';
			}
			if ($border_width) {
				$css .= 'border-width: '.$border_width.'px;';
			}
			if ($border_radius) {
				$css .= 'border-radius: '.$border_radius.'px;';
			}
			if ($padding) {
				$css .= 'padding: '.$padding.';';
			}
			if ($background_color) {
				$css .= 'background-color: '.$background_color.';';
			}
			$css .= '}';
            $css .= $addon_id .' .video-button::before {';
            if ($border_radius) {
                $css .= 'border-radius: '.$border_radius.'px;';
            }
            $css .= '}';
		}
		return $css;
	}
}
