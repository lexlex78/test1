<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'email'=>array('tip'=>'text','name'=>'e-mail','r'=>1,'w'=>1),
    'data_cr'=>array('tip'=>'data','name'=>'Дата регистрации','r'=>1,'w'=>1),
    'data_update'=>array('tip'=>'datatime','name'=>'Дата последней рассылки','r'=>1),
    'en'=>array('tip'=>'bool','name'=>'Использовать','r'=>1,'w'=>1,'def'=>1),
    'activ'=>array('tip'=>'bool','name'=>'Активация','r'=>1,'w'=>1,'def'=>1),
    'unset'=>array('tip'=>'bool','name'=>'Отписался','r'=>1),
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



$admin_center_area.=tab_admin('sub','Рассылка',$dan,$dan1);

