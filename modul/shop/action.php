<?php

//// поиск  промежуточный
//function a_search($v,$tree){
//global $da,$shop_f_cat;
//$ret=false;
//
//foreach ($da[$tree] as $vv){
//if ($shop_f_cat[$vv]['url']==$v)$ret=$vv;
//}
//
//return $ret;
//}
//////// 
//
//
//// получаем id каталога из урла
//
////1 я итерация указываем каждому родителю ребенка 
//foreach ($shop_f_cat as $k=>$v) {$da[$v['pid']][]=$v[id];}
//
//$id=0;
//$eror=0;
//foreach ($router as $k => $v) {
//if ($k!=0){
//   $poisk=a_search($v,$id); 
//  if ($poisk){$id=$poisk;} 
//  else {$eror=1;}
//  
//}
//}    
///// выход $id - католога 
//
//// находим все подпапкм входящии в папку $id
//function ids ($id){
//$ret='';
//global $da;
//    foreach ($da[$id] as $v) {
//    $ret.=$v.','.ids ($v);    
//    }
//return $ret;    
//}
//$ids=trim ($id.','.ids($id),',');
///// выход $ids
//
//if ($eror===0){
    
// хлебные крошки
// $kroshki=kroshki($id);
$kroshki='';
   
// имя каталога
//$cat_name=$shop_f_cat[$id]['name']; 
  
// выбираем товары акцыонные

    

$order='';
// сортировка
//if ($_GET[price]=='up')$order=' ORDER BY price ASC '; 
//if ($_GET[price]=='down')$order=' ORDER BY price DESC '; 

// пажинация    
$sqll =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'shop_produkt WHERE en=1 and price_old>0 '.$order); 
$all=$sqll[0]['COUNT(id)'];
$pagin=paging($all,9,5);

$dat=$db->select('SELECT * FROM '.DB_PREFIX.'shop_produkt WHERE en=1 and price_old>0 '.$order.' limit '.$pagin[1]);


// вывод товаров в категории
$it='';
$sh=0;
foreach ($dat as $v) {
$sh++;
if ($sh==1){$it.='<div class="catalog-row">';}    
if ($v['price_old']>0)$v['price_old'].' руб. ';
else $v['price_old']=''; 
$it.='
                   <div class="catalog-item">
                                    <div class="catalog-image">
                                        <img src="img/shop/'.$v['img'].'" alt="">
                                    </div>
                                    <div class="catalog-info">
                                        <div class="catalog-title">
                                            <a href="/shop/'.shop_pid_url($v['pid']).$v['url'].'.html">'.$v['name'].'</a>
                                        </div>
                                        <div class="catalog-text">
                                            <p>'.$v['descr'].'</p>
                                        </div>
                                    </div>
                                        <div class="old-price">'.$v['price_old'].'</div>
                                        <div class="price">'.$v['price'].' руб.</div>
                                        <div class="button-area">
                                            <a href="#popup_bay" onclick="javascript:bay('.$v['id'].');" class="buy-button fancybox"><span>В корзину</span></a>
                                        </div>
                                </div>' ;
if ($sh==3){$it.='</div>';$sh=0;} 

}
if ($sh!=0){$it.='</div>';}

//$meta_title=$sql[0]['title'];
//$meta_keyw=$sql[0]['keyw'];
//$meta_descr=$sql[0]['descr'];
   
$center_area=showtempl(dirname(__FILE__).'/templ/tpl_cat.php');

//}
//else $_GET['error']=404;