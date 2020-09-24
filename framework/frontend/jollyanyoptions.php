<?php

/**
 * @package   Astroid Framework
 * @author    JoomDev https://www.joomdev.com
 * @copyright Copyright (C) 2009 - 2019 JoomDev.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 * 	DO NOT MODIFY THIS FILE DIRECTLY AS IT WILL BE OVERWRITTEN IN THE NEXT UPDATE
 *  You can easily override all files under /frontend/ folder.
 * 	Just copy the file to ROOT/templates/YOURTEMPLATE/html/frontend/ folder to create and override
 */
// No direct access.
defined('_JEXEC') or die;

use Astroid\Helper;
use Astroid\Framework;
$template = Framework::getTemplate();
$params = $template->getParams();
$document = Framework::getDocument();

// Header Absolute option
$header_absolute = $params->get('header_absolute');
if ($header_absolute == '1') {
    $document->addScriptDeclaration('
	jQuery(function($){
		$(document).ready(function(){
			$(".astroid-header-section").addClass("header-absolute");
		});
	});
	', 'body');
}

// Color option
$header_heading_color = $params->get('header_heading_color', '');
$header_link_color = $params->get('header_link_color', '');
$header_link_hover_color = $params->get('header_link_hover_color', '');
$topbar_bordercolor = $params->get('topbar_bordercolor', '');
$header_styles = [];
if (!empty($header_heading_color)) {
    $header_styles[] = 'header h1,header h2,header h3,header h4,header h5,header h6{ color: ' . $header_heading_color . ';}';
}
if (!empty($header_link_color)) {
    $header_styles[] = 'body header a{ color: ' . $header_link_color . ';}';
}
if (!empty($header_link_hover_color)) {
    $header_styles[] = 'body header a:hover{ color: ' . $header_link_hover_color . ';}';
}
if (!empty($topbar_bordercolor)) {
    $header_styles[]    = '.top-bar, .top-bar .astroid-contact-info > span,.top-bar .astroid-social-icons > li,.top-bar .jollyany-hikacart, .top-bar .jollyany-login, .top-bar .border-right {border-color:'.$topbar_bordercolor.';}';
}
$document->addStyledeclaration(implode('', $header_styles));