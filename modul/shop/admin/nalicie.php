<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'pid'=>array('tip'=>'sel_tabm','name'=>'Товар','r'=>1,'w'=>0,'tabl'=>'shop_produkt','td'=>'name'),
    'email'=>array('tip'=>'text','name'=>'email','r'=>1,'w'=>0),
    'data_cr'=>array('tip'=>'datatime','name'=>'дата','r'=>1),
    'en'=>array('tip'=>'bool','name'=>'Закзчик уведомлен','r'=>1,'w'=>1,'def'=>0),
    );



$dann=array(
    'where'=>$ttt,//where к запросу
    //'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>0, //включение выключение кнопки добавить
    'edit'=>0,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);



$admin_center_area.=tab_admin('product_en','Список уведомлений о наличии товара',$dan,$dann);

?>