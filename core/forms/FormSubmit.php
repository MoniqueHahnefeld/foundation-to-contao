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
 * Class FormSubmit
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class FormSubmit extends \Widget
{

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_submit';


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
			case 'singleSRC':
				$this->arrConfiguration['singleSRC'] = $varValue;
				break;

			case 'imageSubmit':
				$this->arrConfiguration['imageSubmit'] = $varValue ? true : false;
				break;

			case 'name':
				$this->arrAttributes['name'] = $varValue;
				break;

			case 'label':
				$this->slabel = $varValue;
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
	 * Do not validate
	 */
	public function validate()
	{
		return;
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
		if ($this->imageSubmit && $this->singleSRC != '')
		{
			$objModel = \FilesModel::findByUuid($this->singleSRC);

			if ($objModel === null)
			{
				if (!\Validator::isUuid($this->singleSRC))
				{
					return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
				}
			}
			elseif (is_file(TL_ROOT . '/' . $objModel->path))
			{
				$this->src = $objModel->path;
			}
		}
		//FTC Classes 
		$ftc_button_classes = $this->splitArr($this->btn_styles).' '.$this->btn_size;
		$ftc_align_field= $this->splitArr($this->align_ftc);
		$ftc_align_label= $this->splitArr($this->label_align_ftc);
		$ftc_style_label= $this->splitArr($this->label_classes);
		///$ftc_data_attr = $this->splitArr($this->data_attr_ftc);
		$ftc_classes_field = $this->small_ftc.' '.$this->large_ftc.' '.$this->float_ftc.' '.$ftc_align_field.' columns';
		$ftc_classes_fix = $this->label_small_ftc.' '.$this->label_large_ftc.' '.$this->label_float_ftc.' '.$ftc_align_label.' columns';
		
		

		$this->class = $strClass;
		$this->btn_classes = $ftc_button_classes;
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
		if ($this->src)
		{
			return sprintf('<input type="image" src="%s" id="ctrl_%s" class="submit%s" title="%s" alt="%s"%s%s',
							$this->src,
							$this->strId,
							(($this->strClass != '') ? ' ' . $this->strClass : ''),
							specialchars($this->slabel),
							specialchars($this->slabel),
							$this->getAttributes(),
							$this->strTagEnding);
		}

		// Return the regular button
		return sprintf('<input type="submit" id="ctrl_%s" class="submit%s" value="%s"%s%s',
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						specialchars($this->slabel),
						$this->getAttributes(),
						$this->strTagEnding);
	}
}
