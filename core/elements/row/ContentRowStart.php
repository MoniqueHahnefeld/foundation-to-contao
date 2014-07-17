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

class ContentRowStart extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_row_start';


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}

		if ($this->cssID!=='') {
		$cssIDArr= $this->cssID;	
		}else{
		$cssIDArr= array('','');
		}	
		$this->Template->row_data_attr_ftc = $this->splitArr($this->row_data_attr_ftc);
		$this->Template->headline = $this->headline;
		$this->Template->cssID = $cssIDArr[0];
		$this->Template->class = $cssIDArr[1];
		//unset($this);
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
}
