<?php  
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @copyright 2014 Monique Hahnefeld
 */
 
namespace MHAHNEFELD\FTC;


class PrepareVars extends \Controller
{
		//getContentElement
	public function elements($objRow, $strBuffer)    {   
		
		// $objRow->type is the type of the Element e.g. 'row_start'
		//var_dump($GLOBALS['objPage']);
		/* $objElement */ 
		$strClass = $this->findContentElement($objRow->type); //get the registrated Classname
		$objElement = new $strClass($objRow);
		
		$this->design_elements($objElement);
		$strBuffer = $objElement->generate();

		return $strBuffer; 
			
         
     } 
     //compileFormFields
     public function forms($arrFields, $formId)    {   

    		foreach ($arrFields as $k => $field) {
    		$this->design_fields($field);
    		
			}
    		return $arrFields; 
 
        } 
     
       //loadFormField
      public function ffl($objWidget, $formId)    {   
          		
          		// $objRow->type is the type of the Element e.g. 'row_start'
          		echo '<pre>';
          		var_dump($objWidget);
          		echo '<br>';
          		var_dump($this->arrData);

         		return $objWidget; 
          			
                   
           } 
     
     public function design_elements($el){
     
     $ftc = array();
     
     //FTC Classes 
     $ftc['align'] = $this->splitArr($el->align_ftc);
     $ftc['data_attr'] = $this->splitArr($el->data_attr_ftc);
     $ftc['classes'] = $el->small_ftc.' '.$el->large_ftc.' '.$el->float_ftc.' '. $ftc['align'].' columns';
     
     $el->data_attr = $ftc['data_attr'];
     $el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]).' '.$ftc['classes'];
     $el->ftcID = ($el->cssID[0] != '') ? ' id="' . $el->cssID[0] . '"' : '';
     
     switch($el->type) {
     	case 'progress_bar':
     	$el->ftc_classes .= $this->splitArr($el->btn_styles);
     	$el->ftcID = ' id="progressbar_' . $el->id.'" ';
     	break;
     	case 'alert_box':
     	$el->ftc_classes .= ' alert-box '.$el->alert_kind.' '.$el->alert_styles;
     	$el->ftcID = ' id="alert_'.$el->id.'" ';
     	break;
     	case 'magellan_nav':
     	$el->ftcID = ' id="magellan_'.$el->id.'" ';
     	break;
     	case 'reveal_modal_start':
     	$el->ftc_classes = trim('ce_'.$el->type.' '.$el->cssID[1]);
     	break;
     	case 'row_start':
     	$el->row_data_attr_ftc = $this->splitArr($el->row_data_attr_ftc);
     	break;
     	case 'tab_start':
     	case 'tab_start_inside':
     	$el->tabs_align = $el->tabs_align;
     	break;
     	
     	default:
     	
    	}
     
     unset($ftc);
     //var_dump($el->class);
     return $el;
     }
     
     public function design_fields($el){
     
     $ftc = array();
     
     //FTC Classes 
     $ftc['align_field'] = $this->splitArr($el->align_ftc);
     $ftc['align_label'] = $this->splitArr($el->label_align_ftc);
     $ftc['style_label'] = $this->splitArr($el->label_classes);
     $ftc['classes_field'] = $el->small_ftc.' '.$el->large_ftc.' '.$el->float_ftc.' '.$ftc['align_field'].' columns';
     $ftc['classes_fix'] = $el->label_small_ftc.' '.$el->label_large_ftc.' '.$el->label_float_ftc.' '.$ftc['align_label'].' columns';
     
     
     $ftc['data_attr'] = $this->splitArr($el->data_attr_ftc);
  
     $el->class = $strClass;
     $el->ftc_field_classes = $ftc['classes_field'];
     $el->ftc_fix_classes = $ftc['classes_fix'];
     $el->label_style = $ftc['style_label'];
	
	//var_dump($el->type);
	switch($el->type) {
		case 'range_slider':
		$el->rs_id = 'range_value_'.$el->id;
		$el->ftc_rs_classes = $ftc['align_field'] = $this->splitArr($el->rs_classes);
		break;
		case 'submit':
		$ftc['button_classes'] = $this->splitArr($el->btn_styles).' '.$el->btn_size;
		$el->btn_classes = $ftc['button_classes'] ;
		break;
		
		
		default:
		}
   
     
     unset($ftc);
     //var_dump($el->class);
     return $el;
     }
     
     
     public function splitArr($arr){
     $str='';
     	if ($arr==''||!is_array(unserialize($arr))) {
     		return;
     	}
     	foreach (unserialize($arr) as $class) {
     		if ($class=='') {
     			return;
     		}
     		$str.=' '.$class;
     	}
     	return $str;
     }
     
     
     
}