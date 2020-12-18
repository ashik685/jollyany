<?php
/**
 * @package   Jollyany Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2009 - 2019 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('_JEXEC') or die;
jimport('astroid.framework.article');
jimport('jollyany.framework.jollyany');
use Astroid\Framework;

class JollyanyFrameworkArticle extends AstroidFrameworkArticle {
    public $print;
    public $isCategoryView;
    public $categoryParams;
	function __construct($article, $categoryView = false, $print = null) {
		parent::__construct($article, $categoryView);
		$this->template = JollyanyFramework::getTemplate();
		$this->print            =   $print;
		$this->isCategoryView   =   $categoryView;
		$this->categoryParams   =   $this->_getCategoryParams();
	}

    public function renderArticleBody()
    {
        $canEdit = $this->article->params->get('access-edit');
        $assocParam = (JLanguageAssociations::isEnabled() && $this->article->params->get('show_associations'));
        $lessons    =   $this->article->params->get('jollyany_course_lessons', '');
        ob_start();
        echo $this->renderEventData();
        // Todo Not that elegant would be nice to group the params
        $useDefList = ($this->article->params->get('show_modify_date') || $this->article->params->get('show_publish_date') || $this->article->params->get('show_create_date') || $this->article->params->get('show_hits') || $this->article->params->get('show_category') || $this->article->params->get('show_parent_category') || $this->article->params->get('show_author') || $assocParam || $this->template->params->get('astroid_readtime', 1));
        if (($this->categoryParams->get('course_category_data','') || ($this->categoryParams->get('course_category_data','') === "" && $this->template->params->get('course_category_data',''))) && (is_array($lessons) && count($lessons))) :
            $document = Framework::getDocument();
            $document->addScript('libraries/jollyany/framework/assets/js/vendor/jquery.smartTab.min.js');
            $tabid  =   uniqid('courseTab_');
            $document->addScriptDeclaration('
            jQuery(document).ready(function(){
              jQuery(\'#'.$tabid.'\').smartTab({
                theme: \''.$this->categoryParams->get('course_theme','default').'\'
              });
            });
            ');
            ?>
        <div id="<?php echo $tabid; ?>">
            <ul class="nav">
                <li>
                    <a class="nav-link" href="#lessons"><?php echo JText::_('JOLLYANY_COURSE_OPTIONS_TITLE_BASIC_LABEL') ?></a>
                </li>
                <li>
                    <a class="nav-link" href="#description"><?php echo JText::_('JGLOBAL_DESCRIPTION') ?></a>
                </li>
                <li>
                    <a class="nav-link" href="#contact"><?php echo JText::_('JOLLYANY_LESSON_CONTACT') ?></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="lessons" role="tabpanel">
                    <?php
                    $opened_flag    =   false;
                    foreach ($lessons as $lesson) {
                        if ($lesson['jollyany_lesson_type'] == 'section') {
                            if ($opened_flag) echo '</tbody></table>';
                            echo '<h4 class="lesson-section-title">'.$lesson['lesson_section_title'].'</h4>';
                            echo '<table class="table table-hover"><tbody>';
                            $opened_flag    =    true;
                        } else {
                            if (!$opened_flag) {
                                echo '<table class="table table-hover"><tbody>';
                                $opened_flag    =   true;
                            }
                            $downloadslider     =   isset($lesson['lesson_content_download_link']) && $lesson['lesson_content_download_link'] ? '|</span><a href="'.JUri::root().'images/'.$lesson['lesson_content_download_link'].'" title="'.$lesson['lesson_content_title'].'" target="_blank"><i class="fas fa-download"></i> '.JText::_('JOLLYANY_LESSON_DOWNLOAD_SLIDER').'</a>' : '';
                            echo '<tr><td class="lesson-title"><a href="'.$lesson['lesson_content_video_url'].'" title="'.$lesson['lesson_content_title'].'" data-fancybox><i class="far fa-play-circle"></i> '.$lesson['lesson_content_title'].'</a></td><td class="lesson-option">'.$lesson['lesson_content_duration'].'<span>'.$downloadslider.'</td></tr>';
                        }
                    }
                    echo '</tbody></table>';
                    ?>
                </div>
                <div class="tab-pane" id="description" role="tabpanel">
                    <?php if (!$this->print) : ?>
                        <?php if ($canEdit || $this->article->params->get('show_print_icon') || $this->article->params->get('show_email_icon')) : ?>
                            <?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $this->article->params, 'item' => $this->article, 'print' => false)); ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($useDefList) : ?>
                            <div id="pop-print" class="btn hidden-print">
                                <?php echo JHtml::_('icon.print_screen', $this->article, $this->article->params); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo $this->article->text; ?>
                </div>
                <div class="tab-pane" id="contact" role="tabpanel">
                    <?php
                    $contact_course_link    =   $this->categoryParams->get('course_category_contact_link','');
                    if (!$contact_course_link) {
                        $contact_course_link = $this->template->params->get('course_contact_link','');
                    }
                    $contact_course_info    =   $this->categoryParams->get('course_category_contact_info','');
                    if (!$contact_course_info) {
                        $contact_course_info = $this->template->params->get('course_contact_info','');
                    }
                    echo '<div class="course-contact-info">'.$contact_course_info.'</div><div class="course-contact-link"><a href="'.$contact_course_link.'" class="btn btn-success" target="_blank">'.JText::_('JOLLYANY_COURSE_CONTACT_US').'</a></div>';
                    ?>
                </div>
            </div>
        </div>
        <?php else: ?>
            <?php echo $this->article->text; ?>
        <?php endif;
        return ob_get_clean();
    }

    public function renderEventData() {
	    ob_start();
        $event_available    =   $this->article->params->get('jollyany_event_location', '') || $this->article->params->get('jollyany_event_phone', '') || $this->article->params->get('jollyany_event_start', '') || $this->article->params->get('jollyany_event_end', '') || $this->article->params->get('jollyany_event_spot', '') || $this->article->params->get('jollyany_event_long_lat', '') || $this->article->params->get('jollyany_event_url', '');
        if ($event_available) :
            $document = Framework::getDocument();
            echo '<div class="event-information">';
            echo '<div class="event-countdown">';
            if ((!$this->isCategoryView || ($this->isCategoryView && $this->categoryParams->get('jollyany_show_event_countdown',0))) && ($this->article->params->get('jollyany_event_start', '') || $this->article->params->get('jollyany_event_end', ''))) {

                echo '<div class="time-count-down">';
                $expired_ms     =   time() < strtotime($this->article->params->get('jollyany_event_end', ''))  ? JText::_('JOLLYANY_EVENT_START_MS') : JText::_('JOLLYANY_EVENT_EXPIRED_MS');
                $event_expired  =   $this->article->params->get('jollyany_event_expired', $expired_ms);
                $document->addScript('libraries/jollyany/framework/assets/js/vendor/jquery.countdown.min.js');
                $countdown_id    =   uniqid('countdown_');
                $txt            =   '';
                $countdown_time =   '';
                if (time() < strtotime($this->article->params->get('jollyany_event_start', ''))) {
                    $txt        =   JText::_('JOLLYANY_COUNTDOWN_START');
                    $countdown_time =   date('Y/m/d H:i:s', strtotime($this->article->params->get('jollyany_event_start', '')));
                }
                elseif (time() < strtotime($this->article->params->get('jollyany_event_end', ''))) {
                    $txt        =   JText::_('JOLLYANY_COUNTDOWN_END');
                    $countdown_time =   date('Y/m/d H:i:s', strtotime($this->article->params->get('jollyany_event_end', '')));
                }

                echo $txt ? '<div class="count-down-intro">'.$txt.'</div>' : '';
                ?>
                <div id="<?php echo $countdown_id; ?>"></div>
                <script type="text/javascript">
                    jQuery(function($){
                        $(document).ready(function(){
                            $('#<?php echo $countdown_id; ?>').countdown('<?php echo $countdown_time; ?>')
                                .on('update.countdown', function(event) {
                                    var format = '%H:%M:%S';
                                    if(event.offset.totalDays > 0) {
                                        format = '%-d day%!d ' + format;
                                    }
                                    if(event.offset.weeks > 0) {
                                        format = '%-w week%!w ' + format;
                                    }
                                    $(this).html(event.strftime(format));
                                })
                                .on('finish.countdown', function(event) {
                                    $(this).html('<?php echo $event_expired; ?>')
                                        .parent().addClass('disabled');
                                });
                        });
                    });
                </script>
                <?php
                echo '</div>';
            }
            if ( !$this->isCategoryView && $this->article->params->get('jollyany_event_url', '') && (!$this->article->params->get('jollyany_event_start', '') || time() < strtotime($this->article->params->get('jollyany_event_start', '')))) { ?>
                <div class="call-to-action"><a href="<?php echo $this->article->params->get('jollyany_event_url', ''); ?>" class="btn btn-primary"><?php echo $this->article->params->get('jollyany_event_url_text', JText::_('JOLLYANY_EVENT_BUTTON_TEXT')); ?></a></div>
            <?php }
            echo '</div>';
            echo '<div class="event-info">';
            if ((!$this->isCategoryView || ($this->isCategoryView && $this->categoryParams->get('jollyany_show_event_location',0))) && $this->article->params->get('jollyany_event_location', '')) {
                echo '<div class="event-location"><i class="fas fa-map-marker-alt"></i>'. $this->article->params->get('jollyany_event_location', '') .'</div>';
            }
            if ((!$this->isCategoryView || ($this->isCategoryView && $this->categoryParams->get('jollyany_show_event_duration',0))) && ($this->article->params->get('jollyany_event_start', '') || $this->article->params->get('jollyany_event_end', ''))) {
                $event_duration =   array();
                if ($this->article->params->get('jollyany_event_start', '')) {
                    $event_duration[]   =   date(JText::_('DATE_FORMAT_LC2'), strtotime($this->article->params->get('jollyany_event_start', '')));
                }
                if ($this->article->params->get('jollyany_event_end', '')) {
                    $event_duration[]   =   date(JText::_('DATE_FORMAT_LC2'), strtotime($this->article->params->get('jollyany_event_end', '')));
                }
                echo '<div class="event-duration"><i class="fas fa-calendar-alt"></i>'. implode('<i class="fas fa-long-arrow-alt-right text-center"></i>', $event_duration) .'</div>';
            }
            if ((!$this->isCategoryView || ($this->isCategoryView && $this->categoryParams->get('jollyany_show_event_seats',0))) && $this->article->params->get('jollyany_event_spot', '')) {
                echo '<div class="event-spot"><i class="fas fa-user-friends"></i>'. JText::sprintf('JOLLYANY_EVENT_SPOT_TEXT', $this->article->params->get('jollyany_event_spot', ''))  .'</div>';
            }
            if ((!$this->isCategoryView || ($this->isCategoryView && $this->categoryParams->get('jollyany_show_event_phone',0))) && $this->article->params->get('jollyany_event_phone', '')) {
                echo '<div class="event-phone"><i class="fas fa-phone-alt"></i>'. $this->article->params->get('jollyany_event_phone', '') .'</div>';
            }
            echo '</div>';
            echo '</div>';
            if (!$this->isCategoryView && $this->article->params->get('jollyany_event_long_lat', '')) {
                $longlat    =   explode(',', $this->article->params->get('jollyany_event_long_lat', ''));
                $googlemapmousescroll   =   $this->template->params->get('googlemapmousescroll', 0) ? 'true' : 'false';
                $googlemapshowcontrol   =   $this->template->params->get('googlemapshowcontrol', 0) ? 'false' : 'true';
                $locations    =   $this->article->params->get('event_multi_locations', '');
                $location_addr = [];
                foreach ($locations as $location) {
                    $location_longlat   =   explode(',', $location['jollyany_location_long_lat']);
                    $location_addr[] = array('address'=>$location['jollyany_location_infowindow'], 'latitude'=>trim($location_longlat[0]),'longitude'=>trim($location_longlat[1]));
                }
                $location_json = json_encode($location_addr);
                $google_id    =   uniqid('googlemap_');
                $document->addStyleDeclaration('#'.$google_id.'{height:'.$this->template->params->get('googlemapheight', '400').'px;}');
                $document->addScript('https://maps.googleapis.com/maps/api/js?key='. $this->template->params->get('googleapikey', ''));
                $document->addScript('libraries/jollyany/framework/assets/js/vendor/gmap.js');
                echo '<div class="event_googlemaps">';
                echo '<div id="'.$google_id.'" class="googlemapapi" data-lat="' . trim($longlat[0]) . '" data-lng="' . trim($longlat[1]) . '"  data-location=\''.base64_encode($location_json).'\' data-maptype="' . $this->template->params->get('googlemaptype','ROADMAP') . '" data-mapzoom="' . $this->template->params->get('googlemapzoom', '15') . '" data-mousescroll="' . $googlemapmousescroll . '" data-infowindow="' . base64_encode($this->article->params->get('jollyany_event_infowindow', '')) . '" data-show-controll=\''.$googlemapshowcontrol.'\'></div>';
                echo '</div>';
            }
        endif;
            $html   =   ob_get_clean();
        return $html;
    }

    protected function _getCategoryParams()
    {
        $params = new JRegistry();
        if (!empty($this->article->catid)) {
            $db = \JFactory::getDbo();
            $query = "SELECT `params` FROM `#__categories` WHERE `id`=" . $this->article->catid;
            $db->setQuery($query);
            $result = $db->loadObject();
            if (!empty($result)) {
                $params->loadString($result->params, 'JSON');
            }
        }
        return $params;
    }
}
