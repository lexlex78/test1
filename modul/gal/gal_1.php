<?php
if (!$_GET['tip'])$_GET['tip']=0; 


$cash_mod='gal'.$site_language.$_GET['page'].$_GET['tip'].$_GET['page1'].$_GET['filtr'];
$cash=cash_read ($cash_mod);
if (!$cash){
  
// фильтр     
$filtr=' ORDER BY dat_up desc';
if ($_GET['filtr']=='2')$filtr=' ORDER BY name_'.$site_language.' desc';   
if ($_GET['filtr']=='3')$filtr=' ORDER BY view desc';  

// пажинация 
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'gal_cat WHERE en=1'); 
$all=$sql[0]['COUNT(id)'];
$pagin=paging($all,8,6);


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'gal_cat WHERE en=1  '.$filtr.' LIMIT '.$pagin[1]);




$it='';
foreach ($sql as $k=>$v)
{ 
$col=$db->select('SELECT * , COUNT(id) FROM '.DB_PREFIX.'gal_foto WHERE en=1  AND pid='.$v['id']); 
if ($col[0]['COUNT(id)']>0)
    
   $raz=getimagesize(SITE_PATH.'img/gal/'.$col[0]['img']);
 if ($raz[0]>$raz[1])
$imgg='<img src="/img/gal/'.$col[0]['img'].'" width="215px"  alt="">';
 else
     $imgg='<img src="/img/gal/'.$col[0]['img'].'" height="158px"  alt="">'; 
    
$it.='
    
<div class="greed-item"> 
<center><a href="'.$site_url.'/gal/album/'.$v['id'].'"><div style="width:215px;height:158px;overflow:hidden" >'.$imgg.'<div></a></center>
<a href="'.$site_url.'/gal/album/'.$v['id'].'" class="hide-info">
    <span>'.$v['name_'.$site_language].'</span>
    <span class="foto-quantity">'.$col[0]['COUNT(id)'].' '.$GLOBALS['p']['foto'].'</span>
</a>
</div>
';

}

// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'deytelnost WHERE en=1 '); 
$all=$sql[0]['COUNT(id)'];
$pagin1=paging1($all,8,6);



$sql =$db->select('SELECT * FROM '.DB_PREFIX.'gal_video WHERE en=1  '.$filtr.' LIMIT '.$pagin1[1]);

$it1='';
foreach ($sql as $k=>$v)
{ 
$it1.='
<div class="greed-item">
    <a href="'.$site_url.'/gal/video/'.$v['id'].'"><img src="img/gal/'.$v['img'].'" alt=""></a>
    <a href="'.$site_url.'/gal/video/'.$v['id'].'" class="hide-info">
                <span>'.$v['name_'.$site_language].'</span>
                <span class="foto-quantity"> '.$GLOBALS['p']['col_view'].' '.$v['view'].'</span>
    </a>
    </div>
';
}
/// фильтры

$zzz =array(
    '1'=>array('id'=>1,'zag_ru'=>'хронологии','zag_ua'=>'хронології'), 
    '2'=>array('id'=>2,'zag_ru'=>'названию','zag_ua'=>'назвою'),
    '3'=>array('id'=>3,'zag_ru'=>'количеству просмотров','zag_ua'=>'кількістю переглядів'),
    );

$tip=$_GET['tip'];
$_GET['tip']=0;
foreach ($zzz as $k=>$v){
    $sel='';
    if ($_GET['filtr']==$v['id'])$sel='class="select"';
 $do_filtr.='<a href="'.cr_url_get('filtr',$v['id']).'" '.$sel.'>'.$v['zag_'.$site_language].'</a>';   
}


$_GET['tip']=1;
foreach ($zzz as $k=>$v){
    $sel='';
    if ($_GET['filtr']==$v['id'])$sel='class="select"';
 $do_filtr1.='<a href="'.cr_url_get('filtr',$v['id']).'" '.$sel.'>'.$v['zag_'.$site_language].'</a>';   
}
$_GET['tip']=$tip;


$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');


cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);