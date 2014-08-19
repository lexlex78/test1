<?php
//ключь для кеша
$cash_mod='deytelnost_'.$id_news.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){

    
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'deytelnost WHERE en=1 AND id ='.$id_news);
if (!$sql)$_GET['error']=404;
else{


$sql=$sql[0];

if($sql['soput']){
$sqld =$db->select('SELECT * FROM '.DB_PREFIX.'deytelnost WHERE en=1 and id IN ('.$sql['soput'].')  ORDER BY `data` desc ');

$it='';
foreach ($sqld as $k=>$v)
{ 
$it.='<div class="other-news-box">
                        <img class="small-thumb" src="img/news/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">
                        <div class="other-news-text">
                                  <span class="date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                                  <a href="'.$site_url.'/news/'.$v['id'].'" class="news-title">'.$v['zag_'.$site_language].'</a>
                        </div>
              </div>   

';
}

$it='<div class="title"><span><span>'.$p['news_dr'].'</span></span></div><div class="other-news-wrapper">'
  .$it.'</div>';

}


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_str.php');


cash_add ($cash_mod,120,$center_area);
}

}
else $center_area=$cash;
unset($cash);