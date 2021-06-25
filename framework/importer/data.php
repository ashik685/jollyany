<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2021 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('_JEXEC') or die;

class JollyanyFrameworkDataImport {
	protected static $api  =   'https://www.templaza.com';
	public static $cache   =    array('thumb' => array());
	protected static $data = array(
        'tz_varaham'      =>  array(
            // Pack Info
            'name'        => 'Varaham',
            'desc'        => 'Education University Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/varaham/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://varaham.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/varaham',

            'template'      => array(
                'name'      =>  'Varaham Template',
                'type'      =>  'included',
                'code'      =>  'tz_varaham',
                'ext_code'  =>  'tz-varaham-api',
            ),

            'extensions'  => array(
                array(
                    'name'      =>  'SP Page Builder Pro',
                    'type'      =>  'included',
                    'code'      =>  'tz_extensions',
                    'ext_code'  =>  'sp-page-builder',
                ),
            ),
        ),
        'tz_krypton'      =>  array(
            // Pack Info
            'name'        => 'Krypton',
            'desc'        => 'Bitcoin Crypto Currency Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/krypton/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://krypton.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/krypton',

            'template'      => array(
                'name'      =>  'Krypton Template',
                'type'      =>  'included',
                'code'      =>  'tz_krypton',
                'ext_code'  =>  'tz-krypton-api',
            ),

            'extensions'  => array(
                array(
                    'name'      =>  'SP Page Builder Pro',
                    'type'      =>  'included',
                    'code'      =>  'tz_extensions',
                    'ext_code'  =>  'sp-page-builder',
                ),
                array(
                    'name'      =>  'Acymailing',
                    'type'      =>  'url',
                    'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
                ),
            ),
        ),
        'tz_alita'      =>  array(
            // Pack Info
            'name'        => 'Alita',
            'desc'        => 'Web Studio & Creative Agency Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/alita/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://alita.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/alita',

            'template'      => array(
                'name'      =>  'Alita Template',
                'type'      =>  'included',
                'code'      =>  'tz_alita',
                'ext_code'  =>  'tz-alita-api',
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
            ),
        ),
        'tz_martha'      =>  array(
            // Pack Info
            'name'        => 'Martha',
            'desc'        => 'Creative Portfolio Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/martha/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://martha.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/martha',

            'template'      => array(
                'name'      =>  'Martha Template',
                'type'      =>  'included',
                'code'      =>  'tz_martha',
                'ext_code'  =>  'tz-martha-api',
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
            ),
        ),
        'tz_logistics'      =>  array(
            // Pack Info
            'name'        => 'Logistics',
            'desc'        => 'Cargo Transportation Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/logistics/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://logistics.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/logistics',

            'template'      => array(
                'name'      =>  'Logistics Template',
                'type'      =>  'included',
                'code'      =>  'tz_logistics',
                'ext_code'  =>  'tz-logistics-api',
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
                    'name'      =>  'Acymailing',
                    'type'      =>  'url',
                    'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
                ),
            ),
        ),
        'tz_pethub'      =>  array(
            // Pack Info
            'name'        => 'PetHub',
            'desc'        => 'Dog, Cat Care & Veterinary Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/pethub/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://pethub.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/pethub',

            'template'      => array(
                'name'      =>  'PetHub Template',
                'type'      =>  'included',
                'code'      =>  'tz_pethub',
                'ext_code'  =>  'tz-pethub-api',
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
            ),
        ),
        'tz_goldena'      =>  array(
            // Pack Info
            'name'        => 'GoldenA',
            'desc'        => 'Single Property Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/goldena/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://goldena.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/goldena',

            'template'      => array(
                'name'      =>  'GoldenA Template',
                'type'      =>  'included',
                'code'      =>  'tz_goldena',
                'ext_code'  =>  'tz-goldena-api',
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
            ),
        ),
        'tz_educab'      =>  array(
            // Pack Info
            'name'        => 'Educab',
            'desc'        => 'University Education Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/educab/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://educab.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/educab',

            'template'      => array(
                'name'      =>  'Educab Template',
                'type'      =>  'included',
                'code'      =>  'tz_educab',
                'ext_code'  =>  'tz-educab-api',
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
                    'name'      =>  'Acymailing',
                    'type'      =>  'url',
                    'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
                ),
            ),
        ),
        'tz_profiler'      =>  array(
            // Pack Info
            'name'        => 'Profiler',
            'desc'        => 'Personal Blog Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/profiler/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://profiler.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/profiler',

            'template'      => array(
                'name'      =>  'Profiler Template',
                'type'      =>  'included',
                'code'      =>  'profiler-joomla-template',
                'ext_code'  =>  'tz-profiler-api',
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
                    'name'      =>  'Acymailing',
                    'type'      =>  'url',
                    'url'       =>  'http://www.acyba.com/component/updateme/downloadxml/component-acymailing/level-starter/version-5/download.zip',
                ),
            ),
        ),
        'tz_musika'      =>  array(
            // Pack Info
            'name'        => 'Musika',
            'desc'        => 'Music Band Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/musika/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://musika.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/musika',

            'template'      => array(
                'name'      =>  'Musika Template',
                'type'      =>  'included',
                'code'      =>  'tz_musika',
                'ext_code'  =>  'tz-musika-api',
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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.15_2019-10-27.zip',
				),
			),
		),
        'tz_everline_joomla'      =>  array(
            // Pack Info
            'name'        => 'Everline',
            'desc'        => 'Wedding Joomla Template',

            // Pack Data
            'thumb'       => '/images/stories/everline/thumbnail.jpg',
            'category'    => 'joomla',

            'demo_url'    => 'https://everline.jollyany.co/',
            'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/everline',

            'template'      => array(
                'name'      =>  'Everline Template',
                'type'      =>  'included',
                'code'      =>  'tz_everline_joomla',
                'ext_code'  =>  'tz-everline-api',
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
		'tz_eventory_joomla'      =>  array(
			// Pack Info
			'name'        => 'Eventory',
			'desc'        => 'Festival, Event Joomla Template',

			// Pack Data
			'thumb'       => '/images/stories/eventory/eventory_590.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://eventory.jollyany.co/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/eventory',

			'template'      => array(
				'name'      =>  'Eventory Template',
				'type'      =>  'included',
				'code'      =>  'tz_eventory_joomla',
				'ext_code'  =>  'tz-eventory-api',
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
		'tz_meetup'      =>  array(
			// Pack Info
			'name'        => 'Meetup',
			'desc'        => 'Conference Event Joomla Template',

			// Pack Data
			'thumb'       => '/images/stories/meetup/meetup.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://meetup.jollyany.co/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/meetup',

			'template'      => array(
				'name'      =>  'Meetup Template',
				'type'      =>  'included',
				'code'      =>  'tz_meetup',
				'ext_code'  =>  'tz-meetup-api',
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
		'tz_new_age'      =>  array(
			// Pack Info
			'name'        => 'New Age',
			'desc'        => 'Creative Agency, Business, Company',

			// Pack Data
			'thumb'       => '/images/stories/new_age/new_age_590.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://newage.jollyany.co/',
			'doc_url'     => 'https://jollyany.co/support/documentation/extra-templates/new-age',

			'template'      => array(
				'name'      =>  'New Age Template',
				'type'      =>  'included',
				'code'      =>  'tz_new_age',
				'ext_code'  =>  'tz-new-age-api',
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
		'tz_nish_ii'   =>  array(
			// Pack Info
			'name'        => 'Nish II',
			'desc'        => 'Portfolio, Agency & Photography',

			// Pack Data
			'thumb'       => '/media/tz_portfolio/article/cache/nish-ii-free-creative-joomla-template-762_S.jpg',
			'category'    => 'joomla',

			'demo_url'    => 'https://nish2.jollyany.co/',
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

			'demo_url'    => 'https://fashion.jollyany.co/',
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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.15_2019-10-27.zip',
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

			'demo_url'    => 'https://justice.jollyany.co/',
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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.15_2019-10-27.zip',
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

			'demo_url'    => 'https://charity.jollyany.co/',
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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.15_2019-10-27.zip',
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

			'demo_url'    => 'https://foodz.jollyany.co/',
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
					'url'       =>  'https://update.kunena.org/updater/pkg_kunena_v5.1.15_2019-10-27.zip',
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

			'demo_url'    => 'https://oraz.jollyany.co/',
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

			'demo_url'    => 'https://kavin2.jollyany.co/',
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

			'demo_url'    => 'https://dino.jollyany.co/',
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

			'demo_url'    => 'https://stchrist.jollyany.co/',
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

			'demo_url'    => 'https://construction.jollyany.co/',
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

	public static function getThumb($src) {
        if (file_exists(JPATH_ADMINISTRATOR.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'jollyany'.$src)) {
            return JUri::base(true).'/cache/jollyany'.$src;
        } else {
            self::$cache['thumb'][] =   $src;
            return self::$api.$src;
        }
    }

    public static function getTotalTemplate() {
        return count(self::$data);
    }

	public static function getApiUrl() {
		return self::$api;
	}

	public static function getData() {
	    $data   =   self::$data;
	    foreach ($data as $key => &$temp) {
	        $temp['thumb'] = self::getThumb($temp['thumb']);
        }
		return $data;
	}
}
