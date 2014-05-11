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


class ModuleFTC
{

public function System();

//$this->Template->cssID = ($this->cssID[0] != '') ? ' id="' . $this->cssID[0] . '"' : '';
//echo'TTTT';
//$this->Template = new \FrontendTemplate($this->strTemplate);
//$this->Template->test = 'test';

 public function generate()
{
echo 'TTTT';
$this->Template->test = 'test';
//var_dump($this);
return parent::generate();
}
 protected function compile()
{
echo 'TTTT';
$this->Template->test = 'test';

//$this->Template->test = 'test';

//var_dump($this);

}
//public function myFunction() {
//	$this->Template->class .= 'test';
//	$this->Template->cssID .= 'test';
//}


}
$A= new ModuleFTC();


?>