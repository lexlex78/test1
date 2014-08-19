<?php


$cash_mod='biografiya'.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){
  

$sql =$db->select('SELECT * FROM '.DB_PREFIX.'biograf WHERE en=1  ORDER BY sort desc');

$it='';
$it1='';
foreach ($sql as $k=>$v)
{ 
$it1.='<li>'.$v['zag_'.$site_language].'</li>';   
    
$it.='
<div class="biography-row">
<h2 class="title"><span><span>'.$v['zag_'.$site_language].'</span></span></h2>
<img class="thumb" src="img/biograf/'.$v['img'].'" alt="">
<p>'.$v['text_'.$site_language].'</p>
</div>
';

}

$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');




cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);