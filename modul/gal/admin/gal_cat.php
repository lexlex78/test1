<?php


$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'name_ru'=>array('tip'=>'text','name'=>'Название','r'=>1,'w'=>1,'ob'=>1),
 //   'name_ua'=>array('tip'=>'text','name'=>'Название ua','r'=>1,'w'=>1,'ob'=>1),
    'dat_up'=>array('tip'=>'datatime','name'=>'Дата создания','r'=>1,'w'=>1,'def'=>date('Y-m-d H:i')),
    'view'=>array('tip'=>'num','r'=>0,'w'=>0),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

$dan1=array(
  //  'where'=>'',//where к запросу
 //   'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>0, // включть сортировку   
);

//  tab_admin админ таблица (название таблицы в БД,название визуальное, масив данных  , еще масив данных)
//$admin_center_area=tab_admin('test','Тест Админки',$dan,$dan1);


$admin_center_area.=tab_admin('gal_cat','Фотоальбомы',$dan,$dan1);
?>
