<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('_JEXEC') or die;

/**
 * Jollyany system plugin
 *
 * @since  1.0
 */

class plgSystemJollyany extends JPlugin {
	protected $app;
	public function onAfterRoute() {
		// load jollyany language
		$lang = JFactory::getLanguage();
		$lang->load("jollyany", JPATH_SITE);
        $option     = $this->app->input->get('option', '');
        $jollyany   = $this->app->input->get('jollyany', '');
		if(!$this->app->isAdmin() && $jollyany!='activation') return false;

		if ($option == 'com_ajax') {
			switch ($jollyany) {
				case 'activation' :
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						if ($this->params->get('secret_key') != $this->app->input->get('key')) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						$license                    =   new stdClass();
						$license->purchase_code     =   $this->app->input->get('purchase_code', '', 'RAW');
						$license->license_type      =   $this->app->input->get('license_type', '', 'RAW');
						$license->purchase_date     =   $this->app->input->get('purchase_date', '', 'RAW');
						$license->supported_until   =   $this->app->input->get('supported_until', '', 'RAW');
						$license->buyer             =   $this->app->input->get('buyer', '', 'RAW');
						$license->domain            =   $this->app->input->get('domain', '', 'RAW');
						$this->params->set('jollyany_license', JollyanyFrameworkHelper::maybe_serialize($license));
						$jollyany       =   \JPluginHelper::getPlugin('system', 'jollyany');
						$table          = JTable::getInstance('extension');
						$table->load($jollyany->id);
						$table->save(array('params' => $this->params->toString()));
						echo '<html><head><title>Product Activated!</title><style>.product-activated-window {
  background: url(media/jollyany/assets/images/success.png) no-repeat center top;
  background-size: auto;
  background-size: 40px;
  padding-top: 50px;
  margin-top: 30px;
  text-align: center; }
  .product-activated-window .about-description {
    max-width: 400px;
    margin: 0 auto;
    margin-bottom: 0px;
    margin-bottom: 40px; }
  .product-activated-window .start-using-product {
    display: block;
    text-decoration: none;
    background: #72bf40;
    color: #fff;
    font-size: 25px;
    text-align: center;
    padding: 20px 10px; }</style></head><body><div class="product-activated-window">
        <h1>Product Activated!</h1>
        <div class="about-description">
            Congratulations! <strong>'.$license->buyer.'</strong> has been successfully activated and now you can get latest updates of the template.
        </div>
        <a href="#" class="start-using-product close-this-window" onclick="window.close();">Start using Jollyany!</a>
        <br>
        <p>You can <a href="#" class="close-this-window" onclick="window.close();">close this window</a> now.</p>
    </div></body></html>';
					} catch (\Exception $e) {
					    header('Content-Type: application/json');
                        $return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
                        echo \json_encode($return);
					}
					die();
					break;
				case 'deactivate' :
					header('Content-Type: application/json');
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						// Check for request forgeries.
						if (!JSession::checkToken()) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						$this->params->set('jollyany_license', '');
						$jollyany       =   \JPluginHelper::getPlugin('system', 'jollyany');
						$table          = JTable::getInstance('extension');
						$table->load($jollyany->id);
						$table->save(array('params' => $this->params->toString()));
						$return["status"] = "success";
						$return["code"] = 200;
						$return["data"] = $this->params->get('jollyany_license');
					} catch (\Exception $e) {
						$return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
					}
					echo \json_encode($return);
					die();
					break;
				case 'download_package':
					header('Content-Type: application/json');
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						// Check for request forgeries.
						if (!JSession::checkToken()) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						jimport('jollyany.framework.importer.data');
						$license    =   JollyanyFrameworkHelper::maybe_unserialize($this->params->get('jollyany_license'));
						if ( is_object( $license ) && isset( $license->purchase_code ) ) {
							$extension_package     =   $this->app->input->post->get('extension-package', 1);
							$demo_data_package     =   $this->app->input->post->get('demo-data-package', 0);
							$install_code          =   $this->app->input->post->get('install_code', '', 'RAW');
							$step                  =   $this->app->input->post->get('step', 1);
							$file_name             =   $this->app->input->post->get('file_name', '', 'RAW');

							if (!$extension_package) throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_FILE_INSTALL'));
							$config         =   \JFactory::getConfig();
							$tmp_part       =   $config->get('tmp_path') ;
							jimport('joomla.filesystem.file');
							$url        = JollyanyFrameworkDataImport::getApiUrl().'/index.php?option=com_tz_membership';
							if ($demo_data_package) {
								//install quickstart package
								/* Get package zip file from server */
								$data = array(
									'task'          => 'download.package',
									'produce'       => $install_code,
									'purchase_code' => $license->purchase_code,
									'step'          => $step,
									'type'          => 'quickstart-api'
								);
							} else {
								//install extensions in package.
								/* Get package zip file from server */
								$data = array(
									'task'          => 'download.package',
									'produce'       => $install_code,
									'purchase_code' => $license->purchase_code,
									'step'          => $step,
									'type'          => 'extensions-api'
								);
							}
							$http       =   JHttpFactory::getHttp();
							$response   =   $http -> post ($url, $data, array(
								'Content-type' => 'application/x-www-form-urlencoded'
							));

							if($response -> code == 200) {
								$header     = $response -> headers;
								$filePartCount  = isset($header['Files-Part-Count'])?$header['Files-Part-Count']:0;
								$f_name = isset($header['Content-Disposition']) && $header['Content-Disposition'] ?
									rawurldecode(preg_replace(
										'/(^[^=]+=)|(;$)/',
										'',
										$header['Content-Disposition']
									)) : null;
								if (!$f_name) throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_CAN_NOT_DOWNLOAD_PACKAGE'));
								$file_name  =   $file_name.'.'.JFile::getExt($f_name);

								if($filePartCount && $step <= $filePartCount){
									JFile::append($tmp_part.'/'.$file_name,$response -> body, true);
									$return["pathcount"]    =   $filePartCount;
									if ($step == $filePartCount) {
										$return['archive']  =   $tmp_part.'/'.$file_name;
									}
								} else {
									throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_CAN_NOT_DOWNLOAD_PACKAGE'));
								}
							} else {
								throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_CAN_NOT_CONNECT_SERVER'));
							}
							$return["status"] = "success";
							$return["code"] = 200;
						} else {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_LICENSE'));
						}
					} catch (\Exception $e) {
						$return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
					}
					echo \json_encode($return);
					die();
					break;
				case 'unzip_package':
					header('Content-Type: application/json');
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						// Check for request forgeries.
						if (!JSession::checkToken()) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						jimport('jollyany.framework.importer.data');
						$license    =   JollyanyFrameworkHelper::maybe_unserialize($this->params->get('jollyany_license'));
						if ( is_object( $license ) && isset( $license->purchase_code ) ) {
							$extension_package     =   $this->app->input->post->get('extension-package', 1);
							$demo_data_package     =   $this->app->input->post->get('demo-data-package', 0);
							$install_code          =   $this->app->input->post->get('install_code', '', 'RAW');
							$p_filename            =   $this->app->input->post->get('archive', '', 'RAW');

							if (!$extension_package) throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_FILE_INSTALL'));
							$config         =   \JFactory::getConfig();
							jimport('joomla.filesystem.file');
							if ($demo_data_package) {
								//unzip quickstart package
								@chmod(JPATH_ROOT.DIRECTORY_SEPARATOR.'configuration.php', 0644);
								$package    =   JollyanyFrameworkHelper::unpack($p_filename, true);
								if ($package['extractdir']== null){
									throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_PACKAGE_NOT_FOUND'));
								} else {
									if (!$raw_data       = JFile::read(JPATH_ROOT.DIRECTORY_SEPARATOR.'installation'.DIRECTORY_SEPARATOR.'sql'.DIRECTORY_SEPARATOR.'databases.json')) {
										throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_QUICKSTART_CAN_NOT_FOUND'));
									}
									$packagedb          = json_decode($raw_data, true);
									$packagedbdetail    = $packagedb['site.sql'];
									$sqldb      =   array (
										'site.sql'   =>  array(
											'dbtype'        => $config->get('dbtype'),
											'dbtech'        => 'mysql',
											'dbname'        => $config->get('db'),
											'sqlfile'       => 'site.sql',
											'dbhost'        => $config->get('host'),
											'dbuser'        => $config->get('user'),
											'dbpass'        => $config->get('password'),
											'prefix'        => $config->get('dbprefix'),
											'parts'         => $packagedbdetail['parts']
										)
									);
									JFile::write(JPATH_ROOT.DIRECTORY_SEPARATOR.'installation'.DIRECTORY_SEPARATOR.'sql'.DIRECTORY_SEPARATOR.'databases.json', json_encode($sqldb), true);
									$return["package"]  = json_encode($package);
									$return["url_root"] = JUri::root();
								}
							} else {
								//unzip extensions in package.
								$package    =   JollyanyFrameworkHelper::unpack($p_filename);
								if ($package['extractdir']== null){
									throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_PACKAGE_NOT_FOUND'));
								}
								$templates             =   JollyanyFrameworkDataImport::getData();
								if (is_array($templates) && isset($templates[$install_code])) {
									$return['data'] =   json_encode($templates[$install_code]);
								} else {
									throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_INVALID_CODE'));
								}
								$return["package"]  = json_encode($package);
							}
							$return["status"] = "success";
							$return["code"] = 200;
						} else {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_LICENSE'));
						}
					} catch (\Exception $e) {
						$return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
					}
					echo \json_encode($return);
					die();
					break;
				case 'get_package_data':
					header('Content-Type: application/json');
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						// Check for request forgeries.
						if (!JSession::checkToken()) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						jimport('jollyany.framework.importer.data');
						$license    =   JollyanyFrameworkHelper::maybe_unserialize($this->params->get('jollyany_license'));
						if ( is_object( $license ) && isset( $license->purchase_code ) ) {
							$extension_package     =   $this->app->input->post->get('extension-package', 1);
							$install_code          =   $this->app->input->post->get('install_code', '', 'RAW');

							if (!$extension_package) throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_FILE_INSTALL'));
							$templates             =   JollyanyFrameworkDataImport::getData();
							if (is_array($templates) && isset($templates[$install_code])) {
								$return['data']    =   json_encode($templates[$install_code]);
							} else {
								throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_INVALID_CODE'));
							}
							$return["status"] = "success";
							$return["code"] = 200;
						} else {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_LICENSE'));
						}
					} catch (\Exception $e) {
						$return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
					}
					echo \json_encode($return);
					die();
					break;
				case 'install_package':
					header('Content-Type: application/json');
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						// Check for request forgeries.
						if (!JSession::checkToken()) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						$license    =   JollyanyFrameworkHelper::maybe_unserialize($this->params->get('jollyany_license'));
						if ( is_object( $license ) && isset( $license->purchase_code ) ) {
							$extension_package     =   $this->app->input->post->get('extension-package', 1);
							$extension             =   json_decode($this->app->input->post->get('extension', '', 'RAW'));
							jimport('joomla.filesystem.file');
							jimport('joomla.filesystem.folder');
							if (!$extension_package) throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_FILE_INSTALL'));
							if (is_object($extension) && isset($extension->name)) {
								$config   = JFactory::getConfig();
								$tmp_dest = $config->get('tmp_path');
								if ($extension->type == 'included') {
									$path    =   $this->getPackageData(1, $extension, $license);
									if (!$path) throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_EXTENSION_NOT_FOUND'));
									// Unpack the downloaded package file.
									$e_package  =   JInstallerHelper::unpack($path, true);
									$install_result  =   JollyanyFrameworkHelper::installPackage($path, $e_package, $tmp_dest);
									if (!$install_result['status']) {
										throw new \Exception($install_result['message']);
									}
								} elseif ($extension->type == 'url') {
									// Get the URL of the package to install.
									$url = $extension->url;

									// Did you give us a URL?
									if (!$url)
									{
										throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_EXTENSION_URL_NOT_FOUND'));
									}

									// Handle updater XML file case:
									if (preg_match('/\.xml\s*$/', $url))
									{
										jimport('joomla.updater.update');
										$update = new JUpdate;
										$update->loadFromXml($url);
										$package_url = trim($update->get('downloadurl', false)->_data);

										if ($package_url)
										{
											$url = $package_url;
										}

										unset($update);
									}

									// Download the package at the URL given.
									$p_file = JInstallerHelper::downloadPackage($url);

									// Was the package downloaded?
									if (!$p_file)
									{
										throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_EXTENSION_URL_INVALID'));
									}

									// Unpack the downloaded package file.
									$e_package = JInstallerHelper::unpack($tmp_dest . '/' . $p_file, true);
									$install_result  =   JollyanyFrameworkHelper::installPackage($url, $e_package, $tmp_dest);
									if (!$install_result['status']) {
										throw new \Exception($install_result['message']);
									}
									$return["message"]  =   $install_result['message'];
								}
							} else {
								throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_PACKAGE_NOT_FOUND'));
							}
							$return["status"] = "success";
							$return["code"] = 200;
						} else {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_LICENSE'));
						}
					} catch (\Exception $e) {
						$return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
					}
					echo \json_encode($return);
					die();
					break;
				case 'clean_up_install':
					header('Content-Type: application/json');
					header('Access-Control-Allow-Origin: *');
					$return = array();
					try {
						// Check for request forgeries.
						if (!JSession::checkToken()) {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR'));
						}
						jimport('jollyany.framework.helper');
						$license    =   JollyanyFrameworkHelper::maybe_unserialize($this->params->get('jollyany_license'));
						if ( is_object( $license ) && isset( $license->purchase_code ) ) {
							$package               =   json_decode($this->app->input->post->get('package', '', 'RAW'));
							// Cleanup the install files.
							if (!is_file($package->packagefile))
							{
								$config = JFactory::getConfig();
								$package->packagefile = $config->get('tmp_path') . '/' . $package->packagefile;
							}

							JInstallerHelper::cleanupInstall($package->packagefile, $package->extractdir);
							$return["status"]   = "success";
							$return["code"]     = 200;
						} else {
							throw new \Exception(\JText::_('JOLLYANY_AJAX_ERROR_NO_LICENSE'));
						}
					} catch (\Exception $e) {
						$return["status"] = "error";
						$return["code"] = $e->getCode();
						$return["message"] = $e->getMessage();
					}
					echo \json_encode($return);
					die();
					break;
			}
		}
	}

	protected function getPackageData($step = 1, $extension, $license) {
		jimport('jollyany.framework.importer.data');
		$url        = JollyanyFrameworkDataImport::getApiUrl().'/index.php?option=com_tz_membership';
		$data = array(
			'task'          => 'download.package',
			'produce'       => $extension->code,
			'purchase_code' => $license->purchase_code,
			'step'          => $step,
			'type'          => $extension->ext_code
		);
		$http       =   JHttpFactory::getHttp();
		$response   =   $http -> post ($url, $data, array(
			'Content-type' => 'application/x-www-form-urlencoded'
		));

		$config     =   JFactory::getConfig();
		$tmp_part   =   $config->get('tmp_path');
		if($response -> code == 200) {
			$header     = $response -> headers;
			$filePartCount  = isset($header['Files-Part-Count'])?$header['Files-Part-Count']:0;
			$f_name = isset($header['Content-Disposition']) && $header['Content-Disposition'] ?
				rawurldecode(preg_replace(
					'/(^[^=]+=)|(;$)/',
					'',
					$header['Content-Disposition']
				)) : null;
			if (!$f_name) return false;

			if($filePartCount && $step <= $filePartCount){
				JFile::append($tmp_part.'/'.$f_name,$response -> body, true);
				if ($step == $filePartCount) {
					return $tmp_part.'/'.$f_name;
				} else {
					return $this->getPackageData($step+1, $extension, $license);
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	// Astroid Admin Events
	public function onBeforeAstroidAdminRender(&$template) {
//		AstroidFramework::addStyleSheet(); // to add css link
//		AstroidFramework::addStyleDeclaration(); // to add css script
//		AstroidFramework::addScript(); // to add js file in head
		AstroidFramework::addScript(JUri::root().'media/jollyany/assets/js/jollyany.js', "body"); // to add js file in body
//		AstroidFramework::addScriptDeclaration(); // to add js script in head
//		AstroidFramework::addScriptDeclaration($js, "body"); // to add js script in body
	}
}