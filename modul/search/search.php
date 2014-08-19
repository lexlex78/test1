<?
unset($dan);

function add_s ($a,$cof){
global $dan,$t_dan;   
if(!$t_dan[$a['url']]){
    
$a['conversiya']=$cof;
$dan[]=$a;

$t_dan[$a['url']]=count($dan);

}
else 
$dan[($t_dan[$a['url']]-1)]['conversiya']=$dan[($t_dan[$a['url']]-1)]['conversiya']+$cof;
}


if (!empty($_GET['s']) )
{    
//$s=$_GET['s'];
$s=  mb_substr($_GET['s'], 0, 32, 'utf8') ;
$s=mysql_real_escape_string($s);
$s=trim ($s);
$qw=explode(' ', $s);




// поиск в товарах/////////////////////////////////
///////////////////////////////////////////////////// 

 /// доп. поиск в фильтрах

$array=include SITE_PATH.'modul/shop/admin/filtry.php';
$filtr='';
foreach ($array as $key => $value) {
    
if ($value['tabl']){
$like='';  
foreach ($qw as $v) {$like.=' '.$value['td']." like '%$v%' or";}
$like = trim ($like,'or');    
$sql =$db->select("SELECT *  FROM ".DB_PREFIX.$value['tabl']."   WHERE  $like ");
foreach ($sql as $vv) {
 $filtr.=' or CONCAT(\',\',p.'.$key.',\',\')  like \'%,'.$vv[id].',%\' ';   
}  

}    
    
}
//$filtr = trim ($filtr,'or');
//echo $filtr;
/// выход $filtr



unset($zz);
$like='';  
foreach ($qw as $v) {$like.=" p.name like '%$v%' or  p.descr like '%$v%' or p.descr_ful like '%$v%' or";}
$like = trim ($like,'or');
 
//$sql =$db->select("SELECT *  FROM ".DB_PREFIX."hara_stroy as a   WHERE a.en=1  and ( $like ) order by sort desc "); 

$sql = $db->select('SELECT p.* , i.img , e.name as f_en  
                   FROM ' . DB_PREFIX . 'shop_produkt as p  
                   LEFT JOIN ' . DB_PREFIX . 'shop_produkt_img as i ON  p.id=i.pid 
                   LEFT JOIN ' . DB_PREFIX . 'f_en as e  ON p.f_en=e.id    
                   WHERE p.en=1 and ( '.$like.' '.$filtr.')
                   GROUP BY p.id ');




foreach ($sql as $v) {
    
 $zz['url']='/shop/' . shop_pid_url($v['pid']) . $v['url'] . '.html';
 
 /////// строка товара
 
  if ($v['price_old'] > 0)
            $v['price_old'] = '<span class="line-through old">' . number_format($v['price_old'], 0, '.', ' ') . ' руб.</span>';
        else
            $v['price_old'] = '';


        $special = '';
        if ($v['spec'])
            $special = 'special';
        $news = '';
        if ($v['new'])
            $news = 'new';

        $img = '';
        if (!empty($v['img']))
            $img = '<img src="/img/shop/' . $v['img'] . '">';

        $it='
                <li>
                    <div class="labels clearfix">
                        <div class="tags ' . $news . ' ' . $special . '">
                            <p class="tag_new">Новинка!</p>
                            <p class="tag_special">Спецпредложение</p>
                        </div>
                        <div class="fl_l item_img">
                        <center>
                            <a href="/shop/' . shop_pid_url($v['pid']) . $v['url'] . '.html">' . $img . '</a>
                        </center>
                        </div>
                        <div class="fl_r item_text">
                            <h4><a href="/shop/' . shop_pid_url($v['pid']) . $v['url'] . '.html">' . $v['name'] . '</a></h4>
                        <p class="descriptions">' . $v['descr'] . '</p>
                        <p class="item_price">
                            ' . $v['price_old'] . '
                            <span class="new">' . number_format($v['price'], 0, '.', ' ') . ' руб.</span>
                        </p>
                        <div class="item_buy">
                            <span class="availability">' . $v['f_en'] . '</span>';
        
                    if (  $v['f_en']!='Нет в наличии'){       $it.=' <a onclick="javascript:bay(' . $v['id'] . ');" href="javascript:void(0);" class="btn">Купить</a>';
                    }    
                       $it.=' </div>
                        </div>
                    </div>
                </li>
    ';
                       
 
  $zz['row']=$it;
 ////
 
   /// ставим приоритет и кидаем в вывод
 add_s ($zz,10);
  
}
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
 


// поиск в новостях/////////////////////////////////
    unset($zz);
  $like='';  
  foreach ($qw as $v) {$like.=" zag_ru like '%$v%' or  text_ru like '%$v%' or";}
  $like = trim ($like,'or');
 
    
$sql =$db->select("SELECT *  FROM ".DB_PREFIX."news   WHERE en=1  and ( $like ) order by data  desc "); 

foreach ($sql as $v) {
 $zz['zag']=$v['zag_ru'];   
 $zz['text']=$v['text_ru'];  
// $zz['data']=$v['data'];
 $zz['url']='/news/'.$v['id'];
 add_s ($zz,5);
}
////////////////////////////////////////////////////////



// поиск в акциях/////////////////////////////////
    unset($zz);
  $like='';  
  foreach ($qw as $v) {$like.=" zag_ru like '%$v%' or  text_ru like '%$v%' or";}
  $like = trim ($like,'or');
 
    
$sql =$db->select("SELECT *  FROM ".DB_PREFIX."akcii   WHERE en=1  and ( $like ) order by data  desc "); 

foreach ($sql as $v) {
 $zz['zag']=$v['zag_ru'];   
 $zz['text']=$v['text_ru'];  
// $zz['data']=$v['data'];
 $zz['url']='/promotions/'.$v['id'];
 add_s ($zz,5);
}
////////////////////////////////////////////////////////




// поиск в статьях/////////////////////////////////
 unset($zz);
  $like='';  
  foreach ($qw as $v) {$like.=" zag_ru like '%$v%' or  text_ru like '%$v%' or";}
  $like = trim ($like,'or');
 
    
$sql =$db->select("SELECT *  FROM ".DB_PREFIX."article   WHERE en=1  and ( $like ) order by data  desc "); 

foreach ($sql as $v) {
 $zz['zag']=$v['zag_ru'];   
 $zz['text']=$v['text_ru'];  
// $zz['data']=$v['data'];
 $zz['url']='/articles/'.$v['id'];
 add_s ($zz,5);
}
////////////////////////////////////////////////////////








$col=count($dan);
$pagin=paging($col,8,6);
$lim=explode(",",$pagin[1]);


// сортировка по приоритету
array_multisort($dan['conversiya']);

//print_r($dan);

// вывод

$it='';

for ($i = $lim[0]; $i < ($lim[0]+$lim[1]); $i++) {
    if($dan[$i])
   
 /// есле есть сформированная строка выводим ее есле нет формируем       
   if ($dan[$i]['row']){
   $it.=$dan[$i]['row'];    
   }else {  
     $it.='<li>
                                    
                                    <h3>'.$dan[$i]['zag'].'</h3>
                                    <p class="news_text">'.str_smoll($dan[$i] ['text'],300).'</p>
                                    <a href="'.$dan[$i]['url'].'">Подробнее</a>
                                </li>
            ';  
   }
}

//if ($col==0) $it='<div class="search-result"> <center>По данному запросу ничего не найдено</center></div>';




$center_area.=showtempl(dirname(__FILE__).'/templ/tpl.php');

}




//cash_add ($cash_mod,120,$center_area);
//}
//else $center_area=$cash;