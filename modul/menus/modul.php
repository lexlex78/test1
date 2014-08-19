<?php
////верхнее меню
$sql = 'SELECT * FROM '.DB_PREFIX.'up_menu WHERE en=1 ORDER BY sort';
$query = $db->select($sql);

$up_menu = '<ul>';

foreach($query as $v)
{
      
    $active='';
    if(($v['url']==$_SERVER['REQUEST_URI']) ){$active = 'class="active"';$v['url']='javascript:void(0)';}
    
    $up_menu.= '<li '.$active.' ><a  href="'.$v['url'].'">'.$v['name'].'</a></li>';
    
}    
$up_menu.= '</ul>';


////верхнее меню
$sql = 'SELECT * FROM '.DB_PREFIX.'up_menu WHERE en1=1 ORDER BY sort';
$query = $db->select($sql);

$down_menu = '<ul>';

foreach($query as $v)
{
      
    $active='';
    if(($v['url']==$_SERVER['REQUEST_URI']) ){$active = 'class="active"';$v['url']='javascript:void(0)';}
    
    $down_menu.= '<li '.$active.' ><a  href="'.$v['url'].'">'.$v['name'].'</a></li>';
    
}    
$down_menu.= '</ul>';


 
