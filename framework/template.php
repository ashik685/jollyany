<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('_JEXEC') or die;
jimport('astroid.framework.template');
jimport('astroid.framework.helper');
jimport('astroid.framework.element');

class JollyanyFrameworkTemplate extends AstroidFrameworkTemplate{
	public function __construct($template) {
		parent::__construct($template);
	}
}