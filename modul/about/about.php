<?php

$cash_mod='about';
$cash=cash_read ($cash_mod);
if (!$cash){
  

$about=$db->select('SELECT * FROM '.DB_PREFIX.'about ');


//// вывод команды
//$comand=$db->select('SELECT * FROM '.DB_PREFIX.'comand where en=1 order by sort');
//
//$com='';
//foreach ($comand as $k => $v) {
// $com.='<div class="sotrudnic">
//                    <img src="img/comand/'.$v[img].'" alt="'.$v[fio].'">
//                    <strong>'.$v[fio].'</strong><br>
//                    <span>'.$v[dol].'</span>
//                </div>';   
//}


$sl='3';
$where=' p.spec=1 ';
$limit=' limit 10 ';
include SITE_PATH. 'modul/shop/slider.php';




$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');


cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);