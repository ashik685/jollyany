<?php
/**
* @package SP Page Builder
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2020 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('resticted access');

class SppagebuilderAddonUIArticles extends SppagebuilderAddons{

	public function render(){
		$page_view_name = isset($_GET['view']);
		$app = JFactory::getApplication();
		if($app->isClient('administrator')) {
			return ''; // prevent from loading in the admin view
		}

		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$layout = (isset($settings->layout) && $settings->layout) ? $settings->layout : '';
		$style = (isset($settings->color_style) && $settings->color_style) ? ' '.$settings->color_style : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		// Addon options
		$resource 		= (isset($settings->resource) && $settings->resource) ? $settings->resource : 'article';
		$catid 			= (isset($settings->catid) && $settings->catid) ? $settings->catid : 0;
		$tagids 		= (isset($settings->tagids) && $settings->tagids) ? $settings->tagids : array();
		$k2catid 		= (isset($settings->k2catid) && $settings->k2catid) ? $settings->k2catid : 0;
		$include_subcat = (isset($settings->include_subcat)) ? $settings->include_subcat : 1;
		$post_type 		= (isset($settings->post_type) && $settings->post_type) ? $settings->post_type : '';
		$ordering 		= (isset($settings->ordering) && $settings->ordering) ? $settings->ordering : 'latest';
		$limit 			= (isset($settings->limit) && $settings->limit) ? $settings->limit : 3;
		$columns 		= (isset($settings->columns) && $settings->columns) ? $settings->columns : '';
		$show_intro 	= (isset($settings->show_intro)) ? $settings->show_intro : 1;
		$intro_limit 	= (isset($settings->intro_limit) && $settings->intro_limit) ? $settings->intro_limit : 200;
		$hide_thumbnail = (isset($settings->hide_thumbnail)) ? $settings->hide_thumbnail : 0;
		$show_author 	= (isset($settings->show_author)) ? $settings->show_author : 1;
		$show_category 	= (isset($settings->show_category)) ? $settings->show_category : 1;
		$show_date 		= (isset($settings->show_date)) ? $settings->show_date : 1;
        $show_course 	= (isset($settings->show_course)) ? $settings->show_course : 0;
        $show_course_lecture_count 	= (isset($settings->show_course_lecture_count)) ? $settings->show_course_lecture_count : 1;
		$show_event 	= (isset($settings->show_event)) ? $settings->show_event : 0;
		$show_event_date= (isset($settings->show_event_date)) ? $settings->show_event_date : 1;
		$show_event_duration 	= (isset($settings->show_event_duration)) ? $settings->show_event_duration : 1;
		$show_event_location 	= (isset($settings->show_event_location)) ? $settings->show_event_location : 1;
		$show_event_spot 	= (isset($settings->show_event_spot)) ? $settings->show_event_spot : 1;
		$show_event_phone 	= (isset($settings->show_event_phone)) ? $settings->show_event_phone : 1;
		$show_readmore 	= (isset($settings->show_readmore)) ? $settings->show_readmore : 1;
        $button_text    = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : 'Read More';
        $button_class   = (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : ' sppb-btn-default';
		$link_articles 	= (isset($settings->link_articles)) ? $settings->link_articles : 0;
		$link_catid 	= (isset($settings->link_catid)) ? $settings->link_catid : 0;
		$link_k2catid 	= (isset($settings->link_k2catid)) ? $settings->link_k2catid : 0;
        $use_slider     = (isset($settings->use_slider)) ? $settings->use_slider : 0;
        $enable_navigation     = (isset($settings->enable_navigation)) ? $settings->enable_navigation : 1;
        $navigation_position   = (isset($settings->navigation_position)) ? $settings->navigation_position : '';
        $enable_dotnav  = (isset($settings->enable_dotnav)) ? $settings->enable_dotnav : 1;
        $center_slider 	= (isset($settings->center_slider)) ? $settings->center_slider : 0;
        $card_size 		= (isset($settings->card_size) && $settings->card_size) ? $settings->card_size : '';
        $card_size_cls  = $card_size ? ' uk-card-'.$card_size : '';
        $uk_card_body   = $card_size != 'none' ? ' uk-card-body' : '';

        //responsive width
        if (isset($settings->responsive_width->md)) $settings->responsive_width = $settings->responsive_width->md;
        $responsive_width = (isset($settings->responsive_width) && $settings->responsive_width) ? $settings->responsive_width : 4;
        $responsive_width_sm = (isset($settings->responsive_width_sm) && $settings->responsive_width_sm) ? $settings->responsive_width_sm : 3;
        $responsive_width_xs = (isset($settings->responsive_width_xs) && $settings->responsive_width_xs) ? $settings->responsive_width_xs : 2;

        //for old version
        if ($columns) {
            $responsive_width = $columns;
        }

        $all_articles_btn_text   = (isset($settings->all_articles_btn_text) && $settings->all_articles_btn_text) ? $settings->all_articles_btn_text : 'See all posts';
		$all_articles_btn_class  = (isset($settings->all_articles_btn_size) && $settings->all_articles_btn_size) ? ' sppb-btn-' . $settings->all_articles_btn_size : '';
		$all_articles_btn_class .= (isset($settings->all_articles_btn_type) && $settings->all_articles_btn_type) ? ' sppb-btn-' . $settings->all_articles_btn_type : ' sppb-btn-default';
		$all_articles_btn_class .= (isset($settings->all_articles_btn_shape) && $settings->all_articles_btn_shape) ? ' sppb-btn-' . $settings->all_articles_btn_shape: ' sppb-btn-rounded';
		$all_articles_btn_class .= (isset($settings->all_articles_btn_appearance) && $settings->all_articles_btn_appearance) ? ' sppb-btn-' . $settings->all_articles_btn_appearance : '';
		$all_articles_btn_class .= (isset($settings->all_articles_btn_block) && $settings->all_articles_btn_block) ? ' ' . $settings->all_articles_btn_block : '';
		$all_articles_btn_icon   = (isset($settings->all_articles_btn_icon) && $settings->all_articles_btn_icon) ? $settings->all_articles_btn_icon : '';
		$all_articles_btn_icon_position = (isset($settings->all_articles_btn_icon_position) && $settings->all_articles_btn_icon_position) ? $settings->all_articles_btn_icon_position: 'left';

        if ($show_readmore) {
            $button_class .= (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
            $button_class .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
            $button_class .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
            $button_class .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
            $button_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
            $button_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';

            $icon_arr = array_filter(explode(' ', $button_icon));
            if (count($icon_arr) === 1) {
                $button_icon = 'fa ' . $button_icon;
            }

            if ($button_icon_position == 'left') {
                $button_text = ($button_icon) ? '<span class="' . $button_icon . '" aria-hidden="true"></span> ' . $button_text : $button_text;
            } else {
                $button_text = ($button_icon) ? $button_text . ' <span class="' . $button_icon . '" aria-hidden="true"></span>' : $button_text;
            }
        }

		$output   = '';
		//include k2 helper
		$k2helper 		= JPATH_ROOT . '/components/com_sppagebuilder/helpers/k2.php';
		$article_helper = JPATH_ROOT . '/components/com_sppagebuilder/helpers/articles.php';
		$isk2installed  = self::isComponentInstalled('com_k2');

		if ($resource == 'k2') {
			if ($isk2installed == 0) {
				$output .= '<p class="alert alert-danger">' . JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_ERORR_K2_NOTINSTALLED') . '</p>';
				return $output;
			} elseif(!file_exists($k2helper)) {
				$output .= '<p class="alert alert-danger">' . JText::_('COM_SPPAGEBUILDER_ADDON_K2_HELPER_FILE_MISSING') . '</p>';
				return $output;
			} else {
				require_once $k2helper;
			}
			$items = SppagebuilderHelperK2::getItems($limit, $ordering, $k2catid, $include_subcat);
		} else {
			require_once $article_helper;
			$items = SppagebuilderHelperArticles::getArticles($limit, $ordering, $catid, $include_subcat, $post_type, $tagids);
		}

		if (!count($items)) {
			$output .= '<p class="alert alert-warning">' . JText::_('COM_SPPAGEBUILDER_NO_ITEMS_FOUND') . '</p>';
			return $output;
		}

		if(count((array) $items)) {
			$output  .= '<div class="sppb-addon sppb-addon-articles ' . $class . '">';
			$output .= '<div class="sppb-addon-content'.$style.'">';
			if ($use_slider) {
                $output .= '<div uk-slider="'.($center_slider ? 'center: true' : '').'">';
                $output .= '<div class="uk-position-relative">';
                $output .= '<div class="uk-slider-container">';
            }
			$output	.= '<div class="uk-child-width-1-'.$responsive_width.'@l uk-child-width-1-'.$responsive_width_sm.'@m uk-child-width-1-'.$responsive_width_xs.'@s'.($use_slider ? ' uk-slider-items': '').'" uk-grid>';

			foreach ($items as $key => $item) {
			    $params = json_decode($item->attribs, true);
				$output .= '<div>';
				$output .= '<div class="sppb-addon-article uk-article uk-card'.$card_size_cls.'">';
				if(!$hide_thumbnail) {
					$image = '';
					if ($resource == 'k2') {
						if(isset($item->image_medium) && $item->image_medium){
							$image = $item->image_medium;
						} elseif(isset($item->image_large) && $item->image_large){
							$image = $item->image_medium;
						}
					} else {
						$image = $item->image_thumbnail;
					}
					if($resource != 'k2' && $item->post_format=='gallery') {
						if(count((array) $item->imagegallery->images)) {
							$output .= '<div class="sppb-carousel sppb-slide" data-sppb-ride="sppb-carousel">';
							$output .= '<div class="sppb-carousel-inner">';
							foreach ($item->imagegallery->images as $key => $gallery_item) {
								$active_class = '';
								if($key == 0){
									$active_class = ' active';
								}
								if (isset($gallery_item['thumbnail']) && $gallery_item['thumbnail']) {
									$output .= '<div class="sppb-item'.$active_class.'">';
									$output .= '<img src="'. $gallery_item['thumbnail'] .'" alt="">';
									$output .= '</div>';
								} elseif (isset($gallery_item['full']) && $gallery_item['full']) {
									$output .= '<div class="sppb-item'.$active_class.'">';
									$output .= '<img src="'. $gallery_item['full'] .'" alt="">';
									$output .= '</div>';
								}
							}
							$output	.= '</div>';
							$output	.= '<a class="left sppb-carousel-control" role="button" data-slide="prev" aria-label="'.JText::_('COM_SPPAGEBUILDER_ARIA_PREVIOUS').'"><i class="fa fa-angle-left" aria-hidden="true"></i></a>';
							$output	.= '<a class="right sppb-carousel-control" role="button" data-slide="next" aria-label="'.JText::_('COM_SPPAGEBUILDER_ARIA_NEXT').'"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';
							$output .= '</div>';
						} elseif ( isset($item->image_thumbnail) && $item->image_thumbnail ) {
							//Lazyload image
							$placeholder = $item->image_thumbnail == '' ? false : $this->get_image_placeholder($item->image_thumbnail);
							
							//Get image ALT text
							$img_obj = json_decode($item->images);
							$img_obj_helix = json_decode($item->attribs);

							$img_blog_op_alt_text = (isset($img_obj->image_intro_alt) && $img_obj->image_intro_alt) ? $img_obj->image_intro_alt : "";
							$img_helix_alt_text = (isset($img_obj_helix->helix_ultimate_image_alt_txt) && $img_obj_helix->helix_ultimate_image_alt_txt) ? $img_obj_helix->helix_ultimate_image_alt_txt : "";
							$img_alt_text = "";

							if($img_helix_alt_text){
								$img_alt_text = $img_helix_alt_text;
							} else if ($img_blog_op_alt_text) {
								$img_alt_text = $img_blog_op_alt_text;
							} else {
								$img_alt_text = $item->title;
							}

							$output .= '<a href="'. $item->link .'" itemprop="url"><img class="sppb-img-responsive'.($placeholder && $page_view_name != 'form' ? ' sppb-element-lazy' : '').'" src="' . ($placeholder && $page_view_name != 'form' ? $placeholder : $item->image_thumbnail) . '" alt="'. $img_alt_text.'" itemprop="thumbnailUrl" '.($placeholder && $page_view_name != 'form' ? 'data-large="'.$image.'"' : '').'  loading="lazy"></a>';
						}
					} elseif( $resource != 'k2' &&  $item->post_format == 'video' && isset($item->video_src) && $item->video_src ) {
						$output .= '<div class="entry-video embed-responsive embed-responsive-16by9">';
							$output .= '<object class="embed-responsive-item" style="width:100%;height:100%;" data="' . $item->video_src . '">';
								$output .= '<param name="movie" value="'. $item->video_src .'">';
								$output .= '<param name="wmode" value="transparent" />';
								$output .= '<param name="allowFullScreen" value="true">';
								$output .= '<param name="allowScriptAccess" value="always"></param>';
								$output .= '<embed src="'. $item->video_src .'" type="application/x-shockwave-flash" allowscriptaccess="always"></embed>';
							$output .= '</object>';
						$output .= '</div>';
					} elseif($resource != 'k2' && $item->post_format == 'audio' && isset($item->audio_embed) && $item->audio_embed) {
						$output .= '<div class="entry-audio embed-responsive embed-responsive-16by9">';
							$output .= $item->audio_embed;
						$output .= '</div>';
					} elseif($resource != 'k2' && $item->post_format == 'link' && isset($item->link_url) && $item->link_url) {
						$output .= '<div class="entry-link">';
							$output .= '<a target="_blank" rel="noopener noreferrer" href="' . $item->link_url .'"><h4>' . $item->link_title .'</h4></a>';
						$output .= '</div>';
					} else {
						if(isset($image) && $image) {
							//Lazyload image
							$default_placeholder = $image == '' ? false : $this->get_image_placeholder($image);

							//Get image ALT text
							$img_obj = json_decode($item->images);
							$img_obj_helix = json_decode($item->attribs);

							$img_blog_op_alt_text = (isset($img_obj->image_intro_alt) && $img_obj->image_intro_alt) ? $img_obj->image_intro_alt : "";
							$img_helix_alt_text = (isset($img_obj_helix->helix_ultimate_image_alt_txt) && $img_obj_helix->helix_ultimate_image_alt_txt) ? $img_obj_helix->helix_ultimate_image_alt_txt : "";
							$img_alt_text = "";

							if($img_helix_alt_text){
								$img_alt_text = $img_helix_alt_text;
							} else if ($img_blog_op_alt_text) {
								$img_alt_text = $img_blog_op_alt_text;
							} else {
								$img_alt_text = $item->title;
							}

							$output .= '<a class="sppb-article-img-wrap uk-card-media-top" href="'. $item->link .'" itemprop="url"><img class="sppb-img-responsive'.($default_placeholder && $page_view_name != 'form' ? ' sppb-element-lazy' : '').'" src="' . ($default_placeholder && $page_view_name != 'form' ? $default_placeholder : $image) . '" alt="'. $img_alt_text .'" itemprop="thumbnailUrl" '.($default_placeholder && $page_view_name != 'form' ? 'data-large="'.$image.'"' : '').' loading="lazy"></a>';
						}
					}
				}
                if ($layout == 'thumbnail') {
                    $output .= '<div class="uk-position-cover uk-overlay uk-overlay-primary"></div>';
                }
				$output .= '<div class="sppb-article-info-wrap'.$uk_card_body.($layout == 'thumbnail' ? ' uk-position-bottom uk-light' : '').'">';
                    if ($show_event && $show_event_date && isset($params['jollyany_event_start']) && $params['jollyany_event_start']) {
                        $output .= '<span class="uk-badge uk-margin">' . Jhtml::_('date', strtotime($params['jollyany_event_start']), 'DATE_FORMAT_LC1') . '</span>';
                    }
                    if ($show_course) {
                        jimport('jollyany.framework.course');
                        if ($show_course_lecture_count) {
                            $courses    =   JollyanyFrameworkCourse::getData($item->id);
                            $courses    =   json_decode($courses->data, true);
                            if (count($courses)) {
                                $lectures   =   0;
                                foreach ($courses as $course) {
                                    if ($course['jollyany_lesson_type'] == 'content') {
                                        $lectures++;
                                    }
                                }
                                $output .= '<span class="uk-badge uk-margin">' . $lectures . ' ' . JText::_('JOLLYANY_COURSE_LECTURES') . '</span>';
                            }
                        }
                    }
					$output .= '<'.$heading_selector.' class="ui-title uk-article-title uk-margin-remove-top"><a href="'. $item->link .'" itemprop="url">' . $item->title . '</a></'.$heading_selector.'>';

					if($show_author || $show_category || $show_date) {
						$output .= '<div class="uk-article-meta uk-grid-small uk-margin" uk-grid>';

						if($show_date) {
							$output .= '<span class="sppb-meta-date" itemprop="datePublished">' . Jhtml::_('date', $item->publish_up, 'DATE_FORMAT_LC3') . '</span>';
						}

						if($show_category) {
							if ($resource == 'k2') {
								$item->catUrl = urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($item->catid.':'.urlencode($item->category_alias))));
							} else {
								$item->catUrl = JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug));
							}
							$output .= '<span class="sppb-meta-category"><a href="'. $item->catUrl .'" itemprop="genre">' . $item->category . '</a></span>';
						}

						if($show_author) {
							$author = ( $item->created_by_alias ?  $item->created_by_alias :  $item->username);
							$output .= '<span class="sppb-meta-author" itemprop="name">' . $author . '</span>';
						}

						$output .= '</div>';
					}

					if($show_intro) {
						$output .= '<div class="sppb-article-introtext">'. mb_substr(strip_tags($item->introtext), 0, $intro_limit, 'UTF-8') .'...</div>';
					}

					if ($show_event) {
                        $output .= '<div class="ui-article-event uk-text-meta uk-margin">';
                        if ($show_event_duration && ((isset($params['jollyany_event_start']) && $params['jollyany_event_start']) || (isset($params['jollyany_event_end']) && $params['jollyany_event_end']))) {
                            $output .= '<div class="uk-grid-small" uk-grid>';
                            $event_duration =   array();
                            if (isset($params['jollyany_event_start']) && $params['jollyany_event_start']) {
                                $event_duration[]   =   date('F d, Y H:i', strtotime($params['jollyany_event_start']));
                            }
                            if (isset($params['jollyany_event_end']) && $params['jollyany_event_end']) {
                                $event_duration[]   =   date('F d, Y H:i', strtotime($params['jollyany_event_end']));
                            }
                            $output .= '<div class="uk-width-auto"><span uk-icon="icon: clock; ratio: 0.8"></span></div><div class="uk-width-expand">'. implode('<span uk-icon="icon: arrow-right"></span>', $event_duration).'</div>';
                            $output .= '</div>';
                        }

                        if ($show_event_location && isset($params['jollyany_event_location']) && $params['jollyany_event_location']) {
                            $output .= '<div class="uk-grid-small" uk-grid>';
                            $output .= '<div class="uk-width-auto"><span uk-icon="icon: location; ratio: 0.8"></span></div><div class="uk-width-expand">'.$params['jollyany_event_location'].'</div>';
                            $output .= '</div>';
                        }

                        if ($show_event_spot && isset($params['jollyany_event_spot']) && $params['jollyany_event_spot']) {
                            $output .= '<div class="uk-grid-small" uk-grid>';
                            $output .= '<div class="uk-width-auto"><span uk-icon="icon: users; ratio: 0.8"></span></div><div class="uk-width-expand">'.JText::sprintf('JOLLYANY_EVENT_SPOT_TEXT', $params['jollyany_event_spot']).'</div>';
                            $output .= '</div>';
                        }

                        if ($show_event_phone && isset($params['jollyany_event_phone']) && $params['jollyany_event_phone']) {
                            $output .= '<div class="uk-grid-small" uk-grid>';
                            $output .= '<div class="uk-width-auto"><span uk-icon="icon: receiver; ratio: 0.8"></span></div><div class="uk-width-expand">'.$params['jollyany_event_phone'].'</div>';
                            $output .= '</div>';
                        }
                        $output .= '</div>';
                    }


					if($show_readmore) {
					    if (isset($settings->button_type) && $settings->button_type != 'link') {
                            $button_class = ' sppb-btn ' . $button_class ;
                        }
						$output .= '<a class="btn-readmore-'. $this->addon->id .' sppb-readmore ' . $button_class . '" href="'. $item->link .'" itemprop="url">'. $button_text .'</a>';
					}
				$output .= '</div>'; //.sppb-article-info-wrap

				$output .= '</div>';
				$output .= '</div>';
			}

			$output  .= '</div>';
			if ($use_slider) {
			    // End Slider Container
                $output  .= '</div>';
                if ($enable_navigation) {
                    // Nav
                    $output .= '<div class="'.($navigation_position == 'inside' ? '' : 'uk-hidden@l ').'uk-light"><a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a><a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a></div>';
                    $output .= $navigation_position == 'inside' ? '' : '<div class="uk-visible@l"><a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a><a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a></div>';
                }
                $output  .= '</div>';
                if ($enable_dotnav) {
                    // Dot nav
                    $output .= '<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>';
                }
                // End Slider
                $output  .= '</div>';
            }

			// See all link
			if($link_articles) {

				$icon_arr = array_filter(explode(' ', $all_articles_btn_icon));
				if (count($icon_arr) === 1) {
					$all_articles_btn_icon = 'fa ' . $all_articles_btn_icon;
				}

				if($all_articles_btn_icon_position == 'left') {
					$all_articles_btn_text = ($all_articles_btn_icon) ? '<i class="' . $all_articles_btn_icon . '" aria-hidden="true"></i> ' . $all_articles_btn_text : $all_articles_btn_text;
				} else {
					$all_articles_btn_text = ($all_articles_btn_icon) ? $all_articles_btn_text . ' <i class="' . $all_articles_btn_icon . '" aria-hidden="true"></i>' : $all_articles_btn_text;
				}

				if ($resource == 'k2') {
					if(!empty($link_k2catid)){
						$output  .= '<a href="' . urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($link_k2catid))) . '" " id="btn-' . $this->addon->id . '" class="sppb-btn' . $all_articles_btn_class . '">' . $all_articles_btn_text . '</a>';
					}
				} else{
					if(!empty($link_catid)){
						$output  .= '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($link_catid)) . '" id="btn-' . $this->addon->id . '" class="sppb-btn' . $all_articles_btn_class . '">' . $all_articles_btn_text . '</a>';
					}
				}

			}

			$output  .= '</div>';
			$output  .= '</div>';
		}

		return $output;
	}

	public function css() {
		$addon_id = '#sppb-addon-' .$this->addon->id;
        $settings = $this->addon->settings;
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new JLayoutFile('addon.css.button', $layout_path);

		$options = new stdClass;
		$options->button_type = (isset($this->addon->settings->all_articles_btn_type) && $this->addon->settings->all_articles_btn_type) ? $this->addon->settings->all_articles_btn_type : '';
		$options->button_appearance = (isset($this->addon->settings->all_articles_btn_appearance) && $this->addon->settings->all_articles_btn_appearance) ? $this->addon->settings->all_articles_btn_appearance : '';
		$options->button_color = (isset($this->addon->settings->all_articles_btn_color) && $this->addon->settings->all_articles_btn_color) ? $this->addon->settings->all_articles_btn_color : '';
		$options->button_color_hover = (isset($this->addon->settings->all_articles_btn_color_hover) && $this->addon->settings->all_articles_btn_color_hover) ? $this->addon->settings->all_articles_btn_color_hover : '';
		$options->button_background_color = (isset($this->addon->settings->all_articles_btn_background_color) && $this->addon->settings->all_articles_btn_background_color) ? $this->addon->settings->all_articles_btn_background_color : '';
		$options->button_background_color_hover = (isset($this->addon->settings->all_articles_btn_background_color_hover) && $this->addon->settings->all_articles_btn_background_color_hover) ? $this->addon->settings->all_articles_btn_background_color_hover : '';
		$options->button_fontstyle = (isset($this->addon->settings->all_articles_btn_font_style) && $this->addon->settings->all_articles_btn_font_style) ? $this->addon->settings->all_articles_btn_font_style : '';
		$options->button_font_style = (isset($this->addon->settings->all_articles_btn_font_style) && $this->addon->settings->all_articles_btn_font_style) ? $this->addon->settings->all_articles_btn_font_style : '';
		$options->button_letterspace = (isset($this->addon->settings->all_articles_btn_letterspace) && $this->addon->settings->all_articles_btn_letterspace) ? $this->addon->settings->all_articles_btn_letterspace : '';

        $css = $css_path->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . $this->addon->id));

        //Readmore button
        $show_readmore 	= (isset($settings->show_readmore)) ? $settings->show_readmore : 1;
        if ($show_readmore) {
            $layout_path = JPATH_ROOT . '/libraries/jollyany/framework/extensions/sppagebuilder/layouts';
            $jollyany_css_path = new JLayoutFile('addon.css.button', $layout_path);
            $css .= $jollyany_css_path->render(array('addon_id' => $addon_id, 'options' => $this->addon->settings, 'class' => 'btn-readmore-'. $this->addon->id));
        }

        $css .= (isset($settings->overlay_color) && $settings->overlay_color) ? '#sppb-addon-' . $this->addon->id . ' .uk-overlay-primary {background-color:'.$settings->overlay_color . ';}' : '';

        //Title style
        $title_style = '';
        $title_style .= (isset($settings->title_text_color) && $settings->title_text_color) ? 'color:'.$settings->title_text_color . ';' : '';
        if (isset($settings->title_fontsize->md)) $settings->title_fontsize = $settings->title_fontsize->md;
        $title_style .= (isset($settings->title_fontsize) && $settings->title_fontsize) ? 'font-size:'.$settings->title_fontsize . 'px;' : '';
        if (isset($settings->title_lineheight->md)) $settings->title_lineheight = $settings->title_lineheight->md;
        $title_style .= (isset($settings->title_lineheight) && $settings->title_lineheight) ? 'line-height:'.$settings->title_lineheight . 'px;' : '';
        $title_style .= (isset($settings->title_letterspace) && $settings->title_letterspace) ? 'letter-spacing:'.$settings->title_letterspace . ';' : '';
        $title_style .= (isset($settings->title_margin_top) && $settings->title_margin_top) ? 'margin-top:'.$settings->title_margin_top . 'px;' : '';
        $title_style .= (isset($settings->title_margin_bottom) && $settings->title_margin_bottom) ? 'margin-bottom:'.$settings->title_margin_bottom . 'px;' : '';
        $title_font_style = (isset($settings->title_font_style) && $settings->title_font_style) ? $settings->title_font_style : '';
        if(isset($title_font_style->underline) && $title_font_style->underline){
            $title_style .= 'text-decoration:underline;';
        }
        if(isset($title_font_style->italic) && $title_font_style->italic){
            $title_style .= 'font-style:italic;';
        }
        if(isset($title_font_style->uppercase) && $title_font_style->uppercase){
            $title_style .= 'text-transform:uppercase;';
        }
        if(isset($title_font_style->weight) && $title_font_style->weight){
            $title_style .= 'font-weight:'.$title_font_style->weight.';';
        }
        if($title_style){
            $css .= '#sppb-addon-' . $this->addon->id . ' .ui-title {';
            $css .= $title_style;
            $css .= '}';
        }

        if (isset($settings->thumbnail_height->md)) $settings->thumbnail_height = $settings->thumbnail_height->md;
        $thumbnail_height = (isset($settings->thumbnail_height) && $settings->thumbnail_height) ? 'height:'.$settings->thumbnail_height . 'px;' : '';
        $thumbnail_height_sm = (isset($settings->thumbnail_height_sm) && $settings->thumbnail_height_sm) ? "height: " . $settings->thumbnail_height_sm . "px;" : "";
        $thumbnail_height_xs = (isset($settings->thumbnail_height_xs) && $settings->thumbnail_height_xs) ? "height: " . $settings->thumbnail_height_xs . "px;" : "";
        if ($thumbnail_height) {
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-img-wrap {display:block;';
            $css .= $thumbnail_height;
            $css .= '}';
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-img-wrap .sppb-img-responsive {object-fit: cover;width: 100%;height: 100%;}';
        }

        $meta_style = '';
        $meta_style .= (isset($settings->meta_fontsize) && $settings->meta_fontsize) ? "font-size: " . $settings->meta_fontsize . "px;" : "";
        $meta_style .= (isset($settings->meta_lineheight) && $settings->meta_lineheight) ? "line-height: " . $settings->meta_lineheight . "px;" : "";
        $meta_style_sm = (isset($settings->meta_fontsize_sm) && $settings->meta_fontsize_sm) ? "font-size: " . $settings->meta_fontsize_sm . "px;" : "";
        $meta_style_sm .= (isset($settings->meta_lineheight_sm) && $settings->meta_lineheight_sm) ? "line-height: " . $settings->meta_lineheight_sm . "px;" : "";
        $meta_style_xs = (isset($settings->meta_fontsize_xs) && $settings->meta_fontsize_xs) ? "font-size: " . $settings->meta_fontsize_xs . "px;" : "";
        $meta_style_xs .= (isset($settings->meta_lineheight_xs) && $settings->meta_lineheight_xs) ? "line-height: " . $settings->meta_lineheight_xs . "px;" : "";
        $meta_font_style = (isset($settings->meta_font_style) && $settings->meta_font_style) ? $settings->meta_font_style : '';
        if(isset($meta_font_style->underline) && $meta_font_style->underline){
            $meta_style .= 'text-decoration:underline;';
        }
        if(isset($meta_font_style->italic) && $meta_font_style->italic){
            $meta_style .= 'font-style:italic;';
        }
        if(isset($meta_font_style->uppercase) && $meta_font_style->uppercase){
            $meta_style .= 'text-transform:uppercase;';
        }
        if(isset($meta_font_style->weight) && $meta_font_style->weight){
            $meta_style .= 'font-weight:'.$meta_font_style->weight.';';
        }

        $style = '';
        $style_sm = '';
        $style_xs = '';

        $style .= (isset($settings->text_fontsize) && $settings->text_fontsize) ? "font-size: " . $settings->text_fontsize . "px;" : "";
        $style .= (isset($settings->text_fontweight) && $settings->text_fontweight) ? "font-weight: " . $settings->text_fontweight . ";" : "";
        $style_sm .= (isset($settings->text_fontsize_sm) && $settings->text_fontsize_sm) ? "font-size: " . $settings->text_fontsize_sm . "px;" : "";
        $style_xs .= (isset($settings->text_fontsize_xs) && $settings->text_fontsize_xs) ? "font-size: " . $settings->text_fontsize_xs . "px;" : "";

        $style .= (isset($settings->text_lineheight) && $settings->text_lineheight) ? "line-height: " . $settings->text_lineheight . "px;" : "";
        $style_sm .= (isset($settings->text_lineheight_sm) && $settings->text_lineheight_sm) ? "line-height: " . $settings->text_lineheight_sm . "px;" : "";
        $style_xs .= (isset($settings->text_lineheight_xs) && $settings->text_lineheight_xs) ? "line-height: " . $settings->text_lineheight_xs . "px;" : "";

        if(!empty($meta_style)){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-meta { ' . $meta_style . ' }';
        }

        if($style){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-introtext { ' . $style . ' }';
        }

        $css .= '@media (min-width: 768px) and (max-width: 991px) {';
        if($style_sm){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-introtext {';
            $css .= $style_sm;
            $css .= '}';
        }
        if($meta_style_sm){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-meta {';
            $css .= $meta_style_sm;
            $css .= '}';
        }
        if($thumbnail_height_sm){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-img-wrap {';
            $css .= $thumbnail_height_sm;
            $css .= '}';
        }
        $css .='}';

        $css .= '@media (max-width: 767px) {';
        if($style_xs){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-introtext { ' . $style_xs . ' }';
        }
        if($meta_style_xs){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-meta {';
            $css .= $meta_style_xs;
            $css .= '}';
        }
        if($thumbnail_height_xs){
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-article-img-wrap {';
            $css .= $thumbnail_height_xs;
            $css .= '}';
        }
        $css .= '}';

        return $css;
	}

	static function isComponentInstalled($component_name){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select( 'a.enabled' );
		$query->from($db->quoteName('#__extensions', 'a'));
		$query->where($db->quoteName('a.name')." = ".$db->quote($component_name));
		$db->setQuery($query);
		$is_enabled = $db->loadResult();
		return $is_enabled;
	}

}