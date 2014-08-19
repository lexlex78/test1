<?php

$sel=$db->select("SELECT * FROM ".DB_PREFIX."hara_otd WHERE en=1 ");
if ($sel){

$meta_title=$sel[0]['title_meta'];
$meta_keyw=$sel[0]['keyw_meta'];
$meta_descr=$sel[0]['descr_meta'];
$sel=$sel[0];

// мини галерея
$gal='';
if (!empty($sel['img_m'])){
$imgs=$db->select("SELECT * FROM ".DB_PREFIX."hara_otd_img WHERE pid = ".$sel['id']."");
$gal='<div class="page_slider_id flexslider"><ul class="slides">';
foreach ($imgs as $key => $value) {
    
 $gal.='<li>
            <img src="./img/hara_stroy/'.$value['img'].'" />
        </li>';  
    
}
$gal.='</ul></div>';

    
}

// прайс лист
$price='';
$d_pr=$db->select("SELECT * FROM ".DB_PREFIX."hara_price  WHERE en=1 and pid = ".$sel['soput']." ORDER BY sort");
if ($d_pr){
 $price='<h3>Прайс-лист</h3>
            <div class="price">
                <div class="title_price">
                    <div class="price_line"><p>Размер, м</p></div>
                    <div class="price_line"><p>Стоимость, руб</p></div>
                    <div class="price_line"><p>Под рубанок</p></div>
                </div>
                <div class="price_slider_id flexslider">
                <ul class="slides">';   
    
 
   
 foreach ($d_pr as $key => $value) {
    
 $price.='<li>
                        <div class="price_item">
                            <div class="price_item_line"><p>'.$value['raz'].'</p></div>
                            <div class="price_item_line"><p>'.$value['price'].'</p></div>
                            <div class="price_item_line"><p>'.$value['rub'].'</p></div>
                        </div>
           </li>';  
    
}

$price.=' </ul>
                    <div class="price_slider_right"></div>
                    ';
    
    
    
}



// фото
$img='';
if ($sel['img']!='')$img='<img src="img/hara_stroy/'.$sel['img'].'" alt="'.$sel['zag'].'" class="page_avatar" />';


// рекомендуем

//
//
//$rec='';
//$d_rec=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj  WHERE pid = ".$sel['id']." and en=1 and rec=1 ORDER BY sort");
//if ($d_rec){
// $rec='<div class="recommendations">
//                <h3>Мы рекомендуем</h3>
//                <div class="recommendations_flexslider flexslider">
//                    <ul class="slides">';   
//    
// 
//   
// foreach ($d_rec as $key => $value) {
//    
// $rec.=''.$value['raz'].'
//<li>
//    <img class="fl_r" src="img/hara_proj/'.$value['img'].'">
//    <div class="rec_text">
//        <div class="rec_text_content">
//            <h3>'.$value['zag'].'</h3>
//            <p class="cost">Стоимость проекта '.$value['price'].' руб.</p>
//            <p>'.str_smoll($value['text'],300).' <a href="/engineering/'.$sel['url'].'/'.$value['url'].'.html'.$ur.'">Подробнее ></a></p>
//        </div>
//    </div>
//</li>     
//';  
//    
//}
//
//$rec.='</ul>
//                </div>
//            </div>';
//}
//



$center_area=showtempl(dirname(__FILE__).'/templ/tpl_otd.php');
}
else $_GET['error']=404;



