<?php


//$cash_mod='dost'.$_GET[page];
//$cash=cash_read ($cash_mod);
//if (!$cash){
  

$sql =$db->select('SELECT * FROM '.DB_PREFIX.'dost limit1 ');

$sql=$sql[0];

$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');




//cash_add ($cash_mod,120,$center_area);
//}
//else $center_area=$cash;
//unset ($cash);
