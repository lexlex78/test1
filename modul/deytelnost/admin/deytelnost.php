<?php
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'img'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/deytelnost/','imgw'=>190,/*'imgh'=>252 */),
    'data'=>array('tip'=>'datatime','name'=>'Дата','r'=>1,'w'=>1,'ob'=>1,'def'=>date('Y-m-d H:i')),
    'lic'=>array('tip'=>'bool','name'=>'Личный контроль','r'=>1,'w'=>1,'def'=>0),
    'zag_ru'=>array('tip'=>'text','name'=>'Заголовок ru','r'=>1,'w'=>1,'ob'=>1),
    'text_ru'=>array('tip'=>'ftext','name'=>'Текст ru','r'=>1,'w'=>1),
    'zag_ua'=>array('tip'=>'text','name'=>'Заголовок ua','r'=>1,'w'=>1,'ob'=>1),
    'text_ua'=>array('tip'=>'ftext','name'=>'Текст ua','r'=>1,'w'=>1),
    'razd'=>array('tip'=>'sel_tab','name'=>'Раздел','r'=>1,'w'=>1,'tabl'=>'deyt_razd','td'=>'zag_ru'),
    //'soput'=>array('tip'=>'sel_tabm','name'=>'Публикации по теме','r'=>1,'w'=>1,'tabl'=>'pub','td'=>'zag_ru'),
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


$admin_center_area.=tab_admin('deytelnost','Деятельность',$dan,$dan1);

