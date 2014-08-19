<?php

$cash_mod='gal';
$cash=cash_read ($cash_mod);
if (!$cash){
  

$g_cat=$db->select('SELECT * FROM '.DB_PREFIX.'gal_cat WHERE en=1 ORDER BY sort DESC');

/// вывод каталога
$gal_cat='';
$sh=0;
foreach ($g_cat as $v) {
 $sel=''; if ($sh==0) $sel='class="select"';   
 $gal_cat.='<li '.$sel.'><span><a href="#tab'.$v['id'].'"><span>'.$v['name_ru'].'</span></a></span></li>';
 $sh++;
}


// вывод фоток
$g_foto=$db->select('SELECT * FROM '.DB_PREFIX.'gal_foto WHERE en=1 ORDER BY pid , sort desc ');


$pid_t=0;
$gal_foto_t='';
foreach ($g_foto as $v) {
if ($v['pid']!=$pid_t and $pid_t!=0 ){$gal_foto.='<div id="tab'.$pid_t.'" class="gallery-tab">'.$gal_foto_t.'</div>'; $gal_foto_t='';}   
$pid_t=$v['pid'];   
$gal_foto_t.='<a href="img/gal/'.$v['img'].'" rel="gallery'.$pid_t.'" title="'.$v['text'].'"><img src="img/gal/'.$v['img'].'" alt=""></a>';
}
$gal_foto.='<div id="tab'.$pid_t.'" class="gallery-tab">'.$gal_foto_t.'</div>';



$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');


cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);