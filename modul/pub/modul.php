<?php


$cash_mod='pub_mod';
$cash=cash_read ($cash_mod);
if (!$cash){
  


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'pub WHERE en=1  ORDER BY `data` desc LIMIT 3');

$it='';
foreach ($sql as $k=>$v)
{ 
$it.='
<div class="news-item">
<a href="'.$site_url.'/pub/'.$v['id'].'">'.$v['zag_'.$site_language].'</a>
<span class="public-date">'.date('d.m.Y', strtotime($v['data'])).'</span>
</div>
';
}


$pub_mod=showtempl(dirname(__FILE__).'/templ/tpl_mod.php');




cash_add ($cash_mod,120,$pub_mod);
}
else $pub_mod=$cash;
unset ($cash);
