<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL


 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @copyright 2014 Monique Hahnefeld
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace MHAHNEFELD\FTC;


/**
 * Class FormRadioButton
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class FormRadioButton extends \Widget
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
	protected $strTemplate = 'form_radio';

	/**
	 * Error message
	 *
	 * @var string
	 */
	protected $strError = '';


	/**
	 * Add specific attributes
	 *
	 * @param string $strKey   The attribute key
	 * @param mixed  $varValue The attribute value
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
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

			case 'options':
				$this->arrOptions = deserialize($varValue);
				break;

			case 'rgxp':
			case 'minlength':
			case 'maxlength':
				// Ignore
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	/**
	 * Return a parameter
	 *
	 * @param string $strKey The parameter name
	 *
	 * @return mixed The parameter value
	 */
	public function __get($strKey)
	{
		if ($strKey == 'options')
		{
			return $this->arrOptions;
		}

		return parent::__get($strKey);
	}


	/**
	 * Check for a valid option (see #4383)
	 */
	public function validate()
	{
		$varValue = $this->getPost($this->strName);

		if (!empty($varValue) && !$this->isValidOption($varValue))
		{
			$this->addError(sprintf($GLOBALS['TL_LANG']['ERR']['invalid'], (is_array($varValue) ? implode(', ', $varValue) : $varValue)));
		}

		parent::validate();
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
		foreach ($this->arrOptions as $i=>$arrOption)
		{
			$arrOptions[] = array
			(
				'name'       => $this->strName . ((count($this->arrOptions) > 1) ? '[]' : ''),
				'id'         => $this->strId . '_' . $i,
				'value'      => $arrOption['value'],
				'checked'    => $this->isChecked($arrOption),
				'attributes' => $this->getAttributes(),
				'label'      => $arrOption['label']
			);
		}
		//FTC Classes 
		$ftc_align_field= $this->splitArr($this->align_ftc);
		$ftc_align_label= $this->splitArr($this->label_align_ftc);
		$ftc_style_label= $this->splitArr($this->label_classes);
		///$ftc_data_attr = $this->splitArr($this->data_attr_ftc);
		$ftc_classes_field = $this->small_ftc.' '.$this->large_ftc.' '.$this->float_ftc.' '.$ftc_align_field.' columns';
		$ftc_classes_fix = $this->label_small_ftc.' '.$this->label_large_ftc.' '.$this->label_float_ftc.' '.$ftc_align_label.' columns';
		
		

		$this->class = $strClass;
		$this->ftc_field_classes = $ftc_classes_field;
		$this->ftc_fix_classes = $ftc_classes_fix;
		$this->label_style = $ftc_style_label;
		$this->arrOptions = $arrOptions;

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
	 * Override the parent method and inject the error message inside the fieldset (see #3392)
	 *
	 * @param boolean $blnSwitchOrder If true, the error message will be shown below the field
	 *
	 * @return string The form field markup
	 *
	 * @deprecated The logic has been moved into the template (see #6834)
	 */
	public function generateWithError($blnSwitchOrder=false)
	{
		$this->strError = $this->getErrorAsHTML();
		return $this->generate();
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
		$strOptions = '';

		foreach ($this->arrOptions as $i=>$arrOption)
		{
			$strOptions .= sprintf('<span><input type="radio" name="%s" id="opt_%s" class="radio" value="%s"%s%s%s <label id="lbl_%s" for="opt_%s">%s</label></span> ',
									$this->strName,
									$this->strId.'_'.$i,
									$arrOption['value'],
									$this->isChecked($arrOption),
									$this->getAttributes(),
									$this->strTagEnding,
									$this->strId.'_'.$i,
									$this->strId.'_'.$i,
									$arrOption['label']);
		}

		if ($this->strLabel != '')
		{
        	return sprintf('<fieldset id="ctrl_%s" class="radio_container%s"><legend>%s%s%s</legend>%s<input type="hidden" name="%s" value=""%s%s</fieldset>',
        					$this->strId,
							(($this->strClass != '') ? ' ' . $this->strClass : ''),
							($this->mandatory ? '<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].'</span> ' : ''),
							$this->strLabel,
							($this->mandatory ? '<span class="mandatory">*</span>' : ''),
							$this->strError,
							$this->strName,
							$this->strTagEnding,
							$strOptions) . $this->addSubmit();
		}
		else
		{
	        return sprintf('<fieldset id="ctrl_%s" class="radio_container%s">%s<input type="hidden" name="%s" value=""%s%s</fieldset>',
    	    				$this->strId,
							(($this->strClass != '') ? ' ' . $this->strClass : ''),
							$this->strError,
							$this->strName,
							$this->strTagEnding,
							$strOptions) . $this->addSubmit();
		}
	}
}
