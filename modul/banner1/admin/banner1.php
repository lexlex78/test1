<?php
$dan=array(
    'id'=>array('tip'=>'id'),
    'img'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/banner1/','imgw'=>180,'imgh'=>70),
  //  'img_sm'=>array('tip'=>'img','name'=>'Картинка','r'=>1,'w'=>1,'path'=>'/img/banner_sm/','imgw'=>151,'imgh'=>166),
  //  'zag'=>array('tip'=>'text','name'=>'Заголовок','r'=>1,'w'=>1),
  //  'text'=>array('tip'=>'btext','name'=>'Текст','r'=>1,'w'=>1),
//    'text_ua'=>array('tip'=>'btext','name'=>'Текст ua','r'=>1,'w'=>1),
    'url'=>array('tip'=>'text','name'=>'URL','r'=>1,'w'=>1),
    'en'=>array('tip'=>'bool','r'=>1,'name'=>'Выводить','w'=>1,'def'=>1),
    'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    
    );


$admin_center_area=tab_admin('banner1','Банер на главной',$dan); 
?>
