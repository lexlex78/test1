<?php

// запись отзыва
if ($_POST['send']=='rew'){
    
$db->execute ("INSERT ".DB_PREFIX."reviews SET  en=1 , name='$_POST[name]' , review='$_POST[rewiev]', sity='$_POST[sity]' , data_cr=now() ");   
$script_mes='alert ("Ваш отзыв отправлен!");location.href=location.href;';   
    
}


//
//$sel=$db->select("SELECT * FROM ".DB_PREFIX."hara_gal ");
//
//
//$meta_title=$sel[0]['title_meta'];
//$meta_keyw=$sel[0]['keyw_meta'];
//$meta_descr=$sel[0]['descr_meta'];
//$sel=$sel[0];


$it='';

// пажинация    
$sqll=$db->select("SELECT COUNT(id) FROM ".DB_PREFIX."reviews WHERE en=1   ");
$all=$sqll[0]['COUNT(id)'];
$pagin=paging($all,16,5);
    
// выборка 
$sqll=$db->select("SELECT *  FROM ".DB_PREFIX."reviews WHERE en=1 ORDER BY data_cr DESC  limit ".$pagin[1]);



$gal='';
foreach ($sqll as $key => $value) {
    
 $it.='<li>
            <div class="comment_item_text">
            <small>'.$value['data_cr'].'</small>
            <h5>'.$value['name'].', г.'.$value['sity'].'</h5>
            <span>'.$value['rewiev'].'</span>
            </div>
        </li>';  
    
}
$it.='';

 /////////////////////////////////////////////////
// рекомендуем
$sel=$db->select_id("SELECT * FROM ".DB_PREFIX."hara_stroy WHERE en=1");


$rec='';
$d_rec=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj  WHERE en=1 and pop=1 ORDER BY sort");
if ($d_rec){
 $rec='<div class="page_right_part clearfix">
                        <div class="search_slider">
                            <h3>Популярные проекты</h3>
                            <ul id="v_slider" class="jcarousel jcarousel-skin-tango metro_style">';   
    
 
   
 foreach ($d_rec as $key => $value) {
    
 $rec.='
<li>
                                    <a class="item" href="/engineering/'.$sel[$value['pid']]['url'].'/'.$value['url'].'.html'.$ur.'">
                                        <img src="img/hara_proj/'.$value['img'].'">
                                        <div class="item_title item_title_black">
                                            <span>'.$value['zag'].'</span>
                                        </div>
                                    </a>
                                </li>';  
    
}

$rec.='</ul>
                </div>
            </div>';
}

//////////////////////////////////////////////////////   


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_reviews.php');
