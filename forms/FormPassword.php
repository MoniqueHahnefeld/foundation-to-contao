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
 * Class FormPassword
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class FormPassword extends \Widget
{

	/**
	 * Submit user input
	 *
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Add a for attribute
	 *
	 * @var boolean
	 */
	protected $blnForAttribute = true;

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_password';


	/**
	 * Always decode entities
	 *
	 * @param array $arrAttributes An optional attributes array
	 */
	public function __construct($arrAttributes=null)
	{
		parent::__construct($arrAttributes);
		$this->decodeEntities = true;
	}


	/**
	 * Add specific attributes
	 *
	 * @param string $strKey   The attribute name
	 * @param mixed  $varValue The attribute value
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'maxlength':
				if ($varValue > 0)
				{
					$this->arrAttributes['maxlength'] = $varValue;
				}
				break;

			case 'mandatory':
				// Do not set the "required" attribute here, because password
				// fields can remain empty if a password has been set already
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
	 * Validate input and set value
	 *
	 * @param mixed $varInput The user input
	 *
	 * @return mixed The validated user input
	 */
	protected function validator($varInput)
	{
		$this->blnSubmitInput = false;

		if (!strlen($varInput) && (strlen($this->varValue) || !$this->mandatory))
		{
			return '';
		}

		if (utf8_strlen($varInput) < \Config::get('minPasswordLength'))
		{
			$this->addError(sprintf($GLOBALS['TL_LANG']['ERR']['passwordLength'], \Config::get('minPasswordLength')));
		}

		if ($varInput != $this->getPost($this->strName . '_confirm'))
		{
			$this->addError($GLOBALS['TL_LANG']['ERR']['passwordMatch']);
		}

		$varInput = parent::validator($varInput);

		if (!$this->hasErrors())
		{
			$this->blnSubmitInput = true;
			\Message::addConfirmation($GLOBALS['TL_LANG']['MSC']['pw_changed']);
			return \Encryption::hash($varInput);
		}

		return '';
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
		$this->confirmLabel = sprintf($GLOBALS['TL_LANG']['MSC']['confirmation'], $this->strLabel);
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
		return sprintf('<input type="password" name="%s" id="ctrl_%s" class="text password%s" value=""%s%s',
						$this->strName,
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->getAttributes(),
						$this->strTagEnding) . $this->addSubmit();
	}


	/**
	 * Generate the label of the confirmation field and return it as string
	 *
	 * @return string The confirmation label markup
	 *
	 * @deprecated The logic has been moved into the template (see #6834)
	 */
	public function generateConfirmationLabel()
	{
		return sprintf('<label for="ctrl_%s_confirm" class="confirm%s">%s%s%s</label>',
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						($this->mandatory ? '<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].'</span> ' : ''),
						sprintf($GLOBALS['TL_LANG']['MSC']['confirmation'], $this->strLabel),
						($this->mandatory ? '<span class="mandatory">*</span>' : ''));
	}


	/**
	 * Generate the widget and return it as string
	 *
	 * @return string The confirmation field markup
	 *
	 * @deprecated The logic has been moved into the template (see #6834)
	 */
	public function generateConfirmation()
	{
		return sprintf('<input type="password" name="%s_confirm" id="ctrl_%s_confirm" class="text password confirm%s" value=""%s%s',
						$this->strName,
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->getAttributes(),
						$this->strTagEnding);
	}
}
