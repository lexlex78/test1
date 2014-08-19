<?php

$dan=array(
    'id'=>'id',
    'pid'=>'pid',
    'name'=>'name_ru',
    'sort'=>'sort',
    'db'=>array(
                'id'=>array('tip'=>'id','name'=>'id'),
                'name_ru'=>array('tip'=>'text','name'=>'Название RU','r'=>0,'w'=>1,'ob'=>1),
                'name_ua'=>array('tip'=>'text','name'=>'Название UA','r'=>0,'w'=>1,'ob'=>1),
                'url'=>array('tip'=>'text','name'=>'URL формат(...)','r'=>0,'w'=>1,'ob'=>1),
                'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1),
                ),
          );

$z_where='';
$admin_center_area.=tree_admin_red('mmenu','Главное Меню',$dan,2,$z_where);


?>
