<?php
if (!$_GET['tip'])$_GET['tip']=0; 
if ($_GET['filtr']=='all')unset ($_GET['filtr']);


$cash_mod='deytelnost'.$site_language.$_GET['page'].$_GET['tip'].$_GET['page1'].$_GET['filtr'];
$cash=cash_read ($cash_mod);
if (!$cash){
  
// пажинация 
if (!isset($_GET['filtr']))
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'deytelnost WHERE en=1 and lic=0'); 
else $db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'deytelnost WHERE en=1 and lic=0 and razd='.$_GET['filtr']);
$all=$sql[0]['COUNT(id)'];
$pagin=paging($all,5,6);


if (!isset($_GET['filtr']))
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'deytelnost WHERE en=1 and lic=0  ORDER BY `data` desc LIMIT '.$pagin[1]);
else {
  $sql =$db->select('SELECT * FROM '.DB_PREFIX.'deytelnost WHERE en=1 and lic=0 and razd='.$_GET['filtr'].'  ORDER BY `data` desc LIMIT '.$pagin[1]);
}

$it='';
foreach ($sql as $k=>$v)
{ 
    
 $img='';   
if ($v['img']!='')$img='<img  class="thumb" src="img/deytelnost/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';   
    
$it.='<div class="article-row">
                        '.$img.'
                        <a href="'.$site_url.'/do/'.$v['id'].'" class="news-title">'.$v['zag_'.$site_language].'</a>
                        <span class="date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                        <p>'.str_smoll($v['text_'.$site_language],300).'<a href="'.$site_url.'/do/'.$v['id'].'">'.$p['read_all'].'</a></p>
</div>  
';

}

// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'deytelnost WHERE en=1 and lic=1'); 
$all=$sql[0]['COUNT(id)'];
$pagin1=paging1($all,5,6);



$sql =$db->select('SELECT * FROM '.DB_PREFIX.'deytelnost WHERE en=1 and lic=1  ORDER BY `data` desc LIMIT '.$pagin1[1]);

$it1='';
foreach ($sql as $k=>$v)
{ $img='';   
if ($v['img']!='')$img='<img  class="thumb" src="img/deytelnost/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">'; 
    
    
$it1.='<div class="article-row">
                        '.$img.'
                        <a href="'.$site_url.'/do/'.$v['id'].'" class="news-title">'.$v['zag_'.$site_language].'</a>
                        <span class="date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                        <p>'.str_smoll($v['text_'.$site_language],300).'<a href="'.$site_url.'/do/'.$v['id'].'">'.$p['read_all'].'</a></p>
</div>  
';

}
/// фильтры
$sel='';
if (!isset($_GET['filtr']))$sel='class="select"';
$zzz =$db->select('SELECT * FROM '.DB_PREFIX.'deyt_razd  ORDER BY sort desc' );
$do_filtr='<a href="'.cr_url_get('filtr','all').'" '.$sel.'>Все</a>';

foreach ($zzz as $k=>$v){
    $sel='';
    if ($_GET['filtr']==$v['id'])$sel='class="select"';
 $do_filtr.='<a href="'.cr_url_get('filtr',$v['id']).'" '.$sel.'>'.$v['zag_'.$site_language].'</a>';   
}




$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');




cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);