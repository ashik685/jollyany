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
			'name'        => 'Jollyany Classic',
			'desc'        => 'Multi-purpose, Business & Corporation',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/jollyany-responsive-multipurpose-joomla-template-775_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://jollyany.co/',
			'doc_url'     => 'https://jollyany.co/support/documentation',

			'template'    => array(
				'name'      =>  'Jollyany Template',
				'type'      =>  'included',
				'code'      =>  'tz_jollyany',
				'ext_code'  =>  'tz-jollyany-api',
			),

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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.13.1_2019-07-22.zip',
				),
			),
		),
		'tz_nish_ii'   =>  array(
			// Pack Info
			'name'        => 'Nish II',
			'desc'        => 'Portfolio, Agency & Photography',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/nish-ii-free-creative-joomla-template-762_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://joomla.templaza.net/nish_ii/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/nish_ii',

			'template'    => array(
				'name'      =>  'Nish II Template',
				'type'      =>  'included',
				'code'      =>  'tz_nish_ii',
				'ext_code'  =>  'tz-nish-ii-api',
			),

			'extensions'  => array(
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
			),
		),
		'tz_fashion_semona_joomla'      =>  array(
			// Pack Info
			'name'        => 'Fashion',
			'desc'        => 'Model Agency, Photography',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/fashion-semona-creative-joomla-template-630_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/semona-fashion/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/fashion',

			'template'      => array(
				'name'      =>  'Fashion Template',
				'type'      =>  'included',
				'code'      =>  'tz_fashion_semona_joomla',
				'ext_code'  =>  'tz-fashion-api',
			),

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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.13.1_2019-07-22.zip',
				),
			),
		),
		'tz_lawyer'    =>  array(
			// Pack Info
			'name'        => 'Lawyer Justice',
			'desc'        => 'Lawyers Attorneys and Law Firm',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/lawyer-justice-law-firm-joomla-template-713_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/lawyer/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/lawyer-justice',

			'template'    => array(
				'name'      =>  'Lawyer Justice Template',
				'type'      =>  'included',
				'code'      =>  'tz_lawyer',
				'ext_code'  =>  'tz-lawyer-api',
			),

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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.13.1_2019-07-22.zip',
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

			'template'      => array(
				'name'      =>  'Charity Template',
				'type'      =>  'included',
				'code'      =>  'tz_charity_joomla',
				'ext_code'  =>  'tz-charity-api',
			),

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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.13.1_2019-07-22.zip',
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

			'template'      => array(
				'name'      =>  'Foodz Template',
				'type'      =>  'included',
				'code'      =>  'tz_foodz_joomla',
				'ext_code'  =>  'tz-foodz-api',
			),

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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.13.1_2019-07-22.zip',
				),
			),
		),
		'tz_oraz'      =>  array(
			// Pack Info
			'name'        => 'Oraz',
			'desc'        => 'Music Band, Single & Producer',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/oraz-music-band-joomla-template-769_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/oraz/',
			'doc_url'     => 'https://www.templaza.com/docs/oraz/',

			'template'      => array(
				'name'      =>  'Oraz Template',
				'type'      =>  'included',
				'code'      =>  'tz_oraz',
				'ext_code'  =>  'tz-oraz-api',
			),

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
			),
		),
		'tz_kavin_ii'      =>  array(
			// Pack Info
			'name'        => 'Kavin II',
			'desc'        => 'Business, Company & Blogger',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/kavin-ii-business-joomla-template-768_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/kavin_ii/',
			'doc_url'     => 'https://www.templaza.com/docs/kavin_ii/',

			'template'      => array(
				'name'      =>  'Kavin II Template',
				'type'      =>  'included',
				'code'      =>  'tz_kavin_ii',
				'ext_code'  =>  'tz-kavin-ii-api',
			),

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
			),
		),
		'tz_dino'      =>  array(
			// Pack Info
			'name'        => 'Dino',
			'desc'        => 'Creative, Agency & Photography',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/dino-creative-joomla-template-770_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/dino/',
			'doc_url'     => 'https://www.templaza.com/docs/dino/',

			'template'      => array(
				'name'      =>  'Dino Template',
				'type'      =>  'included',
				'code'      =>  'tz_dino',
				'ext_code'  =>  'tz-dino-api',
			),

			'extensions'  => array(
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
					'name'      =>  'TZ Moving Letters',
					'type'      =>  'url',
					'url'       =>  'https://github.com/templaza/TZ-Moving-Letters/archive/master.zip',
				),
			),
		),
		'tz_stchrist'      =>  array(
			// Pack Info
			'name'        => 'St. Christ',
			'desc'        => 'Church, NGO & Charity',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/stchrist-church-charity-joomla-template-764_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/stchrist/',
			'doc_url'     => 'https://www.templaza.com/docs/stchrist/',

			'template'      => array(
				'name'      =>  'St. Christ Template',
				'type'      =>  'included',
				'code'      =>  'tz_stchrist',
				'ext_code'  =>  'tz-stchrist-api',
			),

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
			),
		),
		'tz_construction'      =>  array(
			// Pack Info
			'name'        => 'Construction',
			'desc'        => 'Building, Construction & Architect',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/construction-building-architect-joomla-template-756_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'http://joomla.templaza.net/construction/',
			'doc_url'     => 'https://www.templaza.com/docs/construction/',

			'template'      => array(
				'name'      =>  'Construction Template',
				'type'      =>  'included',
				'code'      =>  'tz_construction',
				'ext_code'  =>  'tz-construction-api',
			),

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
