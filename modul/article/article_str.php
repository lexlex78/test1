<?php
//ключь для кеша
$cash_mod='article_'.$id_news.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){
    
$sl='3';
$where=' p.spec=1 ';
$limit=' limit 10 ';
include SITE_PATH. 'modul/shop/slider.php';    

    
unset ($sql);    
if ($id_news and is_numeric($id_news))$sql =$db->select('SELECT * FROM '.DB_PREFIX.'article WHERE en=1 AND id ='.$id_news);
if (!$sql)$_GET['error']=404;
else{


$sql=$sql[0];




$center_area=showtempl(dirname(__FILE__).'/templ/tpl_str.php');


cash_add ($cash_mod,120,$center_area);
}

}
else $center_area=$cash;
unset($cash);