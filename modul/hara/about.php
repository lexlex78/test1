<?php


$sel=$db->select("SELECT * FROM ".DB_PREFIX."hara_about ");


$meta_title=$sel[0]['title_meta'];
$meta_keyw=$sel[0]['keyw_meta'];
$meta_descr=$sel[0]['descr_meta'];
$sel=$sel[0];

// мини галерея
$gal='';

$imgs=$db->select("SELECT * FROM ".DB_PREFIX."hara_about_im WHERE en=1 ORDER BY sort DESC  ");
$gal='<div class="page_slider_id flexslider">
                            <ul class="slides">';
foreach ($imgs as $key => $value) {
    
 $gal.='<li>
            <img src="img/hara_proj/'.$value['img'].'" />
                <div class="item_title item_title_green">
                                <span>'.$value['text'].'</span>
        </li>';  
    
}
$gal.='</ul></div>';





    


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_about.php');
