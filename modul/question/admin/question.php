<?
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'name'=>array('tip'=>'text','name'=>'Имя','r'=>1,'w'=>1),
    'tel'=>array('tip'=>'text','name'=>'Телефон','r'=>1,'w'=>1),
    'email'=>array('tip'=>'text','name'=>'email','r'=>1,'w'=>1),
    'text'=>array('tip'=>'bext','name'=>'Вопрос','r'=>1,'w'=>1),
    'data_cr'=>array('tip'=>'datatime','name'=>'Дата','r'=>1,'w'=>1)
   // 'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1),
  // 'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

$dan1=array(
    'where'=>'',//where к запросу
    'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>1, // включть сортировку   
);


$admin_center_area.=tab_admin('question','Вопросы с сайта',$dan,$dan1);