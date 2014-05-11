<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   LGPL
 * @copyright 2014 Monique Hahnefeld
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Contao',
	'MHAHNEFELD\FTC',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'MHAHNEFELD\FTC\ftcSettingsModel' => 'system/modules/foundation_to_contao/models/ftcSettingsModel.php',

	// Modules
	
	'MHAHNEFELD\FTC\Module'  => 'system/modules/foundation_to_contao/modules/Module.php',
	'MHAHNEFELD\FTC\ModuleOffcanvasCustom'  => 'system/modules/foundation_to_contao/modules/ModuleOffcanvasCustom.php',
	'MHAHNEFELD\FTC\ModuleOffcanvas'  => 'system/modules/foundation_to_contao/modules/ModuleOffcanvas.php',
	'Contao\Module'  => 'system/modules/foundation_to_contao/modules/Module.php',
	//topbar
	'MHAHNEFELD\FTC\ModuleTopbarStart'  => 'system/modules/foundation_to_contao/modules/ModuleTopbarStart.php',
	'MHAHNEFELD\FTC\ModuleTopbarStop'  => 'system/modules/foundation_to_contao/modules/ModuleTopbarStop.php',
	'MHAHNEFELD\FTC\ModuleTopbarSectionCustom'  => 'system/modules/foundation_to_contao/modules/ModuleTopbarSectionCustom.php',
	'MHAHNEFELD\FTC\ModuleTopbarSection'  => 'system/modules/foundation_to_contao/modules/ModuleTopbarSection.php',
	
	//Classes
	'MHAHNEFELD\FTC\Intro'  => 'system/modules/foundation_to_contao/classes/Intro.php',
	'MHAHNEFELD\FTC\Themes'  => 'system/modules/foundation_to_contao/classes/Themes.php',
	'MHAHNEFELD\FTC\ModuleFTC'  => 'system/modules/foundation_to_contao/classes/ModuleFTC.php',
	'Contao\ContentElement'  => 'system/modules/foundation_to_contao/elements/ContentElement.php',
	'MHAHNEFELD\FTC\Hybrid'  => 'system/modules/foundation_to_contao/classes/Hybrid.php',
	
	//Elements magellan
	'MHAHNEFELD\FTC\ContentMagellanNav'  => 'system/modules/foundation_to_contao/elements/magellan/ContentMagellanNav.php',
	'MHAHNEFELD\FTC\ContentMagellanStop'  => 'system/modules/foundation_to_contao/elements/magellan/ContentMagellanStop.php',
	//Elements acc
	'MHAHNEFELD\FTC\ContentAccStartFTC'  => 'system/modules/foundation_to_contao/elements/accordion/ContentAccStartFTC.php',
	'MHAHNEFELD\FTC\ContentAccStopFTC'  => 'system/modules/foundation_to_contao/elements/accordion/ContentAccStopFTC.php',
	'MHAHNEFELD\FTC\ContentAccStartInsideFTC'  => 'system/modules/foundation_to_contao/elements/accordion/ContentAccStartInsideFTC.php',
	'MHAHNEFELD\FTC\ContentAccStopInsideFTC'  => 'system/modules/foundation_to_contao/elements/accordion/ContentAccStopInsideFTC.php',
	//Elements tab
	'MHAHNEFELD\FTC\ContentTabStartFTC'  => 'system/modules/foundation_to_contao/elements/tab/ContentTabStartFTC.php',
	'MHAHNEFELD\FTC\ContentTabStopFTC'  => 'system/modules/foundation_to_contao/elements/tab/ContentTabStopFTC.php',
	'MHAHNEFELD\FTC\ContentTabStartInsideFTC'  => 'system/modules/foundation_to_contao/elements/tab/ContentTabStartInsideFTC.php',
	'MHAHNEFELD\FTC\ContentTabStopInsideFTC'  => 'system/modules/foundation_to_contao/elements/tab/ContentTabStopInsideFTC.php',
	//Elements row
	'MHAHNEFELD\FTC\ContentRowStart'  => 'system/modules/foundation_to_contao/elements/row/ContentRowStart.php',
	'MHAHNEFELD\FTC\ContentRowStop'  => 'system/modules/foundation_to_contao/elements/row/ContentRowStop.php',
	//Elements Content
	'MHAHNEFELD\FTC\ContentListFTC'  => 'system/modules/foundation_to_contao/elements/content/ContentListFTC.php',
	'MHAHNEFELD\FTC\ContentDefList'  => 'system/modules/foundation_to_contao/elements/content/ContentDefList.php',
	'MHAHNEFELD\FTC\ContentPriceTable'  => 'system/modules/foundation_to_contao/elements/content/ContentPriceTable.php',
	'MHAHNEFELD\FTC\ContentHeadlineFTC'  => 'system/modules/foundation_to_contao/elements/content/ContentHeadlineFTC.php',
	'MHAHNEFELD\FTC\ContentBlockquote'  => 'system/modules/foundation_to_contao/elements/content/ContentBlockquote.php',
	'MHAHNEFELD\FTC\ContentVCard'  => 'system/modules/foundation_to_contao/elements/content/ContentVCard.php',
	'MHAHNEFELD\FTC\ContentProgressBar'  => 'system/modules/foundation_to_contao/elements/content/ContentProgressBar.php',
	
	//Elements Buttons Dropdown
	'MHAHNEFELD\FTC\ContentButtonBarStartFTC'  => 'system/modules/foundation_to_contao/elements/buttons/ContentButtonBarStartFTC.php',
	'MHAHNEFELD\FTC\ContentButtonBarStopFTC'  => 'system/modules/foundation_to_contao/elements/buttons/ContentButtonBarStopFTC.php',
	'MHAHNEFELD\FTC\ContentButtonGroup'  => 'system/modules/foundation_to_contao/elements/buttons/ContentButtonGroup.php',
	'MHAHNEFELD\FTC\ContentButtonFTC'  => 'system/modules/foundation_to_contao/elements/buttons/ContentButtonFTC.php',
	'MHAHNEFELD\FTC\ContentDropdownButtons'  => 'system/modules/foundation_to_contao/elements/buttons/ContentDropdownButtons.php',
	'MHAHNEFELD\FTC\ContentDropdownButtonsContentStart'  => 'system/modules/foundation_to_contao/elements/buttons/ContentDropdownButtonsContentStart.php',
	'MHAHNEFELD\FTC\ContentDropdownButtonsContentStop'  => 'system/modules/foundation_to_contao/elements/buttons/ContentDropdownButtonsContentStop.php',
	//Slider und Gallery
	'MHAHNEFELD\FTC\ContentOrbit'  => 'system/modules/foundation_to_contao/elements/orbit/ContentOrbit.php',
	'MHAHNEFELD\FTC\ContentOrbitStart'  => 'system/modules/foundation_to_contao/elements/orbit/ContentOrbitStart.php',
	'MHAHNEFELD\FTC\ContentOrbitStop'  => 'system/modules/foundation_to_contao/elements/orbit/ContentOrbitStop.php',
	'MHAHNEFELD\FTC\ContentOrbitStartInside'  => 'system/modules/foundation_to_contao/elements/orbit/ContentOrbitStartInside.php',
	'MHAHNEFELD\FTC\ContentOrbitStopInside'  => 'system/modules/foundation_to_contao/elements/orbit/ContentOrbitStopInside.php',
	'MHAHNEFELD\FTC\ContentClearing'  => 'system/modules/foundation_to_contao/elements/clearing/ContentClearing.php',
	'MHAHNEFELD\FTC\extndController'  =>	'system/modules/foundation_to_contao/classes/extndController.php',
	'MHAHNEFELD\FTC\PaginationFTC'  =>	'system/modules/foundation_to_contao/classes/PaginationFTC.php',
	//Videos
	'MHAHNEFELD\FTC\ContentFlexVideo'  =>	'system/modules/foundation_to_contao/elements/media/ContentFlexVideo.php',
	//placeholder
	'MHAHNEFELD\FTC\ContentPlaceholderImage'  =>	'system/modules/foundation_to_contao/elements/media/ContentPlaceholderImage.php',
	//Prompts & Callouts
	'MHAHNEFELD\FTC\ContentRevealModalStart' =>	'system/modules/foundation_to_contao/elements/callouts_prompts/ContentRevealModalStart.php',
	'MHAHNEFELD\FTC\ContentRevealModalStop'  =>	'system/modules/foundation_to_contao/elements/callouts_prompts/ContentRevealModalStop.php',
	'MHAHNEFELD\FTC\ContentAlertBox'  =>	'system/modules/foundation_to_contao/elements/callouts_prompts/ContentAlertBox.php',
	'MHAHNEFELD\FTC\ContentJoyride'  =>	'system/modules/foundation_to_contao/elements/callouts_prompts/ContentJoyride.php',
	
	//Forms
	'MHAHNEFELD\FTC\FormSelectMenu' => 'system/modules/foundation_to_contao/forms/FormSelectMenu.php',
	'MHAHNEFELD\FTC\FormCheckBox' => 'system/modules/foundation_to_contao/forms/FormCheckBox.php',
	'MHAHNEFELD\FTC\FormExplanation' => 'system/modules/foundation_to_contao/forms/FormExplanation.php',
	'MHAHNEFELD\FTC\FormFieldset' => 'system/modules/foundation_to_contao/forms/FormFieldset.php',
	'MHAHNEFELD\FTC\FormHeadline' => 'system/modules/foundation_to_contao/forms/FormHeadline.php',
	'MHAHNEFELD\FTC\FormPassword' => 'system/modules/foundation_to_contao/forms/FormPassword.php',
	'MHAHNEFELD\FTC\FormRadioButton' => 'system/modules/foundation_to_contao/forms/FormRadioButton.php',
	'MHAHNEFELD\FTC\FormSubmit' => 'system/modules/foundation_to_contao/forms/FormSubmit.php',
	'MHAHNEFELD\FTC\FormTextArea' => 'system/modules/foundation_to_contao/forms/FormTextArea.php',
	'MHAHNEFELD\FTC\FormTextField' => 'system/modules/foundation_to_contao/forms/FormTextField.php',
	'MHAHNEFELD\FTC\FormCaptcha' => 'system/modules/foundation_to_contao/forms/FormCaptcha.php',
	
	//Form Elements FTC
	'MHAHNEFELD\FTC\FormRowStart'  => 'system/modules/foundation_to_contao/forms/FormRowStart.php',
	'MHAHNEFELD\FTC\FormRowStop'  => 'system/modules/foundation_to_contao/forms/FormRowStop.php',
	'MHAHNEFELD\FTC\FormRangeSlider'  => 'system/modules/foundation_to_contao/forms/FormRangeSlider.php'
			
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(	
	'be_main' => 'system/modules/foundation_to_contao/templates/backend',
	'be_wildcard' => 'system/modules/foundation_to_contao/templates/backend',
	'be_ftc_introduction' => 'system/modules/foundation_to_contao/templates/backend',
	'be_ftc_overview' => 'system/modules/foundation_to_contao/templates/backend',
	
	'fe_page' => 'system/modules/foundation_to_contao/templates/frontend',
	
	//modules
	'mod_topbar_start' => 'system/modules/foundation_to_contao/templates/modules',
	'mod_topbar_section' => 'system/modules/foundation_to_contao/templates/modules',
	'mod_topbar_stop' => 'system/modules/foundation_to_contao/templates/modules',
	'nav_default_topbar' => 'system/modules/foundation_to_contao/templates/modules',
	'mod_navigation_offcanvas' => 'system/modules/foundation_to_contao/templates/modules',
	'nav_default_offcanvas' => 'system/modules/foundation_to_contao/templates/modules',
	'mod_breadcrumb' => 'system/modules/foundation_to_contao/templates/modules',
	'mod_search_simple_topbar' => 'system/modules/foundation_to_contao/templates/modules',
	'search_default_topbar' => 'system/modules/foundation_to_contao/templates/modules',
	
	
	
	//elements
	'ce_magellan_nav'  => 'system/modules/foundation_to_contao/templates/magellan',
	'ce_magellan_stop'  => 'system/modules/foundation_to_contao/templates/magellan',
	
	'ce_text' => 'system/modules/foundation_to_contao/templates/content',
	'mod_mh_foundation_to_contao' => 'system/modules/foundation_to_contao/templates',
	//forms
	'form' => 'system/modules/foundation_to_contao/templates/forms',
	//acc
	'ce_acc_start' => 'system/modules/foundation_to_contao/templates/accordion',
	'ce_acc_stop' => 'system/modules/foundation_to_contao/templates/accordion',
	'ce_acc_start_inside' => 'system/modules/foundation_to_contao/templates/accordion',
	'ce_acc_stop_inside' => 'system/modules/foundation_to_contao/templates/accordion',
	
	'ce_tab_start' => 'system/modules/foundation_to_contao/templates/tab',
	'ce_tab_stop' => 'system/modules/foundation_to_contao/templates/tab',
	'ce_tab_start_inside' => 'system/modules/foundation_to_contao/templates/tab',
	'ce_tab_stop_inside' => 'system/modules/foundation_to_contao/templates/tab',
	
	'ce_row_start' => 'system/modules/foundation_to_contao/templates/row',
	'ce_row_stop' => 'system/modules/foundation_to_contao/templates/row',
	
	'ce_list_ftc' => 'system/modules/foundation_to_contao/templates/content',
	'ce_def_list' => 'system/modules/foundation_to_contao/templates/content',
	'ce_price_table' => 'system/modules/foundation_to_contao/templates/content',
	'ce_headline_ftc' => 'system/modules/foundation_to_contao/templates/content',
	'ce_blockquote' => 'system/modules/foundation_to_contao/templates/content',
	'ce_vcard' => 'system/modules/foundation_to_contao/templates/content',
	'ce_progress_bar' => 'system/modules/foundation_to_contao/templates/content',
	
	'ce_button_ftc' => 'system/modules/foundation_to_contao/templates/buttons',
	'ce_button_group' => 'system/modules/foundation_to_contao/templates/buttons',
	'ce_button_bar_start_ftc' => 'system/modules/foundation_to_contao/templates/buttons',
	'ce_button_bar_stop_ftc' => 'system/modules/foundation_to_contao/templates/buttons',
	'ce_dropdown_buttons' => 'system/modules/foundation_to_contao/templates/buttons',
	'ce_dropdown_buttons_content_start' => 'system/modules/foundation_to_contao/templates/buttons',
	'ce_dropdown_buttons_content_stop' => 'system/modules/foundation_to_contao/templates/buttons',
	
	'ce_orbit' => 'system/modules/foundation_to_contao/templates/orbit',
	'ce_orbit_start' => 'system/modules/foundation_to_contao/templates/orbit',
	'ce_orbit_stop' => 'system/modules/foundation_to_contao/templates/orbit',
	'ce_orbit_start_inside' => 'system/modules/foundation_to_contao/templates/orbit',
	'ce_orbit_stop_inside' => 'system/modules/foundation_to_contao/templates/orbit',
	'orbit_list' => 'system/modules/foundation_to_contao/templates/orbit',
	
	'ce_clearing' => 'system/modules/foundation_to_contao/templates/clearing',
	'clearing_list' => 'system/modules/foundation_to_contao/templates/clearing',
	'pagination_ftc' => 'system/modules/foundation_to_contao/templates/clearing',
		
	'ce_flex_video' => 'system/modules/foundation_to_contao/templates/media',
	'ce_image' => 'system/modules/foundation_to_contao/templates/media',
	'ce_placeholder_image' => 'system/modules/foundation_to_contao/templates/media',
	
	'ce_reveal_modal_start' => 'system/modules/foundation_to_contao/templates/callouts_prompts',
	'ce_reveal_modal_stop' => 'system/modules/foundation_to_contao/templates/callouts_prompts',
	'ce_alert_box' => 'system/modules/foundation_to_contao/templates/callouts_prompts',
	'ce_joyride' => 'system/modules/foundation_to_contao/templates/callouts_prompts',
	//forms
	'form_select' => 'system/modules/foundation_to_contao/templates/forms',
	'form_upload' => 'system/modules/foundation_to_contao/templates/forms',
	'form_checkbox' => 'system/modules/foundation_to_contao/templates/forms',
	'form_explanation' => 'system/modules/foundation_to_contao/templates/forms',
	'form_fieldset' => 'system/modules/foundation_to_contao/templates/forms',
	'form_headline' => 'system/modules/foundation_to_contao/templates/forms',
	'form_password' => 'system/modules/foundation_to_contao/templates/forms',
	'form_radio' => 'system/modules/foundation_to_contao/templates/forms',
	'form_submit' => 'system/modules/foundation_to_contao/templates/forms',
	'form_textarea' => 'system/modules/foundation_to_contao/templates/forms',
	'form_textfield' => 'system/modules/foundation_to_contao/templates/forms',
	'form_captcha' => 'system/modules/foundation_to_contao/templates/forms',
	'form_message' => 'system/modules/foundation_to_contao/templates/forms',

	'form_row_start' => 'system/modules/foundation_to_contao/templates/forms',
	'form_row_stop' => 'system/modules/foundation_to_contao/templates/forms',
	'form_range_slider' => 'system/modules/foundation_to_contao/templates/forms'
		
));
