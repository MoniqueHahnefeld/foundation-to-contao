<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer

 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @copyright 2014 Monique Hahnefeld
 */

namespace MHAHNEFELD\FTC;

class FormRangeSlider extends \Widget
{

	/**
	 * Submit user input
	 *
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_range_slider';

	/**
	 * Error message
	 *
	 * @var string
	 */
	protected $strError = '';

	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'maxlength':
				if ($varValue > 0)
				{
					$this->arrAttributes['maxlength'] =  $varValue;
				}
				break;

			case 'mandatory':
				if ($varValue)
				{
					$this->arrAttributes['required'] = 'required';
				}
				else
				{
					unset($this->arrAttributes['required']);
				}
				parent::__set($strKey, $varValue);
				break;

			case 'placeholder':
				$this->arrAttributes['placeholder'] = $varValue;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	/**
	 * Trim the values
	 *
	 * @param mixed $varInput The user input
	 *
	 * @return mixed The validated user input
	 */
	protected function validator($varInput)
	{
		if (is_array($varInput))
		{
			return parent::validator($varInput);
		}

		

		return parent::validator(trim($varInput));
	}


	/**
	 * Parse the template file and return it as string
	 *
	 * @param array $arrAttributes An optional attributes array
	 *
	 * @return string The template markup
	 */
	public function parse($arrAttributes=null)
	{
		
		
		
		$this->type = 'hidden';
		
		//FTC Classes 
		$ftc_align_field= $this->splitArr($this->align_ftc);
		$ftc_align_label= $this->splitArr($this->label_align_ftc);
		$ftc_style_label= $this->splitArr($this->label_classes);
		///$ftc_data_attr = $this->splitArr($this->data_attr_ftc);
		$ftc_classes_field = $this->small_ftc.' '.$this->large_ftc.' '.$this->float_ftc.' '.$ftc_align_field.' columns';
		$ftc_classes_fix = $this->label_small_ftc.' '.$this->label_large_ftc.' '.$this->label_float_ftc.' '.$ftc_align_label.' columns';
		
		
		$this->rs_id = 'range_value_'.$this->id;
		$this->ftc_rs_classes = $ftc_align_field= $this->splitArr($this->rs_classes);
		$this->class = $strClass;
		$this->ftc_field_classes = $ftc_classes_field;
		$this->ftc_fix_classes = $ftc_classes_fix;
		$this->label_style = $ftc_style_label;
		return parent::parse($arrAttributes);
	}

	public function splitArr($arr){
	$str='';
		if ($arr==''||!is_array(unserialize($arr))) {
			return;
		}
		foreach (unserialize($arr) as $class) {
			$str.=' '.$class;
		}
		return $str;
	}
	/**
	 * Generate the widget and return it as string
	 *
	 * @return string The widget markup
	 *
	 * @deprecated The logic has been moved into the template (see #6834)
	 */
	public function generate()
	{
		return sprintf('<input type="%s" name="%s" id="ctrl_%s" class="text%s%s" value="%s"%s%s',
						$this->type,
						$this->strName,
						$this->strId,
						($this->hideInput ? ' password' : ''),
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						specialchars($this->varValue),
						$this->getAttributes(),
						$this->strTagEnding) . $this->addSubmit();
	}

}
