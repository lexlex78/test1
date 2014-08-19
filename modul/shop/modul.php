<?php

/// уведомить о наличии //////////////////


if ($_POST['en']=='ok'){
 
$mess_en='openPopEn_ok();';
$db->execute("INSERT ".DB_PREFIX."product_en SET  email='".$_POST['email']."' ,  pid='".$_POST['id']."' , data_cr=now() , en=0"); 


}



///////////////////////////////////////////




function kroshki($pid) {
    global $shop_f_cat,$db;
    if ($shop_f_cat[$pid]['url'])  $url = '<a href="/shop/'.shop_pid_url($pid).'">'.$shop_f_cat[$pid]['name'].'</a>'. $url;
    while ($shop_f_cat[$pid]['pid'] != 0) {
        $pid = $shop_f_cat[$pid]['pid'];
        $url = '           
<a href="/shop/'.shop_pid_url($pid).'">'.$shop_f_cat[$pid]['name'].'</a><div class="breadcrumbs_arrow"></div>'. $url;
    }
     
 //   $url.='<a href="/shop/'.shop_pid_url($pid).'">'.$shop_f_cat[$pid]['name'].'</a>' ;
    $url='<a href="/">Главная</a><div class="breadcrumbs_arrow"></div>'.$url;
    return $url;
}

//function kroshki1($pid) {
//    global $shop_f_cat,$db;
//   if ($shop_f_cat[$pid]['url'])  $url = '<li><a href="/shop/'.shop_pid_url($pid).'">'.$shop_f_cat[$pid]['name'].'</a></li>'. $url;
//    while ($shop_f_cat[$pid]['pid'] != 0) {
//        $pid = $shop_f_cat[$pid]['pid'];
//        $url = '<li><a href="/shop/'.shop_pid_url($pid).'">'.$shop_f_cat[$pid]['name'].'</a></li>'. $url;
//    }
//     $one =$db->select('SELECT * FROM '.DB_PREFIX.'shop_cat WHERE pid=0 ORDER BY sort limit 1');
//     $one=$one[0];
//     $url = '<li><a href="/shop/'.$one['url'].'/">Каталог продукции</a></li>'.$url;
//    return $url;
//}


///////////рекурсивная функцти для вывода дерева /////////////////////////////////////
function shop_vievtree_mmenu($a) {

    global $dantree, $router;
    $fol = '';$ret = '';
    
    if ($a == 0)  $fol = ' class="main_nav" ';

    $ret.='<ul ' . $fol . '>';
    foreach ($dantree[$a]['cild'] as $v) {
        if (($router[1] == $dantree[$v]['url'] && $router[1] != '') || ($router[2] == $dantree[$v]['url'] && $router[2] != '')) {
            $active = 'open select1';
            $active1 = 'select';
        } else {
            $active = '';
            $active1 = '';
        }
        if ($dantree[$v]['cild']) {

            $ret.='<li class=" dropdown ' . $active . '" ><a href="/shop/'.shop_pid_url($dantree[$v]['pid']) .$dantree[$v]['url']. '">' . $dantree[$v]['name'] . '</a> <div class="dropdown_list">' . shop_vievtree_mmenu($dantree[$v]['id']) . '</div></li>';
        } else {
            $urr = '';
            if ($dantree[$a]['url'])$urr = $dantree[$a]['url'] . '/';
            $ret.='<li class="  ' . $active1 . '" ><a  href="/shop/'.shop_pid_url($dantree[$v]['pid']) .$dantree[$v]['url']. '">' . $dantree[$v]['name'] . '</a></li>';
        }
    }
     $ret.='</ul>';
        return $ret;
}

// вывод меню каталога товаров
unset($dantree);
$dantree = $db->select_id("SELECT * FROM " . DB_PREFIX . "shop_cat WHERE en=1 ORDER BY sort ");
//1 я итерация указываем каждому родителю ребенка
foreach ($dantree as $k => $v) {
    $dantree[$v['pid']]['cild'][] = $v[id];
    $dantree[$v['pid']]['tree_num'] = 0;
}
$shop_cat = shop_vievtree_mmenu(0);



//////////////////////////////////////
/// корзина
require 'cart.php';

