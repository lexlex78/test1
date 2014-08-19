<?php

if (isset($_GET['sr']) )
{    
$s=$_GET['sr'];
$s=substr($_GET['sr'], 0,64);
$s=trim($s);



if (!empty($s)){
 $qw=explode(' ', $s);
    foreach ($qw as $v) {
    $like.=" proiz like '%$v%' or top like '%$v%' or name like '%$v%' or  descr like '%$v%' or descr_ful like '%$v%' or"; 
    $like_с.=" name like '%$v%' or";
    }
$like = trim ($like,'or');
$like_с = trim ($like_с,'or');
}


/// поиск в категориях
$dat=$db->select('SELECT * FROM '.DB_PREFIX.'shop_cat WHERE en=1 and '.$like_с);

//1 я итерация указываем каждому родителю ребенка 
foreach ($shop_f_cat as $k=>$v) {$da[$v['pid']][]=$v[id];}


// находим все подпапкм входящии в папку $id
function ids ($id){
$ret='';
global $da;
    foreach ($da[$id] as $v) {
    $ret.=$v.','.ids ($v);    
    }
return $ret;    
}
foreach ($dat as $v) {
 $ids.=trim ($v['id'].','.ids($v['id']),',');   
}
/// выход $ids

if ($ids)$cat=" or pid in($ids)";

  
// сообшение поиска
$cat_name="По запросу '$s' найденно:"; 
  
    

$order='';
// сортировка
//if ($_GET[price]=='up')$order=' ORDER BY price ASC '; 
//if ($_GET[price]=='down')$order=' ORDER BY price DESC ';

$where='';

// пажинация    
$sqll =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'shop_produkt WHERE en=1 and '.$like.$cat.$order); 
$all=$sqll[0]['COUNT(id)'];
$pagin=paging($all,9,5);

$dat=$db->select('SELECT * FROM '.DB_PREFIX.'shop_produkt WHERE en=1 and '.$like.$cat.$order.' limit '.$pagin[1]);
$it='';
if ($dat){
// вывод товаров в категории

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
}
else 
$cat_name="По запросу '$s' ничего не найдено.<br><br>
Рекомендации:<br><br>

Убедитесь, что все слова написаны без ошибок.<br>
Попробуйте использовать другие ключевые слова.<br>
Попробуйте использовать более популярные ключевые слова.<br>
Попробуйте уменьшить количество слов в запросе.<br>"; 
   
$center_area=showtempl(dirname(__FILE__).'/templ/tpl_cat.php');



}
else $_GET['error']=404;