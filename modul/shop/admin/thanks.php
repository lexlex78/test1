<?php

$dan=array(
    'id'=>array('tip'=>'id','name'=>'№','r'=>0),
    'text'=>array('tip'=>'ftext','name'=>'Текст на странице спасибо','r'=>1,'w'=>1,'ob'=>1),
     );

$dan1=array(
    'where'=>'',//where к запросу
  //  'button'=>array('Заказ подробно'=>array('url'=>'/modul/shop/ajax/order_p.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>0, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>0,//включение выключение кнопки удалить
    'sel_all'=>0,//включение выключение кнопки выбрать все
    'an_sel_all'=>0,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
    'sort'=>0, // включть сортировку   
);

//  tab_admin админ таблица (название таблицы в БД,название визуальное, масив данных  , еще масив данных)
//$admin_center_area=tab_admin('test','Тест Админки',$dan,$dan1);


$admin_center_area.=tab_admin('shop_thanks','Заказы',$dan,$dan1);

?>