<?php

$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
        
    
    'text'=>array('tip'=>'ftext','name'=>'Текст','r'=>1,'w'=>1),
    'text_s'=>array('tip'=>'ftext','name'=>'Текст_скрытый','r'=>0,'w'=>1),
          
    'descr_meta'=>array('tip'=>'btext','name'=>'meta_descr','r'=>0,'w'=>1),
    'keyw_meta'=>array('tip'=>'btext','name'=>'meta_keyw','r'=>0,'w'=>1),
    'title_meta'=>array('tip'=>'btext','name'=>'meta_title','r'=>0,'w'=>1),
    
    
  
    //'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
  ///  'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );


$dan1=array(
    'where'=>'',//where к запросу
    //'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>0, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>0,//включение выключение кнопки удалить
    'sel_all'=>0,//включение выключение кнопки выбрать все
    'an_sel_all'=>0,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
   // 'sort'=>0, // включть сортировку   
);

    $admin_center_area.=tab_admin('hara_about',' О нас',$dan,$dan1);
    
    
    $dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
        
    'img'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/hara_proj/','imgw'=>300,'imgh'=>190 ),
    'text'=>array('tip'=>'text','name'=>'Текст','r'=>1,'w'=>1),
              
     
    
  
  'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
  'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );


$dan1=array(
    'where'=>'',//where к запросу
    //'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
   // 'sort'=>0, // включть сортировку   
);

    $admin_center_area.=tab_admin('hara_about_im','О нас (банер)',$dan,$dan1);
    
    
    
    
    
    
    
    
    
    
    
    
    
?>
