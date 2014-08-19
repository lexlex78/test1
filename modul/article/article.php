<?php


$cash_mod='article'.$_GET[page];
$cash=cash_read ($cash_mod);
if (!$cash){
  
// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'article WHERE en=1'); 
$all=$sql[0]['COUNT(id)'];
$pagin=paging($all,5,5);


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'article WHERE en=1  ORDER BY `data` desc LIMIT '.$pagin[1]);

$it='';
foreach ($sql as $k=>$v)
{ 

     $img='';   
if ($v['img']!='')$img='<img class="fl_l" src="img/article/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';
    
$it.='
    
<li>
                                    <span class="news_date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                                    <h3><a href="'.$site_url.'/articles/'.$v['id'].'">'.$v['zag_ru'].'</a></h3>
                                    <p class="news_text">'.str_smoll($v['text_'.$site_language],300).'</p>
                                    <a href="'.$site_url.'/articles/'.$v['id'].'">Подробнее</a>
                                </li>
';

}







$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');

cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);
