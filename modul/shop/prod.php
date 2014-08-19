<?php
//выбираем каталог из урла
// поиск  промежуточный
function a_search($v,$tree){
global $da,$shop_f_cat;
$ret=false;

foreach ($da[$tree] as $vv){
if ($shop_f_cat[$vv]['url']==$v)$ret=$vv;
}

return $ret;
}
//////

// получаем id каталога из урла

//1 я итерация указываем каждому родителю ребенка 
foreach ($shop_f_cat as $k=>$v) {$da[$v['pid']][]=$v[id];}

$id=0;
$eror=0;
foreach ($router as $k => $v) {
if ($k!=0){
   $poisk=a_search($v,$id); 
  if ($poisk){$id=$poisk;} 
  else {$eror=1;}
  
}
} 
///////////////////



if($eror===0){

    

function merg ($a,$b){
    foreach ($b as $k=>$v) {
   if (!$a[$k]) $a[$k]=$v;    
    }
return $a ;   
    
}

// получение данных о пременных парамеирах товара (фильтрах) 
$t_id=$id; 
//$sh=0;
do {
  $rr=$shop_f_cat[$t_id]; 
 /// if ($sh==0)$razd=$rr['name'];
   $per=merg ($per,$rr); 
   $t_id=$rr[pid];
//   $sh++;
} while ($rr[pid] !=0 ); 
}    
    
    
 
//// получение данных о пременных парамеирах товара 
//$t_id=$id; 
//$sh=0;
//do {
//  $rr=$db->select("SELECT * FROM ".DB_PREFIX."shop_cat WHERE id='$t_id'"); 
//  if ($sh==0)$razd=$rr[0]['name'];
//   $per=$rr[0]; 
//   $t_id=$rr[0][pid];
//   $sh++;
//} while ($rr[0][pid] !=0 ); 
// 
//}
 


if ($eror===0)$dat=$db->select('SELECT p.* , e.name as f_en FROM '.DB_PREFIX.'shop_produkt as p  LEFT JOIN '.DB_PREFIX.'f_en as e  ON p.f_en=e.id  WHERE p.en=1 and p.pid='.$id.' AND p.url="'.$route_file.'"');
if (count($dat)>0){
    
     $dat=$dat[0];
     
     
  // хлебные крошки
 $kroshki=kroshki($id).'<a>'.$dat['name'].'</a>'; 
 
 
 // смотреть все (доп. хлебная крошка)
 $kroshki_ext='<div class="block_content">
                    <a class="page_back" href="/shop/'.shop_pid_url($id).'">Смотреть все '.mb_strtolower($shop_f_cat[$id]['name'],'utf8').'</a>
                </div>';

     

if ($dat['price_old']>0)$dat['price_old']='<span class="line-through old">'.number_format($dat['price_old'], 0, '.', ' ').' руб.</span>';
else $dat['price_old']='';    
   
$dat['price']=number_format($dat['price'], 0, '.', ' ');


$special='';if ($dat['spec'])$special='special';
$news='';if ($dat['new'])$news='new';   
    
/// Собираем фотки    
$i=$db->select('SELECT * FROM '.DB_PREFIX.'shop_produkt_img WHERE pid='.$dat[id].' limit 6');
$img='';$imgs='';
foreach ($i as $kk=>$vv) {
if ($kk==0){
 $img='<a href="/img/shop/'.$vv['img'].'" rel="page_item_images"><img src="/img/shop/'.$vv['img'].'" /></a>';   
}  
 else {
$imgs.='<li>
                                            <center>
                                                <a href="/img/shop/'.$vv['img'].'" rel="page_item_images"><img src="/img/shop/'.$vv['img'].'"></a>
                                            </center>
                                            </li>';    
}
    
}
    
/// собираем переменные параметры
$per_p=  include 'admin/filtry.php';
array_multisort ($per_p, SORT_DESC);
    
$dop_par=''; 
$sh=0;
foreach ($per_p as $k=>$v){
 $sh++;
    if ($per[$k]==1){
   if (!empty($dat[$k]))
       
       if ($v[tabl]){
           
          $tsel=$db->select('SELECT '.$v['td'].' FROM '.DB_PREFIX.$v['tabl'].' WHERE id in ('.$dat[$k].')'); 
          $tres='';
          foreach ($tsel as $tv) {
           $tres.=$tv[($v['td'])].',';  
          } 
          $tres=trim($tres,',');
          
           $dop_par.='<tr><td >'.$v['name'].':</td>
                           <td >'.$tres.'</td>
                       </tr>'; 
       }
       else{
           
        $dop_par.='<tr><td >'.$v['name'].':</td>
                           <td >'.$dat[$k].' '.$v['var'].'</td>
                       </tr>';   
           
           
       }
    }
    if ($sh==1){
    if($dat['descr_ful'])$dop_par.='<tr><td >Полное описание</td>
                   <td >'.$dat['descr_ful'].'</td>
               </tr>';    
    } 
} 
    
 
 ////////////////////// сопутствуюшие товары //////////////////////////////////////////
$s_ids=$dat['soput'];

include 'soput.php';

 ///////////////////////////////////////////////////////////////////////////////////////   
 


$meta_title=$dat['title_meta'];
$meta_keyw=$dat['keyw_meta'];
$meta_descr=$dat['descr_meta'];


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_prod.php');
}
else $_GET['error']=404;