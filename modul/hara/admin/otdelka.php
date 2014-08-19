<?php
$dan=array(
//    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
//    'razd'=>array('tip'=>'text','name'=>'Раздел','r'=>1,'w'=>1,'ob'=>1),
//    'url'=>array('tip'=>'text','name'=>'URL (symbols)','r'=>0,'w'=>1,'ob'=>1),
    
    'img'=>array('tip'=>'img','name'=>'Картинка основная','r'=>1,'w'=>1,'path'=>'/img/hara_stroy/','imgw'=>300,'imgh'=>192),
    'img_m'=>array('tip'=>'img_m','name'=>'Картинки дополнительные ','r'=>0,'w'=>1,'tabl'=>'hara_otd_img','path'=>'/img/hara_stroy/','imgw'=>300,'imgh'=>192),
  // 'data'=>array('tip'=>'data','name'=>'Дата','r'=>1,'w'=>1,'ob'=>1,'def'=>date('Y-m-d')),
    'zag'=>array('tip'=>'text','name'=>'Заголовок','r'=>1,'w'=>1,'ob'=>1),
    'text'=>array('tip'=>'ftext','name'=>'Текст','r'=>0,'w'=>1),
    'text_s'=>array('tip'=>'ftext','name'=>'Текст_скрытый','r'=>0,'w'=>1),
    'text1'=>array('tip'=>'ftext','name'=>'Текст','r'=>0,'w'=>1),
    'text1_s'=>array('tip'=>'ftext','name'=>'Текст_скрытый','r'=>0,'w'=>1),
  // 'zag_ua'=>array('tip'=>'text','name'=>'Заголовок ua','r'=>1,'w'=>1,'ob'=>1),
  //  'text_ua'=>array('tip'=>'ftext','name'=>'Текст ua','r'=>1,'w'=>1),
    'soput'=>array('tip'=>'sel_tab','name'=>'Выбор прайса','r'=>0,'w'=>1,'tabl'=>'hara_tip_pr','td'=>'name'),
    
    
     'descr_meta'=>array('tip'=>'btext','name'=>'meta_descr','r'=>0,'w'=>1),
    'keyw_meta'=>array('tip'=>'btext','name'=>'meta_keyw','r'=>0,'w'=>1),
    'title_meta'=>array('tip'=>'btext','name'=>'meta_title','r'=>0,'w'=>1),
    
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    
    'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

$dan1=array(
    'where'=>'',//where к запросу
   // 'button'=>array('Прайс-лист'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
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


$admin_center_area.=tab_admin('hara_otd','Отделка домов под ключ',$dan,$dan1);

