<?php

$dan=array(
    'id'=>array('tip'=>'id','name'=>'№','r'=>1),
    'data_cr'=>array('tip'=>'datatime','name'=>' ','r'=>1,'w'=>0),
    'summa'=>array('tip'=>'dec','name'=>'Сумма','r'=>1,'w'=>0),
    'status'=>array('tip'=>'sel_tab','name'=>'Статус заказа','r'=>1,'w'=>1,'tabl'=>'shop_order_status','td'=>'name'),
    'name'=>array('tip'=>'text','name'=>'Имя','r'=>1,'w'=>1,'ob'=>1),
    'get'=>array('tip'=>'text','name'=>'Доставка','r'=>1,'w'=>1,'ob'=>1),
    'sity'=>array('tip'=>'text','name'=>'Адрес','r'=>1,'w'=>1,'ob'=>1),
//  'metro'=>array('tip'=>'adrr	','name'=>'Метро','r'=>1,'w'=>0,'ob'=>1),
    'tel'=>array('tip'=>'text','name'=>'Телефон','r'=>1,'w'=>1,'ob'=>1),
    'email'=>array('tip'=>'text','name'=>'E-mai','r'=>1,'w'=>1,'ob'=>1),
    'com'=>array('tip'=>'btext','name'=>'Комментарии','r'=>1,'w'=>1),
    
    
    'zak'=>array('tip'=>'ftext','name'=>'заказ','r'=>0,'w'=>0),
    );

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

//  tab_admin админ таблица (название таблицы в БД,название визуальное, масив данных  , еще масив данных)
//$admin_center_area=tab_admin('test','Тест Админки',$dan,$dan1);


$admin_center_area.=tab_admin('shop_order','Заказы',$dan,$dan1);

//$dan=array(
//    'id'=>array('tip'=>'id','name'=>'id','r'=>1),
//    'name'=>array('tip'=>'text','name'=>'Статус','r'=>1,'w'=>1,'ob'=>1),
//    );
//
//$dan1=array(
//    'where'=>'',//where к запросу
//   // 'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
//    'add'=>1, //включение выключение кнопки добавить
//    'edit'=>1,//включение выключение кнопки редактировать
//    'del'=>1,//включение выключение кнопки удалить
//    'sel_all'=>1,//включение выключение кнопки выбрать все
//    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
//    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
//    'sort'=>0, // включть сортировку   
//);
//
//$admin_center_area.=tab_admin('shop_order_status','статус',$dan,$dan1);





?>
