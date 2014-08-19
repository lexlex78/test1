<?php
//ключь для кеша
$cash_mod='gal_foto_'.$id_news.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){
$sqq =$db->select('SELECT * FROM '.DB_PREFIX.'gal_cat WHERE en=1 AND id ="'.$id_news.'"');  
$db->execute('UPDATE '.DB_PREFIX.'gal_cat  SET view=view+1 WHERE id='.$id_news);

    
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'gal_foto WHERE en=1 AND pid ="'.$id_news.'"');
if (!$sql)$_GET['error']=404;
else{
$pop_up='';
$it='';
foreach ($sql as $k=> $v) 
{ 
$pop_up.='<li num="'.$k.'" ><img src="/img/gal/'.$v['img'].' " width="450px" alt=""></li>'; 


$raz=getimagesize(SITE_PATH.'img/gal/'.$v['img']);
 if ($raz[0]>$raz[1])
$imgg='<img src="/img/gal/'.$v['img'].'" width="215px"  alt="">';
 else
     $imgg='<img src="/img/gal/'.$v['img'].'" height="158px"  alt="">';
 
 
$it.='<center><a  class="greed-item" num="'.$k.'" ><div style="width:215px;height:158px;overflow:hidden" >'.$imgg.'</div></a></center>';
//$it.='<a  class="greed-item"><img src="timthumb.php?src=/img/gal/'.$v['img'].'&w=215&h=158&zc=1" alt=""></a>';
}
$pop_up='<div class="popup-bg"></div>
          <div class="popup-wrapper">
                    <div class="popup-slider-wrapper">
                    <ul class="popup-slider">'.$pop_up.'</ul></div>
          </div>';


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_str.php');


cash_add ($cash_mod,120,$center_area);
}

}
else $center_area=$cash;
unset($cash);