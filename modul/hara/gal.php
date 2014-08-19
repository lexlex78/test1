<?php


$sel=$db->select("SELECT * FROM ".DB_PREFIX."hara_gal ");


$meta_title=$sel[0]['title_meta'];
$meta_keyw=$sel[0]['keyw_meta'];
$meta_descr=$sel[0]['descr_meta'];
$sel=$sel[0];

// мини галерея
$gal='';



// пажинация    
$sqll=$db->select("SELECT COUNT(id) FROM ".DB_PREFIX."hara_gal_im WHERE en=1 ORDER BY sort DESC  ");
$all=$sqll[0]['COUNT(id)'];
$pagin=paging($all,16,5);
    
// выборка 
$sqll=$db->select("SELECT *  FROM ".DB_PREFIX."hara_gal_im WHERE en=1 ORDER BY sort DESC  limit ".$pagin[1]);



$gal='';
foreach ($sqll as $key => $value) {
    
 $gal.='<a href="img/hara_gal/'.$value['img'].'"  class="item">
                            <img src="img/hara_gal/'.$value['img'].'">
                            <div class="item_title item_title_green">
                                <span>'.$value['text'].'</span>
                            </div>
                        </a>
     ';  
    
}
$gal.='';

    


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_gal.php');
