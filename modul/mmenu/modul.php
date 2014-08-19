<?php

$cash_mod='mmenu'.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){


///////////рекурсивная функцти для вывода дерева /////////////////////////////////////
function vievtree_mmenu ($a){
$ret='';
global $dantree,$site_language,$site_url,$router_str;
$fol='';if ($a==0)$fol='';

$ret.='<ul '.$fol.'>';
foreach ($dantree[$a]['cild'] as $v) {
        
 if( strpos($router_str, substr($dantree[$v]['url'], 1) )|| $router_str==substr($dantree[$v]['url'], 1)) {$active='class="active"';} else {$active='';}
 if ($dantree[$v]['cild'])
 {
   
     
     $ret.='<li ><a '.$active.' >'.$dantree[$v]['name'].'</a>'.vievtree_mmenu($dantree[$v]['id']).'</li>';}
 else $ret.='<li ><a '.$active.' href="'.$site_url.$dantree[$v]['url'].'">'.$dantree[$v]['name_'.$site_language].'</a></li>';
 
 
 
}
$ret.='</ul>';
return $ret;
}



// вывод меню
unset($dantree);
$dantree=$db->select_id("SELECT * FROM ".DB_PREFIX."mmenu WHERE en=1 ORDER BY sort ASC");
//1 я итерация указываем каждому родителю ребенка
foreach ($dantree as $k=>$v) {$dantree[$v['pid']]['cild'][]=$v[id];$dantree[$v['pid']]['tree_num']=0;}
$topmenu=vievtree_mmenu (0);

///////////////////////////////////////
cash_add ($cash_mod,120,$topmenu);
}
else $topmenu=$cash;
unset ($cash);