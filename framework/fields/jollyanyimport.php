<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('JPATH_BASE') or die;

jimport('jollyany.framework.helper');
jimport('jollyany.framework.importer.data');

JFormHelper::loadFieldClass('list');

/**
 * Modules Position field.
 *
 * @since  3.4.2
 */
class JFormFieldJollyanyImport extends JFormFieldList {

	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  3.4.2
	 */
	protected $type = 'JollyanyImport';

	protected function getInput() {
		$html       =   array();
		$jollyany   =   \JPluginHelper::getPlugin('system', 'jollyany');
		$params     =   new \JRegistry($jollyany->params);
		$license    =   JollyanyFrameworkHelper::maybe_unserialize($params->get('jollyany_license'));
		$activated  =   0;
		if ( is_object( $license ) && isset( $license->purchase_code ) ) {
			$activated  =   1;
		}

		$templates  =   JollyanyFrameworkDataImport::getData();
		$api_url    =   JollyanyFrameworkDataImport::getApiUrl();
		$html[]     =   '<div class="row mt-4">';
		foreach ($templates as $index => $value) {
			$data   =  '<div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-5">';
			$data   .=  '<div class="card">';
			$data   .=  '<img src="'.$api_url.$value['thumb'].'" class="card-img-top" alt="'.$value['name'].'" />';
			$data   .=  '<div class="card-body"><h5 class="card-title">'.$value['name'].'</h5><p class="card-text">'.$value['desc'].'</p><div class="btn-group" role="group" aria-label="Install Action"><a href="#" class="btn btn-primary intall-package btn-sm" data-name="'.$value['name'].'" data-file="'.$index.'" data-status="'.$activated.'">'.JText::_('JOLLYANY_ACTION_INSTALL_PACKAGE').'</a><a href="'.$value['demo_url'].'" class="btn btn-outline-primary btn-sm" target="_blank">'.JText::_('JOLLYANY_ACTION_DEMO_URL').'</a><a href="'.$value['doc_url'].'" class="btn btn-outline-primary btn-sm" target="_blank">'.JText::_('JOLLYANY_ACTION_DOC_URL').'</a></div></div>';
			$data   .=  '</div>';
			$data   .=  '</div>';
			$html[] =   $data;
		}
		$html[]     .=  '</div>';
		$html[]     .=  '<div class="modal fade" id="install-package-dialog" tabindex="-1" role="dialog" aria-labelledby="Demo Content Package" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="install-package-title">'.JText::_('JOLLYANY_ACTION_DIALOG_TITLE').' <strong class="package-name">Package</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-muted">'.JText::_('JOLLYANY_ACTION_DIALOG_TITLE_DESC').'</p>
        <div class="custom-control custom-checkbox mt-3">
		  <input type="checkbox" class="custom-control-input" id="extension-package" disabled checked>
		  <label class="custom-control-label" for="extension-package"><h5>'.JText::_('JOLLYANY_ACTION_DIALOG_EXTENSION_INSTALL').'</h5><small class="text-muted">'.JText::_('JOLLYANY_ACTION_DIALOG_EXTENSION_INSTALL_DESC').'</small></label>
		</div>
		<div class="custom-control custom-checkbox mt-3">
		  <input type="checkbox" class="custom-control-input" id="demo-data-package">
		  <label class="custom-control-label" for="demo-data-package"><h5>'.JText::_('JOLLYANY_ACTION_DIALOG_DATA_INSTALL').'</h5><small class="text-muted">'.JText::_('JOLLYANY_ACTION_DIALOG_DATA_INSTALL_DESC').'</small></label>
		</div>
		<div class="dialogDebug mt-3"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">'.JText::_('JCANCEL').'</button>
        <button type="button" class="btn btn-primary install-action" data-token="'.JSession::getFormToken().'" data-file="">'.JText::_('JOLLYANY_ACTION_INSTALL_PACKAGE').'</button>
      </div>
    </div>
  </div>
</div>';
		return implode($html);
	}
}
