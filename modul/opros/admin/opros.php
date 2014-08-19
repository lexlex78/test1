<?
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'qw_ru'=>array('tip'=>'text','name'=>'Вопрос ru','r'=>1,'w'=>1,'ob'=>1),
    'qw_ua'=>array('tip'=>'text','name'=>'Вопрос ua','r'=>1,'w'=>1,'ob'=>1),
    'a1_ru'=>array('tip'=>'text','name'=>'Ответ №1 ru','r'=>1,'w'=>1,'ob'=>1),
    'a1_ua'=>array('tip'=>'text','name'=>'Ответ №1 ua','r'=>1,'w'=>1,'ob'=>1),
    'a2_ru'=>array('tip'=>'text','name'=>'Ответ №2 ru','r'=>1,'w'=>1),
    'a2_ua'=>array('tip'=>'text','name'=>'Ответ №2 ua','r'=>1,'w'=>1),
    'a3_ru'=>array('tip'=>'text','name'=>'Ответ №3 ru','r'=>1,'w'=>1),
    'a3_ua'=>array('tip'=>'text','name'=>'Ответ №3 ua','r'=>1,'w'=>1),
    'a4_ru'=>array('tip'=>'text','name'=>'Ответ №4 ru','r'=>1,'w'=>1),
    'a4_ua'=>array('tip'=>'text','name'=>'Ответ №4 ua','r'=>1,'w'=>1),
    'a5_ru'=>array('tip'=>'text','name'=>'Ответ №5 ru','r'=>1,'w'=>1),
    'a5_ua'=>array('tip'=>'text','name'=>'Ответ №5 ua','r'=>1,'w'=>1),
    's1'=>array('tip'=>'num','r'=>0,'w'=>0),
    's2'=>array('tip'=>'num','r'=>0,'w'=>0),
    's3'=>array('tip'=>'num','r'=>0,'w'=>0),
    's4'=>array('tip'=>'num','r'=>0,'w'=>0),
    's5'=>array('tip'=>'num','r'=>0,'w'=>0),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'ob'=>0),
    );

$dan1=array(
    'where'=>'',//where к запросу
    'button'=>array('Статистика'=>array('url'=>'/modul/opros/ajax/stat.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);


$admin_center_area.=tab_admin('opros','Опросы',$dan,$dan1);