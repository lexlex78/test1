<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'data_cr'=>array('tip'=>'data','name'=>'Дата','r'=>1,'w'=>1),
    'name'=>array('tip'=>'text','name'=>'Имя','r'=>1,'w'=>1),
    'sity'=>array('tip'=>'text','name'=>'Город','r'=>1,'w'=>1),
    'review'=>array('tip'=>'text','name'=>'Отзыв','r'=>1,'w'=>1),
    'en'=>array('tip'=>'bool','name'=>'Публиковать','r'=>1,'w'=>1,'def'=>1),
    );

$dan1=array(
    'where'=>'',//where к запросу
   // 'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>0, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);



$admin_center_area.=tab_admin('reviews','Отзывы',$dan,$dan1);

