<?php

$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'zag'=>array('tip'=>'text','name'=>'Заголовок','r'=>1,'w'=>1,'ob'=>1), 
    'text'=>array('tip'=>'ftext','name'=>'Текст','r'=>1,'w'=>1),
  //  'img'=>array('tip'=>'img','name'=>'Картинка банера','r'=>1,'w'=>1,'path'=>'/img/index/','imgw'=>670,'imgh'=>138),
  //  'url'=>array('tip'=>'url','name'=>'URl банера','r'=>1,'w'=>1,'ob'=>1),
    
    'descr_meta'=>array('tip'=>'btext','name'=>'meta_descr','group'=>'SEO','r'=>0,'w'=>1),
    'keyw_meta'=>array('tip'=>'btext','name'=>'meta_keyw','group'=>'SEO','r'=>0,'w'=>1),
    'title_meta'=>array('tip'=>'btext','name'=>'meta_title','group'=>'SEO','r'=>0,'w'=>1),
    
    );

$dan1=array(
    'where'=>'',//where к запросу
  //  'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
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


$admin_center_area.=tab_admin('index','Стартовая страница',$dan,$dan1);
?>
