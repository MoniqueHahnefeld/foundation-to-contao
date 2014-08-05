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
 * Class FormCaptcha
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class FormCaptcha extends \Widget
{

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_captcha';

	/**
	 * Captcha key
	 *
	 * @var string
	 */
	protected $strCaptchaKey;

	/**
	 * Security questions
	 *
	 * @var string
	 */
	protected $strQuestion;


	/**
	 * Initialize the object
	 *
	 * @param array $arrAttributes An optional attributes array
	 */
	public function __construct($arrAttributes=null)
	{
		parent::__construct($arrAttributes);

		$this->arrAttributes['maxlength'] = 2;
		$this->strCaptchaKey = 'c' . md5(uniqid(mt_rand(), true));
		$this->mandatory = true;
		$this->arrAttributes['required'] = true;
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
			case 'placeholder':
				$this->arrAttributes['placeholder'] = $varValue;
				break;

			case 'required':
			case 'mandatory':
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
	 * @param string $strKey The parameter key
	 *
	 * @return mixed The parameter value
	 */
	public function __get($strKey)
	{
		switch ($strKey)
		{
			case 'name':
				return $this->strCaptchaKey;
				break;

			case 'question':
				return $this->strQuestion;
				break;

			default:
				return parent::__get($strKey);
				break;
		}
	}


	/**
	 * Validate the input and set the value
	 */
	public function validate()
	{
		$arrCaptcha = $this->Session->get('captcha_' . $this->strId);

		if (!is_array($arrCaptcha) || !strlen($arrCaptcha['key']) || !strlen($arrCaptcha['sum']) || \Input::post($arrCaptcha['key']) != $arrCaptcha['sum'] || $arrCaptcha['time'] > (time() - 3))
		{
			$this->class = 'error';
			$this->addError($GLOBALS['TL_LANG']['ERR']['captcha']);
		}

		$this->Session->set('captcha_' . $this->strId, '');
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
		if ($this->strQuestion == '')
		{
			$this->setQuestion();
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
	 * Generate the captcha question
	 *
	 * @return string The question string
	 */
	protected function setQuestion()
	{
		$int1 = rand(1, 9);
		$int2 = rand(1, 9);

		$question = $GLOBALS['TL_LANG']['SEC']['question' . rand(1, 3)];
		$question = sprintf($question, $int1, $int2);

		$this->Session->set('captcha_' . $this->strId, array
		(
			'sum' => $int1 + $int2,
			'key' => $this->strCaptchaKey,
			'time' => time()
		));

		$strEncoded = '';
		$arrCharacters = utf8_str_split($question);

		foreach ($arrCharacters as $strCharacter)
		{
			$strEncoded .= sprintf('&#%s;', utf8_ord($strCharacter));
		}

		$this->strQuestion = $strEncoded;
	}


	/**
	 * Generate the label and return it as string
	 *
	 * @return string The label markup
	 *
	 * @deprecated The logic has been moved into the template (see #6834)
	 */
	public function generateLabel()
	{
		if ($this->strLabel == '')
		{
			return '';
		}

		return sprintf('<label for="ctrl_%s" class="mandatory%s">%s%s%s <span class="invisible">%s</span></label>',
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						'<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].'</span> ',
						$this->strLabel,
						'<span class="mandatory">*</span>',
						$this->strQuestion);
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
		return sprintf('<input type="text" name="%s" id="ctrl_%s" class="captcha mandatory%s" value=""%s%s',
						$this->strCaptchaKey,
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->getAttributes(),
						$this->strTagEnding) . $this->addSubmit();
	}


	/**
	 * Return the captcha question as string
	 *
	 * @return string The question markup
	 *
	 * @deprecated The logic has been moved into the template (see #6834)
	 */
	public function generateQuestion()
	{
		return sprintf('<span class="captcha_text%s">%s</span>',
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->strQuestion);
	}
}
