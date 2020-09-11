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