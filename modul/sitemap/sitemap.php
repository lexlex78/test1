<?php

// формируем масив сылок

/// верхнее меню
$sql = 'SELECT * FROM '.DB_PREFIX.'up_menu WHERE en=1 ORDER BY sort';
$query = $db->select($sql);
foreach($query as $v)
{
$name=$v['name'];   
$url=$v['url'];    
$sm[$name]['url']=$url; 
}



// каталог магазина 

foreach ($dantree as $k => $v) {
   
$name=$v['name'];   
$url='/shop/' . shop_pid_url($v['id']) ;    
if (!$v['pid'])$sm[$name]['url']=$url;
else{
$sm[$dantree[$v['pid']]['name']]['in'][$name]['url']=$url;   
}
   
}

// товары
$sql = 'SELECT id,pid,name,url FROM '.DB_PREFIX.'shop_produkt WHERE en=1  ';
$query = $db->select($sql);
foreach($query as $v)
{
$name=$v['name'];   
$url='/shop/' . shop_pid_url($v['pid']) . $v['url'] . '.html';  


if ($dantree[$v['pid']]['pid']==='0') $sm[$dantree[$v['pid']]['name']]['in'][$name]['url']=$url; 
else{
 $sm[$dantree[$dantree[$v['pid']]['pid']]['name']]['in'][$dantree[$v['pid']]['name']]['in'][$name]['url']=$url;   
}
}




// рекурсивная функция вывода
function render_sm ($m){
    
$ret.='<ul>'; 
foreach ($m as $k => $v) {
 $ret.='<li><a href="'.$v['url'].'">'.$k.'</a>';
if ($v['in'])$ret.=render_sm(&$m[$k]['in']);
 $ret.='</li>';
}
$ret.='</ul>'; 
return $ret;    
}

/// вывод массива 
$center_area='<div class="body sitemap clearfix">'.render_sm(&$sm).'</div>';
