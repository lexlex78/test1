<?php
//ключь для кеша


$cash_mod='new_'.$id_news.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){
    
    


unset ($sql);    
if ($id_news and is_numeric($id_news))$sql =$db->select('SELECT * FROM '.DB_PREFIX.'news WHERE en=1 AND id ='.$id_news);
if (!$sql)$_GET['error']=404;
else{


$sql=$sql[0];

$sl='3';
$where=' p.spec=1 ';
$limit=' limit 10 ';
include SITE_PATH. 'modul/shop/slider.php';


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_str.php');


cash_add ($cash_mod,120,$center_area);
}

}
else $center_area=$cash;
unset($cash);