<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'sity'=>array('tip'=>'text','name'=>'Город','r'=>1,'w'=>1,'ob'=>1),
    'text'=>array('tip'=>'ftext','name'=>'Текст','r'=>1,'w'=>1,'ob'=>1),
//    'url'=>array('tip'=>'text','name'=>'URL  формат( ... .html) ','r'=>1,'w'=>1,'ob'=>1),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1),
//    'text'=>array('tip'=>'ftext','name'=>'Контент','r'=>0,'w'=>1),
    
     'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );


$dan1=array(
    'where'=>'',//where к запросу
   // 'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>0,//включение выключение кнопки выбрать все
    'an_sel_all'=>0,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
    'sort'=>0, // включть сортировку   
);

$admin_center_area.=tab_admin('partnery_gor','Партнеры',$dan,$dan1);
?>
