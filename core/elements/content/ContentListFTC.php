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

class ContentListFTC extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_list_ftc';


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
		
		$arrItems = array();
		$items = deserialize($this->listitems);
		 if (!is_array($items)) {return;}
		$limit = count($items) - 1;

		for ($i=0, $c=count($items); $i<$c; $i++)
		{
			$arrItems[] = array
			(
				'class' => (($i == 0) ? 'first' : (($i == $limit) ? 'last' : '')),
				'content' => $items[$i]
			);
		}

		$this->Template->items = $arrItems;
		$this->Template->tag = ($this->listtype == 'ordered') ? 'ol' : 'ul';
	}
}
