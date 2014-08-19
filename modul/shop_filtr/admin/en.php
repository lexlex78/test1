<?php
$dan=array(
    'id'=>array('tip'=>'id'),
 //   'img'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/banner/','imgw'=>150,'imgh'=>34),
//   'img_sm'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/banner_sm/','imgw'=>151,'imgh'=>166),
    'name'=>array('tip'=>'text','name'=>'Наличие','r'=>1,'w'=>1,'ob'=>1,'un'=>1),
//      'text'=>array('tip'=>'btext','name'=>'Текст','r'=>0,'w'=>1),
//    'text_ua'=>array('tip'=>'btext','name'=>'Текст ua','r'=>1,'w'=>1),
//    'url'=>array('tip'=>'text','name'=>'URL','r'=>1,'w'=>1),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    
    );

$admin_center_area=tab_admin('f_en','Наличие',$dan);
?>
