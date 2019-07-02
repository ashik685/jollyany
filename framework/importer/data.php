<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('_JEXEC') or die;

class JollyanyFrameworkDataImport {
	protected static $api  =   'https://www.templaza.com';
	protected static $data = array(
		'tz_jollyany'   =>  array(
			// Pack Info
			'name'        => 'Main Demo',
			'desc'        => 'Multi-purpose, Business & Corporation',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/jollyany-responsive-multipurpose-joomla-template-775_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://jollyany.co/',
			'doc_url'     => 'https://jollyany.co/support/documentation',

			'extensions'  => array(
				array(
					'name'      =>  'SP Page Builder Pro',
					'type'      =>  'included',
					'code'      =>  'tz_extensions',
					'ext_code'  =>  'sp-page-builder',
				),
				array(
					'name'      =>  'TZ Portfolio',
					'type'      =>  'url',
					'url'       =>  'https://github.com/templaza/tz_portfolio_plus/archive/master.zip',
				),
				array(
					'name'      =>  'Hikashop',
					'type'      =>  'url',
					'url'       =>  'https://www.hikashop.com/component/updateme/downloadxml/component-hikashop/level-starter/download.zip',
				),
				array(
					'name'      =>  'Unite Slider',
					'type'      =>  'included',
					'code'      =>  'tz_extensions',
					'ext_code'  =>  'unite-slider',
				),
				array(
					'name'      =>  'Acymailing',
					'type'      =>  'url',
					'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
				),
				array(
					'name'      =>  'Kunena',
					'type'      =>  'url',
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.12.1_2019-04-22.zip',
				),
			),
		),
		'tz_charity_joomla'    =>  array(
			// Pack Info
			'name'        => 'Charity',
			'desc'        => 'Non-profit, NGO & Fundraising',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/charity-nonprofit-joomla-template-659_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/charity/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/charity',

			'extensions'  => array(
				array(
					'name'      =>  'Charity Template',
					'type'      =>  'included',
					'code'      =>  'tz_charity_joomla',
					'ext_code'  =>  'tz-charity-api',
				),
				array(
					'name'      =>  'SP Page Builder Pro',
					'type'      =>  'included',
					'code'      =>  'tz_extensions',
					'ext_code'  =>  'sp-page-builder',
				),
				array(
					'name'      =>  'TZ Portfolio',
					'type'      =>  'url',
					'url'       =>  'https://github.com/templaza/tz_portfolio_plus/archive/master.zip',
				),
				array(
					'name'      =>  'Hikashop',
					'type'      =>  'url',
					'url'       =>  'https://www.hikashop.com/component/updateme/downloadxml/component-hikashop/level-starter/download.zip',
				),
				array(
					'name'      =>  'Unite Slider',
					'type'      =>  'included',
					'code'      =>  'tz_extensions',
					'ext_code'  =>  'unite-slider',
				),
				array(
					'name'      =>  'Acymailing',
					'type'      =>  'url',
					'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
				),
				array(
					'name'      =>  'Kunena',
					'type'      =>  'url',
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.12.1_2019-04-22.zip',
				),
			),
		),
		'tz_foodz_joomla'      =>  array(
			// Pack Info
			'name'        => 'Foodz',
			'desc'        => 'Restaurant, Receipt & Bakery',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/foodz-restaurant-joomla-template-577_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/foodz/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/foodz',

			'extensions'  => array(
				array(
					'name'      =>  'Foodz Template',
					'type'      =>  'included',
					'code'      =>  'tz_foodz_joomla',
					'ext_code'  =>  'tz-foodz-api',
				),
				array(
					'name'      =>  'SP Page Builder Pro',
					'type'      =>  'included',
					'code'      =>  'tz_extensions',
					'ext_code'  =>  'sp-page-builder',
				),
				array(
					'name'      =>  'TZ Portfolio',
					'type'      =>  'url',
					'url'       =>  'https://github.com/templaza/tz_portfolio_plus/archive/master.zip',
				),
				array(
					'name'      =>  'Hikashop',
					'type'      =>  'url',
					'url'       =>  'https://www.hikashop.com/component/updateme/downloadxml/component-hikashop/level-starter/download.zip',
				),
				array(
					'name'      =>  'Unite Slider',
					'type'      =>  'included',
					'code'      =>  'tz_extensions',
					'ext_code'  =>  'unite-slider',
				),
				array(
					'name'      =>  'Acymailing',
					'type'      =>  'url',
					'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
				),
				array(
					'name'      =>  'Kunena',
					'type'      =>  'url',
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.12.1_2019-04-22.zip',
				),
			),
		),
	);

	public static function getApiUrl() {
		return self::$api;
	}

	public static function getData() {
		return self::$data;
	}
}
