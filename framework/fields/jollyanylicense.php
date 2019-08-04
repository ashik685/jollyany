<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('JPATH_BASE') or die;

jimport('jollyany.framework.helper');

JFormHelper::loadFieldClass('list');

/**
 * Modules Position field.
 *
 * @since  3.4.2
 */
class JFormFieldJollyanyLicense extends JFormFieldList {

    /**
     * The form field type.
     *
     * @var    string
     * @since  3.4.2
     */
    protected $type = 'JollyanyLicense';
    /**
     *    Current activated license
     */
    private static $license;

    /**
     *    Laborator API Server URL
     */
    public static $api_server = 'https://www.templaza.com';

    protected function getInput() {
        $html       =   array();
        $jollyany   =   \JPluginHelper::getPlugin('system', 'jollyany');
        $params     =   new \JRegistry($jollyany->params);
        $license    =   JollyanyFrameworkHelper::maybe_unserialize($params->get('jollyany_license'));
        if ( is_object( $license ) && isset( $license->purchase_code ) ) {
            $license->support_available = ! empty( $license->supported_until );

            // Support availability
            if ( $license->support_available ) {
                $license->support_expired    = strtotime( $license->supported_until ) < time();
                self::$license = $license;
                $html[]     =   '<h3>'.JText::_('JOLLYANY_LICENSE_ACTIVATED').'</h3>';
                $html[]     =   '<p>'.JText::_('JOLLYANY_WELCOME_DESC'). ' '.JText::_ ('JOLLYANY_WELCOME_PREMIUM').'</p><hr />';
                $html[]     =   '<dl class="row">';
                $html[]     =   '<dt class="col-sm-3">'.JText::_('JOLLYANY_ACTIVATE_BUYER').'</dt>';
                $html[]     =   '<dd class="col-sm-9">'.$license->buyer.'</dd>';
                $html[]     =   '<dt class="col-sm-3">'.JText::_('JOLLYANY_ACTIVATE_DOMAIN').'</dt>';
                $html[]     =   '<dd class="col-sm-9">'.$license->domain.'</dd>';
                $html[]     =   '<dt class="col-sm-3">'.JText::_('JOLLYANY_ACTIVATE_PURCHASE_CODE').'</dt>';
                $html[]     =   '<dd class="col-sm-9">'.$license->purchase_code.'</dd>';
                $html[]     =   '<dt class="col-sm-3">'.JText::_('JOLLYANY_ACTIVATE_LICENCE_TYPE').'</dt>';
                $html[]     =   '<dd class="col-sm-9">'.$license->license_type.'</dd>';
                $html[]     =   '<dt class="col-sm-3">'.JText::_('JOLLYANY_ACTIVATE_PURCHASE_DATE').'</dt>';
                $html[]     =   '<dd class="col-sm-9">'.$license->purchase_date.'</dd>';
                $html[]     =   '<dt class="col-sm-3">'.JText::_('JOLLYANY_ACTIVATE_SUPPORTED_UNTIL').'</dt>';
                if ($license->support_expired) {
                    $html[]     =   '<dd class="col-sm-9">'.$license->supported_until.' <span class="badge badge-danger">Your support is expired!</span> <a href="https://1.envato.market/zODvW" target="_blank"><strong>click here to renew your license</strong></a> and re-activate your template.</dd>';
                } else {
                    $html[]     =   '<dd class="col-sm-9">'.$license->supported_until.' <span class="badge badge-success">Supported '.round((strtotime($license->supported_until)-time())/86400).' days left</span></dd>';
                }
                $html[]     =   '</dl>';
                $html[]     =   '<div class="license-action-buttons"><a href="#" id="jollyany-theme-activate" class="btn btn-primary"><i class="fas fa-sync-alt"></i> '.JText::_('JOLLYANY_WELCOME_REACTIVE_PRODUCT').'</a> <button type="button" class="btn btn-danger delete-template-activation" data-token="'.JSession::getFormToken().'"><i class="fas fa-times"></i> '.JText::_('JOLLYANY_ACTIVATE_DELETE_ACTIVATION').'</button></div>';
            }
        } else {
            $html[]     =   '<h3>'.JText::_('JOLLYANY_OPTIONS_PRODUCT_REGISTRATION').'</h3>';
            $html[]     =   '<p>'.JText::_('JOLLYANY_WELCOME_FREE_DESC').'</p><hr />';
            $html[]     =   '<div class="row"><div class="col-sm-8"><h4>'.JText::_('JOLLYANY_WELCOME_TEMPLATE_ACTIVATION').'</h4><p>'.JText::_('JOLLYANY_WELCOME_TEMPLATE_ACTIVATION_DESC').'</p></div><div class="col-sm-4 align-items-center d-flex justify-content-center"><a href="#" id="jollyany-theme-activate" class="btn btn-success btn-lg">'.JText::_('JOLLYANY_WELCOME_ACTIVE_PRODUCT').'</a></div></div>';
            $html[]     =   '<ol><li>'.JText::_('JOLLYANY_WELCOME_ACTIVE_PRODUCT_STEP1').'</li><li>'.JText::_('JOLLYANY_WELCOME_ACTIVE_PRODUCT_STEP2').'</li><li>'.JText::_('JOLLYANY_WELCOME_ACTIVE_PRODUCT_STEP3').'</li><li>'.JText::_('JOLLYANY_WELCOME_ACTIVE_PRODUCT_STEP4').'</li></ol>';
        }
        $key        =   $params->get('secret_key','');
        if (!$key) {
            $key            =   md5(uniqid('Jollyany'));
            $table          =   JTable::getInstance('extension');
            $params->set('secret_key', $key);
            $table->load($jollyany->id);
            $table->save(array('params' => $params->toString()));
        }

        $javascript =   json_encode( array(
            // Request product activation
            'action'   => 'activate-product',

            // Jollyany API site url to go for activation
            'api'      => self::$api_server,

            // Jollyany Itemid
            'envatoid' => (string)$this->element['envatoid'],

            // Jollyany Itemid
            'productname' => (string)$this->element['productname'],

            // URL to activate license for
            'url'      => \JUri::root(),

            // URL to return back data
            'callback_url'      => \JUri::root().'index.php?option=com_ajax&jollyany=activation&key='.$key
        ) );
        $html[]     =   '<script id="jollyany-form-data-json" type="text/template">'.$javascript.'</script>';
        return implode($html);
    }

}