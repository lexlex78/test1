<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'img'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/news/','imgw'=>190,/*'imgh'=>252 */),
    'data'=>array('tip'=>'data','name'=>'Дата','r'=>1,'w'=>1,'ob'=>1,'def'=>date('Y-m-d')),
    'zag_ru'=>array('tip'=>'text','name'=>'Заголовок','r'=>1,'w'=>1,'ob'=>1),
    'text_ru'=>array('tip'=>'ftext','name'=>'Текст','r'=>0,'w'=>1),
   // 'zag_ua'=>array('tip'=>'text','name'=>'Заголовок ua','r'=>1,'w'=>1,'ob'=>1),
  //  'text_ua'=>array('tip'=>'ftext','name'=>'Текст ua','r'=>1,'w'=>1),
 //   'soput'=>array('tip'=>'sel_tabm','name'=>'Новости по теме','r'=>1,'w'=>1,'tabl'=>'news','td'=>'zag_ru'),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    
    //'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

$dan1=array(
    'where'=>'',//where к запросу
   // 'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);

//  tab_admin админ таблица (название таблицы в БД,название визуальное, масив данных  , еще масив данных)
//$admin_center_area=tab_admin('test','Тест Админки',$dan,$dan1);


$admin_center_area.=tab_admin('news','Новости',$dan,$dan1);

