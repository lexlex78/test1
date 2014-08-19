<?php

function merg ($a,$b){
    foreach ($b as $k=>$v) {
   if (!$a[$k]) $a[$k]=$v;    
    }
return $a ;   
    
}

$dan=array(
    'id'=>'id',
    'pid'=>'pid',
    'name'=>'name',
    'sort'=>'sort',
    );
$z_where='';

$admin_center_area.='<div id="vertical"><div id="horizontal" style="height: 100%; border: 0;">
    <div >';

$admin_center_area.=tree_admin('shop_cat','Каталог ',$dan,'1',$z_where);

$admin_center_area.='</div>
    <div >';

//$admin_center_area='<div style="width: 300px;">'.$admin_center_area.'</div>';
 
if ($_GET['tree_1'] ){
    $n=$_GET['tree_1'];
    $ttt=' pid='.$_GET['tree_1'].' OR pid in (SELECT id FROM '.DB_PREFIX.'shop_cat WHERE pid='.$_GET['tree_1'].') OR pid in ( SELECT id FROM '.DB_PREFIX.'shop_cat WHERE pid in ( SELECT id FROM '.DB_PREFIX.'shop_cat WHERE pid='.$_GET['tree_1'].')) ';
    
$per=  array();
do {
  $rr=$db->select("SELECT * FROM ".DB_PREFIX."shop_cat WHERE id='$n'");  
   $per= merg ($per,$rr[0]); 
   $n=$rr[0][pid];
} while ($rr[0][pid] !=0 );

//echo '<pre>';
//print_r ($per);
//echo '</pre>';

$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'pid'=>array('tip'=>'sel_tab','name'=>'Раздел коталога','r'=>1,'w'=>1,'tabl'=>'shop_cat','td'=>'name','def'=>$_GET['tree_1']),
    
    'img'=>array('tip'=>'img_m','name'=>'Фото товара','r'=>0,'w'=>1,'path'=>'/img/shop/','tabl'=>'shop_produkt_img','imgw'=>600 /*,'imgh'=>428 */,'group'=>'Фото','ob'=>1),
    'name'=>array('tip'=>'text','name'=>'Название','r'=>1,'w'=>1,'ob'=>1),
   
    'url'=>array('tip'=>'text','name'=>'URL: формат ( ... )','r'=>1,'w'=>1,'ob'=>1,'un'=>1),
    'price'=>array('tip'=>'dec','name'=>'Цена (руб)','r'=>1,'w'=>1,'ob'=>1),
    'price_old'=>array('tip'=>'dec','name'=>'Цена до скидки','r'=>1,'w'=>1),
    'f_en'=>array('tip'=>'sel_tab','name'=>'Наличие','tabl'=>'f_en','td'=>'name','r'=>1,'w'=>1,'var'=>''),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    'new'=>array('tip'=>'bool','name'=>'Новинка','r'=>1,'w'=>1,'def'=>0),
    'spec'=>array('tip'=>'bool','name'=>'Спецпредложение','r'=>1,'w'=>1,'def'=>0),
    
    'descr'=>array('tip'=>'btext','name'=>'Краткое описание','r'=>0,'w'=>1,'group'=>'Описание'),
    'descr_ful'=>array('tip'=>'ftext','name'=>'Полное описание','r'=>0,'w'=>1,'group'=>'Описание'),
    
    
    'soput'=>array('tip'=>'sel_tabm','name'=>'С этим товаром также покупают','r'=>0,'w'=>1,'tabl'=>'shop_produkt','td'=>'name','group'=>'Сопутствующие товары'),
    'title_meta'=>array('tip'=>'btext','name'=>'Title','r'=>0,'w'=>1,'group'=>'SEO'),
    'descr_meta'=>array('tip'=>'btext','name'=>'Description','r'=>0,'w'=>1,'group'=>'SEO'),
    'keyw_meta'=>array('tip'=>'btext','name'=>'Keywords','r'=>0,'w'=>1,'group'=>'SEO'),
    
    
    
  //  'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

// подгружаем фильтры

$dan = $dan + include 'filtry.php';

//
//// удаляем не выбранные поля
foreach ($dan as $k=>$v){
if ($v['filtr']==1){
    if ($per[$k]==0){
    $dan[$k]['w']=0;    
    }
}    
    
} 




$dann=array(
    'where'=>$ttt,//where к запросу
    //'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);



$admin_center_area.=tab_admin('shop_produkt','Товары',$dan,$dann);

}
else {
 $admin_center_area.="<br><br><center>Выберите категорию!</center>";   
}


//$admin_center_area=$admin_center_area;

$admin_center_area.='</div></div></div>
           
<script>
$("#horizontal").kendoSplitter({panes: [ {  size: "300px" },{}]});
</script>
';
?>