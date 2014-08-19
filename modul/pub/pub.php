<?php
if (!$_GET['tip'])$_GET['tip']=0; 

$cash_mod='pub'.$site_language.$_GET['page'].$_GET['tip'].$_GET['page1'];
$cash=cash_read ($cash_mod);
if (!$cash){
  
// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'pub WHERE en=1 and mnenie=0'); 
$all=$sql[0]['COUNT(id)'];
$pagin=paging($all,5,6);


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'pub WHERE en=1 and mnenie=0  ORDER BY `data` desc LIMIT '.$pagin[1]);

$it='';
foreach ($sql as $k=>$v)
{ 
      $img='';   
if ($v['img']!='')$img='<img  class="thumb" src="img/pub/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';   
    
$it.='<div class="article-row">
                        '.$img.'
                        <a href="'.$site_url.'/pub/'.$v['id'].'" class="news-title">'.$v['zag_'.$site_language].'</a>
                        <span class="date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                        <p>'.str_smoll($v['text_'.$site_language],300).'<a href="'.$site_url.'/pub/'.$v['id'].'">'.$p['read_all'].'</a></p>
</div>  
';

}

// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'pub WHERE en=1 and mnenie=1'); 
$all=$sql[0]['COUNT(id)'];
$pagin1=paging1($all,5,6);



$sql =$db->select('SELECT * FROM '.DB_PREFIX.'pub WHERE en=1 and mnenie=1  ORDER BY `data` desc LIMIT '.$pagin1[1]);

$it1='';
foreach ($sql as $k=>$v)
{ 

$img='';   
if ($v['img']!='')$img='<img  class="thumb" src="img/pub/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';       
    
$it1.='<div class="article-row">
                        '.$img.'
                        <a href="'.$site_url.'/pub/'.$v['id'].'" class="news-title">'.$v['zag_'.$site_language].'</a>
                        <span class="date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                        <p>'.str_smoll($v['text_'.$site_language],300).'<a href="'.$site_url.'/pub/'.$v['id'].'">'.$p['read_all'].'</a></p>
</div>  
';

}



$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');




cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);
