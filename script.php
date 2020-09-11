<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2011 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
// no direct access
defined('_JEXEC') or die;
jimport('joomla.filesystem.file');

class jollyanyInstallerScript {

    /**
     *
     * Function to run when updating the component
     * @return void
     */
    function update($parent) {
        $this->removeUnnecessary();
    }

   /**
    * 
    * Function to run before installing the component	 
    */
   public function preflight($type, $parent) {
      $plugin_dir = JPATH_LIBRARIES . '/' . 'jollyany' . '/' . 'plugins' . '/';
      $plugins = array_filter(glob($plugin_dir . '*'), 'is_dir');
      foreach ($plugins as $plugin) {
         if ($type == "uninstall") {
            $this->uninstallPlugin($plugin, $plugin_dir);
         }
      }
   }

   /**
    * 
    * Function to run after installing the component	 
    */
   public function postflight($type, $parent) {
      $plugin_dir = JPATH_LIBRARIES . '/' . 'jollyany' . '/' . 'plugins' . '/';
      $plugins = array_filter(glob($plugin_dir . '*'), 'is_dir');
      foreach ($plugins as $plugin) {
         if ($type == "install" || $type == "update") {
            $this->installPlugin($plugin, $plugin_dir);
         }
      }
   }

   public function installPlugin($plugin, $plugin_dir) {
      $db = JFactory::getDbo();
      $plugin_name = str_replace($plugin_dir, '', $plugin);

      $installer = new JInstaller;
      $installer->install($plugin);

      $query = $db->getQuery(true);
      $query->update('#__extensions');
      $query->set($db->quoteName('enabled') . ' = 1');
      $query->where($db->quoteName('element') . ' = ' . $db->quote($plugin_name));
      $query->where($db->quoteName('type') . ' = ' . $db->quote('plugin'));
      $db->setQuery($query);
      $db->execute();
      return true;
   }

   public function uninstallPlugin($plugin, $plugin_dir) {
      $db = JFactory::getDbo();
      $plugin_name = str_replace($plugin_dir, '', $plugin);
      $query = $db->getQuery(true);
      $query->update('#__extensions');
      $query->set($db->quoteName('enabled') . ' = 0');
      $query->where($db->quoteName('element') . ' = ' . $db->quote($plugin_name));
      $query->where($db->quoteName('type') . ' = ' . $db->quote('plugin'));
      $db->setQuery($query);
      $db->execute();
      return true;
   }

    public function removeUnnecessary() {
        $removefile  =   array(
            'framework/assets/js/isis.js',
            'framework/assets/js/vendor/bootstrap/bootstrap.bundle.min.js',
            'framework/assets/js/vendor/bootstrap/bootstrap.min.js',
            'framework/assets/js/vendor/bootstrap/jquery.min.js',
            'framework/assets/js/vendor/bootstrap/popper.min.js',
            'framework/assets/js/vendor/jquery-noconflict.js',
            'framework/assets/js/vendor/jquery.astroidmobilemenu.js',
            'framework/assets/js/vendor/jquery.countdown.min.js',
            'framework/assets/js/vendor/jquery.easing.min.js',
            'framework/assets/js/vendor/jquery.jddrop.js',
            'framework/assets/js/vendor/jquery.jdmegamenu.js',
            'framework/assets/js/vendor/jquery.jdvideobg.js',
            'framework/assets/js/vendor/jquery.offcanvas.js',
            'framework/assets/js/vendor/smooth-scroll.polyfills.min.js',
            'framework/frontend/backtotop.php',
            'framework/frontend/blog/audio.php',
            'framework/frontend/blog/gallery.php',
            'framework/frontend/blog/modules/author_info.php',
            'framework/frontend/blog/modules/badge.php',
            'framework/frontend/blog/modules/comments.php',
            'framework/frontend/blog/modules/image.php',
            'framework/frontend/blog/modules/posttype.php',
            'framework/frontend/blog/modules/rating.php',
            'framework/frontend/blog/modules/readtime.php',
            'framework/frontend/blog/modules/related.php',
            'framework/frontend/blog/modules/social.php',
            'framework/frontend/blog/quote.php',
            'framework/frontend/blog/review.php',
            'framework/frontend/blog/video.php',
            'framework/frontend/colors.php',
            'framework/frontend/comingsoon.php',
            'framework/frontend/contactinfo.php',
            'framework/frontend/custom.php',
            'framework/frontend/footer.php',
            'framework/frontend/header.php',
            'framework/frontend/header/horizontal.php',
            'framework/frontend/header/menu/link.php',
            'framework/frontend/header/sidebar.php',
            'framework/frontend/header/stacked.php',
            'framework/frontend/header/sticky.php',
            'framework/frontend/logo.php',
            'framework/frontend/mobilemenu.php',
            'framework/frontend/offcanvas.php',
            'framework/frontend/preloader.php',
            'framework/frontend/social.php',
            'framework/options/article.xml',
            'framework/options/basic.xml',
            'framework/options/colors.xml',
            'framework/options/custom.xml',
            'framework/options/footer.xml',
            'framework/options/header.xml',
            'framework/options/layout.xml',
            'framework/options/miscellaneous.xml',
            'framework/options/social.xml',
            'framework/options/theming.xml',
            'framework/options/typography.xml'
        );
        foreach ($removefile as $file) {
            if (JFile::exists(JPATH_LIBRARIES.'/jollyany/'.$file)) {
                JFile::delete(JPATH_LIBRARIES.'/jollyany/'.$file);
            }
        }
    }

}
