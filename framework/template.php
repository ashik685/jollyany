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

	public function loadLayout($partial = '', $display = true, $params = null) {
		$this->setLog("Rending template partial : " . $partial);
		if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/html/frontend/' . str_replace('.', '/', $partial) . '.php')) {
			$layout = new JLayoutFile($partial, JPATH_SITE . '/templates/' . $this->template . '/html/frontend');
		} elseif (file_exists(JPATH_SITE . '/templates/' . $this->template . '/frontend/' . str_replace('.', '/', $partial) . '.php')) {
			$layout = new JLayoutFile($partial, JPATH_SITE . '/templates/' . $this->template . '/frontend');
		} else {
			$layout = new JLayoutFile($partial, JPATH_SITE . '/templates/tz_jollyany/frontend');
		}
//		if ($partial=='header.horizontal') {
//			var_dump($layout); die();
//		}
		$data = [];
		$data['template'] = $this;
		if (!empty($params)) {
			$data['params'] = $params;
		}
		if ($display) {
			echo $layout->render($data);
		} else {
			return $layout->render($data);
		}
		$this->setLog("Template partial rendered!: " . $partial, 'success');
	}
}