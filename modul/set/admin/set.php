<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id'),    
    'tel'=>array('tip'=>'text','name'=>'Телефон','r'=>1,'w'=>1,'ob'=>1),
    'adr'=>array('tip'=>'btext','name'=>'Адрес','r'=>1,'w'=>1),
    'icq'=>array('tip'=>'text','name'=>'ICQ','r'=>1,'w'=>1),
    'rec'=>array('tip'=>'ftext','name'=>'Реквизиты','r'=>1,'w'=>1),
    'tel1'=>array('tip'=>'tel','name'=>'Телефон (доп)','r'=>1,'w'=>1,'ob'=>1),
    'email'=>array('tip'=>'email','name'=>'Email (Администратора)','r'=>1,'w'=>1,'ob'=>1),
    'email1'=>array('tip'=>'email','name'=>'Email (Контактный)','r'=>1,'w'=>1,'ob'=>1),
    'cop'=>array('tip'=>'text','name'=>'Копирайт','r'=>1,'w'=>1,'ob'=>1),
    'reg'=>array('tip'=>'text','name'=>'Режим работы','r'=>1,'w'=>1,'ob'=>1),
    );

$dan1=array(
    'where'=>'',//where к запросу
   // 'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>0, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>0,//включение выключение кнопки удалить
    'sel_all'=>0,//включение выключение кнопки выбрать все
    'an_sel_all'=>0,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
   // 'sort'=>1, // включть сортировку   
);



$admin_center_area.=tab_admin('set','Настройки сайта',$dan,$dan1);
?>
