<?php

// редактор каталога товаров

$dan=array(
    'id'=>'id',
    'pid'=>'pid',
    'name'=>'name',
    'sort'=>'sort',
    'db'=>array(
                'id'=>array('tip'=>'id','name'=>'id'),
                'name'=>array('tip'=>'text','name'=>'Название','r'=>0,'w'=>1,'ob'=>1),
                'url'=>array('tip'=>'text','name'=>'ЧПУ (часть урла) формат (...)','r'=>0,'w'=>1,'ob'=>1),
               //  'text'=>array('tip'=>'ftext','name'=>'Текст на странице каталога','r'=>0,'w'=>1),
               
                'descr'=>array('tip'=>'btext','name'=>'meta_descr','r'=>0,'w'=>1,'group'=>'SEO'),
                'keyw'=>array('tip'=>'btext','name'=>'meta_keyw','r'=>0,'w'=>1,'group'=>'SEO'),
                'title'=>array('tip'=>'btext','name'=>'meta_title','r'=>0,'w'=>1,'group'=>'SEO'),        
                'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'en'=>1),
                ),
          );

$filtr=  include 'filtry.php';

foreach ($filtr as $k=>$v){    
    $filtr[$k]['tip']='bool';
    $filtr[$k]['group']='Фильтры';
}


$dan['db']=$dan['db']+$filtr;



$dan1=array(
    'where'=>'',//where к запросу
    'button'=>array('Заказ подробно'=>array('url'=>'/modul/shop/ajax/order_p.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>0, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>0,//включение выключение кнопки выбрать все
    'an_sel_all'=>0,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);

$admin_center_area.=tree_admin_red('shop_cat','Редактор каталога товаров',$dan,2,$dan1);

?>
